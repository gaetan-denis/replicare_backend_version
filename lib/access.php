<?php
function checkUrl(): void
{
if (!str_contains($_SERVER['REQUEST_URI'], 'index.php')) {
header('Location: index.php');
die;
}
}