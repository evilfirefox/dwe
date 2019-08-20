<?php

namespace App\Core\Processor;

/**
 * Interface TransitionVisitorInterface
 * @package App\Core\Processor
 */
interface TransitionVisitorInterface
{
    /**
     * @param mixed $argument
     * @return mixed
     */
    public function visit($argument);
}
