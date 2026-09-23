<?php

interface Bentuk {
    public function hitungLuas();
}

class Persegi implements Bentuk {
    private $sisi;

    public function __construct($sisi) {
        $this->sisi = $sisi;
    }

    public function hitungLuas() {
        return $this->sisi * $this->sisi;
    }

    public function __toString() {
        return "Persegi (sisi={$this->sisi})";
    }
}

class Lingkaran implements Bentuk {
    const PHI = 3.14;
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function hitungLuas() {
        return self::PHI * $this->radius * $this->radius;
    }

    public function __toString() {
        return "Lingkaran (radius={$this->radius})";
    }
}

$daftarBentuk = [
    new Persegi(5),
    new Lingkaran(7)
];

foreach ($daftarBentuk as $bentuk) {
    echo "Luas " . $bentuk . ": " . $bentuk->hitungLuas() . "<br>";
} 