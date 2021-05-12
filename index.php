<?php

session_start();

require "vendor/autoload.php";

require "src/Config/functions.php";

require $_SERVER['DOCUMENT_ROOT']."/src/Config/Connection.php";

require "src/Config/start.php";

ssl();

require "src/routes/routes.php";
