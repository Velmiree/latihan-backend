<?php

declare(strict_types=1);

namespace App\Services;

final class LayananLaporan
{
    public function ringkasan(): array
    {
        return [
            'total_penjualan' => 0,
            'total_produk' => 3,
        ];
    }
}