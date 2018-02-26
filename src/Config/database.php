<?php

return [

	'redis' => [
                'client' => 'predis',

		'cluster' => false,

		'default' => [
                    'host'     => env('REDIS_HOST', 'localhost'),
                    'port'     => env('REDIS_PORT', 6379),
                    'database' => env('REDIS_DATABASE', 0),
		],
                
	],

];
