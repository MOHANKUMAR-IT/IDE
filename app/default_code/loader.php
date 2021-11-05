<?php
    $language = strtolower($_POST['language']);
    if($language == "php") {
        $myfile = fopen("php.php", "r") or die("Unable to open file!");
        echo  fread($myfile,filesize("php.php"));
        fclose($myfile);

    }
    else if($language == "python") {
        $myfile = fopen("python.py", "r") or die("Unable to open file!");
        echo fread($myfile,filesize("python.py"));
        fclose($myfile);
    }
    else if($language == "node") {
        $myfile = fopen("node.js", "r") or die("Unable to open file!");
        echo fread($myfile,filesize("node.js"));
        fclose($myfile);
    }
    else if($language == "c") {
        $myfile = fopen("c89.c", "r") or die("Unable to open file!");
        echo fread($myfile,filesize("c89.c"));
        fclose($myfile);
    }
    else if($language == "cpp") {
        $myfile = fopen("cpp.cpp", "r") or die("Unable to open file!");
        echo fread($myfile,filesize("cpp.cpp"));
        fclose($myfile);
       
    }
    else if($language == "java"){
        $myfile = fopen("Main.java", "r") or die("Unable to open file!");
        echo fread($myfile,filesize("Main.java"));
        fclose($myfile);
    
    }
?>