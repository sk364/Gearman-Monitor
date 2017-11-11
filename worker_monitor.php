<?php

require_once('_config.php');
require_once('classes/ServerList.php');
require_once('classes/Monitors.php');

$sleepTime = 18;

$serverList = new GA_ServerList(); 
$serverList->addServers($cfgServers); 
$functionData = $serverList->getFunctionData();

$workerMonitor = new WorkerMonitor();

while (true) {
    $workerMonitor->monitor($functionData);

    echo "Sleeping...";
    sleep($sleepTime);
}

?>
