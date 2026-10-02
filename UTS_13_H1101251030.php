<?php

abstract class Kendaraan {
    protected $id;
    protected $nama;
    protected $hargaDasar;

    public function __construct($id, $nama, $hargaDasar){
        $this->id = $id;
        $this->nama = $nama;
        $this->hargaDasar = $hargaDasar;
    }

    public function getId(){
        return $this->id;
    }

    public function getNama(){
        return $this->nama;
    }

    public function getHargaDasar(){
        return $this->hargaDasar;
    }

    abstract public function hitungTotal();
    abstract public function getJenis();
}

class Mobil extends Kendaraan{
    private $kursi;

    public function __construct($id, $nama, $hargaDasar, $kursi){
        parent::__construct($id, $nama, $hargaDasar);
        $this->kursi = $kursi;
    }

    public function hitungTotal(){
        return $this->hargaDasar + (50000 * $this->kursi);
    }

    public function getJenis(){
        return "Mobil";
    }

    public function cetakDetail(){
        return "Mobil " . $this->kursi . " kursi (asuransi)";
    }
}

class Motor extends Kendaraan{
    private $cc;

    public function __construct($id, $nama, $hargaDasar, $cc){
        parent::__construct($id, $nama, $hargaDasar);
        $this->cc = $cc;
    }

    public function hitungTotal(){
        return $this->hargaDasar + (100 * $this->cc);
    }

    public function getJenis(){
        return "Motor";
    }

    public function cetakDetail(){
        return "Motor " . $this->cc . " cc";
    }
}

class Truck extends Kendaraan{
    private $tonase;

    public function __construct($id, $nama, $hargaDasar, $tonase){
        parent::__construct($id, $nama, $hargaDasar);
        $this->tonase = $tonase;
    }

    public function hitungTotal(){
        $total = $this->hargaDasar + (100000 * $this->tonase);
        if ($this->tonase > 0){ 
            $total = $total - ($total * 0.10);
        }
        return $total;
    }

    public function getJenis(){
        return "Truck";
    }

    public function cetakDetail()
    {
        if ($this->tonase > 0){
            return "Truck " . $this->tonase . " ton (diskon 10%)";
        }
        return "Truck " . $this->tonase . " ton";
    }
}

$daftar = array(
    new Mobil("1", "Najwa", 350000, 7),
    new Motor("2", "Aulia", 80000, 150),
    new Truck("3", "Putri", 400000, 5),
    new Truck("4", "Amey", 450000, 9),
    new Motor("5", "Gipet", 75000, 125)
);

$totalKeseluruhan = 0;

foreach ($daftar as $k) {
    echo "ID: " . $k->getId() . "<br>";
    echo "Nama: " . $k->getNama() . "<br>";
    echo "Jenis: " . $k->getJenis() . "<br>";
    echo "Harga Dasar: " . $k->getHargaDasar() . "<br>";
    echo "Total: " . $k->hitungTotal() . "<br>";
    echo "Keterangan: " . $k->cetakDetail() . "<br><br>";

    $totalKeseluruhan = $totalKeseluruhan + $k->hitungTotal();
}

echo "Total Keseluruhan: " . $totalKeseluruhan;

?>