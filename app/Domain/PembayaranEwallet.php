<?php

declare(strict_types=1);

namespace App\Domain;

final class PembayaranEwallet extends PembayaranDigital
{
    use MencatatLog;

    public function bayar(int $jumlah): string
    {
        if (! $this->validasiNomor()) {
            throw new \InvalidArgumentException(
                'Nomor akun tidak valid'
            );
        }

        $this->catat("Pembayaran {$jumlah} via e-wallet");

        return 'EW-'.strtoupper(
            bin2hex(random_bytes(4))
        );
    }
}
