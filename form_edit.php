<?php 
include('library.php');
$lib = new Library();
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $lib->update($_POST['nim'], $_POST['nama'], $_POST['tanggal_lahir'], $_POST['alamat'], $_POST['kode_pos'], $_POST['no_telp'], $_POST['program_studi'], $_POST['email'], $_POST['nip']);
    header('Location: index.php');
} else if(!isset($_GET['mahasiswa']))
{
    header('Location: index.php');
}

$nim = $_GET['mahasiswa'];
$listKodePos = $lib->showKodePos();
$listDosen = $lib->showDosen();
$mahasiswa = $lib->get_by_id($nim);
$program_studi = ['MKB', 'PSTI', 'PGSD', 'PGPAUD', 'SISTEL'];



?>
<html>
    <head>
        <title>Update Mahasiswa</title>
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Update Mahasiswa</h3>
            </div>
            <div class="card-body">
            <form method="post" action="">
                <div class="form-group row">
                    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                    <input type="number" name="nim" class="form-control" id="nim" value="<?= $mahasiswa['nim'] ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" id="nama" value="<?= $mahasiswa['nama'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="<?= $mahasiswa['tanggal_lahir']?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="alamat" id="alamat"><?= $mahasiswa['alamat'] ?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="kode_pos" class="col-sm-2 col-form-label">Kode Pos</label>
                    <div class="col-sm-10">
                        <select name="kode_pos" id="kode_pos" class="form-control">
                            <option value="" disabled>Kode Pos</option>
                            <?php foreach($listKodePos as $pos) : ?>
                                <option value="<?= $pos['kode_pos'] ?>" <?= $mahasiswa['kode_pos'] == $pos['kode_pos'] ? 'selected' : '' ?>><?= $pos['kode_pos'] ?></option>
                            <?php endforeach ?>
                        </select>
                        
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_telp" class="col-sm-2 col-form-label">NO Telp</label>
                    <div class="col-sm-10">
                        <input type="number" name="no_telp" id="no_telp" class="form-control" value="<?= $mahasiswa['no_telp']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="program_studi" class="col-sm-2 col-form-label">Program Studi</label>
                    <div class="col-sm-10">
                        <select id="program_studi" name="program_studi" class="form-control">
                            <option value="" disabled selected>Program Studi</option>
                            <?php foreach($program_studi as $studi) : ?>
                                <option value="<?= $studi ?>" <?= $mahasiswa['program_studi'] == $studi ? 'selected' : '' ?>><?= $studi ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" id="email" value="<?= $mahasiswa['email'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                    <div class="col-sm-10">
                        <select name="nip" id="nip" class="form-control">
                            <option value="" disabled selected>NIP</option>
                            <?php foreach($listDosen as $dosen) : ?>
                                <option value="<?= $dosen['nip'] ?>" <?= $mahasiswa['nip'] == $dosen['nip'] ? 'selected' : '' ?> ><?= $dosen['nip'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                    <input type="submit" class="btn btn-primary" value="Edit">
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    </body>
</html>