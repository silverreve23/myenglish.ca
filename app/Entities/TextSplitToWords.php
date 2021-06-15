<?php 

namespace App\Entities;

class TextSplitToWords {
    private $text = null;
    private $wordSplitCount = 1;
    private $separator = ' ';

    public function __construct(string $text, int $wordSplitCount = 1)
    {
        $this->text = $text;
        $this->wordSplitCount = $wordSplitCount;
    }

    public function splitWords(): array
    {
        $text = $this->normalizeText($this->text);

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