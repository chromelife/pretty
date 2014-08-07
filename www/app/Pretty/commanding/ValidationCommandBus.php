<?php namespace Pretty\commanding;

use Illuminate\Foundation\Application;

class ValidationCommandBus implements CommandBus {

	private $commandBus;

	private $app;

	protected $commandTranslator;

	function __construct(DefaultCommandBus $commandBus, Application $app, CommandTranslator $commandTranslator)
	{
		$this->commandBus = $commandBus;
		$this->app = $app;
		$this->commandTranslator = $commandTranslator;
	}

	public function execute( $command )
	{
		//perform validation; see if there's a validation class for the command
		$validator = $this->commandTranslator->toValidator( $command );

		// if there is, validate command inputs
		if (class_exists( $validator ))
		{
			$this->app->make( $validator )->validate( $command );
		}

		$this->commandBus->execute($command);
		// return parent::execute( $command ); //only when using inheritance
	}
}