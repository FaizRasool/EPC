<?php

namespace gigabyte\cache\filesystem;

use Exception;

abstract Class FileSystem {

    protected $base_directory;

    public function __construct($base_directory) {
        $this->base_directory = $base_directory;
    }

    protected function writeFile($path, $data) {
        $content = serialize($data);
        file_put_contents($path, $content);
    }

    protected function createDirectory($path) {
        mkdir($path);
    }

    protected function deleteFile($path) {
        unlink($path);
    }

    protected function verifyDirectory($path) {
        if (file_exists($path)) {
            return true;
        } else {
            return false;
        }
    }

    protected function checkPermission($path) {
        if (is_writable($path)) {
            return true;
        } else {
            return false;
        }
    }

    protected function checkFileExits($path) {
        if (is_file($path)) {
            return true;
        }
        return false;
    }

    protected function readFile($path) {
        return unserialize(file_get_contents($path));
    }

    protected function createPathToDirectory($module) {
        return $this->base_directory . $module;
    }

    protected function createPathToFile($module, $cache_identifier) {
        return $this->base_directory . $module . "/" . $cache_identifier;
    }

    protected function checkDirectory($path) {
        //check directory exists
        $directory_check = $this->verifyDirectory(dirname($path));
        if ($directory_check) {
            //check directory permission
            if ($this->checkPermission(dirname($path))) {
                return true;
            } else {
                throw new Exception("Directory ($path) Permission Error.");
            }
        } else {
            throw new Exception("Directory ($path) not found.");
        }
        return false;
    }

}
