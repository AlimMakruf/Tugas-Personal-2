<?php
    require ('pasienClass.php');
    $conn = mysqli_connect("localhost", "root", "1234","tugaspersonal1");
    $obj = new pasienClass($conn);
    if(!$obj->getDetailPasien($_GET['IdPasien'])) die("Error : Id Barang tidak ada");
    if($obj->deletePasien($_GET['IdPasien']) > 0){
        echo "<script>
            alert('data berhasil di hapus');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('data gagal di hapus');
            document.location.href = 'index.php';
        </script>";
    }
?>
