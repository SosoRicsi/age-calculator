<?php
	require __DIR__.'/vendor/autoload.php';

	use SosoRicsi\AgeCalculator\Calculator;

	/**
	 * Test the Age Calculator functions
	 *
	 * This script tests the functionality of the Calculator class
	 * from the SosoRicsi\AgeCalculator namespace. It checks the
	 * calculation of the current age and the generation of a
	 * year-to-age mapping.
	 */

	// Initialize the Calculator with birth year 2009 and current year 2024
	$calculator = new Calculator(2009, 2024);

	// Separator for readability in output
	echo "\n\n--------------- calculateByYear ---------------\n\n";

	// Test the calculateByYear method to determine the age in 2024
	echo "In 2024 she/he was {$calculator->calculateByYear()} years-old.";

	// Separator for readability in output
	echo "\n\n--------------- calculateAllYear ---------------\n\n";

	// Test the calculateAllYear method to generate a mapping of each year and corresponding age
	$calc = json_decode($calculator->calculateAllYear());

	// Loop through the age-year mapping and print the results
	foreach ($calc as $age) {
		print_r("In {$age[0]} she/he was {$age[1]} years-old.\n");
	}
