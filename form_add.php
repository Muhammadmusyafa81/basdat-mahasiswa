<?php 
include('library.php');
$lib = new Library();

$listKodePos = $lib->showKodePos();
$listDosen = $lib->showDosen();



?>
<html>
    <head>
        <title>Tambah Data Mahasiswa</title>
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Tambah Data Mahasiswa</h3>
            </div>
            <div class="card-body">
            <form method="post" action="index.php">
                <div class="form-group row">
                    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                    <input type="number" name="nim" class="form-control" id="nim">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" id="nama">
                </div>
            </div>
            <div class="form-group row">
                <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir">
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="alamat" id="alamat"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="kode_pos" class="col-sm-2 col-form-label">Kode Pos</label>
                    <div class="col-sm-10">
                        <select name="kode_pos" id="kode_pos" class="form-control">
                            <option value="" disabled selected>Kode Pos</option>
                            <?php foreach($listKodePos as $pos) : ?>
                                <option value="<?= $pos['kode_pos'] ?>"><?= $pos['kode_pos'] ?></option>
                            <?php endforeach ?>
                        </select>
                        
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_telp" class="col-sm-2 col-form-label">NO Telp</label>
                    <div class="col-sm-10">
                        <input type="number" name="no_telp" id="no_telp" class="form-control" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="program_studi" class="col-sm-2 col-form-label">Program Studi</label>
                    <div class="col-sm-10">
                        <select id="program_studi" name="program_studi" class="form-control">
                            <option value="" disabled selected>Program Studi</option>
                            <option value="MKB">MKB</option>
                            <option value="PSTI">PSTI</option>
                            <option value="PGSD">PGSD</option>
                            <option value="PGPAUD">PGPAUD</option>
                            <option value="SISTEL">SISTEL</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" id="email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                    <div class="col-sm-10">
                        <select name="nip" id="nip" class="form-control">
                            <option value="" disabled selected>NIP</option>
                            <?php foreach($listDosen as $dosen) : ?>
                                <option value="<?= $dosen['nip'] ?>"><?= $dosen['nip'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                    <input type="submit" class="btn btn-primary" value="Tambah">
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    </body>
</html>