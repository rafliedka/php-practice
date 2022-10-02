<?php
class Pegawai{
    //member1 variabel
    public $nip;
    public $nama;
    public $jabatan;
    public $agama;
    public $status;
    
    //variabel konstanta & static di dlm class
    static $jml = 0;
    const PT = 'PT. Nurul Fikri Cipta Inovasi';
    
    //member2 konstruktor
    public function __construct($nip, $nama, $jabatan, $agama, $status){
        $this->nip = $nip;
        $this->nama = $nama;
        $this->jabatan = $jabatan;
        $this->agama = $agama;
        $this->status = $status;
        self::$jml++;
    }
    //member3 method2
    // gaji pokok
    public function setGapok(){
        switch ($this->jabatan) {
            case 'Manager': $gapok = 15000000; break;
            case 'Asisten Manager': $gapok = 1000000; break;
            case 'Kepala Bagian': $gapok = 7000000; break;
            case 'Staff': $gapok = 4000000; break;
            default: $gapok = 0;
        }
        
        return $gapok;
    }

    // tunjangan jabatan
    public function setTunjab(){
        $tunjab = 0.2 * $this->setGapok();
        return $tunjab;
    }

    // tunjangan keluarga
    public function setTunkel(){
        $tunkel = ($this->status == 'Menikah') ? 0.1 * $this->setGapok() : 0;
        return $tunkel;
    }

    // gaji kotor
    public function setGator(){
        $gator = $this->setGapok() + $this->setTunjab() + $this->setTunkel();
        return $gator;
    }

    // zakat profesi
    public function setZakatProfesi(){
        $zakat = ($this->agama == 'Islam' && $this->setGator() > 6000000 ) ? 0.025 * $this->setGator() : 0;
        return $zakat;
    }

    public function setGajiBersih(){
        $gajiBersih = $this->setGator() - $this->setZakatProfesi();
        return $gajiBersih;
    }

    // print output
    public function mencetak(){
        echo '<b><u>'.self::PT.'</u></b>'; 
        echo '<br/>NIP: '.$this->nip;
        echo '<br/>Nama Pegawai: '.$this->nama;
        echo '<br/>Jabatan: '.$this->jabatan;
        echo '<br/>Agama: '.$this->agama;
        echo '<br/>Status: '.$this->status;
        echo '<br/>Gaji Pokok: '.$this->setGapok();
        echo '<br/>Tunjangan Jabatan: '.$this->setTunjab();
        echo '<br/>Tunjangan Keluarga: '.$this->setTunkel();
        echo '<br/>Gaji Kotor : '.$this->setGator();
        echo '<br/>Zakat Profesi : '.$this->setZakatProfesi();
        echo '<br/>Gaji Bersih : '.$this->setGajiBersih();
        echo '<hr/>';
    }
}