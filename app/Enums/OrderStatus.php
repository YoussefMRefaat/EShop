<?php

namespace App\Enums;

enum OrderStatus : string
{
    case Pending    = 'pending';
    case Shipped    = 'shipped';
    case Delivered  = 'delivered';
    case Cancelled  = 'cancelled';
    case Restored   = 'restored';

    public static function values(): array
    {
        $values = [];
        foreach (self::cases() as $case)
            $values[] = $case->value;
        return $values;
    }

    public function badge(): string
    {
        return match($this){
            self::Pending => 'warning',
            self::Shipped => 'info',
            self::Delivered => 'success',
            self::Cancelled => 'danger',
            self::Restored => 'dark',
        };
    }
}
