<?php

class MiddlewarePublic
{
	public function handle($exe)
	{
		// create a general layout for public sub-app.
		$exe->di->register('layout', function() use($exe)
		{
			// default data.
			$exe->view->setDefaultData('exe', $exe);
			return $exe->view->create('layout/default')
			->setRequired(['view']); // set view parameter is required.
		});

		return $exe->next($exe);
	}
}