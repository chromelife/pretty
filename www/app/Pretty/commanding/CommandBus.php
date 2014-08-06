<?php namespace Pretty\commanding;

interface CommandBus {
	
	public function execute($command);
}