<?php
namespace App\Helpers;
class ImageHelper
{
  public static function uploadAndResize(
    $file,
    $directory,
    $fileName,
    $width = null,
    $height = null
  ) {
    $destinationPath = public_path($directory);
    $extension = strtolower($file->getClientOriginalExtension());
    
    // Gunakan imagecreatefromstring agar PHP dapat mendeteksi format asli secara otomatis
    // Hal ini mencegah error jika ekstensi file (misal .png) tidak cocok dengan isi file aslinya (misal format aslinya jpg).
    $imageContent = file_get_contents($file->getRealPath());
    $errorLevel = error_reporting(error_reporting() ^ E_WARNING); // Suppress warnings
    $image = imagecreatefromstring($imageContent);
    error_reporting($errorLevel);

    if (!$image) {
        throw new \Exception('Gagal memproses gambar. File gambar (' . $extension . ') mungkin rusak atau format aslinya tidak dikenali.');
    }

    // Preserve transparency untuk PNG/GIF
    imagealphablending($image, false);
    imagesavealpha($image, true);

    // Resize gambar jika lebar diset
    if ($width) {
      $oldWidth = imagesx($image);
      $oldHeight = imagesy($image);
      $aspectRatio = $oldWidth / $oldHeight;
      if (!$height) {
        $height = $width / $aspectRatio; // Hitung tinggi dengan mempertahankan aspek rasio
      }
      $newImage = imagecreatetruecolor($width, $height);
      
      // Setup transparency untuk gambar baru
      imagealphablending($newImage, false);
      imagesavealpha($newImage, true);
      $transparent = imagecolorallocatealpha($newImage, 255, 255, 255, 127);
      imagefilledrectangle($newImage, 0, 0, $width, $height, $transparent);

      imagecopyresampled(
        $newImage,
        $image,
        0,
        0,
        0,
        0,
        $width,
        $height,
        $oldWidth,
        $oldHeight
      );
      imagedestroy($image);
      $image = $newImage;
    }
    // Simpan gambar dengan kualitas asli
    switch ($extension) {
      case 'jpeg':
      case 'jpg':
        imagejpeg($image, $destinationPath . '/' . $fileName);
        break;
      case 'png':
        imagepng($image, $destinationPath . '/' . $fileName);
        break;
      case 'gif':
        imagegif($image, $destinationPath . '/' . $fileName);
        break;
    }
    imagedestroy($image);
    return $fileName;
  }
}