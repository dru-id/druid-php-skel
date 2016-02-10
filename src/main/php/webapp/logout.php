<?php
use Genetsis\URLBuilder;
use Genetsis\Identity;
require __DIR__ . '/../vendor/autoload.php';
try {
    Identity::init();
    if (Identity::isConnected()) {
        echo "User is connected, logging out...";
        Identity::logoutUser();
    } else {
        echo 'We cant log out a user that is not logged, please <a href="'.URLBuilder::getUrlLogin().'">Log in</a>';
    }
} catch (Exception $e) {
    echo  $e->getMessage() . "\n" . $e->getTraceAsString() ;
}
?>