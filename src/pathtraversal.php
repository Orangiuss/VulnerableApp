<?php
header("Content-type: application/force-download");  
header("Content-Disposition:attachment; filename=".$_GET["fichier"]);
readfile($_GET["chemin"]."/".$_GET["fichier"]);
// unlink($_GET["chemin"]."/".$_GET["fichier"]);             
?> 