<?php

namespace Services;

class ExplodeText
{
	public function __construct(argument)
	{
		// code...
	}

	public function explode()
	{
		$reader = new ReadText();

		$textSpliter = new TextSplitToWords($reader, 1);
		$words = $textSpliter->splitWords();
	}
}