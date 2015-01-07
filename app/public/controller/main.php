<?php

class ControllerMain
{
	public function __construct($exe)
	{
		$this->exe = $exe;
		$this->layout = $exe->layout;
	}

	public function index()
	{
		return $this->layout->set('view', 'main/index')->set('data', $data)->render();
	}
}