<?php
$table['user'] = array(
	"id"=>"increment",
	"firstName"=>"varchar",
	"lastName"=>"varchar",
	"email"=>"varchar",
	"password"=>"varchar",
	"profession"=>"int",
	"timestamps"
	);

/**
 * Articles
 */
$table['article'] = array(
	"id"=>"increment",
	"title"=>"varchar",
	"body"=>"text",
	"publishedDate"=>"date",
	"categoryId"=>"int",
	"timestamps"
	);

$table['article_history'] = array(
	"id"=>"increment",
	"articleId"=>"int",
	"title"=>"varchar",
	"body"=>"text",
	"publishedDate"=>"date",
	"categoryId"=>"int",
	"timestamps"
	);

$table['article_comment'] = array(
	"id"=>"increment",
	"articleId"=>"int",
	"body"=>"text",
	"userName"=>"varchar",
	"userEmail"=>"varchar",
	"timestamps"
	);

$table['article_reference'] = array(
	"id"=>"increment",
	"articleId"=>"int",
	"value"=>"varchar",
	"timestamps"
	);

$table['article_tag'] = array(
	"id"=>"increment",
	"articleId"=>"int",
	"name"=>"varchar",
	"timestamps"
	);

/**
 * Data
 */
$table['centre'] = array(
	"id"=>"increment",
	"name"=>"varchar",
	"state"=>"int",
	"description"=>"text",
	'address'=>'text',
	'timestamps'
	);

$table['job'] = array(
	"id"=>"increment",
	'centreId'=>'int',
	"title"=>"varchar",
	'description'=>'text',
	'type'=>'int',			// 1 = intern, 2 = part-time, 3 = full-time
	"createdUser"=>"int",
	"timestamps"
	);

$table['job_contact'] = array(
	'id'=>'increment',
	'jobId'=>'int',
	'email'=>'varchar',
	'phoneNo'=>'varchar',
	'timestamps'
	);

return $table;