<?php
require_once '../dbconfig/dbconfig.php';
class Pesanan
{
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function authenticate($email_admin, $password_admin)
	{
		$stmt = $this->pdo->prepare("SELECT * FROM admin WHERE email_admin = :email_admin AND password_admin = :password_admin");
		$stmt->execute(['email_admin' => $email_admin, 'password_admin' => $password_admin]);
		$admin = $stmt->fetch();

		if ($admin)
		{
			return $admin;
		} 
		else 
		{
			return false;
		}
	}

    public function addPesanan($id_pelanggan, $id_paket, $tgl_pesanan, $note_pesanan, $status_pesanan) {
        // Gunakan prepared statement untuk menghindari SQL injection
        $stmt = $this->pdo->prepare("INSERT INTO pesanan (id_pelanggan, id_paket, tgl_pesanan, note_pesanan, status_pesanan) 
        VALUES (:id_pelanggan, :id_paket, :tgl_pesanan, :note_pesanan, :status_pesanan)");
        $stmt->bindParam(':id_pelanggan', $id_pelanggan);
        $stmt->bindParam(':id_paket', $id_paket);
        $stmt->bindParam(':tgl_pesanan', $tgl_pesanan);
        $stmt->bindParam(':note_pesanan', $note_pesanan);
        $stmt->bindParam(':status_pesanan', $status_pesanan, PDO::PARAM_STR);
    
        try {
            $stmt->execute();
            return true; // Berhasil menambahkan pesanan
        } catch (PDOException $e) {
            // Tangani kesalahan
            return false; // Gagal menambahkan pesanan
        }
    }

	public function getAllPesanan()
    {
        $stmt = $this->pdo->query("SELECT * FROM pesanan");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updatePesanan($id_pesanan, $status_pesanan) {
        // Gunakan prepared statement untuk menghindari SQL injection
        $stmt = $this->pdo->prepare("UPDATE pesanan SET status_pesanan = :status_pesanan WHERE id_pesanan = :id_pesanan");
        $stmt->bindParam(':id_pesanan', $id_pesanan);
        $stmt->bindParam(':status_pesanan', $status_pesanan);
    
        try {
            $stmt->execute();
            return true; // Berhasil mengubah
        } catch (PDOException $e) {
            // Tangani kesalahan
            return false; // Gagal mengubah
        }
    }
}
