<?php
use OTT\Api\Connection\ConnectionRequest;
use OTT\Processor\Processor;

if (file_exists($path = '../vendor/autoload.php')) {
    require $path;
}
ini_set('display_errors', 1);
session_start();

$request = new ConnectionRequest();
$request->setOntimeUrl('https://ottas.axosoft.com/');
$request->setClientId('cfa06ce5-c761-4b78-82a8-b4df13cc98ae');
$request->setClientSecret(
    'w3RwSX9BBxYys3LUVqlSWxXxyfyCuaUXWAsSOZ2vMxAM8eCY1dV41r1CGNkvoJN58ynQWwQOtF4mIUZ7lsulHyvJsFSYXyzVIFgA'
);
$request->setUsername('contact@aroy.fr');
$request->setPassword('ottas33');
if (isset($_SESSION['access_token'])) {
    $request->setSavedToken($_SESSION['access_token']);
}

$processor = new Processor($request);

if (null !== $processor->getOntime()->getToken()) {
    $_SESSION['access_token'] = $processor->getOntime()->getToken();
}
