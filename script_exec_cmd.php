
<?php
// Exemple 1
$ssh="ssh risk@192.168.1.40";

//$message  = "port#80*close";
$message  = "bascule#";
$type = explode("#", $message);
switch ($type[0]){
	case "port":
	list( $id, $action) = explode("*", $type[1]);
	echo $id."\n"; // piece2
	echo $action."\n"; // piece3

		if ($action=="close"){
			exec($ssh." -C 'sudo iptables -A INPUT -p tcp --destination-port ".$id." -j DROP' ");
			
		}
	break;
	case "bascule":
		exec($ssh." -C '/usr/share/heartbeat/hb_standby' ");
	break;

}


?>

