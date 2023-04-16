<?php
    require ('pasienClass.php');

    $conn = mysqli_connect("localhost", "root", "1234","tugaspersonal1");

    $obj = new pasienClass($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title>Insert Barang</title>
</head>
<body>
    <div class="container-fluid py-5" style="width: 80%">
        <div class="d-flex justify-content-between">
            <a href="../index.php">
                <button class="btn btn-primary mb-4">Keluar</button>
            </a>
            <a href="insertPasien.php">
                <button class="btn btn-primary mb-4">Tambah Pasien</button>
            </a>
        </div>

        <div class="border border-radius p-3">
            <table class="table table-striped table-light">
                <thead>
                    <th>No.</th>
                    <th>Nama Pasien</th>
                    <th>NIK</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach( $obj->getPasien() as $item ) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $item["NamaPasien"]; ?></td>
                            <td><?= $item["NIK"]; ?></td>
                            <td><?= $item["TanggalLahir"]; ?></td>
                            <td><?= $item["Alamat"]; ?></td>
                            <td> <a href="editPasien.php?IdPasien=<?= $item["IdPasien"]; ?>"><button class="btn btn-primary">Ubah</button></a> <a href="deletePasien.php?IdPasien=<?= $item["IdPasien"]; ?>"><button class="btn btn-primary" >Hapus</button></a></td>
                        </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>