<?php

declare(strict_types=1);

namespace App\Domain;

final class PembayaranTransferBank extends PembayaranDigital
{
    use MencatatLog;

    public function __construct(
        string $nomorAkun,
        private readonly string $kodeBank,
    ) {
        parent::__construct($nomorAkun);
    }

    public function bayar(int $jumlah): string
    {
        if (! $this->validasiNomor()) {
            throw new \InvalidArgumentException(
                'Nomor rekening tidak valid'
            );
        }

        $this->catat(
            "Transfer {$jumlah} ke bank {$this->kodeBank}"
        );

        return "TF-{$this->kodeBank}-"
            .strtoupper(bin2hex(random_bytes(3)));
    }
}
