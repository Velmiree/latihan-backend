<?php

declare(strict_types=1);

namespace App\Domain;

interface MetodePembayaran
{
    public function bayar(int $jumlah): string;
}

trait MencatatLog
{
    public function catat(string $pesan): void
    {
        logger()->info(static::class.': '.$pesan);
    }
}
