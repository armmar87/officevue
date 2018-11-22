<?php

return [
    'phone' => 'regex:(^([+])(\d+)?$)|max:15|min:8',
    'password' => 'regex:/^.*(?=.{6,})(?=.*[a-zA-Z])(?=.*[0-9]).*$/',
    'simple_phone' => 'regex:(^(\d+)?$)|max:15|min:6',
    'phone_regex' => 'regex:(^([+])(\d+)?$)',
    'float' => '/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/',
];
