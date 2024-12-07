<?php

	namespace AdventOfCode;

	/** --- Day 4: Ceres Search ---
	 * 
	 * "Looks like the Chief's not here. Next!" One of The Historians pulls out a device and pushes
	 * the only button on it. After a brief flash, you recognize the interior of the Ceres
	 * monitoring station!
	 * 
	 * As the search for the Chief continues, a small Elf who lives on the station tugs on your
	 * shirt; she'd like to know if you could help her with her word search (your puzzle input). She
	 * only has to find one word: XMAS.
	 */
	class Day04 extends Day
	{
		private $_matrix = [];
		private $_rightList = [];

		public function HandleInput()
		{
			foreach(explode(PHP_EOL, $this->Input) as $k => $line)
			{
				$this->_matrix[] = str_split($line);
			}
		}

		/**
		 * --- Part One ---
		* 
		* This word search allows words to be horizontal, vertical, diagonal, written backwards, or
		* even overlapping other words. It's a little unusual, though, as you don't merely need to
		* find one instance of XMAS - you need to find all of them. Here are a few ways XMAS might
		* appear, where irrelevant characters have been replaced with .:
		* 
		* ..X...
		* .SAMX.
		* .A..A.
		* XMAS.S
		* .X....
		* 
		* The actual word search will be full of letters instead. For example:
		* 
		* MMMSXXMASM
		* MSAMXMSMSA
		* AMXSXMAAMM
		* MSAMASMSMX
		* XMASAMXAMM
		* XXAMMXXAMA
		* SMSMSASXSS
		* SAXAMASAAA
		* MAMMMXMMMM
		* MXMXAXMASX
		 * 
		 * In this word search, XMAS occurs a total of 18 times; here's the same word search again,
		 * but where letters not involved in any XMAS have been replaced with .:
		 * 
		 * ....XXMAS.
		 * .SAMXMS...
		 * ...S..A...
		 * ..A.A.MS.X
		 * XMASAMX.MM
		 * X.....XA.A
		 * S.S.S.S.SS
		 * .A.A.A.A.A
		 * ..M.M.M.MM
		 * .X.X.XMASX
		 * 
		 * Take a look at the little Elf's word search. How many times does XMAS appear?
		 */
		public function Part1() : int
		{
			$xmases = 0;
			
			foreach($this->_matrix as $row => $columns)
			{
				foreach($columns as $col => $character)
				{
					if($character != "X")
					{
						continue;
					}

					$this->_findHorizontally($row, $col, $xmases);
					$this->_findVertically($row, $col, $xmases);
					$this->_findDiagonally($row, $col, $xmases);
				}
			}

			return $xmases;
		}

		private function _findHorizontally(int $row, int $col, int &$xmases)
		{
			// Left to right
			if((($this->_matrix[$row][$col+1]??'')
			. ($this->_matrix[$row][$col+2]??'')
			. ($this->_matrix[$row][$col+3]??'')) == 'MAS')
			{
				$xmases++;
			}

			// Right to left
			if((($this->_matrix[$row][$col-1]??'')
			. ($this->_matrix[$row][$col-2]??'')
			. ($this->_matrix[$row][$col-3]??'')) == 'MAS')
			{
				$xmases++;
			}
		}

		private function _findVertically(int $row, int $col, int &$xmases)
		{
			// Upwards
			if((($this->_matrix[$row+1][$col]??'')
				. ($this->_matrix[$row+2][$col]??'')
				. ($this->_matrix[$row+3][$col]??'')) == 'MAS')
			{
				$xmases++;
			}

			// Downwards
			if((($this->_matrix[$row-1][$col]??'')
				. ($this->_matrix[$row-2][$col]??'')
				. ($this->_matrix[$row-3][$col]??'')) == 'MAS')
			{
				$xmases++;
			}
		}

		private function _findDiagonally(int $row, int $col, int &$xmases)
		{
			// South West
			if((($this->_matrix[$row-1][$col-1]??'')
				. ($this->_matrix[$row-2][$col-2]??'')
				. ($this->_matrix[$row-3][$col-3]??'')) == 'MAS')
			{
				$xmases++;
			}


			// South East
			if((($this->_matrix[$row-1][$col+1]??'')
				. ($this->_matrix[$row-2][$col+2]??'')
				. ($this->_matrix[$row-3][$col+3]??'')) == 'MAS')
			{
				$xmases++;
			}


			// North West
			if((($this->_matrix[$row+1][$col-1]??'')
				. ($this->_matrix[$row+2][$col-2]??'')
				. ($this->_matrix[$row+3][$col-3]??'')) == 'MAS')
			{
				$xmases++;
			}


			// North East
			if((($this->_matrix[$row+1][$col+1]??'')
				. ($this->_matrix[$row+2][$col+2]??'')
			 	. ($this->_matrix[$row+3][$col+3]??'')) == 'MAS')
			{
				$xmases++;
			}
		}

		/**
		 * --- Part Two ---
		 * 
		 * The Elf looks quizzically at you. Did you misunderstand the assignment?
		 * 
		 * Looking for the instructions, you flip over the word search to find that this isn't
		 * actually an XMAS puzzle; it's an X-MAS puzzle in which you're supposed to find two MAS in
		 * the shape of an X. One way to achieve that is like this:
		 * 
		 * M.S
		 * .A.
		 * M.S
		 * 
		 * Irrelevant characters have again been replaced with . in the above diagram. Within the X,
		 * each MAS can be written forwards or backwards.
		 * 
		 * Here's the same example from before, but this time all of the X-MASes have been kept
		 * instead:
		 * 
		 * .M.S......
		 * ..A..MSMS.
		 * .M.S.MAA..
		 * ..A.ASMSM.
		 * .M.S.M....
		 * ..........
		 * S.S.S.S.S.
		 * .A.A.A.A..
		 * M.M.M.M.M.
		 * ..........
		 * In this example, an X-MAS appears 9 times.
		 * 
		 * Flip the word search from the instructions back over to the word search side and try
		 * again. How many times does an X-MAS appear?
		 */
		public function Part2() : int
		{
			$xmases = 0;
			
			foreach($this->_matrix as $row => $columns)
			{
				foreach($columns as $col => $character)
				{
					if($character != "A")
					{
						continue;
					}

					$this->_findXMasShapes($row, $col, $xmases);
				}
			}

			return $xmases;
		}

		private function _findXMasShapes(int $row, int $col, int &$xmases)
		{
			$xmasLetters = (($this->_matrix[$row-1][$col-1]??'')
			.($this->_matrix[$row-1][$col+1]??'')
			.($this->_matrix[$row+1][$col+1]??'')
			.($this->_matrix[$row+1][$col-1]??''));

			// Get letters arround the 'A' (top left, top right, bottom right, bottom left).
			// Possible solutions are:
			//
			// 	MSSM:		SSMM:			SMMS:			//MMSS:
			// 	M   S		// S   S		// S   M		// M   M
			//    A			//   A			//   A			//   A
			// 	M   S		// M   M		// S   M		// S   S
			//

			if(in_array($xmasLetters, ['MSSM', 'SSMM', 'SMMS', 'MMSS']))
			{
				$xmases++;
			}
		}
	}