<?php
/**
 * return bool
 */
//is_file();
//is_dir();

//$filePathName = $_FILES["SOME_FILE_NAME"]["tmp_name"];
//$fileName = $_FILES["SOME_FILE_NAME"]['name'];
//move_uploaded_file($filePathName, __DIR__ . "/upload/" . $fileName);

//убрать таймаут время работы скрипта
//set_time_limit(0);
//old php
//ingore_user_abort(true);

//$fileName = "2.html";
//$filePathName = "C:\\Program Files\\Adobe\\Photoshop\\bin\\Photoshop.exe";

//Удаляем файл
//unlink($filePathName);

//Переименование файла
//rename("C:\\Program Files\\Adobe\\Photoshop\\bin\\Photoshop.exe", "\"C:\\Program Files\\Adobe\\Photoshop\\bin\\Photoshop_new.exe\"");

//создать файл в линуксе используется для создания simlink'ов
//exec('/var/log/1.php');

//die();

//$fileName = rand();

//if(file_exists(__DIR__ . $fileName)){
//    echo "File exists!!!";
//}

//$result = copy(__DIR__ . "/1.html", __DIR__ . "/" . $fileName);

//if ($result === false) {
//    echo "Error!!!";
//}

//die();



//$data = file_get_contents(__DIR__ . "/1.php");
//
//file_put_contents(__DIR__ . "/log.html", "Hello! ", FILE_APPEND);
//
//die();
//
//$fh = fopen("http://google.com.ua/", "r");
//
//$index = 0;
//
//while (($data = fgets($fh)) !== false)
//{
//    echo $index . " = " . htmlspecialchars($data) . "<br />";
//    $index++;
//}
//$data = file_get_contents(__DIR__ . "1.php");
//
//
//
//echo htmlspecialchars($data);
//die();
//
//$fileName = __DIR__ . "/hello.php";
//
//$fh = fopen($fileName, "w+");
//
//if($fh === false)
//{
//    echo "Error!!!";
//    die();
//}
//
//fwrite($fh, "");


//if ($fh === false) {
//    echo "Error open file!!!";
//    die();
//}
//$fileSize = fileSize($fileName);
//$data = fread($fh, $fileSize);
//var_dump($data);

//while (($dataStr = fgets($fh)) !== false)
//{
//    echo htmlspecialchars($dataStr) . "<br />";
//}
//
//var_dump($fh);
//
//$dataAr = file($fileName);

//var_dump($dataAr);


//$result = '';
//
//if (!file_exists($fileName))
//{
//    throw new \Exception("File not found" . $fileName);
//}
//


//fclose($fh);