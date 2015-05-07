<?php
$username = "root"; 
$password = "admin@URU@1"; 
$hostname = "localhost"; 
$dbname = "esar";

$dumpfname  = $dbname . "_" . date("Y-m-d_H-i-s").".sql";
$command = "C:\\Program Files\\MySQL\\MySQL Server 5.5\\bin\\mysqldump --add-drop-table --host=$hostname --user=$username ";
if ($password) 
$command.= "--password=". $password ." "; 
$command.= $dbname;
$command.= " > " . $dumpfname;
system($command);

$zipfname = $dbname."_".date("Y-m-d_H-i-s").".zip";
$zip = new ZipArchive();

if($zip->open($zipfname,ZIPARCHIVE::CREATE)) 
{
    $zip->addFile($dumpfname,$dumpfname);
    $zip->close();
}
if (file_exists($zipfname)) {
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='.basename($zipfname));
flush();
readfile($zipfname);
exit;
}
?>
