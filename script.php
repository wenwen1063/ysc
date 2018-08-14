<?php
$urls[]  = 'http://120.39.251.74/admin.php/home/Feeflowcheck/index';
$urls[]  = 'http://120.39.251.74/admin.php/home/DoOrderSet/do_order_set';  //
$ch      = curl_init();
$timeout = 30;
foreach ($urls as $key => $v) {
    curl_setopt($ch, CURLOPT_URL, $v);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $file_contents = curl_exec($ch);
}
curl_close($ch);
echo $file_contents;


