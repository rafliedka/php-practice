<!-- class lingkaran -->
<?php
    require_once 'Bidang.php';
    class Lingkaran extends Bidang
    {
        public $jari_jari;
        const PHI = 3.14;

        public function __construct($jari_jari) {
            $this->jari_jari = $jari_jari;
        }

        public function namaBidang() {
            echo 'Bidang Lingkaran';
        }

        public function luasBidang()
        {
            $luas = self::PHI * $this->jari_jari * $this->jari_jari;
            return $luas;
        }

        public function kelilingBidang() {
            $keliling = self::PHI * ($this->jari_jari + $this->jari_jari);
            return $keliling;
        }
    }