<?php
require_once('Crud.php');
$obj = new Crud();
//$obj->insert('kucing','jakarta');
//$obj->update('abdul aziz zulfikar','palembang','1');
//$obj->delete(2);
print_r($obj->selectAll());