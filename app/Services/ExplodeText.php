<?php

namespace App\Services;

use App\Services\ReadText;
use App\Entities\TextSplitToWords;
use App\Entities\ExcludeWords;

class ExplodeText
{
	public function __construct()
	{
		// code...
	}

	public function explode(): array
	{
		$reader = new ReadText();

		$textSpliter = new TextSplitToWords($reader, 1);

		$words = $textSpliter->splitWords();
	}

	// Exclude learned words from array words.
	public function exclude(array $words = []): array
	{
		$wordsExcluder = new ExcludeWords($words);

		return $wordsExcluder->exclude();
	}
}