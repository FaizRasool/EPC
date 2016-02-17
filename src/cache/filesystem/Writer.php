<?php

namespace gigabyte\cache\filesystem;

use gigabyte\cache\CacheWriter;

Class Writer extends FileSystem implements CacheWriter {

    function write($module, $cache_identifier, $data) {
        $path_to_directory = $this->createPathToDirectory($module);
        $path = $this->createPathToFile($module, $cache_identifier);
        //check  for partition
        if (!$this->verifyDirectory($path_to_directory)) {
            $this->createDirectory($path_to_directory);
        }
        //delete the file if it exits
        if ($this->checkFileExits($path)) {
            $this->deleteFile($path);
        }
        //write cache
        $this->writeFile($path, $data);
    }

}
