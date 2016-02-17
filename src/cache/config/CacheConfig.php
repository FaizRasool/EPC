<?php

namespace gigabyte\cache\config;

Class CacheConfig {

    private $interval;
    private $cache_module;
    private $cache_filter;
    private $cache_type;

    function setCacheModule($cache_module) {
        $this->cache_module = (string) $cache_module;
        return $this;
    }

    function setIntervalInSecond($interval) {
        $this->interval = (int) $interval;
        return $this;
    }

    function setIntervalInMinute($interval) {
        $this->interval = (int) $interval * 60;
        return $this;
    }

    function setIntervalInHour($interval) {
        $this->interval = (int) $interval * 60 * 60;
        return $this;
    }

    function setIntervalInDay($interval) {
        $this->interval = (int) $interval * 60 * 60 * 24;
        return $this;
    }

    function setCacheFilter(Array $cache_filter) {
        $this->cache_filter = $cache_filter;
        return $this;
    }

    function setCacheType($cache_type) {
        $this->cache_type = $cache_type;
    }

    function interval() {
        return $this->interval;
    }

    function cacheModule() {
        return $this->cache_module;
    }

    function cacheFilter() {
        return $this->cache_filter;
    }

    function cacheType() {
        return $this->cache_type;
    }

}
