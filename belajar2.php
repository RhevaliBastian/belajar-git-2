<?php
class Atm{
    private $saldo,$nama;
    public function __construct($nominal=0,$nama)
    {
        $this->saldo = $nominal;
        $this->nama = $nama;
    }
    public function ceksaldo(){
        echo "selamat datang $this->nama, Saldo anda saat ini adalah " . number_format($this->saldo, 0, ',', '.') . " <br>";
    }
    public function setor($nominal){
        $this->saldo += $nominal;
        echo "Setoran sebesar " . number_format($nominal, 0, ',', '.') . " berhasil. Saldo anda saat ini adalah " . number_format($this->saldo, 0, ',', '.') . " <br>";
    }
    public function tarik($nominal){
        if($this->saldo >= $nominal){
            $this->saldo -= $nominal;
            echo "Penarikan sebesar " . number_format($nominal, 0, ',', '.') . " berhasil. Sisa saldo anda adalah " . number_format($this->saldo, 0, ',', '.') . " <br>";
        }else{
            echo "Saldo anda tidak cukup untuk melakukan penarikan sebesar $nominal <br>";
        }
    }
    public function transfer($nominal,$tujuan){
        if($this->saldo >= $nominal){
            $this->saldo -= $nominal;
            echo "Transfer sebesar " . number_format($nominal, 0, ',', '.') . " ke $tujuan berhasil. Sisa saldo anda adalah " . number_format($this->saldo, 0, ',', '.') . " <br>";
        }else{
            echo "Saldo anda tidak cukup untuk melakukan transfer sebesar $nominal <br>";
        }
    }
    public function konversi($nominal,$tujuan){
        if($this->saldo >= $nominal){
            if ($tujuan == "usd") {
                $kurs = 16000; // contoh kurs USD
                $hasil = $nominal / $kurs;
                echo "Konversi sebesar " . number_format($nominal, 0, ',', '.') . " ke USD adalah " . number_format($hasil, 2, ',', '.') . " <br>";
            } elseif ($tujuan == "eur") {
                $kurs = 17000; // contoh kurs EUR
                $hasil = $nominal / $kurs;
                echo "Konversi sebesar " . number_format($nominal, 0, ',', '.') . " ke EUR adalah " . number_format($hasil, 2, ',', '.') . " <br>";
            } else {
                echo "Mata uang tujuan tidak dikenali. <br>";
                return;
            }
            }
    }
}
    // cek saldo
    $reval=new Atm(1000000,"reval");
    $reval->setor(500000);
    $reval->tarik(200000);
    $reval->ceksaldo();
    $reval->transfer(300000,"reval");
    $reval->konversi(1000000,"eur");
    $reval->ceksaldo();
?>