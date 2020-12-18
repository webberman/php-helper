<?php

namespace Webberman\Helper;

class Helper
{
    public function load($helper)
    {
        if( $file = $this->exists($helper) ) {
            include_once $file;
        }
    }

    public function exists($helper)
    {
        $file = __DIR__."/helpers/{$helper}_helper.php";
        return file_exists($file) ? $file : false;
    }
}
