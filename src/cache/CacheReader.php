<?php

namespace gigabyte\cache;

interface CacheReader {

    public function read($module, $cache_identifier);
}