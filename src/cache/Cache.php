<?php

namespace gigabyte\cache;

use gigabyte\cache\config\CacheConfig;
use gigabyte\cache\sanitizer\PramsFormatter;

Class Cache {

    private $config;
    private $reader;
    private $writer;
    private $check;
    private $cache_identifier;
    private $prams_formatter;

    public function __construct(CacheConfig $config, CacheCheck $check, CacheReader $reader, CacheWriter $writer, PramsFormatter $prams_formatter) {
        $this->config = $config;
        $this->reader = $reader;
        $this->writer = $writer;
        $this->check = $check;
        $this->prams_formatter = $prams_formatter;
        //init
        $this->sanitizeFilter();
        $this->cache_identifier = $this->generateCacheIdentifier($config->cacheFilter());
    }

    public function readCache() {
        return $this->reader->read($this->config->cacheModule(), $this->cache_identifier);
    }

    public function writeCache($data) {
        return $this->writer->write($this->config->cacheModule(), $this->cache_identifier, $data);
    }

    public function checkCache() {
        return $this->check->check($this->config->cacheModule(), $this->cache_identifier, $this->config->interval());
    }

    private function generateCacheIdentifier(Array $name_parameters) {
        $name = '';
        foreach ($name_parameters as $key => $value) {
            $name .= "-$key|$value-";
        }
        return "CC_" . md5($name);
    }

    //sanitize the config
    private function sanitizeFilter() {
        $this->prams_formatter->setPrams($this->config->cacheFilter());
        $this->config->setCacheFilter($this->prams_formatter->getFormattedPrams());
        $this->config->setCacheModule($this->prams_formatter->cleanValue($this->config->cacheModule()));
    }

}
