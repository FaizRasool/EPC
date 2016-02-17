Extreme PHP Cache
===============

You can install **Extreme PHP Cache** either via package download from github or via composer install. I encourage you to do the latter:
 
```json  
{ 
  "require": {
    "gigabyte/cache": "dev-master"
  }
} 
```

This PHP library makes it easy to cache any php object to the cache with the specific parameters. Currently it only support file system cache.

Basic usage
------------
```php
namespace gigabyte\cache;

$cache_config = new CacheConfig();
$cache_config->setCacheModule('search result')
        ->setIntervalInDay(2)
        ->setCacheFilter(array('serach' => $serach, 'paramter1' => $value1, 'paramter2' => $value2));
$cache = CacheFactory::createFileCache($cache_config,"mycache/");
if ($cache->checkCache()) {
    $search_result = $cache->readCache();
} else {
    //calculate $search_result
    $cache->writeCache($search_result);
}
```