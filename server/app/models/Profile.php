<?php

namespace app\models;


class Profile extends \vendor\core\base\Model
{

    public function scandir($path, $typeFile, $session): bool
    {
        $filePath = ROOT . '/' . $path;
        $list = scandir("$filePath");

        echo "<select name='{$typeFile}' class='form-select' aria-label='Default select example'>";
        echo "<option  value='$session'>" . $session . "</option>";
        foreach ($list as $value) {
            if ($value != '.' && $value != '..') {
                if ($session !== $value) {
                    echo "<option  value='$value' >" . $value . "</option>";
                    # old option
//                    echo "<button class='btn btn-outline-info' type='submit' name='txt' value='$value'> $value";

                }
            }
        }
        echo "</select>";
        return true;
    }

    public function showDataFile($type, $fileName)
    {
        session_start();
        $pathFile = ROOT . '/' . $_COOKIE["$type"];
//        echo $pathFile;
        $dataFile = file_get_contents("$pathFile/$fileName");

        if ($type == 'csv') {
            $arrayRow = explode("#", $dataFile);
            foreach ($arrayRow as $columnValue) {
                $arrCol[] = explode(';', $columnValue);

            }
            return $_SESSION["$type"] = $arrCol;
        }

//        var_dump($_SESSION["$type"]);
        return $_SESSION["$type"] = explode("\r\n", $dataFile);
    }

    public function addDataFile($arr): bool
    {
        $file = $arr['fileName'];
        $data = trim($arr['data']);
        $type = $arr['type'];
//        var_dump($type);
        $path = ROOT . '/' . $_COOKIE["$type"] . '/' . $file;

        if ($type == 'csv') {
            file_put_contents("$path", "# $data \r", FILE_APPEND);
        } else {
            file_put_contents("$path", "$data \r ", FILE_APPEND);
        }

        return true;
    }


}