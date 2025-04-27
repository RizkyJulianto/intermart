USE intermart;

CREATE TABLE tbbarang(
idbarang INT PRIMARY KEY,
kodebarang INT,
namabarang VARCHAR(30),
stok INT,
harga INT
);

CREATE TABLE pengguna(
iduser INT PRIMARY KEY,
username VARCHAR (20),
katasandi VARCHAR(15)
);

CREATE TABLE history(
idhistory INT PRIMARY KEY,
idbarang INT,
kodebarang INT,
namabarang VARCHAR(30),
stok INT,
harga INT,
tanggal DATETIME,
FOREIGN KEY (idbarang) REFERENCES tbbarang (idbarang)
);

