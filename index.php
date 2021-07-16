<?php 

require __DIR__ . '/vendor/autoload.php';

use App\Services\ReadText;
use App\Services\ExplodeText;

$learnedWords = ['my'];

// Explode the text to array with words.
$words = new ExplodeText(new ReadText);
$words->explode();
// $words->exclude($learnedWords);

print_r($words->explode());