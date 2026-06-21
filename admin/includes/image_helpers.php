<?php
/**
 * Compresses and saves an uploaded image.
 * Resizes the image if its width exceeds $max_width, and saves it as WebP format 
 * to significantly reduce file size (usually under 500kb).
 *
 * @param string $source_path Path to the uploaded temporary file
 * @param string $dest_path Path where the processed image should be saved
 * @param int $max_width Maximum width of the image
 * @param int $quality Quality of the output WebP image (0-100)
 * @return bool True on success, False on failure
 */
function compressAndSaveImage($source_path, $dest_path, $max_width = 1600, $quality = 75) {
    // Get original image dimensions and type
    $info = @getimagesize($source_path);
    if (!$info) {
        return false;
    }
    
    $width = $info[0];
    $height = $info[1];
    $type = $info[2];
    
    // Calculate new dimensions
    if ($width > $max_width) {
        $new_width = $max_width;
        $new_height = floor($height * ($max_width / $width));
    } else {
        $new_width = $width;
        $new_height = $height;
    }
    
    // Create image resource from source
    $image = null;
    switch ($type) {
        case IMAGETYPE_JPEG:
            $image = @imagecreatefromjpeg($source_path);
            break;
        case IMAGETYPE_PNG:
            $image = @imagecreatefrompng($source_path);
            break;
        case IMAGETYPE_WEBP:
            $image = @imagecreatefromwebp($source_path);
            break;
        case IMAGETYPE_GIF:
            $image = @imagecreatefromgif($source_path);
            break;
        default:
            return false;
    }
    
    if (!$image) {
        return false;
    }
    
    // Create a new true color image for the resized version
    $new_image = imagecreatetruecolor($new_width, $new_height);
    
    // Handle transparency for PNG and WebP
    if ($type == IMAGETYPE_PNG || $type == IMAGETYPE_WEBP || $type == IMAGETYPE_GIF) {
        imagealphablending($new_image, false);
        imagesavealpha($new_image, true);
        $transparent = imagecolorallocatealpha($new_image, 255, 255, 255, 127);
        imagefilledrectangle($new_image, 0, 0, $new_width, $new_height, $transparent);
    }
    
    // Resample the image
    imagecopyresampled($new_image, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
    
    // Ensure the destination uses the .webp extension
    $path_parts = pathinfo($dest_path);
    // If the path doesn't end in webp, we could force it, but let's assume the caller gave us the exact path.
    // However, if we're saving as webp, it's best to save as webp.
    $final_dest_path = $path_parts['dirname'] . '/' . $path_parts['filename'] . '.webp';
    
    // Save as WebP
    $success = imagewebp($new_image, $final_dest_path, $quality);
    
    // Free up memory
    imagedestroy($image);
    imagedestroy($new_image);
    
    return $success ? $final_dest_path : false;
}
?>
