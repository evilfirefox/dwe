<?php

namespace App\Core\Processor;

/**
 * Class TransitionProcessor
 * @package App\Model\Processor
 */
class TransitionProcessor implements TransitionVisitorInterface
{
    /**
     * @param mixed $argument
     * @return mixed|void
     */
    public function visit($argument)
    {
        switch (get_class($argument)) {
            default:
                break;
        }
    }
}
