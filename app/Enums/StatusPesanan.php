<?php

declare(strict_types=1);

namespace App\Enums;

enum StatusPesanan: string
{
    case Draft = 'draft';
    case Diproses = 'diproses';
    case Selesai = 'selesai';
    case Dibatalkan = 'dibatalkan';

    public function label(): string
    {
        return match ($this) {
            self::Draft => 'Menunggu Konfirmasi',
            self::Diproses => 'Sedang Diproses',
            self::Selesai => 'Selesai',
            self::Dibatalkan => 'Dibatalkan',
        };
    }

    public function bolehDibatalkan(): bool
    {
        return in_array($this, [self::Draft, self::Diproses], true);
    }
}
