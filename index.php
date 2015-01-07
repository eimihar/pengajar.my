<?php require_once "../Exedra/Exedra/Exedra.php";

$exedra = new \Exedra\Exedra(__DIR__);

$exedra->build('app', function($app)
{
	$app->map->addRoute(array(
		'api'=> ['subapp'=> 'api','uri'=>'api', 'subroute'=> array(
			'job'=>['uri'=> 'jobs','subroute'=> array(
				'latest'=>['uri'=> 'latest', 'execute'=>'controller=job@latest']
				)]
			)]
		));

	$app->map->addRoute(array(
		'public'=> ['subapp'=>'public', 'bind:middleware'=> 'middleware=public@handle', 'subroute'=> array(
			'main'=>['uri'=>'', 'execute'=>"controller=main@index"]
			)]
		));
});

$exedra->dispatch();