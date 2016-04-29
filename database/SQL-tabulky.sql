CREATE TABLE UZIVATELE
(
  id_uzi      INT(6) AUTO_INCREMENT,
  jmeno       VARCHAR(60),
  prijmeni    VARCHAR(60),
  prava   VARCHAR(5),
  email   VARCHAR(60),
  PRIMARY KEY (id_uzi) 
);

CREATE TABLE DOTACE
(
  id_dotace  INT(6) AUTO_INCREMENT,
  hodnota   INT(9),
  datum_zapsani DATE,
  presny_cas TIME,
  typ_produktu   VARCHAR(30),
  id_uzi  INT(60),
  FOREIGN KEY (id_uzi) REFERENCES UZIVATELE(id_uzi),
  PRIMARY KEY (id_dotace)
);

CREATE TABLE SEZ_BENEFITU
(
  id_benefitu     INT(9) AUTO_INCREMENT,
  dotace          INT(6),
  zpusob_platby   VARCHAR(30),
  datum_naskoceni_benefitu DATE ,
  datum_vyplaceni_benefitu DATE ,
  poznamky   VARCHAR(200),
  FOREIGN KEY (dotace) REFERENCES DOTACE(id_dotace),
  PRIMARY KEY (id_benefitu) 
);

CREATE TABLE DODAVATELE
(
  id_dodavatele INT(6)  AUTO_INCREMENT,
  nazev_dodavatele  VARCHAR(60),
  PRIMARY KEY(id_dodavatele)
);

CREATE TABLE PRODUKTY
(
  id_produktu     INT(6) AUTO_INCREMENT,
  dodavatel       INT(6),
  FOREIGN KEY (dodavatel) REFERENCES DODAVATELE(id_dodavatele),
  PRIMARY KEY (id_produktu) 
);

CREATE TABLE MOBIL
(
  id_mobil  INT(6) AUTO_INCREMENT,
  ref_produkt  INT(6),
  jmeno_produktu  VARCHAR(60),
  cena_produktu   INT(9),
  datum_nakupu	  DATE,
  serial_number   VARCHAR(30),
  imei            VARCHAR(30),
  FOREIGN KEY (ref_produkt) REFERENCES PRODUKTY(id_produktu),		
  PRIMARY KEY(id_mobil)
);

CREATE TABLE TABLET
(
  id_tablet  INT(6)  AUTO_INCREMENT,
  ref_produkt  INT(6),
  jmeno_produktu  VARCHAR(60),
  cena_produktu   INT(9),
  datum_nakupu	  DATE,
  serial_number   VARCHAR(30),
  imei            VARCHAR(30),
  verze    INT(3),
  FOREIGN KEY (ref_produkt) REFERENCES PRODUKTY(id_produktu),		
  PRIMARY KEY(id_tablet)
);

CREATE TABLE NAROKY_BEN
(
  ben_id_uzi        INT(6),
  ben_id_benefitu   INT(9),
  FOREIGN KEY (ben_id_uzi) REFERENCES UZIVATELE(id_uzi),
  FOREIGN KEY (ben_id_benefitu) REFERENCES SEZ_BENEFITU(id_benefitu)
);

CREATE TABLE NAROKY_PRO
(
  pro_id_produktu   INT(6),
  pro_id_benefitu   INT(9),
  FOREIGN KEY (pro_id_produktu) REFERENCES PRODUKTY(id_produktu),
  FOREIGN KEY (pro_id_benefitu) REFERENCES SEZ_BENEFITU(id_benefitu)
);                 

CREATE TABLE SSO
(

  jmeno       VARCHAR(60),
  prijmeni    VARCHAR(60),
  prava   VARCHAR(5),
  email   VARCHaR(60),
  heslo   VARCHAR(30),
  PRIMARY KEY (email) 

);
         