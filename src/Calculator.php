<?php
	namespace SosoRicsi\AgeCalculator;

	class Calculator
	{

		private int $year;
		private int $birth;
		private int $birth_year;


		/**
		* Initialize the Calculator with birth year and current year.
		*
		* @param int $birth_year The year of birth.
		* @param int|null $year The current year (optional). If not provided, defaults to the system's current year.
		*/
		public function __construct(int $birth_year, int $year = null)
		{
			// Set up the birth year variables
			$this->birth = $this->birth_year = $birth_year;

			// Set up the current year, defaulting to the system's current year if not provided
			$this->year = $year ?? date("Y");
		}


		/**
		* Calculate the current age based on the year.
		*
		* @return int The current age.
		*/
		public function calculateByYear(): int
		{
			// Return the difference between the current year and the birth year
			return $this->year - $this->birth;
		}


		/**
		* Calculate the age progression for each year since birth.
		*
		* @return string A JSON-encoded array mapping each year to the corresponding age.
		*/
		public function calculateAllYear(): string
		{

			// Initialize the output array
			$output = [];

			// Calculate the current age
			$age = $this->year - $this->birth;

			// Generate age-year mapping
			for ($i = 0; $i <= $age; $i++) {
				$output[$i] = [
					$this->birth_year,
					$i
				];
				$this->birth_year++;
			}

			// Return the output in JSON format
			return json_encode($output);
		}

	}
