<?php

namespace Hyperreal\AcidClient\Entity;

use Guzzle\Service\Command\ResponseClassInterface;
use Guzzle\Service\Command\OperationCommand;

class Announcement implements ResponseClassInterface
{
    const TYPE_STANDARD = 'standard';
    const TYPE_PREMIUM = 'premium';

    private $uid;
    private $userName;
    private $title;
    private $content;
    private $type;
    private $addDate;

    public function __construct(array $response)
    {
        $this->uid = $response['uid'];
        $this->userName = $response['userName'];
        $this->title = $response['title'];
        $this->content = array_key_exists('content', $response) ? $response['content'] : '';
        $this->type = $response['type'];
        $time = new \DateTime();
        $time->setTimestamp($response['addDate']);
        $this->addDate = $time;
    }

    /**
     * {@inheritDoc}
     */
    public static function fromCommand(OperationCommand $command)
    {
        return new self($command->getResponse()->json());
    }

    public function getAddDate()
    {
        return $this->addDate;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getUid()
    {
        return $this->uid;
    }

    public function getUserName()
    {
        return $this->userName;
    }
}
