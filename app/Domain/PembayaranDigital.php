<?php

declare(strict_types=1);

namespace App\Domain;

abstract class PembayaranDigital implements MetodePembayaran
{
    public function __construct(
        protected string $nomorAkun
    ) {}

    protected function validasiNomor(): bool
    {
        return strlen($this->nomorAkun) >= 10;
    }

    abstract public function bayar(int $jumlah): string;
}
