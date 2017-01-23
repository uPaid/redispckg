<?php

use M6Web\Component\RedisMock\RedisMockFactory;
use Redispckg\Helpers\Redis;

class RedisTest extends TestCase {
    
    public function test_generate_key_name(){
        config(['app.redis_prefix' => 'testKey']);
        $key = 'token:1234';     
        $result = Redis::generateKeyName($key);
        $this->assertEquals('testKey:token:1234', $result, 'It works !');
    }
}
