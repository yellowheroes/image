<?php
/**
 * Created by Yellow Heroes
 * Project: imagecompress
 * File: index.php
 * User: Robert
 * Date: 17/11/2018
 * Time: 22:09
 */

namespace yellowheroes\image;

require 'Image.php';

/* test */
// file test.png is a very large PNG image with a width largely exceeding maxWidth
// file test2.jpg is a small jpeg image with a width smaller than maxWidth
$filename = "test.png";
$source = "../images/" . $filename;
$destination = "../images/compressed/" . $filename;
$compress = (new Image())->compress($source, $destination); // go with defaults for quality(80) and maxWidth(800px)

echo 'yes';
