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
<Enqueue waitUrl='/wait' waitMethod='GET'>radio-callin-queue</Enqueue>
</Response>

		";
})->via('GET', 'POST');

$app->get('/wait', function () use ($app) {
	$res = $app->response()->header('Content-Type', 'application/xml');
    echo "
<Response>
<Say>HELLO WORLD.</Say>
</Response>

		";
});


$app->run();