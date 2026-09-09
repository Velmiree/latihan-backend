<?php

declare(strict_types=1);

namespace App\Domain;

final class ItemKeranjang
{
    public function __construct(
        public readonly string $nama,
        public readonly Uang $harga,
        public readonly int $kuantitas,
    ) {
        if ($kuantitas < 1) {
            throw new \InvalidArgumentException(
                'Kuantitas minimal 1'
            );
        }
    }

    public function subtotal(): Uang
    {
        return $this->harga->kali($this->kuantitas);
    }
}

final class Keranjang
{
    /** @var ItemKeranjang[] */
    private array $item = [];

    private const BATAS_DISKON = 100_000;

    private const PERSEN_DISKON = 10;

    public function tambah(ItemKeranjang $item): self
    {
        $this->item[] = $item;

        return $this;
    }

    public function subtotal(): Uang
    {
        return array_reduce(
            $this->item,
            fn (Uang $bawa, ItemKeranjang $i) => $bawa->tambah($i->subtotal()),
            new Uang(0),
        );
    }

    public function diskon(): Uang
    {
        $subtotal = $this->subtotal();

        return $subtotal->jumlah > self::BATAS_DISKON
            ? new Uang(
                intdiv(
                    $subtotal->jumlah * self::PERSEN_DISKON,
                    100
                )
            )
            : new Uang(0);
    }

    public function total(): Uang
    {
        return new Uang(
            $this->subtotal()->jumlah
            - $this->diskon()->jumlah
        );
    }
}
