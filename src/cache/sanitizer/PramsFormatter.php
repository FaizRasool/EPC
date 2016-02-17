<?php

namespace gigabyte\cache\sanitizer;

class PramsFormatter {

    private $cache_file_prams;

    public function setPrams(Array $prams) {
        $this->cache_file_prams = $prams;
        $this->formatPrams();
    }

    public function getFormattedPrams() {
        return $this->cache_file_prams;
    }

    public function cleanValue($value) {
        if (is_array($value)) {
            throw new \Exception("Array as parameter value is not accepted");
        } else {
            return str_replace(array(" ", "   ", ".", "/", "\\"), "-", $value);
        }
    }

    private function formatPrams() {
        if (is_array($this->cache_file_prams)) {
            foreach ($this->cache_file_prams as $k => $value) {
                $this->cache_file_prams[$k] = $this->cleanValue($value);
            }
        }
    }

}
