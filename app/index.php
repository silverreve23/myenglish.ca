<?php 

require_once(__DIR__.'/Entities/TextSplitToWords.php');
require_once(__DIR__.'/Entities/ExcludeWords.php');
require_once(__DIR__.'/Services/ReadText.php');

use App\Entities\TextSplitToWords;
use App\Entities\ExcludeWords;
use App\Services\ReadText;

$words = new ExplodeText();

$wordsExcluder = new ExcludeWords($words);
$words = $wordsExcluder->exclude();

print_r($words);