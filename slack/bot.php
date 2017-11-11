<?php

require_once('vendor/autoload.php');
require_once('slack/config.php');

use Maknz\Slack\Client as SlackClient;

function sendSlackMessage($message) {
    $hookURL = getHookURL();
    $settings = getSettings();

    $client = new SlackClient($hookURL, $settings);
    $client->send($message);
}

?>
