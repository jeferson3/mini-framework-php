<?php

session_start();

require "vendor/autoload.php";

require "functions.php";

require $_SERVER['DOCUMENT_ROOT']."/src/config/Connection.php";

require "start.php";

ssl();

require "routes.php";
