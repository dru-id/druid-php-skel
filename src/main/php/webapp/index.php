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
    <title>DRUId SDK integration example</title>
</head>

<body>
<h1>Welcome to DRUID</h1>

<h2>See how simple is integrate DRUID in your applications with out SDK</h2>
<h3>This page mix 2 examples: generates login and registration links if ser is not logged. If user is logged, you will see user's logged email</h3>

<p>Examples used:</p>

<script src="https://gist.github.com/electro/e99285a5ffa6e819d347.js"></script>

<script src="https://gist.github.com/dru-id/568973d4097be3f2d12b.js"></script>


<p style="background-color:#e5ffff; border: thin solid #99ffff; padding: 20px">
<?php

 try{
    if (!Identity::isConnected()) {
        echo "<a href=".URLBuilder::getUrlLogin().">Login</a> ";
        echo "<a href=".URLBuilder::getUrlRegister().">Register</a>";
    } else {
        $user = UserApi::getUserLogged();
        var_dump($user);
        echo "Welcome " . $user['email'];
    }
} catch (Exception $e) {
    echo  $e->getMessage() . "\n" . $e->getTraceAsString() ;
}
?>
</p>

<h3>Now you are able to develop your application integrated with DRUID.</h3>

<h4>
    Go to <a href="http://developers.dru-id.com/sdks/php-sdk/sdk-code-examples/">http://developers.dru-id.com/sdks/php-sdk/sdk-code-examples/</a> and play with examples
</h4>

</body>

</html>