CREATE DATABASE db_digital_inv;

CREATE TABLE admin (
    id_admin int(5) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nama_admin char(100) NOT NULL,
    email_admin varchar(50) NOT NULL,
    no_hp_admin varchar(15) NOT NULL);

CREATE TABLE pelanggan (
    id_pelanggan int(5) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nama_pelanggan char(100) NOT NULL,
    email_pelanggan varchar(50) NOT NULL,
    no_hp_pelanggan varchar(15) NOT NULL);

CREATE TABLE paket (
    id_paket int(5) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nama_paket varchar(50) NOT NULL,
    harga_paket int(10) NOT NULL);

CREATE TABLE pesanan (
    id_pesanan int(5) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    total_pesanan int(10) NOT NULL,
    tgl_pesanan date NOT NULL,
    note_pesanan varchar(200) NOT NULL,
    FOREIGN KEY (id_admin) REFERENCES admin(id_admin)
    FOREIGN KEY (id_pelanggan) REFERENCES pelanggan(id_pelanggan)
    FOREIGN KEY (id_paket) REFERENCES paket(id_paket));
