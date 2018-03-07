<?php

require('mikrotik-api.php');

$API = new RouterosAPI();


if ($API->connect('10.1.1.7', 'dexter', '1011200107')) {

    $array = $API->comm("/interface/wireless/scan 
    					 =.id=wlan1 
    					 =rounds=1");	

    foreach($array as $x){
        $address = $x['address'];
        $ssid = $x['ssid'];
        $channel = $x['channel'];
        $sig = $x['sig'];
        $nf = $x['nf'];
        $snr = $x['snr'];
        $radioname = $x['radio-name'];
        $routeros_version = $x['routeros-version'];
        $section = $x['.section'];
        
        $sp1 = mysqli_query($conn, "call ADD_SCANS('$address', '$ssid', '$channel',
                            '$sig', '$nf', '$snr', '$radioname', '$routeros_version',
                            '$section')");
    }

    $sp2 = mysqli_query($conn, "call VIEW_SCANS()");
    $array2 = array();

    while ($fetch = mysqli_fetch_assoc($sp2)) {
        $array2[] = $fetch;
    }

    $display = json_encode($array2);
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


