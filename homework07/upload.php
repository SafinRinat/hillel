<?php
/**
 *
 * подключаем github
 * от PSR-0 до PSR-2 выучить!
 *
 * upload files from the server all images and validate upload data and formats!
 *
 *  git init - Инициализация репозитория в проекте
 *  git add README.md
 *  git commit -m "first commit"
 *  git remote add origin https://github.com/ВАШ_ЛОГИН_НА_GITHUB/НАЗВАНИЕ_ПРОЕКТА.git
 *  git push -u origin master
 *  Создание новой ветки:git checkout -b BRANCH_NAME
 *  Переключение между ветками:git checkout BRANCH_NAME
 *  Слияние веток:git merge BRANCH_NAME
 */

// Check if image file is a actual image or fake image
if (is_uploaded_file($_FILES["image"]["tmp_name"]))
{
    $uploadIsOk = 1;
    $target_dir = "/uploads/";
    $target_file = __DIR__ . $target_dir . basename($_FILES["image"]["name"]);

    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadIsOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" &&
        $imageFileType != "png" &&
        $imageFileType != "jpeg" &&
        $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadIsOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadIsOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        // or copy($_FILES["image"]["tmp_name"], $target_file);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}








