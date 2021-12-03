<?php 
 $a= (int)$_POST["enfants"] + (int)$_POST["adultes"];
 echo $a.' Voyageurs ( '.$_POST["enfants"].' enfants + '.$_POST["adultes"].' adultes )';
?>