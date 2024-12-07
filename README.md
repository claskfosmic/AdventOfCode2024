# Advent Of Code 2022
Joining the [Advent of Code](https://adventofcode.com/2024/) this year. Started a little late, so deciced to write everything in PHP to catch up and try to complate all puzzles this year.

For each day, I'll add an directory, called dayXX, with the following files:

 - day.php (*The class/module to import and run*)
 - input.txt (*My personal input*)
 - example.txt (*Example data*)

Using AdventOfCode.php, which will take care of the reading the input for each day, I'm able to solve (*the parts of the*) puzzle of all the different days.

## Usage:

Run all:

```
./AdventOfCode.php
```
Run day 1 (both, part 1 and 2):

```
./AdventOfCode.php 1
```

Run day 1, only part 1:

```
./AdventOfCode.php 1 1
```

Run day 1, only part 2:

```
./AdventOfCode.php 1 2
```

### Testing, using the example:

In order to debug and test my code, I've also added the possibility to run a day, using the example input from [Advent of Code](https://adventofcode.com/2024/). When my answer is wrong, I can solve the puzzle, using the example input to try if I get the same answer as in the example.

To use the example code instead of the actual input, argument `example` can be added as extra parameter, like in the examples below:

```
./AdventOfCode.php example
./AdventOfCode.php 1 example
./AdventOfCode.php 1 1 example
./AdventOfCode.php 1 2 example
```

--

# Results so far

```
-----------------------------------------------------------------
     _      _             _      ___   __    ___         _      
    /_\  __| |_ _____ _ _| |_   / _ \ / _|  / __|___  __| |___   
   / _ \/ _` \ V / -_) ' \  _| | (_) |  _| | (__/ _ \/ _` / -_)  
  /_/ \_\__,_|\_/\___|_||_\__|  \___/|_|    \___\___/\__,_\___|  


		   ___       __      ___    __ __      
 		/'___`\   /'__`\  /'___`\ /\ \\ \     
		/\_\ /\ \ /\ \/\ \/\_\ /\ \\ \ \\ \    
		\/_/// /__\ \ \ \ \/_/// /__\ \ \\ \_  
		   // /_\ \\ \ \_\ \ // /_\ \\ \__ ,__\
		  /\______/ \ \____//\______/ \/_/\_\_/
		  \/_____/   \/___/ \/_____/     \/_/  
                                                        
-----------------------------------------------------------------
- Run day 1:
- Answer for day 1 - Part 1: 1590491
- Answer for day 1 - Part 2: 22588371
--------------------------------------