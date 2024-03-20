#!/bin/bash

apt install php -y
cp graylog-status-api.service /etc/systemd/system/graylog-status-api.service
systemctl enable graylog-status-api.service
systemctl start graylog-status-api.service
systemctl status graylog-status-api.service

echo "Instalation finished!"