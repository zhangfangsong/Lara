<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Role::class, function (Faker $faker) {
    return [
    	'name' => '创始人',
    	'nodes' => 'all',
    	'description' => '网站创始人',
    ];
});
