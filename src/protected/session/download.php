<?php
if(!empty($_GET['file_name'])){
    $filename = $_GET['file_name'];
    $filepath = 'files/' . $filename;
    if(file_exists($filepath)){
        header("Cashe-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filepath=$filename");
        header("Content-Type: application/pdf");
        header("Content-Transfer-Encoding: binary");
        readfile($filepath);
        exit;
    } else{
        echo $filepath;
    }
} else{
    echo $_GET['file_name'];
}

?>