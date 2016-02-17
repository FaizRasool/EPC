<?php

namespace gigabyte\cache;

interface CacheCheck {

    public function check($module, $cache_identifier, $keep_interval);
}
