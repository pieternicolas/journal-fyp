<?php
$pw = $_REQUEST["q"];

	$length    = strlen($pw);
	$locLower = false;
	$locUpper = false;
	$locNum = false;
	$locSymbol = false;
	
		
		for ($i = 0; $i < $length; ++$i) {
			$ch   = $pw[$i];
			$code = ord($ch);

			/* [0-9] */ if     ($code >= 48 && $code <= 57)  { $locNum = true; }
			/* [A-Z] */ elseif ($code >= 65 && $code <= 90)  { $locUpper = true; }
			/* [a-z] */ elseif ($code >= 97 && $code <= 122) { $locLower = true; }
			/* .     */ else                                 { $locSymbol = true; }
		}
		
		if ($locNum == false)
		{
			echo 'Include Numbers' . PHP_EOL;
		}
		
		if ($locUpper == false)
		{
			echo 'Include Upper Case Letters' . PHP_EOL;
		}
		
		if ($locLower == false)
		{
			echo 'Include Lower Case Letters' . PHP_EOL;
		}
		
		if ($locSymbol == false)
		{
			echo 'Include Symbols' . PHP_EOL;
		}
		
		if ($length < 8)
		{
			echo 'Increase Length of Password' . PHP_EOL;
		}
		
		if ($locNum == true && $locUpper == true && $locLower == true && $locSymbol == true && $length > 7)
		{
			echo 'Yep thats pretty good' . PHP_EOL;
		}
		
		
	