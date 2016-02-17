<?php

namespace gigabyte\cache\filesystem;

use gigabyte\cache\CacheCheck;

Class Checker extends FileSystem implements CacheCheck {

    public function check($module, $cache_identifier, $keep_interval) {
        $path = $this->createPathToFile($module, $cache_identifier);
        if ($this->checkFileExits($path)) {
            if (time() - filemtime($path) >= $keep_interval) {
                return false;
            }
            return true;
        } else {
            return false;
        }
    }

}
