<?php

namespace Hyperreal\AcidClient\Entity;

use Guzzle\Service\Command\ResponseClassInterface;
use Guzzle\Service\Command\OperationCommand;

class ReportResponse implements ResponseClassInterface
{
    private $status;
    private $message;

    private function __construct(array $response)
    {
        $this->status = $response['s'];
        $this->message = $response['m'];
    }

    public static function fromCommand(OperationCommand $command)
    {
        return new self($command->getResponse()->json());
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getStatus()
    {
        return $this->status;
    }
}
