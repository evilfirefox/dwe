<?php

namespace App\Infrastructure;

use App\Model\Payment;

/**
 * Class WorkflowFileStorage
 * @package App\Infrastructure
 */
class SubjectFileStorage implements SubjectStorageInterface
{
    const BASE_PATH = '/var/www/app/var/storage/%s.json';

    /**
     * @param string $id
     * @param \Serializable $subject
     * @return bool|void
     */
    public function store(string $id, \Serializable $subject)
    {
        file_put_contents($this->getName($id), $subject->serialize());
    }

    /**
     * @param string $id
     * @return Payment|mixed
     */
    public function load(string $id)
    {
        return (new Payment($id))->unserialize(file_get_contents($this->getName($id)));
    }

    /**
     * @param string $id
     * @return string
     */
    private function getName(string $id): string
    {
        return sprintf(self::BASE_PATH, $id);
    }
}
