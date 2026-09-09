<?php

declare(strict_types=1);

namespace App\Enums;

enum PeranPengguna: string
{
    case Admin = 'admin';
    case Petugas = 'petugas';
    case Pengguna = 'pengguna';

    public function label(): string
    {
        return match ($this) {
            self::Admin => 'Administrator',
            self::Petugas => 'Petugas',
            self::Pengguna => 'Pengguna',
        };
    }

    public function bolehMengelolaData(): bool
    {
        return match ($this) {
            self::Admin, self::Petugas => true,
            self::Pengguna => false,
        };
    }
}
