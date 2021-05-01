<?php

session_start();

require "vendor/autoload.php";

require "functions.php";

require $_SERVER['DOCUMENT_ROOT']."/src/Config/Connection.php";

require "start.php";

ssl();

require "routes.php";
