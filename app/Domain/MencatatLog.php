<?php

declare(strict_types=1);

namespace App\Domain;

trait MencatatLog
{
    public function catat(string $pesan): void
    {
        logger()->info(static::class.': '.$pesan);
    }
}
