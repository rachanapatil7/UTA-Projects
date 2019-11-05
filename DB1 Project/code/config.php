<?php

/**
 * Configuration for database connection
 *
 */

$servername       = "localhost";
$username   = "root";
$password   = "root";
$dbname     = "project"; // will use later
$dsn        = "mysql:host=$servername;dbname=$dbname";
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );