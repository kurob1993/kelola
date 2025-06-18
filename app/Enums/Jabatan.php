<?php

namespace App\Enums;

enum Jabatan: string
{
    case RT = 'Ketua RT';
    case KORDINATOR = "Kordinator Gang";

    public static function fromName(string $name): ?self
    {
        foreach (self::cases() as $case) {
            if ($case->name === $name) {
                return $case;
            }
        }
        return null;
    }
}
