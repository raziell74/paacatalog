<?php

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$config['db']['host']   = $_ENV["MYSQL_ADDRESS"];
$config['db']['user']   = $_ENV["MYSQL_USERNAME"];
$config['db']['pass']   = $_ENV["MYSQL_PASSWORD"];
$config['db']['dbname'] = $_ENV["MYSQL_DATABASE"];