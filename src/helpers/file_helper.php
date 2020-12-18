<?php

if (! function_exists('normalize')) {
    /**
     * Change the backward slashes with forward slashes on a given path.
     *
     * @param $path
     * @return string|string[]
     */
    function normalize($path)
    {
        return str_replace('\\', '/', $path);
    }
}

if (! function_exists('rrmdir')) {
    /**
     * recursively remove directory with all helpers and subdirectories
     *
     * @param $dir
     */
    function rrmdir($dir)
    {
        if (is_dir($dir)) {

            $objects = scandir($dir);

            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (filetype($dir."/".$object) == "dir") {
                        rrmdir($dir."/".$object);
                    } else {
                        unlink ($dir."/".$object);
                    }
                }
            }

            reset($objects);
            rmdir($dir);
        }
    }
}