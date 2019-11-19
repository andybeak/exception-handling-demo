<?php

require('vendor/autoload.php');
use App\Example;

// a function we will use to handle uncaught errors and exceptions
function exception_handler(Throwable $e) {
    // log the message and output something human friendly, but that doesn't help an attacker
    echo "An unexpected error occurred";
}
set_exception_handler('exception_handler');


$app = new Example();

try {

    $app->produceException();

} catch (\App\Exceptions\Exception $e) {

    // this is a friendly error message
    echo $e->getMessage();

}

echo "\r\n----- Catching an error -----\r\n";

try {

    $app->produceError();

} catch (Throwable $e) {

    echo "Caught error [{$e->getMessage()}]";

}

