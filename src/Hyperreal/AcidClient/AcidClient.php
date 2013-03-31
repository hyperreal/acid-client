<?php

namespace Hyperreal\AcidClient;

use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;
use Guzzle\Common\Collection;

class AcidClient extends Client
{
    public static function factory($config = array())
    {
        $default = array(
            'base_url' => '{scheme}://{host}:8000/app_dev.php',
            'scheme' => 'http',
            'host' => 'localhost',
        );

        $config = Collection::fromConfig($config, $default, array());

        $client = new self($config->get('base_url'), $config);
        $description = ServiceDescription::factory(__DIR__ . '/service.json');
        $description->setBaseUrl($config->get('base_url'));

        $client->setDescription($description);

        return $client;
    }
}
