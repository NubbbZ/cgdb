<?php

namespace App;

enum CardElementType : string
{
    case text = 'string';
    case number = 'integer';
    case boolean = 'boolean';
    case array = 'array';

    public static function toArray(): array
    {
        return array_column(CardElementType::cases(), 'value');
    }
}
