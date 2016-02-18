<?php

namespace gigabyte\cache\sanitizer;

class ParamsFormatter {

    private $cache_file_params;

    public function setPrams(Array $params) {
        $this->cache_file_params = $params;
        $this->formatPrams();
    }

    public function getFormattedPrams() {
        return $this->cache_file_params;
    }

    public function cleanValue($value) {
        if (is_array($value)) {
            throw new \Exception("Array as parameter value is not accepted");
        } else {
            return str_replace(array(" ", "   ", ".", "/", "\\"), "-", $value);
        }
    }

    private function formatPrams() {
        if (is_array($this->cache_file_params)) {
            foreach ($this->cache_file_params as $k => $value) {
                $this->cache_file_params[$k] = $this->cleanValue($value);
            }
        }
    }

}
