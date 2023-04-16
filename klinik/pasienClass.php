<?php
    class pasienClass {
        private $IdPasien;
        private $NamaPasien;
        private $NIK;
        private $TanggalLahir;
        private $Alamat;

        private $conn;
        
        public function __construct($database){
            $this->conn = $database;
        }

        function setIdPasien($IdPasien){
            $this->IdPasien = $IdPasien;
        }

        function setNamaPasien($namaPasien){
            $this->NamaPasien = $namaPasien;
        }

        function setNIK($nik){
            $this->NIK = $nik;
        }

        function setTanggalLahir($tanggalLahir){
            $this->TanggalLahir = $tanggalLahir;
        }

        function setAlamat($alamat){
            $this->Alamat = $alamat;
        }

        function getIdPasien(){
            return $IdPasien;
        }

        function getNamaPasien(){
            return $NamaPasien;
        }

        function getNIK(){
            return $NIK;
        }

        function getTanggalLahir(){
            return $TanggalLahir;
        }

        function getAlamat(){
            return $Alamat;
        }

        function addPasien(){
            try {
                $query = "INSERT INTO klinik(`NamaPasien`,`NIK`,`TanggalLahir`,`Alamat`) VALUES (?, ?, ?, ?)";
                $prepareDB = $this->conn->prepare($query);
                $sqlAddBarang = $prepareDB->execute([$this->NamaPasien, $this->NIK, $this->TanggalLahir, $this->Alamat]);
                return $sqlAddBarang;
            } catch (Exception $e) {
                throw $e;
            }
        }

        function getPasien(){
            $query = "SELECT * FROM klinik";
            $result = mysqli_query($this->conn, $query);
            $rows = [];
            while( $row = mysqli_fetch_assoc($result) ){
                $rows[] = $row;
            }

            return $rows;
        }

        function updatePasien(){
            try {
                $query = "UPDATE klinik SET NamaPasien=?, NIK=?, TanggalLahir=?, Alamat=? WHERE IdPasien=?";
                $prepareDB = $this->conn->prepare($query);
                $sqlUpdateBarang = $prepareDB->execute([$this->NamaPasien, $this->NIK, $this->TanggalLahir, $this->Alamat, $this->IdPasien]);
                return mysqli_affected_rows($this->conn);
            } catch (Exception $e) {
                throw $e;
            }
        }

        function getDetailPasien($IdPasien){
            try {
                $query = "SELECT IdPasien, NamaPasien, NIK, TanggalLahir, Alamat FROM klinik WHERE IdPasien = $IdPasien";
                $result = mysqli_query($this->conn, $query);
                $rows = [];
                while( $row = mysqli_fetch_assoc($result) ){
                    $rows[] = $row;
                }

                return $rows;
            } catch (Exception $e) {
                throw $e;
            }
        }

        function deletePasien($IdPasien){
            try {
                mysqli_query($this->conn, "DELETE FROM klinik WHERE IdPasien = $IdPasien");
                return mysqli_affected_rows($this->conn);
            } catch (Exception $e) {
                throw $e;
            }
        }
    }
?>