<?php

$userName = "Dalha";

$salt = bin2hex(random_bytes(16));
$pepper ="ANotSoSecretPepperString";

$dataToHash = $username . $salt . $pepper;

$hash = hash("sha256", $dataToHash);

echo "<br>" . $hash;