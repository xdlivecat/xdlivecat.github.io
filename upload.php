<?php
$secret_key = "Maxwell2024"; // The beautiful private key
$sharexdir = "jsm/"; // Your folder
$domain_url = 'https://antifairway.maxwelldrs.online/'; // Your domain name
$lengthofstring = 5; // Width of your output file name. Example : ek6po.png

function RandomString($length) {
    $keys = array_merge(range(0,9), range('a', 'z'));

    $key = '';
    for($i=0; $i < $length; $i++) {
        $key .= $keys[mt_rand(0, count($keys) - 1)];
    }
    return $key;
}

if(isset($_POST['secret'])) {
    if($_POST['secret'] == $secret_key) {
        $filename = RandomString($lengthofstring);
        $target_file = $_FILES["sharex"]["name"];
        $fileType = pathinfo($target_file, PATHINFO_EXTENSION);

        if (move_uploaded_file($_FILES["sharex"]["tmp_name"], $sharexdir.$filename.'.'.$fileType)) {
            echo $domain_url.$sharexdir.$filename.'.'.$fileType;
        }
            else {
           echo 'File upload failed - CHMOD/Folder doesn\'t exist?';
        }
    }
    else {
        echo 'Invalid Secret Key';
    }
}
else {
    echo 'No post data recieved';
}
?>
