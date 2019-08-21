<?php


namespace App\Consumer;

use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;

/**
 * Class TaskConsumer
 * @package App\Consumer
 */
class TaskConsumer implements ConsumerInterface
{
    public function execute(AMQPMessage $msg)
    {
        // TODO: Implement execute() method.
    }
}