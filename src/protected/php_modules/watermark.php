<?php
function create_watermark($filename){

    $im = imagecreatefrompng($filename);

    $stamp = imagecreatetruecolor(130, 70);
    imagefilledrectangle($stamp, 0, 0, 129, 69, 0x0DD0AA);
    imagefilledrectangle($stamp, 9, 9, 120, 60, 0xFCCBFF);
    imagestring($stamp, 5, 20, 20, 'ZHELUDKOV!!', 0x0000FF);
    imagestring($stamp, 3, 20, 40, '1.1970', 0x0000FF);

    $sx = imagesx($stamp);
    $sy = imagesy($stamp);

    imagecopymerge($im, $stamp, imagesx($im)/17, imagesy($im)/17, 0, 0, $sx, $sy, 50 );
    imagejpeg($im, $filename);
    imagedestroy($im);
    imagedestroy($stamp);
}
?>