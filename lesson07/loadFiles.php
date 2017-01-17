<?php
var_dump($_FILES);

//if(isset($_FILES))
//{
//    $files = $_FILES['photo'];
//}
/**
 *
 *
 * GIT-FLOW утилита помогает работать с гитом почитать!
 * github or gitbacket (private)
 *
 * git init инициализация репозитория в проекте
 * git add ./ добавить все в текущей директории
 * git commint -m "Ваш комментарий ";
 * git checkout -b my_test  добавляем новую ветку
 * git branch -a показать текущую ветку
 * git checout master
 * git marge
 * got log клммегарии к комитам
 *
 *
 *
 */
//удалить файлы git
//rm -rf .git
//библиотека opensv помогает работать с фотографиямии
if (is_uploaded_file($_FILES["photo"]["tmp_name"]))
{
    $path = __DIR__ . "/images/" . $_FILES["photo"]["name"];

    copy($_FILES["photo"]["tmp_name"], $path);

    $photoDir = __DIR__ . "/images/";

    $photoNmae = $_FILES["photo"]["name"];
    //сделать проверки чтобы можно было загружать только картинки!

}
