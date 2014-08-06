<?php namespace Pretty\Eventing;

use ReflectionClass;

class EventListener {

	public function handle($event)
	{
		$eventName = $this->getEventName($event);

		if ($this->listenerIsRegistered($eventName))
		{
			return call_user_func([$this, 'when'.$eventName], $event);
		}
	}

	protected function getEventName($event)
	{
		return (new ReflectionClass($event))->getShortName();
	}

	protected function listenerIsRegistered($method)
	{
		$method = "when{$eventName}";

		return method_exists($this, $method);
	}

}

