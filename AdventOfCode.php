#!/usr/bin/php
<?php

	declare(strict_types = 1);

	namespace AdventOfCode;

	ini_set('display_errors','1');
	ini_set('display_startup_errors','1');
	error_reporting(E_ALL);

	// --- Advent Of Code 2024 ---
	// 
	// The Chief Historian is always present for the big Christmas sleigh launch, but nobody has
	// seen him in months! Last anyone heard, he was visiting locations that are historically
	// significant to the North Pole; a group of Senior Historians has asked you to accompany them
	// as they check the places they think he was most likely to visit.
	//
	// As each location is checked, they will mark it on their list with a star. They figure the
	// Chief Historian must be in one of the first fifty places they'll look, so in order to save
	// Christmas, you need to help them get fifty stars on their list before Santa takes off on
	// December 25th.

	// Collect stars by solving puzzles. Two puzzles will be made available on each day in the
	// Advent calendar; the second puzzle is unlocked when you complete the first. Each puzzle
	// grants one star. Good luck!

	class AdventOfCode
	{
		private $_day = 0;
		
		public function __construct()
		{
			print '--- Advent Of Code 2024 ---'.PHP_EOL;
			spl_autoload_register(array($this, 'LoadClass'));
		}
		
		public function LoadClass($class)
		{
			if(substr($class, 0, strlen('AdventOfCode\'')) == 'AdventOfCode\\')
			{
				$class = substr($class, strlen('AdventOfCode\\'));
			}

			$dayDir = './'.$class;
			if(realpath($dayDir) === false)
			{
				print 'Day '.$this->_day.' skipped, dir \''.$dayDir.'\' not found'.PHP_EOL;
				return;
			}

			$dayFile = $dayDir.'/'.$class.'.php';
			if(realpath($dayFile) === false)
			{
				print 'Day '.$this->_day.' skipped, file \''.$dayFile.'\' not found.'.PHP_EOL;
				return;
			}

			if(!include($dayFile))
			{
				print 'Day '.$this->_day.' skipped, error including file \''.$dayFile.'\'.'.PHP_EOL;
				return;	
			}
		}

		public function RunAll()
		{
			for($d=1; $d<=31; $d++)
			{
				$this->RunDay($d);
			}
		}

		public function RunDay(int $day, int $part=0, bool $useExampleInput=false)
		{
			$this->_day = $day;

			if($part > 0)
			{
				print "- Run day ".$day.' - Part '.$part.':'.PHP_EOL;
			}
			else
			{
				print "- Run day ".$day.':'.PHP_EOL;
			}

			$class = 'AdventOfCode\Day'.sprintf("%02d", $day);
			if(!class_exists($class, true))
			{
				print 'Day '.$this->_day.' skipped, class \''.$class.'\' not found.'.PHP_EOL;
				return;
			}

			$puzzle = new $class($useExampleInput);
			if($puzzle->Input != '')
			{
				$puzzle->HandleInput();
				if(($part == 0) || ($part == 1))
				{
					$answer = $puzzle->Part1();
					print '- Answer for day '.$day.' - Part 1: '.$answer.PHP_EOL;
				}
				
				if(($part == 0) || ($part == 2))
				{
					$answer = $puzzle->Part2();
					print '- Answer for day '.$day.' - Part 2: '.$answer.PHP_EOL;
				}
			}

			print '--------------------------------------'.PHP_EOL;
		}

		public function RunPart(int $part, int $day, bool $useExampleInput=false)
		{
			$this->RunDay($day, $part, $useExampleInput);
		}
	}

	// -------------------------------------------------------------------------
	// RUN
	//
	$AoC = new AdventOfCode();
	switch(count($argv))
	{
		case 1:
			$AoC->RunAll();
			break;

		case 2:
			$AoC->RunDay(intval($argv[1]));
			break;

		case 3:
			if($argv[2] == 'example')
			{
				$AoC->RunDay(intval($argv[1]), 0, true);
			}
			else
			{
				$AoC->RunPart(intval($argv[2]), intval($argv[1]));
			}
			break;

		case 4:
			if($argv[3] == 'example')
			{
				$AoC->RunPart(intval($argv[2]), intval($argv[1]), true);
			}
			break;
	}