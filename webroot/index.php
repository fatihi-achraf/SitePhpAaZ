<?php 
define("WEBROOT", dirname(__FILE__)); //déinir le lien du dossier qui contient les fichiers
define("ROOT", dirname(WEBROOT)); // définir le dossier du site contenant  var/www
define("DS", DIRECTORY_SEPARATOR); // déinir le séparateur / pour linux ou bien  \ pour Win
define("CORE",ROOT.DS.'core'); //définir le nom du dossier du site 
define("BASE_URL", dirname(dirname($_SERVER['SCRIPT_NAME'])));// voir les variable avec print_r($_server)
define("BASE", dirname($_SERVER['SCRIPT_NAME']));

require CORE.DS.'includes.php';
new Dispatcher; 

?>

