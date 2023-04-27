<?php
switch($_GET['code'])
{
case '404':header('Location: ./erreur-404.html');
break;
default:header('Location: ../app/index.php');
}
?>