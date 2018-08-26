
<?php


require 'cloudinary/Cloudinary.php';
require 'cloudinary/Uploader.php';
require 'cloudinary/Api.php';


\Cloudinary::config(array( 
  "cloud_name" => "dnuraq8oa", 
  "api_key" => "274545435744652", 
  "api_secret" => "jflXJqU3PYSSqtRUAoVz3F1D4dU" 
));

$imageType = ["jpg", "png", "jpeg", "gif" ];

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists

// Check file size exceeds from 5mb
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
//check file extension
foreach ($imageType as $type) {

    if(strcasecmp($type, $imageFileType ) == 0);
       $uploadok = 1;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {

    $image_properties = \Cloudinary\Uploader::upload($_FILES["fileToUpload"]["tmp_name"]);
            $image_url =$image_properties['secure_url'];
           echo('           '."<a href=\"$image_url\" target=\"_blank\"> View uploaded image </a>");
            return true;
}
?>
