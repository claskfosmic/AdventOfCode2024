<?php

	namespace AdventOfCode;

	class Day
	{
		private $_calledClass = '';
		public $Input = '';
		public $InputPart1 = '';
		public $InputPart2 = '';

		public function __construct(bool $useExampleInput=false)
		{
			$this->_calledClass = str_replace('AdventOfCode\\', '', get_called_class());

			$inputFile = './'.$this->_calledClass.'/'.($useExampleInput?'example':'input').'.txt';
			$input = $this->ReadInput($inputFile);
			if(($input !== null) && ($input !== ''))
			{
				$this->Input = $input;
				$this->InputPart1 = $input;
				$this->InputPart2 = $input;
			}

			$inputFilePart1 = './'.$this->_calledClass.'/'.($useExampleInput?'example':'input').'-part1.txt';
			$inputFilePart2 = './'.$this->_calledClass.'/'.($useExampleInput?'example':'input').'-part2.txt';

			$inputPart1 = $this->ReadInput($inputFilePart1);
			$inputPart2 = $this->ReadInput($inputFilePart2);
			
			if(($inputPart1 !== null) && ($inputPart1 !== ''))
			{
				$this->Input = $inputPart1;
				$this->InputPart1 = $inputPart1;
			}

			if(($inputPart2 !== null) && ($inputPart2 !== ''))
			{
				$this->InputPart2 = $inputPart2;
			}
		}

		public function ReadInput(string $inputFile) : ?string
		{
			if(realpath($inputFile) === false)
			{
				// print 'Day '.$this->_day.' skipped, file \''.$inputFile.'\' not found.'.PHP_EOL;
				return null;
			}

			if(filesize($inputFile) == 0)
			{
				return null;
			}

			return trim(file_get_contents($inputFile));
		}
	}