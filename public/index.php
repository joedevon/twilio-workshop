<?php
require '../vendor/autoload.php';

$app = new \Slim\Slim();

$app->get('/', function () {
    echo "hi!";
});

$app->map('/twiml', function () use ($app) {
	$res = $app->response()->header('Content-Type', 'application/xml');
    echo "
<Response>
<Say>You are being enqueued now.</Say>
<Enqueue>radio-callin-queue</Enqueue>
</Response>

		";
})->via('GET', 'POST');


$app->run();