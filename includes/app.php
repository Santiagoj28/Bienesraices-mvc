<?php
//hace funciones bases de datos y clases;
use Model\ActiveRecord;


require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();


require 'config/databases.php';
require 'funciones.php';


//conectarnos a la base de datos 
$db = conectadoDB();


ActiveRecord::setDb($db);