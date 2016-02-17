<?php

namespace gigabyte\cache\filesystem;

use Exception;
use gigabyte\cache\CacheReader;

Class Reader extends FileSystem implements CacheReader {

    public function read($module, $cache_identifier) {
        $path = $this->createPathToFile($module, $cache_identifier);
        if ($this->checkDirectory($path)) {
            //delete the file if it exits
            if ($this->checkFileExits($path)) {
                return $this->readFile($path);
            } else {
                throw new Exception("File ($path) not found");
            }
        }
    }

}
