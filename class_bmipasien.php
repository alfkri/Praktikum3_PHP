<?php
class bmiPasien
{
    public $nama;
    public $bb;
    public $tb;
    public $jk;

    function __construct($nama, $bb, $tb)
    {
        $this->nama = $nama;
        $this->berat = $bb;
        $this->tinggi = $tb;
        // $this->jenis_k = $status;
    }
    public function hasilBMI()
    {
        return $this->berat / (($this->tinggi /100)**2);
    }
    public function statusBMI($HB)
    {
        if ($HB < 18.5) {
            return "Kekurangan Berat Badan";
        }
        else if ($HB >= 18.5 && $HB <= 24.9) {
            return "Normal (ideal)";
        }
        else if ($HB >= 25.0 && $HB <= 29.9) {
            return "Kelebihan Berat Badan";
        }
        else {
            return "Kegemukan (Obesitas)";
        }
    }
      
}
?>  
