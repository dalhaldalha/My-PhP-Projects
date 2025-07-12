<?php

// $userName = "Dalha";

// $salt = bin2hex(random_bytes(16));
// $pepper ="ANotSoSecretPepperString";

// $dataToHash = $userName . $salt . $pepper;

// $hash = hash("sha512", $dataToHash);


$options = [
    'cost' => 12,
];

$pwdSignUp = "Babandalha@28";

$hashedPwd = password_hash($pwdSignUp, PASSWORD_BCRYPT, $options);

$pwdLogin = "Babandalha@29";

if (password_verify($pwdLogin, $hashedPwd)) {
    echo "Password is valid!" . "<br>";
    echo "Hashed Password: " . $hashedPwd . "<br>";
    echo "Original Password: " . $pwdLogin . "<br>";
} else {
    echo "Invalid password." . "<br>";
    echo "Hashed Password: " . $hashedPwd . "<br>";
    echo "Original Password: " . $pwdLogin . "<br>";
}