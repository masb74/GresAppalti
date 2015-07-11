<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once dirname(__FILE__) . '/PhpWord/Autoloader.php';
\PhpOffice\PhpWord\Autoloader::register();
 
class Word extends \PhpOffice\PhpWord\PhpWord
{

}
 
/* End of file Word.php */
/* Location: ./application/libraries/Word.php */