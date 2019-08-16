<?php

namespace App\Controller;

use App\Infrastructure\SubjectStorageInterface;
use App\Model\Payment;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Workflow\Registry;

/**
 * Class IndexController
 * @package App\Controller
 */
class IndexController
{
    /**
     * @var Registry
     */
    private $registry;

    /**
     * @var SubjectStorageInterface
     */
    private $subjectStorage;

    /**
     * IndexController constructor.
     * @param Registry $registry
     * @param SubjectStorageInterface $subjectStorage
     */
    public function __construct(Registry $registry, SubjectStorageInterface $subjectStorage)
    {
        $this->registry = $registry;
        $this->subjectStorage = $subjectStorage;
    }

    /**
     * @return Response
     * @throws \Exception
     */
    public function start(): Response
    {
        $payment = new Payment(Uuid::uuid4()->toString());

        $this->subjectStorage->store($payment->getId(), $payment);

        return new Response($payment->getId());
    }

    /**
     * @param string $id
     * @return Response
     */
    public function transition(string $id): Response
    {
        /**
         * @var \Serializable $payment
         */
        $payment = $this->subjectStorage->load($id);

        $workflow = $this->registry->get($payment, 'payment');
        $enabled = $workflow->getEnabledTransitions($payment);
        if (empty($enabled)) {
            return new Response($payment->serialize());
        }
        $workflow->apply($payment, reset($enabled)->getName());

        $this->subjectStorage->store($payment->getId(), $payment);

        return new Response($payment->serialize());
    }
}
