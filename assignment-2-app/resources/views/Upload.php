<?php

function uploadImage($fileInputName = 'image')
{
    if (!isset($_FILES[$fileInputName]) || $_FILES[$fileInputName]['error'] !== UPLOAD_ERR_OK) {
        return false;
    }

    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    $fileType = $_FILES[$fileInputName]['type'];

    if (!in_array($fileType, $allowedTypes)) {
        return false;
    }

    $fileName = $_FILES[$fileInputName]['name'];
    $fileTmpName = $_FILES[$fileInputName]['tmp_name'];

    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);  // Create directory if not exists   (0755)
    }

    $uniqueFileName = uniqid('img_', true) . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
    $targetFilePath = $uploadDir . $uniqueFileName;

    return move_uploaded_file($fileTmpName, $targetFilePath) ? $uniqueFileName : false;
}

