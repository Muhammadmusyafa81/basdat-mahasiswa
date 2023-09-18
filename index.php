<?php 
include('library.php');
$lib = new Library();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lib->add($_POST['nim'], $_POST['nama'], $_POST['tanggal_lahir'], $_POST['alamat'], $_POST['kode_pos'], $_POST['no_telp'], $_POST['program_studi'], $_POST['email'], $_POST['nip']);
} else if(isset($_GET['delete']))
{
    $nim = $_GET['delete'];
    $status_hapus = $lib->delete($nim);
    if($status_hapus)
    {
        header('Location: index.php');
    }
}
$data_mahasiswa = $lib->show();
?>
<html>
    <head>
        <title>Data Mahasiswa</title>
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <body>
    <div class="">
        <div class="card">
            <div class="card-header">
                <h3>Data mahasiswa</h3>
            </div>
            <div class="card-body table-responsive">
                <a href="form_add.php" class="btn btn-success">Tambah</a>
                <hr/>
                <table class="table table-bordered" width="60%">
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Tanggal_lahir</th>
                        <th>Alamat</th>
                        <th>Kode_pos</th>
                        <th>No_telp</th>
                        <th>Program_studi</th>
                        <th>Email</th>
                        <th>NIP</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($data_mahasiswa as $row): ?>
                        <tr>
                            <td><?= $row['nim'] ?></td>
                            <td><?= $row['nama'] ?></td>
                            <td><?= $row['tanggal_lahir'] ?></td>
                            <td><?= $row['alamat'] ?></td>
                            <td><?= $row['kode_pos'] ?></td>
                            <td><?= $row['no_telp'] ?></td>
                            <td><?= $row['program_studi'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['nip'] ?></td>
                            <td>
                                <a class='btn btn-info' href="form_edit.php?mahasiswa=<?= $row['nim'] ?>">Update</a>
                                <button class='btn btn-danger' onclick="deleteMhs('<?= $row['nim'] ?>')">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach?>
                </table>
            </div>
        </div>
    </div>
    <script>
        function deleteMhs(nim) {
            if (window.confirm("Apakah anda yakin ingin menghapusnya?")) {
                window.location.href = "?delete="+nim
            }
        }
    </script>
    </body>
</html>