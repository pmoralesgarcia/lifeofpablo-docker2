<?php

/**
 * Configuration for database connection
 *
 */

$host       = "localhost";
$username   = "pablo";
$password   = "Xod-Znc6xiT";
$dbname     = "guestbook";
$dsn        = "mysql:host=$host;dbname=$dbname";
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );
