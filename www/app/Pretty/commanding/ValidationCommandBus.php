<?php namespace Pretty\commanding;

use Illuminate\Foundation\Application;

class ValidationCommandBus implement CommandBus {

	private $commandBus;

	private $app;

	private $commandTranslator;

	function __construct(DefaultCommandBus $commandBus, Application $app, CommandTranslator $commandTranslator)
	{
		$this->commandBus = $commandBus;
		$this->app = $app;
		$this->commandTranslator = $commandTranslator;

	}


	public function execute($command)
	{
		//perform validation
		$validator = $this-commandTranslator->toValidator($command);

		if (class_exists($validator))
		{
			$this->app->make($validator)->validate($command);
		}

		return $this->commandBus->execute($command);

		
	}
}