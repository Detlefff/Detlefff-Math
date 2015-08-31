<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once 'scripts/script.php';

use jlawrence\eos\Parser;

class math extends Script
{
	public function run()
	{
		return $this->send($this->message->number, Parser::solve($this->matches[1]));
	}
}
