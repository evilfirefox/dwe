<?php

namespace App\Model;

/**
 * Class Context
 * @package App\Model
 */
class Payment implements \Serializable
{
    /**
     * @var string
     */
    private $state;

    /**
     * @var string
     */
    private $id;

    /**
     * Payment constructor.
     * @param string $id
     * @param string $state
     */
    public function __construct(string $id, string $state = 'new')
    {
        $this->state = $state;
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Payment
     */
    public function setId(string $id): Payment
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     * @return Payment
     */
    public function setState(string $state): Payment
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return string
     */
    public function serialize(): string
    {
        return json_encode([
            'id' => $this->id,
            'state' => $this->state,
        ]);
    }

    /**
     * @param string $serialized
     * @return Payment
     */
    public function unserialize($serialized): Payment
    {
        $data = json_decode($serialized, true);

        $this->id = $data['id'];
        $this->state = $data['state'];

        return $this;
    }
}
