<?php namespace Pretty\commanding;

use Illuminate\Foundation\Application;

class DefaultCommandBus implements CommandBus {

	private $app;

	protected $commandTranslator;

	function __construct(Application $app, CommandTranslator $commandTranslator)
	{
		$this->app = $app;
		$this->commandTranslator = $commandTranslator;
	}


	public function execute($command)
	{
		// translate object name to handler class
		$handler = $this->commandTranslator->toCommandHandler($command);
		// resolve out of IOC container and call handle method
		return $this->app->make($handler)->handle($command);
	}
}