<?php namespace Pretty\commanding;

use Illuminate\Foundation\Application;

class ValidationCommandBus extends DefaultCommandBus {

	public function execute( $command )
	{
		//perform validation
		$validator = $this->commandTranslator->toValidator( $command );

		if (class_exists( $validator ))
		{
			$this->app->make( $validator )->validate( $command );
		}

		return parent::execute( $command );
	}
}