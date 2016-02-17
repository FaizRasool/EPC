<?php

namespace gigabyte\cache;

interface CacheWriter {

    public function write($module, $cache_identifier, $data);
}