<?php

require_once __DIR__ . '/../vendor/autoload.php';

$client = \Hyperreal\AcidClient\AcidClient::factory(
    array(
        'base_url' => 'http://acid.local/app_dev.php',
        'token' => 'abc',
    )
);

$announcementsListCommand = $client->getCommand('GetAnnouncementsList');
$response = $announcementsListCommand->execute();
echo '-------------------------------------------------------------------------------------', PHP_EOL;
echo '                               announcements list ', PHP_EOL;
var_export($response);
echo PHP_EOL, '-------------------------------------------------------------------------------------';

$oneAnnouncementCommand = $client->getCommand('GetOneAnnouncement', array('id' => '10'));
$response = $oneAnnouncementCommand->execute();
echo '-------------------------------------------------------------------------------------', PHP_EOL;
echo '                               one announcement', PHP_EOL;
var_export($response);
echo PHP_EOL, '-------------------------------------------------------------------------------------';

$reportCommand = $client->getCommand('ReportAnnouncement', array('id' => '10'));
$response = $reportCommand->execute();
echo '-------------------------------------------------------------------------------------', PHP_EOL;
echo '                               report announcement', PHP_EOL;
var_dump($response);
echo PHP_EOL, '-------------------------------------------------------------------------------------';

