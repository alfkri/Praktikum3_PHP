<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BMI</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    <body style="background-color:#bbbbbb">
        <div class="bg-secondary p-2 mb-4">
            <h3 class="text-left text-white">Form Isian</h3>
        </div>
        <div class="container">    
            <form class="form-horizontal p-5 shadow" style="background-color:#e2d5d5;" method="GET" action="form_BMI.php">
                <!-- Nama -->
                <div class="text-center">
                    <h3 class="mb-5 text-secondary text-mg">Indeks Massa Tubuh</h3>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label text-secondary" style="font-size:20px;"><b>Nama</b></label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                </div><br>
                <!-- Berat Badan -->
                <div class="form-group row">
                    <label for="berat_badan" class="col-sm-3 col-form-label text-secondary" style="font-size:20px;"><b>Berat Badan</b></label>
                    <div class="col-sm-7">
                        <div class="input-group mb-2 mr-sm-2">
                            <input type="text" class="form-control" name="berat_badan" required>
                            <div class="input-group-prepend">
                                <div class="input-group-text">KG</div>
                            </div>
                        </div>
                    </div>
                </div><br>

                <!-- Tinggi Badan -->
                <div class="form-group row">
                    <label for="tinggi_badan" class="col-sm-3 col-form-label text-secondary" style="font-size:20px;"><b>Tinggi Badan</b></label>
                    <div class="col-sm-7">
                        <div class="input-group mb-2 mr-sm-2">
                            <input type="text" class="form-control" name="tinggi_badan" required>
                            <div class="input-group-prepend">
                                <div class="input-group-text">CM</div>
                            </div>
                        </div>
                    </div>
                </div><br>

                <!-- Umur -->
                <div class="form-group row">
                    <label for="umur" class="col-sm-3 col-form-label text-secondary" style="font-size:20px;"><b>Umur</b></label>
                    <div class="col-sm-7">
                        <div class="input-group mb-2 mr-sm-2">
                            <input type="text" class="form-control" name="umur" required>
                            <div class="input-group-prepend">
                                <div class="input-group-text">Tahun</div>
                            </div>
                        </div>
                    </div>
                </div><br>

                <!-- Jenis Kelamin -->
                <div class="row">
                    <label class="col-sm-3 col-form-label text-secondary" style="font-size:20px;"><b>Jenis Kelamin</b></label>
                    <div class="col-sm-8">
                        <div class="form-check mr-auto">
                            <input class="form-check-input" type="radio" id="laki" name="jenis_kelamin" value="Laki-Laki" required>
                            <label class="form-check-label text-secondary mr-5" style="font-size:20px;" for="laki"><b>Laki-Laki</b></label>
                            <input class="form-check-input" type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" required>
                            <label class="form-check-label text-secondary" style="font-size:20px;" for="perempuan"><b>Perempuan</b></label>
                        </div>
                    </div>
                </div><br>
               
               <!-- Tombol Submit -->
                <div class="text-center">
                    <input class="btn btn-secondary" type="submit" value="Simpan" name="proses"/>
                </div>
            </form>
        </div>

        <?php 
        if ($_GET)
        {
            require_once 'class_bmipasien.php';

            $BMI = new bmiPasien($_GET['nama'], $_GET['berat_badan'], $_GET['tinggi_badan']);
            
            $HB = $BMI->hasilBMI();

            $status = $BMI->statusBMI($HB);

            $nama = $_GET['nama'];
            $umur = $_GET['umur'];
            $tb = $_GET['tinggi_badan'];
            $bb= $_GET['berat_badan'];
            $jk= $_GET['jenis_kelamin'];

            $pasien1 = ['nama'=>'Rosalia Naurah', 'kelamin'=>'Perempuan', 'umur'=>18, 'berat'=>46.2, 'tinggi'=>155];
            $pasien2 = ['nama'=>'Rara Ulan', 'kelamin'=>'Perempuan', 'umur'=>20, 'berat'=>42.8, 'tinggi'=>158];
            $pasien3 = ['nama'=>'Glagah Putih', 'kelamin'=>'Laki-laki', 'umur'=>22, 'berat'=>90.3, 'tinggi'=>154];
            $pasien4 = ['nama'=> $nama, 'kelamin'=> $jk, 'umur'=>$umur, 'berat'=>$bb, 'tinggi'=>$tb];

            $ar_pasien = [$pasien1, $pasien2, $pasien3, $pasien4];
        }
        ?>

        <!-- OUTPUT FORM -->
        <div class="container mt-5 mb-5 p-5 shadow" style="background-color:#e2d5d5;">
            <div class="">
                <h3 class="text-center text-secondary">Output Form</h3>
            </div>
            <div class="row p-1 ">
                <div class="col-12 mt-3">
                    <div class="card mx-auto" style="width: 50rem;">
                        <div class="card-header bg-secondary text-white text-center" style="font-weight: bold; font-size: 20px;">Hasil Evaluasi BMI</div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Nama : <?= $nama ?></b></li>
                            <li class="list-group-item"><b>Jenis Kelamin: <?= $jk ?></b></li>
                            <li class="list-group-item"><b>Berat Badan: <?= $bb ?></b></li>
                            <li class="list-group-item"><b>Tinggi Badan: <?= $tb ?></b></li>
                            <li class="list-group-item"><b>Umur : <?= $umur?></b></li>
                            <li class="list-group-item"><b>BMI : <?php echo number_format($HB,1); ?></b></li>
                            <li class="list-group-item"><b>Hasil: <?php echo $status; ?></b></li>
                        </ul>    
                    </div>        
                </div>
            </div>     
        </div>        


        <!-- Data BMI Pasien -->
        <div class="container shadow p-5 mt-5" style="background-color:#e2d5d5;">
            <div class="bg-secondary p-2 mb-2">
                <h3 class="text-center text-white">Data BMI Pasien</h3>
            </div>
            <form action="form_BMI.php" method="GET">
                <table border="1" width="100%" class="m-auto">
                    <thead class="text-center">
                    <tr>
                        <th>No</th><th>Nama Lengkap</th><th>Gender</th>
                        <th>Umur</th><th>Berat (KG)</th><th>Tinggi (CM)</th><th>BMI</th><th>Hasil</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    <?php
                    $nomor = 1;
                    foreach($ar_pasien as $pasien) {
                        echo '<tr><td>'.$nomor.'</td>';
                        echo '<td>'.$pasien['nama'].'</td>';
                        echo '<td>'.$pasien['kelamin'].'</td>';
                        echo '<td>'.$pasien['umur'].'</td>';
                        echo '<td>'.$pasien['berat'].'</td>';
                        echo '<td>'.$pasien['tinggi'].'</td>';
                        $BMI = $pasien["berat"] / (($pasien["tinggi"]/100)**2);
                        echo '<td>'.number_format($BMI,1).'</td>';
                        if ($BMI < 18.5) {
                            echo "<td>Kekurangan Berat Badan</td>";
                        }
                        else if ($BMI >= 18.5 && $BMI <= 24.9) {
                            echo "<td>Normal (ideal)</td>";
                        }
                        else if ($BMI >= 25.0 && $BMI <= 29.9) {
                            echo "<td>Kelebihan Berat Badan</td>";
                        }
                        else {
                            echo "<td>Kegemukan (Obesitas)</td>";
                        }
                        echo '</tr>';
                        $nomor++;
                        }
                    ?>
                    </tbody>
                </table>
            </form>
    </body>
</html>
