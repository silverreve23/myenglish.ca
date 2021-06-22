<?php 

namespace App\Entities;

class ExcludeWords 
{
    private $words = [];
    private $excludes = ['a'];

    public function __construct(array $words)
    {
        $this->words = $words;
    }

    public function exclude(): array
    {
        return array_diff($this->words, $this->excludes);
    }
}