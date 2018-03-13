<?php
defined('BASEPATH') OR exit('No direct script access allowed');


if(!function_exists("resize")){
  function resize($files, $width, $height){
    ob_start();
    /* Get original image x y*/
    list($w, $h) = getimagesize($files['tmp_name']);
    /* calculate new image size with ratio */
    $ratio = max($width/$w, $height/$h);
    $h = ceil($height / $ratio);
    $x = ($w - $width / $ratio) / 2;
    $w = ceil($width / $ratio);
    /* new file name */
    $path = 'uploads/'.$width.'x'.$height.'_'.$_FILES['file_cover']['name'];
    /* read binary data from image file */
    $imgString = file_get_contents($files['tmp_name']);
    /* create image from string */
    $image = imagecreatefromstring($imgString);
    $tmp = imagecreatetruecolor($width, $height);
    imagecopyresampled($tmp, $image,
      0, 0,
      $x, 0,
      $width, $height,
      $w, $h);
    /* Save image */
    switch ($files['type']) {
      case 'image/jpeg':
      imagejpeg($tmp, $path, 80);
      break;
      case 'image/png':
      imagepng($tmp, $path, 0);
      break;
      case 'image/gif':
      imagegif($tmp, $path);
      break;
      default:
      exit;
      break;
    }
    return $path;
    /* cleanup memory */
    imagedestroy($image);
    imagedestroy($tmp);
  }
}