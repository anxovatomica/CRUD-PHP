<?php

/**
 * Configuration for database connection
 *
 */

$host       = "localhost";
$username   = "root";
$password   = "";
$dbname     = "ProyectoDAW";
$dsn        = "mysql:host=$host;dbname=$dbname";
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );
$mysqli = new mysqli($host,$username,$password,$dbname);
              //$mysqli = new mysqli("localhost", "mi_usuario", "mi_contraseña", "world");
