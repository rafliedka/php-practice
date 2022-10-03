<!-- class segitiga -->
<?php
    require_once 'Bidang.php';
    class Segitiga extends Bidang
    {
        public $tinggi;
        public $sisiA;
        public $sisiB;
        public $sisiC;

        public function __construct($tinggi, $sisiA, $sisiB, $sisiC) {
            $this->tinggi = $tinggi;
            $this->sisiA = $sisiA;
            $this->sisiB = $sisiB;
            $this->sisiC = $sisiC;
        }

        public function namaBidang() {
            echo 'Bidang Segitiga';
        }

        public function luasBidang()
        {
            $luas = 1 / 2 * $this->sisiA * $this->tinggi;
            return $luas;
        }

        public function kelilingBidang() {
            $keliling = $this->sisiA + $this->sisiB + $this->sisiC;
            return $keliling;
        }
    }