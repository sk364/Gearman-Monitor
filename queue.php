<?php

require_once('_init.php');
require_once('monitoring.php');

$options = array();
$pageUri = "{$_SERVER['PHP_SELF']}?";

if (isset($_REQUEST['filterServers']) && is_array($_REQUEST['filterServers']))
{
    $options['filterServers'] = $_REQUEST['filterServers'];
    foreach ($options['filterServers'] as $filterServer)
    {
        $pageUri .= 'filterServers[]=' . intval($filterServer) . '&';
    }
}
if (isset($_REQUEST['filterName']) && strlen(trim($_REQUEST['filterName'])) > 0)
{
    $options['filterName'] = $_REQUEST['filterName'];
    $pageUri .= "filterName=" . urlencode($_REQUEST['filterName']) . '&';
}
if (isset($_REQUEST['sort']) && strlen(trim($_REQUEST['sort'])) > 0)
{
    $options['sort'] = $_REQUEST['sort'];
}

if (isset($_REQUEST['groupby']) && strlen(trim($_REQUEST['groupby'])) > 0)
{
    $options['groupby'] = $_REQUEST['groupby'];
}

$serverList = new GA_ServerList($options);
$serverList->addServers($cfgServers);

$view->versionData = $serverList->getVersionData();
$view->functionData = $serverList->getFunctionData();
$view->errors = $serverList->getErrors();
$view->pageUri = $pageUri;

$workerMonitor = new WorkerMonitor();
$workerMonitor->monitor($view->functionData);

$view->display('queue.tpl.php');
