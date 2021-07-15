<?php 

require __DIR__ . '/vendor/autoload.php';

use App\Services\ExplodeText;

$learnedWords = ['my'];

// Explode the text to array with words.
$words = new ExplodeText();
$words = $words->exclude($learnedWords);

print_r($words);