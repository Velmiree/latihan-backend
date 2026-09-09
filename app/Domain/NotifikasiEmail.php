<?php

declare(strict_types=1);

namespace App\Domain;

final class NotifikasiEmail implements NotifikasiPembayaran
{
    public function __construct(
        private readonly string $email,
    ) {}

    public function kirim(string $pesan): string
    {
        return "Email ke {$this->email}: {$pesan}";
    }
}
