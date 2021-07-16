<?php 

namespace App\Entities;

class ExcludeWords 
{
    private array $words = [];

    public function __construct(array $words)
    {
        $this->words = $words;
    }

    public function exclude($excludes): array
    {
        return array_diff($this->words, $excludes);
    }
}