<?php

/**
 * @TODO
 * This is an example code.
 * Please write similar code using your mvc framework (if you are using any) and implement your on logic
 */

require __DIR__ . "/../lib/vendor/autoload.php";

use Genetsis\Identity;

try {
    Identity::init();
} catch (Exception $e) {
    echo  $e->getMessage() . "\n" . $e->getTraceAsString() ;
    die();
}

$error = $_GET['error'];
$gohome = true;

if (!$error) {
    $code = $_GET['code'];
    if (!Identity::isConnected() && (isset($code) || (trim($code) != ''))) {
        Identity::authorizeUser($code);
    }

} else {
    if ('user_cancel' != $error) {
        $error_description = $_GET['error_description'];
        echo $error . " -> " . $error_description;
        $gohome = false;
    }
}

if ($gohome) {
    // redirect to home as example
    header("Location: /");
}

