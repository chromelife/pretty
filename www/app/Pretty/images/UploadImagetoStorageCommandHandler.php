<?php namespace Pretty\Images;

use Pretty\Commanding\CommandHandler;

class UploadImagetoStorageCommandHandler implements CommandHandler {

	public function handle($command)
	{
		var_dump('delegate process of handling command');
	}

}
