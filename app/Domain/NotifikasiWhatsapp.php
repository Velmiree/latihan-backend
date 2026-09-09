<?php

declare(strict_types=1);

namespace App\Domain;

final class NotifikasiWhatsapp implements NotifikasiPembayaran
{
    public function __construct(
        private readonly string $nomorTelepon,
    ) {}

    public function kirim(string $pesan): string
    {
        return "WhatsApp ke {$this->nomorTelepon}: {$pesan}";
    }
}
