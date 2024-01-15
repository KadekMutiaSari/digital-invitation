<?php
require_once 'dbconfig.php';
class Pelanggan
{
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	// Method for pelanggan registration
	public function registerPelanggan($nama_pelanggan, $email_pelanggan, $password_pelanggan, $no_hp_pelanggan)
	{
		$stmt = $this->pdo->prepare("INSERT INTO pelanggan (nama_pelanggan, email_pelanggan, password_pelanggan, no_hp_pelanggan) VALUES (:nama_pelanggan, :email_pelanggan, :password_pelanggan, :no_hp_pelanggan)");
		$stmt->execute([
			'nama_pelanggan' => $nama_pelanggan, 
			'email_pelanggan' => $email_pelanggan, 
			'password_pelanggan' => $password_pelanggan,
			'no_hp_pelanggan' => $no_hp_pelanggan
		]);
	}


	// Method for pelanggan authentication
	public function authenticate($email_pelanggan, $password_pelanggan)
	{
		$stmt = $this->pdo->prepare("SELECT * FROM pelanggan WHERE email_pelanggan = :email_pelanggan AND password_pelanggan = :password_pelanggan");
		$stmt->execute(['email_pelanggan' => $email_pelanggan, 'password_pelanggan' => $password_pelanggan]);
		$pelanggan = $stmt->fetch();

		if ($pelanggan)
		{
			return $pelanggan;
		} 
		else 
		{
			return false;
		}
	}
}
