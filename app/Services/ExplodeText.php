<?php

namespace App\Services;

use App\Contracts\ReaderInterface;
use App\Entities\TextSplitToWords;
use App\Entities\ExcludeWords;

class ExplodeText
{
	public array $words = [];
	public ReaderInterface $reader;

	public function __construct(ReaderInterface $reader)
	{
		$this->reader = $reader;
	}

	public function explode(): array
	{
		$textSpliter = new TextSplitToWords($this->reader, 1);

		$this->words = $textSpliter->splitWords();

		return $this->words;
	}

	// Exclude learned words from array words.
	public function exclude(array $excludeWords = []): array
	{
		$wordsExcluder = new ExcludeWords($this->words);

		$this->words = $wordsExcluder->exclude($excludeWords);

		return $this->words;
	}
}