<?php
/**
 * Created by Yellow Heroes
 * Date: 19/11/2018
 * Time: 14:30
 */
namespace yellowheroes\image;

/**
 * Class Image provides basic image processing functionality like:
 * - image compression
 */
class Image
{
    public function __construct()
    {
    }

    /**
     * @param $source
     * @param $destination
     * @param int $quality
     * @param int $maxWidth
     * @return bool
     */
    public function compress($source, $destination, $quality = 80, $maxWidth = 800): boolean
    {
        $imageResource = null;

        $info = getimagesize($source);
        $imgWidth = $info[0];
        $scale = $maxWidth / $imgWidth;
        $resize = ($scale < 1) ? true : false; // no need to resize images with width smaller than $maxWidth

        /* get an image resource */
        if ($info['mime'] == 'image/jpeg') {
            $imageResource = imagecreatefromjpeg($source);
        } elseif ($info['mime'] == 'image/gif') {
            $imageResource = imagecreatefromgif($source);
        } elseif ($info['mime'] == 'image/png') {
            $imageResource = imagecreatefrompng($source);
        }

        /* resize image if width > maxWidth */
        if($resize) {
            $imageResource = imagescale($imageResource, $maxWidth);
        }

        /* create compressed jpeg */
        imagejpeg($imageResource, $destination, $quality); // creates a JPEG file with name $destination from the given image resource

        /* free memory */
        imagedestroy($imageResource);

        return false; // OK
    }
}