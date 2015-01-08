<?php require_once "../Exedra/Exedra/Exedra.php";
require_once "vendor/autoload.php";

$exedra = new \Exedra\Exedra(__DIR__);
$exedra->registerAutoload('../packages');
$exedra->registerAutoload('app/model/entities');

$app = $exedra->build('app', function($app)
{
	$app->config->set('db', $app->loader->load("config:database.php"));

	// initiate eloquent capsule and save on app instance.
	$db = $app->config->get('db');
	$eloquent	= new \EloquentUtils\Extension\Eloquent($db['host'], $db['user'], $db['pass'], $db['name']);
	$app->eloquentCapsule = $eloquent->getCapsule();

	// api routes
	$app->map->addRoute(array(
		'api'=> ['subapp'=> 'api','uri'=>'api', 'subroute'=> array(
			'job'=>['uri'=> 'jobs','subroute'=> array(
				'latest'=>['uri'=> 'latest', 'execute'=>'controller=job@latest']
				)]
			)]
		));

	// public routes
	$app->map->addRoute(array(
		'public'=> ['subapp'=>'public', 'bind:middleware'=> 'middleware=public@handle', 'subroute'=> array(
			'main'=>['uri'=>'', 'execute'=>"controller=main@index"]
			)]
		));

	// backend
	$app->map->addRoute(array(
		'backend'=> ['subapp'=> 'backend', 'subroute'=> array(
			'default'=> ['uri'=>'admin/[:controller]/[**:action]', 'execute'=> 'controller={controller}@{action}']
			)]
		));
});

## if accessed by console, pass this argument to another apps, and execute.
if(isset($argv))
{
	require_once "../packages/EloquentUtils/EloquentSchemaBuilder/EloquentSchemaBuilder.php";
	
	$exedra->load("console",["argv"=>$argv])->execute("console",[
		"command"=>$argv,
		"schemaBuilder"=>[
			"schema"=>$app->loader->load("documents:schema.php"),
			"connection"=>$app->eloquentCapsule->getConnection("default")]
		]);
}
else
{

	$exedra->dispatch();
}