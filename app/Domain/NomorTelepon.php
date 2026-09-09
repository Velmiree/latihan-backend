<?php

declare(strict_types=1);

namespace App\Domain;

final class NomorTelepon
{
    public function __construct(
        public readonly string $nomor,
    ) {
        if (! preg_match('/^08[0-9]{8,11}$/', $nomor)) {
            throw new \InvalidArgumentException(
                'Nomor telepon tidak valid'
            );
        }
    }

    public function format(): string
    {
        return '+62'.substr($this->nomor, 1);
    }

    public function samaDengan(self $lain): bool
    {
        return $this->nomor === $lain->nomor;
    }
}
