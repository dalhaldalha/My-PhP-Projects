<?php

$userName = "Dalha";

$salt = bin2hex(random_bytes(16));
$pepper ="ANotSoSecretPepperString";

$dataToHash = $userName . $salt . $pepper;

$hash = hash("sha256", $dataToHash);

/*----------*/

$storedSalt = $salt;
$storedHash = $hash;
$pepper = "ANotSoSecretPepperString";

$dataToHash = $userName . $storedSalt . $pepper;

$verificationHash = hash("sha256", $dataToHash);

if ($storedHash === $verificationHash) {
    echo "The data are the same!" . "<br>";
    echo "The stored Hash is: " . $storedHash . "<br>";
    echo "The Verification Hash is: " . $verificationHash . "<br>";

} else {
    echo "The data are NOT the same!" . "<br>";
    echo "The stored Hash is: " . $storedHash . "<br>";
    echo "The Verification Hash is: " . $verificationHash . "<br>";
}
