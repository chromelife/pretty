<?php namespace Pretty\Eventing;

use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider{

	public function register()
	{
		$listeners = $this->app['config']->get('pretty.listeners');

		foreach($listeners as $listener)
		{
			$this->app['events']->listen('Pretty.*, $listener', $priority = 1);
		}
	}


}