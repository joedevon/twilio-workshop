<?php
require '../vendor/autoload.php';

$app = new \Slim\Slim();

$app->get('/', function () {
    echo "hi!";
});

$app->map('/twiml', function () use ($app) {
	$res = $app->response()->header('Content-Type', 'application/xml');
    echo "
<response>
<say>You are being enqueued now.</say>
<enqueue>radio-callin-queue</enqueue>
</response>
		";
})->via('GET', 'POST');


$app->run();