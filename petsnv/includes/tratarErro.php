<?php

function isImage($imgName) {
    if (isset($_FILES[$imgName]) && !empty($_FILES[$imgName]['name'])) {
        $fileName = $_FILES[$imgName]["name"];
        $fileTemp = $_FILES[$imgName]["tmp_name"];
        $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $check = getimagesize($fileTemp);
        if ($check !== FALSE) {
            if (!file_exists($fileName)) {
                //Se o arquivo for menor que 4MB ele entra.
                if (filesize($fileTemp) < 500000) {
                    if ($extension === "jpg" || $extension === "png" ||
                            $extension === "jpeg" || $extension === "gif") {
                        return $extension;
                    }
                }
            }
        }
    }else{
        return TRUE;
    }
}
