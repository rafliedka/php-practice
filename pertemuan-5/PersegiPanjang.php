<!-- class Persegi Panjang -->
<?php
    require_once 'Bidang.php';
    class PersegiPanjang extends Bidang
    {
        public $panjang;
        public $lebar;

        public function __construct($panjang, $lebar) {
            $this->panjang = $panjang;
            $this->lebar = $lebar;
        }

        public function namaBidang() {
            echo 'Bidang Persegi Panjang';
        }

        public function luasBidang()
        {
            $luas = $this->panjang * $this->lebar;
            return $luas;
        }

        public function kelilingBidang() {
            $keliling = 2 * ($this->panjang + $this->lebar);
            return $keliling;
        }
    }