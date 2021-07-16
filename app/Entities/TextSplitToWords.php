<?php 

namespace App\Entities;

use App\Contracts\ReaderInterface;

class TextSplitToWords 
{
    private string $text = '';
    private int $wordSplitCount = 1;
    private string $separator = ' ';

    private ReaderInterface $reader;

    public function __construct(ReaderInterface $reader, int $wordSplitCount = 1)
    {
        $this->reader = $reader;
        $this->wordSplitCount = $wordSplitCount;
    }

    public function splitWords(): array
    {
        $text = $this->reader->read();
        $text = $this->normalizeText($text);

        $words = explode($this->separator, $text);

        return $this->sortAsUniques($this->concatToArrays($words));
    }

    private function normalizeText(string $text): string
    {
        $searches = [',', '-', '.', '\'', '(', ')'];

        return str_replace($searches, '', strtolower($this->text));
    }

    private function concatToArrays(array $words): array
    {
        $chunks = array_chunk($words, $this->wordSplitCount);

        return array_map(fn($words) => implode(' ', $words), $chunks);
    }

    private function sortAsUniques(array $words): array
    {
        $valuesAsCount = array_count_values($words);

        arsort($valuesAsCount);

        return array_keys($valuesAsCount);
    }
}