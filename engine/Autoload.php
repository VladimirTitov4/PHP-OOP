<?php

class Autoload {

    public function loadClass($className)
    {
        $fileName01 = str_replace('app', '', $className);
        $fileName02 = preg_replace('/\\+/','/',$fileName01);
        $fileName = "..$fileName02.php";

        if (file_exists($fileName)) include $fileName;
    }
}
