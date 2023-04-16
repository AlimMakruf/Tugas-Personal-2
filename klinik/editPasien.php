<?php
    require ('pasienClass.php');
    $conn = mysqli_connect("localhost", "root", "1234","tugaspersonal1");
    $obj = new pasienClass($conn);
    if(!$obj->getDetailPasien($_GET['IdPasien'])) die("Error : Id Barang tidak ada");
    if(isset($_POST["submit"])){
        $obj->setIdPasien($_POST["IdPasien"]);
        $obj->setNamaPasien($_POST["NamaPasien"]);
        $obj->setNIK($_POST["NIK"]);
        $obj->setTanggalLahir($_POST["TanggalLahir"]);
        $obj->setAlamat($_POST["Alamat"]);
    }

    if( isset($_POST["submit"]) ){
        // ambil data dari tiap element input form
        if( $obj->updatePasien() > 0 ){
            echo '<div class="alert alert-success" role="alert">
                Items Already edited!
            </div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">
                Failed to edit the Items!
            </div>';
        }
    }
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
    <div class="container-fluid p-5" style="width: 50%">
        <a href="index.php">
            <button class="btn btn-primary mb-4">Kembali</button>
        </a>
        <h2>Edit Pasien</h2>
        <form action="" method="post">
            <?php foreach( $obj->getDetailPasien($_GET['IdPasien']) as $item ) : ?>
            <div class="form-group">
                <label for="IdPasien">Id</label>
                <input class="form-control type="text" name="IdPasien" id="IdPasien" value="<?= $item["IdPasien"] ?>"/>
            </div>
            <div class="form-group">
                <label for="NamaPasien">Nama Pasien</label>
                <input class="form-control type="text" name="NamaPasien" id="NamaPasien" value="<?= $item["NamaPasien"]; ?>"/>
            </div>
            <div class="form-group">
                <label for="NIK">NIK</label>
                <input class="form-control type="text" name="NIK" id="NIK" value="<?= $item["NIK"]; ?>"/>
            </div>
            <div class="form-group">
                <label for="TanggalLahir">Tanggal Lahir</label>
                <input class="form-control type="Date" name="TanggalLahir" id="TanggalLahir" value="<?= $item["TanggalLahir"]; ?>"/>
            </div>
            <div class="form-group">
                <label for="Alamat">Alamat</label>
                <input class="form-control type="text" name="Alamat" id="Alamat" value="<?= $item["Alamat"]; ?>"/> 
            </div>
            <?php endforeach; ?>
            <a href="index.php"> 
                <button type="submit" class="btn btn-primary" name="submit">Edit Data</button>
            </a>
        </form>
    </div>
</body>
</html>