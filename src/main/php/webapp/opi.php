<?php

require __DIR__ . "/../lib/vendor/autoload.php";

use Genetsis\Identity;
use Genetsis\URLBuilder;
use Genetsis\UserApi;
use Genetsis\Opi;

try {
    Identity::init();

    if (!Identity::isConnected()) {
        header("Location: " . URLBuilder::getUrlLogin());
        die();
    } else {
        Opi::open(false, "examples.dev.dru-id.com") . ">Fill Opi for " . UserApi::getUserLogged()->user->user_ids->email->value . "</a>";
    }

} catch (Exception $e) {
    echo  $e->getMessage() . "\n" . $e->getTraceAsString() ;
    die();
}
?>
