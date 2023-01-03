<?php
/**
 * Created by PhpStorm.
 * User: CosMOs
 * Date: 1/3/2023
 * Time: 11:53 AM
 */

function fix_folder_permission($foldername,$ignores = '')
{

    $foldername = str_replace('\\',DIRECTORY_SEPARATOR,$foldername);
    $foldername = str_replace('/',DIRECTORY_SEPARATOR,$foldername);

    if ($ignores == '') {
       // $ignores = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/uploads/';
        $ignores = $_SERVER['DOCUMENT_ROOT'];
        $ignores = str_replace('\\',DIRECTORY_SEPARATOR,$ignores);
        $ignores = str_replace('/',DIRECTORY_SEPARATOR,$ignores);
        $lastchar = substr($ignores,-1,1);
        if( $lastchar == DIRECTORY_SEPARATOR)
        {
            $ignores = substr($ignores,0,strlen($ignores)-1);
        }
      //  echo $ignores;
    }
    $foldx = explode(DIRECTORY_SEPARATOR, $foldername);
    $len = count($foldx);
    $nfl = $foldername;
    for ($i = $len; $i >1; $i--)
    {
        $nfl = dirname($nfl);
        if($ignores == $nfl)
        {
            break;
        }

        if(is_dir($nfl))
        {
            if(is_writable($nfl))
            {

            }else{
                chmod($nfl,0755);
            }
        }

        echo $nfl . '<br/>';
    }

}

$folder = $_SERVER['DOCUMENT_ROOT']. '/wp/wp-content/uploads/2022/04/';
$foldername = realpath($folder);
fix_folder_permission($foldername);
//echo substr(sprintf('%o', fileperms('pay')), -4);
