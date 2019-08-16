<?php


namespace App\Model;

/**
 * Class Context
 * @package App\Model
 */
class Context
{
    /**
     * @var array
     */
    private $context = [];

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->context;
    }
}
