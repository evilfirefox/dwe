<?php

namespace App\Model\Transition;

use App\Core\Processor\TransitionVisitorInterface;

/**
 * Interface TransitionInterface
 * @package App\Model\Transition
 */
interface TransitionInterface
{
    /**
     * @param $subject
     * @param string $state
     * @return bool
     */
    public function canApply($subject, string $state): bool;

    /**
     * @param TransitionVisitorInterface $visitor
     * @return mixed
     */
    public function accept(TransitionVisitorInterface $visitor);
}
