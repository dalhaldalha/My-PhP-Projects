<?php

if ($_SERVER["REQUEST_METHOD"] === "post") {

} else {
    echo json_encode("error" => "Wrong Request Method");
}