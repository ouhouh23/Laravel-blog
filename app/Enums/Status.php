<?php

namespace App\Enums;

enum Status: string
{
    case DRAFT = 'draft';
    case PUBLISHIED = 'published';

    public function getStyles(): string {
        return match ($this) {
            self::DRAFT => 'text-red-500',
            self::PUBLISHIED => 'text-green-500'
        };

    }
}
