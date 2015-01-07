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
 * Databases
 */
$table['centre'] = array(
	"id"=>"increment",
	"name"=>"varchar",
	"state"=>"int",
	"description"=>"text"
	);

$tables['job'] = array(
	"id"=>"increment",
	"title"=>""
	);