<?php

function getGraylogServiceStatus() : string {
    if (strpos(shell_exec("systemctl status graylog-server.service  | grep Active"), "running") !== false) {
        return "UP";
    }
    return "DOWN";
}

function getMongoDbServiceStatus() :string {
    if (strpos(shell_exec("systemctl status mongod.service  | grep Active"), "running") !== false) {
        return "UP";
    }
    return "DOWN";
}

function getElasticsearchServiceStatus() : string {
    if (strpos(shell_exec("systemctl status elasticsearch.service  | grep Active"), "running") !== false) {
        return "UP";
    }
    return "DOWN";
}

function getDiskUsagePercent() : float {
    return doubleval(shell_exec("df -h | grep sda  | awk {'print $5'}"))/100;
}

function getDiskUsage() : string {
    return shell_exec("df -h | grep sda  | awk {'print $3'}");
}

$status = [
    "graylog" => getGraylogServiceStatus(),
    "mongodb" => getMongoDbServiceStatus(),
    "elasticsearch" => getElasticsearchServiceStatus(),
    "diskusage" => getDiskUsage(),
    "diskusagepercent" => getDiskUsagePercent()
];

echo json_encode($status);

?>