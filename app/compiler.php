<?php
    $language = strtolower($_POST['language']);
    $code = $_POST['code'];

    $random = substr(md5(mt_rand()), 0, 7);
    $filePath = "temp/" . $random . "." . $language;
    $programFile = fopen($filePath, "w");
    fwrite($programFile, $code);
    fclose($programFile);

    if($language == "php") {
        $output = shell_exec("php $filePath 2>&1");
        unlink($filePath);
        echo $output;
    }
    else if($language == "python") {
        $output = shell_exec("python3 $filePath 2>&1");
        unlink($filePath);
        echo $output;
    }
    else if($language == "node") {
        unlink($filePath);
        $filePath = "temp/" . $random . ".js";
        $programFile = fopen($filePath, "w");
        fwrite($programFile, $code);
        fclose($programFile);
        $output = shell_exec("node $filePath 2>&1");
        unlink($filePath);
        echo $output;
    }
    else if($language == "c") {
        $outputExe = $random . ".out";
        $output = shell_exec("gcc $filePath -o $outputExe 2>&1" );
        if($output){
          echo $output;
        }
        else{
        $output = shell_exec(__DIR__ . "//$outputExe 2>&1");
        echo $output;
      }
      unlink($filePath);
      unlink($outputExe);
    }
    else if($language == "cpp") {
        $outputExe = $random . ".out";
        $output = shell_exec("g++ $filePath -o $outputExe 2>&1");
        if($output){
          echo $output;
        }
        else{
        $output = shell_exec(__DIR__ . "//$outputExe 2>&1");
        echo $output;}
        unlink($filePath);
        unlink($outputExe);
    }
    else if($language == "java"){
      $output = shell_exec("java $filePath 2>%1");
      unlink($filePath);
      echo($output);}
?>