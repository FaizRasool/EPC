<?php

namespace gigabyte\cache;

use gigabyte\cache\config\CacheConfig;
use gigabyte\cache\filesystem\Checker;
use gigabyte\cache\filesystem\Reader;
use gigabyte\cache\filesystem\Writer;
use gigabyte\cache\sanitizer\ParamsFormatter;

Class CacheFactory {

    public static function createFileCache(CacheConfig $config, $base_directory) {
        $check = new Checker($base_directory);
        $reader = new Reader($base_directory);
        $writer = new Writer($base_directory);
        $params_formatter = new ParamsFormatter();
        $cache = new Cache($config, $check, $reader, $writer, $params_formatter);
        return $cache;
    }

}