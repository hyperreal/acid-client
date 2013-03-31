<?php

require_once __DIR__ . '/../vendor/autoload.php';

$client = \Hyperreal\AcidClient\AcidClient::factory(
    array(
        'base_url' => 'http://localhost:8000/app_dev.php'
    )
);

$announcementsListCommand = $client->getCommand('GetAnnouncementsList');
$response = $announcementsListCommand->execute();
echo '-------------------------------------------------------------------------------------', PHP_EOL;
echo '                               announcements list ', PHP_EOL;
var_export($response);
echo PHP_EOL, '-------------------------------------------------------------------------------------';

$oneAnnouncementCommand = $client->getCommand('GetOneAnnouncement', array('id' => 7));
$response = $oneAnnouncementCommand->execute();
echo '-------------------------------------------------------------------------------------', PHP_EOL;
echo '                               one announcement', PHP_EOL;
var_export($response);
echo PHP_EOL, '-------------------------------------------------------------------------------------';
