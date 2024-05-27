<?php
session_start();


require_once 'config.php';
require_once 'lib/database.php';

$connection = connection();


require 'lib/access.php';
require 'lib/output.php';
require_once 'view/header.html';

sessionCheck();

require_once 'view/nav.php';

connectionStatus();


if (!empty($_GET['view'])) {
    getContent($_GET['view']);
}
require_once 'view/footer.html';




