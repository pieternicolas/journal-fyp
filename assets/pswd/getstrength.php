<?php
$pw = $_REQUEST["q"];

		$length    = strlen($pw);

		$locYear   = false;
		$uppcheck  = false;
		$lowcheck  = false;
		$numcheck  = false;
		$symbcheck = false;
		$numer = 0; //Numerator
		$power = 0; //Power of
		$denom = 100; //Denominator
		$bruresult = 0; //Brute Force Result
		$uniquechar = 0; //Number of unique characters
		
		//Common Passwords Array
		$topYear[] = "123456";
		$topYear[] = "password";
		$topYear[] = "12345678";
		$topYear[] = "qwerty";
		$topYear[] = "12345";
		$topYear[] = "123456789";
		$topYear[] = "football";
		$topYear[] = "1234";
		$topYear[] = "1234567";
		$topYear[] = "baseball";
		$topYear[] = "welcome";
		$topYear[] = "1234567890";
		$topYear[] = "abc123";
		$topYear[] = "111111";
		$topYear[] = "1qaz2wsx";
		$topYear[] = "dragon";
		$topYear[] = "master";
		$topYear[] = "monkey";
		$topYear[] = "letmein";
		$topYear[] = "login";
		$topYear[] = "princess";
		$topYear[] = "qwertyuiop";
		$topYear[] = "solo";
		$topYear[] = "passw0rd";
		
		// count character classes
		for ($i = 0; $i < $length; ++$i) {
			$ch   = $pw[$i];
			$word = substr($pw, 0, $i + 1);
			$code = ord($ch);

			/* [0-9] */ if     ($code >= 48 && $code <= 57)  {$numcheck = true;}
			/* [A-Z] */ elseif ($code >= 65 && $code <= 90)  {$uppcheck = true;}
			/* [a-z] */ elseif ($code >= 97 && $code <= 122) {$lowcheck = true;}
			/* .     */ else                                 {$symbcheck = true;}

			foreach ($topYear as $year)
			{
				$word = strtolower($word);
				if (strpos ($word, $year) !== false)
				{
					$locYear = true;
				}
			}
		}
		
		$uniquechar = count( array_unique( str_split($pw)));
		// Strength Calculation --------------------------------------------------------------------
		if ($uppcheck == true)
		{
			$numer = $numer + 26;
		}
		
		if ($lowcheck == true)
		{
			$numer = $numer + 26;
		}
		
		if ($numcheck == true)
		{
			$numer = $numer + 10;
		}
		
		if ($symbcheck == true)
		{
			$numer = $numer + 31;
		}
		
		$power = $uniquechar;
		
		
		$bruresult = pow($numer,$power);
		$bruresult = $bruresult/$denom;
		
		if ($locYear == true)
		{
			$uniquechar = $uniquechar / 2;
			$length = $length / 2;
		}
		if ($bruresult > 31536000 && $uniquechar > 7 && $numcheck == true && $uppcheck == true && $lowcheck == true && $symbcheck == true)
		{
			echo "Very Strong" . PHP_EOL;
		}
		elseif ($bruresult > 86400 && $uniquechar > 5 && $numcheck == true && $uppcheck == true && $lowcheck == true && $symbcheck == true)
		{
			echo "Strong" . PHP_EOL;
		}
		elseif ($bruresult > 86400 && $uniquechar > 3)
		{
			echo "Fair" . PHP_EOL;
		}
		elseif ($uniquechar > 1)
		{
			echo "Weak" . PHP_EOL;
		}
		else
		{
			echo "Very Weak" . PHP_EOL;
		}

		//---------------------------------------------------------------------------------------------
		

		// Brute Force Calculation --------------------------------------------------------------------
		$power = $length;
		
		$bruresult = pow($numer,$power);
		$bruresult = $bruresult/$denom;
		if ($bruresult > 31536000)
		{
			$bruresult = $bruresult / 31536000;
			$bruresult = round($bruresult);
			echo "Hacked Within $bruresult Years" . PHP_EOL;
		}
		elseif ($bruresult > 86400)
		{
			$bruresult = $bruresult / 86400;
			$bruresult = round($bruresult);
			echo "Hacked Within $bruresult Days" . PHP_EOL;
		}
		elseif ($length > 2)
		{
			$bruresult = round($bruresult);
			echo "Hacked Within $bruresult Seconds" . PHP_EOL;
		}
		else
		{
			echo "Hacked Within 0 Seconds" . PHP_EOL;
		}

		//---------------------------------------------------------------------------------------------
		
	