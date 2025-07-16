<?php

$options = [
    'cost' => 12
];

$hashedpwd = password_hash($pwd, PASSWORD_BCRYPT, $options);