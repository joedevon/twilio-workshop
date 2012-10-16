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
<Enqueue waitUrl='http://app-362-1350414117.orchestra.io/wait' waitUrlMethod='GET'>radio-callin-queue</Enqueue>
</Response>

		";
})->via('GET', 'POST');

$app->get('/wait', function () use ($app) {
	$res = $app->response()->header('Content-Type', 'application/xml');
    echo "
<Response>
	<Say>Please Hold.</Say>
	<Play>http://com.twilio.sounds.music.s3.amazonaws.com/MARKOVICHAMP-Borghestral.mp3</Play>
</Response>

		";
});


$app->run();