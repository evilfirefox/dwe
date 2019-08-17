<?php

namespace App\Core\Events;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Workflow\Event\GuardEvent;

/**
 * Class GuardListener
 * @package App\Events
 */
class GuardListener implements EventSubscriberInterface
{
    /**
     * @return array|void
     */
    public static function getSubscribedEvents()
    {
        return [
            'workflow.guard' => ['guard'],
        ];
    }

    /**
     * @param GuardEvent $event
     */
    public function guard(GuardEvent $event)
    {
        // @todo: some implementation here...

        if (true) {
            $event->setBlocked(true);
        }
    }
}
