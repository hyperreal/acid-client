<?php

namespace Hyperreal\AcidClient\Entity;

use Guzzle\Service\Command\ResponseClassInterface;
use Guzzle\Service\Command\OperationCommand;

class AnnouncementList implements ResponseClassInterface
{
    /** @var \Hyperreal\AcidClient\Entity\Announcement[] */
    private $announcements;

    private function __construct(array $response)
    {
        $this->announcements = array();
        foreach ($response as $announcement) {
            $this->announcements[] = new Announcement($announcement);
        }
    }

    /**
     * {@inheritDoc}
     */
    public static function fromCommand(OperationCommand $command)
    {
        $response = $command->getResponse()->json();

        return new self($response);
    }

    /**
     * @return Announcement[]
     */
    public function getAnnouncements()
    {
        return $this->announcements;
    }
}
