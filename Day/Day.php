<?php

	namespace AdventOfCode;

	class Day
	{
		private $_calledClass = '';
		private $_day = 0;
		public $Input = '';

		public function __construct(bool $useExampleInput=false)
		{
			$this->_calledClass = str_replace('AdventOfCode\\', '', get_called_class());
			$this->_day = intval(str_replace('Day', '', $this->_calledClass));

			$this->ReadInput($useExampleInput);
		}

		public function ReadInput(bool $useExampleInput=false) : bool
		{
			$inputFile = $this->_calledClass.'/'.($useExampleInput?'example':'input').'.txt';
			if(realpath($inputFile) === false)
			{
				print 'Day '.$this->_day.' skipped, file \''.$inputFile.'\' not found.'.PHP_EOL;
				return false;
			}

			if(filesize($inputFile) == 0)
			{
				print 'Day '.$this->_day.' skipped, file \''.$inputFile.'\' is empty.'.PHP_EOL;
				return false;
			}

			$this->Input = trim(file_get_contents($inputFile));
			return ($this->Input != '');
		}
	}