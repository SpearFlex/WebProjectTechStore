<?php

$DBcon = new mysqli("localhost", "root", "", "SpearLexTechStore");

if ($DBcon->connect_errno) {
    die ("Error: ". $DBcon->connect_error);
}
?>