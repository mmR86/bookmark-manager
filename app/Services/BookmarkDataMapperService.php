<?php

namespace App\Services;

class BookmarkDataMapperService
{
    public static function mapApiData(array $apiData): array {
        return [
            'author' => trim($apiData['author'] ?? ''),
            'title' => trim($apiData['title'] ?? ''),
            'category' => trim($apiData['publisher'] ?? ''),
            'image' => filter_var($apiData['image']['url'], FILTER_SANITIZE_URL),
            'url' => filter_var($apiData['title'], FILTER_SANITIZE_URL),
            'description' => trim($apiData['description'] ?? ''),
            'logo' => trim($apiData['logo']['url'], FILTER_SANITIZE_URL),
        ];
    }
}