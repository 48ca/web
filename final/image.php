<?php
    $uploaddir = '/tmp';
    $tmp = tempnam("/tmp");
    $uploadfile = $uploaddir . $tmp;
    move_uploaded_file($_FILES['image']['tmp_name'],$uploadfile);
    $s = exec("python3 recog.py ".escapeshellcmd($uploadfile));
    exec("rm ".escapeshellcmd($uploadfile));
?>
