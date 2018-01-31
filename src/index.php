<?php

if (!isset($_GET['p'])) $_GET['p'] = 'home';
if (!file_exists('content/' . $_GET['p'] . '.php')) $_GET['p'] = '404';

ob_start();
require_once ('content/' . $_GET['p'] . '.php');
$content_for_layout = ob_get_contents();
ob_end_clean();

require_once 'content/layout.php';