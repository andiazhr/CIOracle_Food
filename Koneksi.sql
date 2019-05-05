CREATE TABLE PESANAN (
ID_PESANAN INT NOT NULL,
NAMA_PELANGGAN VARCHAR2(50),
NO_HP_PELANGGAN VARCHAR2(30),
TANGGAL_PEMBELIAN DATE,
ALAMAT_PELANGGAN VARCHAR2(200),
ID_MAKANAN INT,
HARGA_MAKANAN VARCHAR2(100),
JUMBEL_MAKANAN INT,
ID_MINUMAN INT,
HARGA_MINUMAN VARCHAR2(100),
JUMBEL_MINUMAN INT,
PRIMARY KEY (ID_PESANAN));

CREATE SEQUENCE ID_PESANAN_ID_AI MINVALUE 0 START WITH 1 INCREMENT BY 1;

CREATE OR REPLACE TRIGGER ID_PESANAN_AI 
   BEFORE insert 
   ON PESANAN 
   FOR EACH ROW
BEGIN
      SELECT ID_PESANAN_ID_AI.NEXTVAL INTO :new.ID_PESANAN FROM DUAL;

END;

CREATE OR REPLACE PROCEDURE INSERT_PESANAN(
       P_NAMA_PELANGGAN IN PESANAN.NAMA_PELANGGAN%TYPE,
       P_NO_HP_PELANGGAN IN PESANAN.NO_HP_PELANGGAN%TYPE,
       P_TANGGAL_PEMBELIAN IN PESANAN.TANGGAL_PEMBELIAN%TYPE,
       P_ALAMAT_PELANGGAN IN PESANAN.ALAMAT_PELANGGAN%TYPE,
       P_ID_MAKANAN IN PESANAN.ID_MAKANAN%TYPE,
       P_JUMBEL_MAKANAN IN PESANAN.JUMBEL_MAKANAN%TYPE,
	   P_ID_MINUMAN IN PESANAN.ID_MINUMAN%TYPE,
       P_JUMBEL_MINUMAN IN PESANAN.JUMBEL_MINUMAN%TYPE)
IS
BEGIN

  INSERT 
  INTO PESANAN 
  ("ID_PESANAN", "NAMA_PELANGGAN", "NO_HP_PELANGGAN", "TANGGAL_PEMBELIAN", "ALAMAT_PELANGGAN", "ID_MAKANAN",
   "JUMBEL_MAKANAN", "ID_MINUMAN",  "JUMBEL_MINUMAN") 
  VALUES (ID_PESANAN_ID_AI.NEXTVAL, P_NAMA_PELANGGAN, P_NO_HP_PELANGGAN, TO_DATE(SYSDATE), P_ALAMAT_PELANGGAN, P_ID_MAKANAN, 
          P_JUMBEL_MAKANAN, P_ID_MINUMAN, P_JUMBEL_MINUMAN);

  COMMIT;

END;

CREATE OR REPLACE PROCEDURE DELETE_PESANAN (
    p_id_pesanan IN ITSFOOD.PESANAN.ID_PESANAN%TYPE)
IS
BEGIN
    DELETE FROM ITSFOOD.PESANAN WHERE ID_PESANAN = ID_PESANAN;
END;

CREATE OR REPLACE PROCEDURE SELECT_PESANAN (
    p_id_pesanan IN ITSFOOD.PESANAN.ID_PESANAN%TYPE,
    p_pesanan_display OUT SYS_REFCURSOR)
    IS
    BEGIN
    OPEN p_pesanan_display FOR SELECT PESANAN.ID_PESANAN, PESANAN.NAMA_PELANGGAN, PESANAN.NO_HP_PELANGGAN, PESANAN.TANGGAL_PEMBELIAN, 
         PESANAN.ALAMAT_PELANGGAN, MAKANAN.NAMA_MAKANAN, MAKANAN.HARGA_MAKANAN, PESANAN.JUMBEL_MAKANAN, MINUMAN.NAMA_MINUMAN, 
         MINUMAN.HARGA_MINUMAN, PESANAN.JUMBEL_MINUMAN, (MAKANAN.HARGA_MAKANAN*PESANAN.JUMBEL_MAKANAN)+(MINUMAN.HARGA_MINUMAN*PESANAN.JUMBEL_MINUMAN)
          FROM PESANAN INNER JOIN MAKANAN ON PESANAN.ID_MAKANAN = MAKANAN.ID_MAKANAN
          INNER JOIN MINUMAN ON PESANAN.ID_MINUMAN = MINUMAN.ID_MINUMAN;
    END;
    
SELECT SUM((MAKANAN.HARGA_MAKANAN * PESANAN.JUMBEL_MAKANAN)+(MINUMAN.HARGA_MINUMAN * PESANAN.JUMBEL_MINUMAN))
FROM PESANAN INNER JOIN MAKANAN ON PESANAN.ID_MAKANAN = MAKANAN.ID_MAKANAN 
INNER JOIN MINUMAN ON PESANAN.ID_MINUMAN = MINUMAN.ID_MINUMAN
WHERE TANGGAL_PEMBELIAN LIKE SYSDATE ;

SELECT GET_TOTAL_PENDAPATAN(1) FROM DUAL;
SELECT GET_STOK_MAKANAN(1) FROM DUAL;
SELECT GET_STOK_MINUMAN(1) FROM DUAL;

/*MAKANAN*/
CREATE TABLE MAKANAN (
ID_MAKANAN INT NOT NULL,
NAMA_MAKANAN VARCHAR2(50),
TOPPING VARCHAR2(50),
GAMBAR_MAKANAN VARCHAR2(100),
ICON_MK VARCHAR2(100),
DESKRIPSI_MAKANAN VARCHAR2(200),
HARGA_MAKANAN VARCHAR(100),
STOK_MAKANAN INT,
PRIMARY KEY (ID_MAKANAN));

DROP TABLE MAKANAN;

INSERT INTO MAKANAN 
VALUES(
ID_MAKANAN_ID_AI.NEXTVAL,'NASGOR UDANG','',
'NASI GORENG YANG DIBUMBUI DENGAN BUMBU TRADISIONAL YANG ENAK YANG DI LENGKAPI UDANG KECIL SAUS TIRAM','12000',10
);

SELECT * FROM MAKANAN;

CREATE SEQUENCE ID_MAKANAN_ID_AI MINVALUE 0 START WITH 1 INCREMENT BY 1;

CREATE OR REPLACE TRIGGER ID_MAKANAN_AI 
   BEFORE insert 
   ON MAKANAN 
   FOR EACH ROW
BEGIN
      SELECT ID_MAKANAN_ID_AI.NEXTVAL INTO :new.ID_MAKANAN FROM DUAL;

END;

CREATE OR REPLACE PROCEDURE INSERT_MAKANAN(
       P_NAMA_MAKANAN IN MAKANAN.NAMA_MAKANAN%TYPE,
       P_TOPPING IN MAKANAN.TOPPING%TYPE,
	   P_GAMBAR_MAKANAN IN MAKANAN.GAMBAR_MAKANAN%TYPE,
       P_ICON_MAKANAN IN MAKANAN.ICON_MK%TYPE,
	   P_DESKRIPSI_MAKANAN IN MAKANAN.DESKRIPSI_MAKANAN%TYPE,
       P_HARGA_MAKANAN IN MAKANAN.HARGA_MAKANAN%TYPE,
	   P_STOK_MAKANAN IN MAKANAN.STOK_MAKANAN%TYPE)
IS
BEGIN

  INSERT INTO MAKANAN ("ID_MAKANAN", "NAMA_MAKANAN", "TOPPING", "GAMBAR_MAKANAN", "ICON_MK", "DESKRIPSI_MAKANAN", "HARGA_MAKANAN", "STOK_MAKANAN") 
  VALUES (ID_MAKANAN_ID_AI.NEXTVAL, P_NAMA_MAKANAN,P_TOPPING,P_GAMBAR_MAKANAN, P_ICON_MAKANAN,P_DESKRIPSI_MAKANAN,P_HARGA_MAKANAN,P_STOK_MAKANAN);

  COMMIT;

END;

CREATE OR REPLACE PROCEDURE UPDATE_MAKANAN (
	   P_ID_MAKANAN IN MAKANAN.ID_MAKANAN%TYPE,
       P_NAMA_MAKANAN IN MAKANAN.NAMA_MAKANAN%TYPE,
       P_TOPPING IN MAKANAN.TOPPING%TYPE,
	   P_GAMBAR_MAKANAN IN MAKANAN.GAMBAR_MAKANAN%TYPE,
       P_ICON_MAKANAN IN MAKANAN.ICON_MK%TYPE,
	   P_DESKRIPSI_MAKANAN IN MAKANAN.DESKRIPSI_MAKANAN%TYPE,
       P_HARGA_MAKANAN IN MAKANAN.HARGA_MAKANAN%TYPE,
	   P_STOK_MAKANAN IN MAKANAN.STOK_MAKANAN%TYPE) 
IS  
BEGIN  
UPDATE MAKANAN 
SET 
ID_MAKANAN=ID_MAKANAN, NAMA_MAKANAN=P_NAMA_MAKANAN, GAMBAR_MAKANAN=P_GAMBAR_MAKANAN, 
DESKRIPSI_MAKANAN=P_DESKRIPSI_MAKANAN, HARGA_MAKANAN=P_HARGA_MAKANAN, STOK_MAKANAN=P_STOK_MAKANAN
WHERE ID_MAKANAN=ID_MAKANAN;  
COMMIT;  
END;

CREATE OR REPLACE FUNCTION         GET_STOK_MAKANAN 
RETURN INT
AS

V_STOK_MAKANAN INT;

BEGIN

    SELECT SUM(STOK_MAKANAN) INTO V_STOK_MAKANAN
    FROM MAKANAN;
    RETURN V_STOK_MAKANAN;
END;

CREATE OR REPLACE PROCEDURE DELETE_MAKANAN (
    p_id_makanan IN ITSFOOD.MAKANAN.ID_MAKANAN%TYPE)
IS
BEGIN
    DELETE FROM ITSFOOD.MAKANAN WHERE ID_MAKANAN = p_id_makanan;
END;

CREATE OR REPLACE PROCEDURE SELECT_MAKANAN (
    p_id_MAKANAN IN ITSFOOD.MAKANAN.ID_MAKANAN%TYPE,
    p_makanan_display OUT SYS_REFCURSOR)
IS
BEGIN
OPEN p_makanan_display FOR SELECT ID_MAKANAN, NAMA_MAKANAN, GAMBAR_MAKANAN, DESKRIPSI_MAKANAN, HARGA_MAKANAN, STOK_MAKANAN
     FROM MAKANAN WHERE ID_MAKANAN = p_id_makanan;
END;

/*MINUMAN*/

CREATE TABLE MINUMAN (
ID_MINUMAN INT NOT NULL,
NAMA_MINUMAN VARCHAR2(50),
GAMBAR_MINUMAN VARCHAR2(100),
GAMBAR_TOPPING_MM VARCHAR2(100),
DESKRIPSI_MINUMAN VARCHAR2(200),
HARGA_MINUMAN VARCHAR(100),
STOK_MINUMAN INT,
PRIMARY KEY (ID_MINUMAN));

DROP TABLE MINUMAN;

CREATE SEQUENCE ID_MINUMAN_ID_AI MINVALUE 0 START WITH 1 INCREMENT BY 1;

CREATE OR REPLACE TRIGGER ID_MINUMAN_AI 
   BEFORE insert 
   ON MINUMAN 
   FOR EACH ROW
BEGIN
      SELECT ID_MINUMAN_ID_AI.NEXTVAL INTO :new.ID_MINUMAN FROM DUAL;

END;

DROP TABLE MINUMAN;

INSERT INTO MINUMAN
VALUES(
ID_MINUMAN_ID_AI.NEXTVAL,'THAI TEA','',
'TEH THAILAND YANG ENAK','8000',10
);

SELECT * FROM MINUMAN;

CREATE OR REPLACE PROCEDURE INSERT_MINUMAN(
	   P_ID_MINUMAN IN MINUMAN.ID_MINUMAN%TYPE,
       P_NAMA_MINUMAN IN MINUMAN.NAMA_MINUMAN%TYPE,
	   P_GAMBAR_MINUMAN IN MINUMAN.GAMBAR_MINUMAN%TYPE,
	   P_DESKRIPSI_MINUMAN IN MINUMAN.DESKRIPSI_MINUMAN%TYPE,
       P_HARGA_MINUMAN IN MINUMAN.HARGA_MINUMAN%TYPE,
	   P_STOK_MINUMAN IN MINUMAN.STOK_MINUMAN%TYPE)
IS
BEGIN

  INSERT INTO MINUMAN ("ID_MINUMAN", "NAMA_MINUMAN", "GAMBAR_MINUMAN", "DESKRIPSI_MINUMAN", "HARGA_MINUMAN", "STOK_MINUMAN") 
  VALUES (P_ID_MINUMAN, P_NAMA_MINUMAN,P_GAMBAR_MINUMAN, P_DESKRIPSI_MINUMAN,P_HARGA_MINUMAN,P_STOK_MINUMAN);

  COMMIT;

END;

CREATE OR REPLACE PROCEDURE UPDATE_MINUMAN (
	   P_ID_MINUMAN IN MINUMAN.ID_MINUMAN%TYPE,
       P_NAMA_MINUMAN IN MINUMAN.NAMA_MINUMAN%TYPE,
	   P_GAMBAR_MINUMAN IN MINUMAN.GAMBAR_MINUMAN%TYPE,
	   P_DESKRIPSI_MINUMAN IN MINUMAN.DESKRIPSI_MINUMAN%TYPE,
       P_HARGA_MINUMAN IN MINUMAN.HARGA_MINUMAN%TYPE,
	   P_STOK_MINUMAN IN MINUMAN.STOK_MINUMAN%TYPE)
IS  
BEGIN  
UPDATE MINUMAN 
SET 
ID_MINUMAN=ID_MINUMAN, NAMA_MINUMAN=P_NAMA_MINUMAN, GAMBAR_MINUMAN=P_GAMBAR_MINUMAN, 
DESKRIPSI_MINUMAN=P_DESKRIPSI_MINUMAN, HARGA_MINUMAN=P_HARGA_MINUMAN, STOK_MINUMAN=P_STOK_MINUMAN
WHERE ID_MINUMAN=ID_MINUMAN;  
COMMIT;  
END;

CREATE OR REPLACE FUNCTION         GET_STOK_MINUMAN 
RETURN INT
AS

V_STOK_MINUMAN INT;

BEGIN

    SELECT SUM(STOK_MINUMAN) INTO V_STOK_MINUMAN
    FROM MINUMAN;
    RETURN V_STOK_MINUMAN;
END;

CREATE OR REPLACE PROCEDURE DELETE_MINUMAN (
    p_id_minuman IN ITSFOOD.MINUMAN.ID_MINUMAN%TYPE)
IS
BEGIN
    DELETE FROM ITSFOOD.MINUMAN WHERE ID_MINUMAN = p_id_minuman;
END;

CREATE OR REPLACE PROCEDURE SELECT_MINUMAN (
    p_id_minuman IN ITSFOOD.MINUMAN.ID_MINUMAN%TYPE,
    p_minuman_display OUT SYS_REFCURSOR)
IS
BEGIN
OPEN p_minuman_display FOR SELECT ID_MINUMAN, NAMA_MINUMAN, GAMBAR_MINUMAN, DESKRIPSI_MINUMAN, HARGA_MINUMAN, STOK_MINUMAN 
     FROM MINUMAN WHERE ID_MINUMAN = p_id_minuman;
END;

/*TRIGGER*/

CREATE OR REPLACE TRIGGER TERBELI
AFTER INSERT ON PESANAN 
FOR EACH ROW
BEGIN
  UPDATE MAKANAN SET STOK_MAKANAN = STOK_MAKANAN - :NEW.JUMBEL_MAKANAN WHERE ID_MAKANAN = :NEW.ID_MAKANAN;
  UPDATE MINUMAN SET STOK_MINUMAN = STOK_MINUMAN - :NEW.JUMBEL_MINUMAN WHERE ID_MINUMAN = :NEW.ID_MINUMAN;
END TERBELI;

/*FUNCTION*/
CREATE OR REPLACE FUNCTION GET_TOTAL_PENDAPATAN
RETURN INT
IS V_TOTAL_PENDAPATAN INT;
BEGIN 
SELECT SUM((MAKANAN.HARGA_MAKANAN * PESANAN.JUMBEL_MAKANAN)+(MINUMAN.HARGA_MINUMAN * PESANAN.JUMBEL_MINUMAN)) INTO V_TOTAL_PENDAPATAN
FROM PESANAN INNER JOIN MAKANAN ON PESANAN.ID_MAKANAN = MAKANAN.ID_MAKANAN 
INNER JOIN MINUMAN ON PESANAN.ID_MINUMAN = MINUMAN.ID_MINUMAN
WHERE TANGGAL_PEMBELIAN LIKE SYSDATE ;
RETURN V_TOTAL_PENDAPATAN;
END; 

CREATE TABLE USERS (
ID_USERS INT PRIMARY KEY,
USERNAME VARCHAR(50),
EMAIL VARCHAR(50),
PASS VARCHAR(50)
);

DROP TABLE TRANSAKSI;
DROP TABLE USERS;

CREATE TABLE TRANSAKSI (
    ID_TRANSAKSI INT PRIMARY KEY,
    ID_PESANAN INT,
    ID_MAKANAN INT,
    JUMBEL_MAKANAN INT,
    ID_MINUMAN INT,
    JUMBEL_MINUMAN INT);


INSERT INTO ITSFOOD.MAKANAN VALUES (1, 'Nasi Goreng Laut', '', 'Nasi Goreng Udang adalah Nasi Goreng yang Udangnya', '20000', 15);

INSERT ALL 
INTO ITSFOOD.MAKANAN VALUES (2, 'Nasi Goreng Udang', '', 'Nasi Goreng Udang adalah Nasi Goreng yang ada udangnya', '12000', 12)
INTO ITSFOOD.MAKANAN VALUES (3, 'Nasi Goreng Petasan', '', 'Nasi Goreng Petasan yang membuat lidah orang yang memakannya meledak di mulut', '20000', 10)
INTO ITSFOOD.MAKANAN VALUES (4, 'Nasi Goreng Keju', '', 'Nasi Goreng Keju ', '14000', 18)
INTO ITSFOOD.MAKANAN VALUES (5, 'Nasi Goreng Pisan', '', 'Nasi Goreng yang dilengkapi suiran ayam', '20000', 20)
INTO ITSFOOD.MAKANAN VALUES (6, 'Nasi Goreng ayam katsu', '', 'ayam kastu', '16000', 8)

SELECT 1 FROM ITSFOOD.MAKANAN;

INSERT INTO ITSFOOD.MINUMAN VALUES (1, 'Es Jeruk', '', 'Enak lhoo', '5000', 20);

INSERT ALL 
INTO ITSFOOD.MINUMAN VALUES (2, 'Milkshake', '', 'banyak pilihan rasa lhoo', '8000', 12)
INTO ITSFOOD.MINUMAN VALUES (3, 'Coklat Panas', '', 'Coklatnya coklat yang dark', '6000', 15)
INTO ITSFOOD.MINUMAN VALUES (4, 'Es Teh Manis', '', 'Gulanya gula biang ', '2500', 25)
INTO ITSFOOD.MINUMAN VALUES (5, 'Jus Mangga', '', 'Mangga Apel', '70000', 20)
INTO ITSFOOD.MINUMAN VALUES (6, 'Thai tea', '', 'teh thailand', '9000', 10)

SELECT 1 FROM ITSFOOD.MINUMAN;

INSERT INTO ITSFOOD.USERS VALUES (1, 'admin', 'admin@gmail.com', 'admin')