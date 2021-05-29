<?php 
$lines = file('listcantisenyummanja.txt'); 
 
 
 

$addresses = $lines;

$size = count($addresses);
$randomIndex = rand(0, $size - 1);
$randomUrl = $addresses[$randomIndex]; 


// print($randomUrl);
header('Location: ' . $randomUrl, true);
 