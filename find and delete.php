<?php



function listFolderFiles($dir){
    $ffs = scandir($dir);

    unset($ffs[array_search('.', $ffs, true)]);
    unset($ffs[array_search('..', $ffs, true)]);

    // prevent empty ordered elements
    if (count($ffs) < 1)
        return;

    echo '<ol>';
    foreach($ffs as $ff){
       // echo '<li>'.$ff;
        if(is_dir($dir.'/'.$ff))
        {

        }else{
            if(strpos($dir.'/'.$ff,'htaccess')>0)
            {
                echo $dir.'/'.$ff;
               // unlink($dir.'/'.$ff);
            }
        }
        if(is_dir($dir.'/'.$ff)) listFolderFiles($dir.'/'.$ff);
        echo '</li>';
    }
    echo '</ol>';
}

listFolderFiles('Main Dir');


