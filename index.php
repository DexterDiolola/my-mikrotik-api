<?php

require('mikrotik-api.php');

$API = new RouterosAPI();


if ($API->connect('10.1.1.7', 'dexter', '1011200107')) {

    $array = $API->comm("/interface/wireless/scan 
    					 =.id=wlan1 
    					 =rounds=1");	

    $display = json_encode($array);
    
    header('Content-type: application/json');
    print_r($display);

}

$API->disconnect();




/*List of working commands
	/interface/ethernet/print
	/ip/route/print
	/ip/arp/print
	/interface/wireless/print
	/ip/dhcp-server/lease/print



*/
?>


