<?php
    require ('pasienClass.php');

    $conn = mysqli_connect("localhost", "root", "1234","tugaspersonal1");

    $obj = new pasienClass($conn);
    if(isset($_POST["NamaPasien"])){
        //$obj->setIdPasien($_POST["IdPasien"]);
        $obj->setNamaPasien($_POST["NamaPasien"]);
        $obj->setNIK($_POST["NIK"]);
        $obj->setTanggalLahir($_POST["TanggalLahir"]);
        $obj->setAlamat($_POST["Alamat"]);
    }

    if( isset($_POST["submit"]) ){
        // ambil data dari tiap element input form
        if( $obj->addPasien() > 0 ){
            echo '<div class="alert alert-success" role="alert">
                New Items Already Added!
            </div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">
                Failed to add new Items!
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
    <title>Document</title>
</head>
<body>

    <div class="container-fluid p-5" style="width: 50%">
        <a href="index.php">
            <button class="btn btn-primary mb-4">Kembali</button>
        </a>
        <h2>Insert Pasien</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="NamaPasien">Nama Pasien</label>
                <input class="form-control" type="text" name="NamaPasien" id="NamaPasien"/>
            </div>
            <div class="form-group">
                <label for="NIK">NIK</label>
                <input class="form-control" type="text" name="NIK" id="NIK"/>
            </div>
            <div class="form-group">
                <label for="TanggalLahir">Tanggal Lahir</label>
                <input class="form-control" type="date" name="TanggalLahir" id="TanggalLahir"/>
            </div>
            <div class="form-group">
                <label for="Alamat">Alamat</label>  
                <input class="form-control" type="text" name="Alamat" id="Alamat"/> 
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Simpan Data</button>
        </form>

        </div>

</body>
</html>