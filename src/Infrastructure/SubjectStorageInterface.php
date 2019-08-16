<?php

namespace App\Infrastructure;

/**
 * Class WorkflowStorageInterface
 * @package App\Infrastructure
 */
interface SubjectStorageInterface
{
    /**
     * @param string $id
     * @param $subject
     * @return bool
     */
    public function store(string $id, \Serializable $subject);

    /**
     * @param string $id
     * @return mixed
     */
    public function load(string $id);
}
