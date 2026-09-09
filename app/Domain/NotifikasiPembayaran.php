<?php

declare(strict_types=1);

namespace App\Domain;

interface NotifikasiPembayaran
{
    public function kirim(string $pesan): string;
}
