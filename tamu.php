<?php
class Tamu {
    private $db;
    private $nama;
    private $email;
    private $no_telepon;
    private $alamat;
    private $keperluan;

    public function __construct(Database $database) {
        $this->db = $database->getKoneksi();
    }

    // Setter untuk data tamu
    public function setData($nama, $email, $no_telepon, $alamat, $keperluan) {
        $this->nama = $this->db->real_escape_string($nama);
        $this->email = $this->db->real_escape_string($email);
        $this->no_telepon = $this->db->real_escape_string($no_telepon);
        $this->alamat = $this->db->real_escape_string($alamat);
        $this->keperluan = $this->db->real_escape_string($keperluan);
    }

    // Setter untuk data tamu
    public function setData($nama, $email, $no_telepon, $alamat, $keperluan) {
        $this->nama = $this->db->real_escape_string($nama);
        $this->email = $this->db->real_escape_string($email);
        $this->no_telepon = $this->db->real_escape_string($no_telepon);
        $this->alamat = $this->db->real_escape_string($alamat);
        $this->keperluan = $this->db->real_escape_string($keperluan);
    }

    // Metode untuk menyimpan data tamu
    public function simpanTamu() {
        $query = "INSERT INTO daftar_tamu (nama, email, no_telepon, alamat, keperluan, waktu_kunjungan) 
                  VALUES (?, ?, ?, ?, ?, NOW())";
        
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sssss", 
            $this->nama, 
            $this->email, 
            $this->no_telepon, 
            $this->alamat, 
            $this->keperluan
        );
        
        return $stmt->execute();
    }

    // Metode untuk mengambil semua data tamu
    public function ambilSemuaTamu() {
        $query = "SELECT * FROM daftar_tamu ORDER BY waktu_kunjungan DESC";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Metode untuk menghapus tamu berdasarkan ID
    public function hapusTamu($id) {
        $query = "DELETE FROM daftar_tamu WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // Validasi input
    public function validasi($nama, $email, $no_telepon) {
        $errors = [];

        if (empty($nama)) {
            $errors[] = "Nama harus diisi";
        }

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email tidak valid";
        }

        if (empty($no_telepon) || !preg_match("/^[0-9]{10,12}$/", $no_telepon)) {
            $errors[] = "Nomor telepon tidak valid";
        }

        return $errors;
    }
}