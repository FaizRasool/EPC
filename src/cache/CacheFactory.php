<?php

namespace gigabyte\cache;

use gigabyte\cache\config\CacheConfig;
use gigabyte\cache\filesystem\Checker;
use gigabyte\cache\filesystem\Reader;
use gigabyte\cache\filesystem\Writer;
use gigabyte\cache\sanitizer\PramsFormatter;

Class CacheFactory {

    public static function createFileCache(CacheConfig $config, $base_directory) {
        $check = new Checker($base_directory);
        $reader = new Reader($base_directory);
        $writer = new Writer($base_directory);
        $prams_formatter = new PramsFormatter();
        $cache = new Cache($config, $check, $reader, $writer, $prams_formatter);
        return $cache;
    }

}
