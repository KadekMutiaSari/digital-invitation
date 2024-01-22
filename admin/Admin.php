<?php
require_once '../dbconfig/dbconfig.php';
class Admin
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

	public function getAllAdmin()
    {
        $stmt = $this->pdo->query("SELECT * FROM admin");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
