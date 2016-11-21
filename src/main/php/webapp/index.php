<?php
require __DIR__ . "/../lib/vendor/autoload.php";

use Genetsis\Identity;
use Genetsis\URLBuilder;
use Genetsis\UserApi;

try {
    Identity::init();
} catch (Exception $e) {
    echo  $e->getMessage() . "\n" . $e->getTraceAsString() ;
    die();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>DruID SDK integration example</title>
</head>

<body>
<a href="http://developers.dru-id.com/" style="max-height: 88px;" target="_blank">
    <img width="300" height="100" alt="DRUID Developers" src="/assets/img/Druid_logo_solo.png" style="max-height: 88px;">
</a>

<h1>Welcome to DRUID</h1>
<h2>Se how easy is integrate DRUID with your applications using the php SDK</h2>

<h3>(you have more examples available at <a href="http://developers.dru-id.com/sdks/php-sdk/sdk-code-examples/">http://developers.dru-id.com/sdks/php-sdk/sdk-code-examples/</a>)</h3>

<h4>This page demostrates how to create login and registration links for not connected users, and show logout link and retrieve user email when user is connected:</h4>


<p style="background-color:#e5ffff; border: thin solid #99ffff; padding: 20px">
    <?php

    $prefill = array(
        "email" => "revenge_of_the_sith@yopmail.net",
        "screen_name" => "force-luke",
        "national_id" => "force-luke",
        "phone_number" => "5141944H",
        "screen_name" => "666661138",
        "birthday" => "04/05/1977",
        "name" => "George",
        "surname" => "Lucas",
        "gender" => "2",
        "telephone" => "916574120",
        "streetAddress" => "C/ Francisca Delgado, 11",
        "locality" => "Alcobendas",
        "region" => "28",
        "postalCode" => "28108",
        "country" => "1"
    );


    try{
        if (!Identity::isConnected()) {
            echo "<a href=".URLBuilder::getUrlLogin().">Login</a> ";
            echo "<a href=".URLBuilder::getUrlRegister().">Register</a><br/><br/>";
            echo "<a href=".URLBuilder::getUrlRegister(null, null, $prefill).">Register Prefilled</a><br/>";
        } else {
            $info = UserApi::getUserLogged();
            $picture = UserApi::getUserLoggedAvatarUrl();

            echo "<img src='$picture' onerror='this.src=/assets/img/placeholder.png' width='32'/>";

            echo " Welcome " . $info->user->user_ids->email->value;

            echo "<br/><br/>";

            echo "<a href=\"opi.php\">Fill Opi</a>";

            echo "<br/><br/>";

            echo "<a href=\"/actions/logout\">Logout</a>";
        }
    } catch (Exception $e) {
        echo  $e->getMessage() . "\n" . $e->getTraceAsString() ;
    }
    ?>
</p>

<h4>The code:</h4>
<script src="https://gist.github.com/saspelo/3eba49c3be6e84cf4e9a.js"></script>

</body>

</html>
