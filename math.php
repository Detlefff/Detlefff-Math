<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once 'scripts/script.php';

use jlawrence\eos\Parser;
use jlawrence\eos\Graph;

class math extends Script
{
	public function run()
	{
		echo 'running';
		echo strtolower(split(' ', $this->matches[0])[0]);
		if(strtolower(split(' ', $this->matches[0])[0]) === 'math') {
			return $this->send(Parser::solve($this->matches[1]));
		} else {
			$filepath = __DIR__ . '/ouput.png';
			Graph::init(640, 840);
			Graph::graph($this->matches[1], -10, 10, 0.01, true, false, -10, 10);

			if(file_exists($filepath)) {
				unlink($filepath);
			}
			if(imagepng(Graph::getImage(), $filepath)) {
				return $this->send($filepath, 'image');
			} else {
				return $this->send('Graph generation unsuccessful');
			}
		}
	}
}
