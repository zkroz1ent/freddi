<?php
// Paramétrage pour certains serveurs qui n'affichent pas les erreurs PHP par défaut
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', '1');
ini_set('html_errors', '1');
// Autorise les uploads de fichier
ini_set('file_uploads', '1');
// Encodage avec les fonctions mb_*
mb_internal_encoding('UTF-8');
// Force le fuseau de Paris
date_default_timezone_set('Europe/Paris');

// Chemins dans l'OS
define('DS', DIRECTORY_SEPARATOR);   // Séparateur des noms de dossier (dépend de l'OS)
define('ROOT', dirname(__FILE__));  // Racine du site en absolu (à utiliser dans les includes par exemple)

// Fonctions
include "function".DS."function.php";
?>

<?php
/**
* Initialisations dans chaque page
*
* @author jef
*/

/**
 * Paramétrage pour certains serveurs qui n'affichent pas les erreurs PHP par défaut
 */
ini_set('display_errors', '1');
ini_set('html_errors', '1');

/**
 * Autoload
 * @param string $classe
 */
function my_autoloader($classe) {
  include 'classes/' . $classe . '.php';
}

spl_autoload_register('my_autoloader');

/**
 * Vide le cache du navigateur
 */
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

/** charge la classe FPDF qui est dans un dossier à part */
require_once "fpdf/fpdf.php";
?>

