<?php

namespace Upaid\Redispckg\Helpers;

use Illuminate\Support\Facades\Redis as RedisOld; 

class Redis extends RedisOld {
    
    const REDIS_KEY_SEPARATOR = ':';
        
    public static function __callStatic($methodName, $arguments){
        $arguments[0] = self::generateKeyName($arguments[0]);
        return parent::__callStatic($methodName, $arguments);
    }

    /**
     * Generate key name form prefix
     * @param string $keyData
     * @return string $keyName
     */
    public static function generateKeyName($keyData = ''){
        $redisPrefix = config('app.redis_prefix');
        return $redisPrefix . self::REDIS_KEY_SEPARATOR . $keyData;
    }
    
    /**
     * Set key value with optional - set key expiration time
     * @param string $keyData
     * @param string $value
     * @param int $expTime
     * @return bool
     */
    public static function setKeyValueWithExpTime($keyData, $value, $expTime = 10000){
        self::set($keyData, $value);
        return self::expire($keyData, $expTime);
    }
}
