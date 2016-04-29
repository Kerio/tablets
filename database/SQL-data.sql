
INSERT INTO UZIVATELE (jmeno, prijmeni, prava, email) VALUES ("Jiri", "Nohac", "admin", "jirnoh@seznam.cz");
INSERT INTO UZIVATELE (jmeno, prijmeni, prava, email) VALUES ("Zdenek", "Ziegler", "admin", "zdezie@seznam.cz");
INSERT INTO UZIVATELE (jmeno, prijmeni, prava, email) VALUES ("Michal", "Strunc", "admin", "michstr@seznam.cz");
INSERT INTO UZIVATELE (jmeno, prijmeni, prava, email) VALUES ("Karel", "Hrnec", "user", "karhrn@seznam.cz");
INSERT INTO UZIVATELE (jmeno, prijmeni, prava, email) VALUES ("Josef", "Pantofel", "user", "jospan@seznam.cz");
INSERT INTO UZIVATELE (jmeno, prijmeni, prava, email) VALUES ("Marek", "Poklicka", "user", "marpok@seznam.cz");
INSERT INTO UZIVATELE (jmeno, prijmeni, prava, email) VALUES ("Jakub", "Skrinka", "user", "jakskr@seznam.cz");
INSERT INTO UZIVATELE (jmeno, prijmeni, prava, email) VALUES ("Borivoj", "Cednik", "user", "borced@seznam.cz");
INSERT INTO UZIVATELE (jmeno, prijmeni, prava, email) VALUES ("Ladislav", "Lednicka", "user", "ladled@seznam.cz");
INSERT INTO UZIVATELE (jmeno, prijmeni, prava, email) VALUES ("Tomas", "Mrazak", "user", "tommra@seznam.cz");
INSERT INTO UZIVATELE (jmeno, prijmeni, prava, email) VALUES ("Petr", "Vidlicka", "user", "petvid@seznam.cz");
INSERT INTO UZIVATELE (jmeno, prijmeni, prava, email) VALUES ("Frantisek", "Nuz", "user", "franuz@seznam.cz");
INSERT INTO UZIVATELE (jmeno, prijmeni, prava, email) VALUES ("Jarmoir", "Lzice", "user", "jarlzi@seznam.cz");
INSERT INTO UZIVATELE (jmeno, prijmeni, prava, email) VALUES ("Ivan", "Drez", "user", "ivadre@seznam.cz");
INSERT INTO UZIVATELE (jmeno, prijmeni, prava, email) VALUES ("Richard", "Jablko", "user", "richjab@seznam.cz");
INSERT INTO UZIVATELE (jmeno, prijmeni, prava, email) VALUES ("Otakar", "Steak", "user", "otaste@seznam.cz");
INSERT INTO UZIVATELE (jmeno, prijmeni, prava, email) VALUES ("Ctirad", "Chleba", "user", "ctichle@seznam.cz");
INSERT INTO UZIVATELE (jmeno, prijmeni, prava, email) VALUES ("Alexandr", "Rohlik", "user", "aleroh@seznam.cz");


INSERT INTO DOTACE(hodnota, datum_zapsani, presny_cas, typ_produktu, id_uzi) VALUES (15600, "2014-02-20", "03:53:15", "tablet", 1);
INSERT INTO DOTACE(hodnota, datum_zapsani, presny_cas, typ_produktu, id_uzi) VALUES (20000, "2014-04-21", "12:33:46", "smartphone", 2);
INSERT INTO DOTACE(hodnota, datum_zapsani, presny_cas, typ_produktu, id_uzi) VALUES (10000, "2015-06-30", "16:58:01", "tablet", 3);


INSERT INTO SEZ_BENEFITU (dotace, zpusob_platby, datum_naskoceni_benefitu, poznamky) VALUES (1, "VISA CARD", "2016-07-31", null);
INSERT INTO SEZ_BENEFITU (dotace, zpusob_platby, datum_naskoceni_benefitu, poznamky) VALUES (2, "CASH", "2016-06-30", null);
INSERT INTO SEZ_BENEFITU (dotace, zpusob_platby, datum_naskoceni_benefitu, poznamky) VALUES (3, "BANK TRANSCATION", "2016-05-26", "Nove zbozi");
INSERT INTO SEZ_BENEFITU (dotace, zpusob_platby, datum_naskoceni_benefitu, poznamky) VALUES (2, "MASTER CARD", "2016-04-25", null);
INSERT INTO SEZ_BENEFITU (dotace, zpusob_platby, datum_naskoceni_benefitu, poznamky) VALUES (3, "VISA CARD", "2016-03-21", null);
INSERT INTO SEZ_BENEFITU (dotace, zpusob_platby, datum_naskoceni_benefitu, poznamky) VALUES (1, "CASH", "2016-02-20", "Stare zbozi");
INSERT INTO SEZ_BENEFITU (dotace, zpusob_platby, datum_naskoceni_benefitu, poznamky) VALUES (2, "CASH", "2016-01-16", null);
INSERT INTO SEZ_BENEFITU (dotace, zpusob_platby, datum_naskoceni_benefitu, poznamky) VALUES (1, "VISA CARD", "2016-12-15", null);
INSERT INTO SEZ_BENEFITU (dotace, zpusob_platby, datum_naskoceni_benefitu, poznamky) VALUES (3, "MASTER CARD", "2016-11-11", null);
INSERT INTO SEZ_BENEFITU (dotace, zpusob_platby, datum_naskoceni_benefitu, poznamky) VALUES (2, "MASTER CARD", "2016-10-10", "Absoltune nevim");
INSERT INTO SEZ_BENEFITU (dotace, zpusob_platby, datum_naskoceni_benefitu, poznamky) VALUES (2, "BANK TRANSCATION", "2016-09-6", null);
INSERT INTO SEZ_BENEFITU (dotace, zpusob_platby, datum_naskoceni_benefitu, poznamky) VALUES (1, "CASH", "2016-08-5", "Karta nefungovala");
INSERT INTO SEZ_BENEFITU (dotace, zpusob_platby, datum_naskoceni_benefitu, poznamky) VALUES (2, "CASH", "2016-07-1", null);
INSERT INTO SEZ_BENEFITU (dotace, zpusob_platby, datum_naskoceni_benefitu, poznamky) VALUES (3, "VISA CARD", "2016-06-30", null);
INSERT INTO SEZ_BENEFITU (dotace, zpusob_platby, datum_naskoceni_benefitu, poznamky) VALUES (1, "BANK TRANSACTION", "2016-05-25", "Karta funguje");
INSERT INTO SEZ_BENEFITU (dotace, zpusob_platby, datum_naskoceni_benefitu, poznamky) VALUES (1, "CASH", "2016-04-24", null);
INSERT INTO SEZ_BENEFITU (dotace, zpusob_platby, datum_naskoceni_benefitu, poznamky) VALUES (2, "MASTER CARD", "2016-03-20", null);
INSERT INTO SEZ_BENEFITU (dotace, zpusob_platby, datum_naskoceni_benefitu, poznamky) VALUES (2, "MASTER CARD", "2016-02-19", "Dosli zasoby");

INSERT INTO SEZ_BENEFITU (dotace, zpusob_platby, datum_naskoceni_benefitu, poznamky) VALUES (1, "CASH", "2016-02-19", "druhy mobil");
INSERT INTO SEZ_BENEFITU (dotace, zpusob_platby, datum_naskoceni_benefitu, poznamky) VALUES (3, "VISA CARD", "2016-03-19", "prvni tablet");
INSERT INTO SEZ_BENEFITU (dotace, zpusob_platby, datum_naskoceni_benefitu, poznamky) VALUES (3, "BANK TRANSACTION", "2016-04-19", "druhy tablet");

INSERT INTO DODAVATELE (nazev_dodavatele) VALUES ("ALZA");
INSERT INTO DODAVATELE (nazev_dodavatele) VALUES ("O2");
INSERT INTO DODAVATELE (nazev_dodavatele) VALUES ("T-MOBILE");
INSERT INTO DODAVATELE (nazev_dodavatele) VALUES ("VODAFONE");
INSERT INTO DODAVATELE (nazev_dodavatele) VALUES ("HEUREKA");


INSERT INTO PRODUKTY (dodavatel) VALUES (1);
INSERT INTO PRODUKTY (dodavatel) VALUES (2);
INSERT INTO PRODUKTY (dodavatel) VALUES (3);
INSERT INTO PRODUKTY (dodavatel) VALUES (4);
INSERT INTO PRODUKTY (dodavatel) VALUES (5);
INSERT INTO PRODUKTY (dodavatel) VALUES (3);
INSERT INTO PRODUKTY (dodavatel) VALUES (1);
INSERT INTO PRODUKTY (dodavatel) VALUES (2);
INSERT INTO PRODUKTY (dodavatel) VALUES (4);
INSERT INTO PRODUKTY (dodavatel) VALUES (3);


INSERT INTO MOBIL (ref_produkt, jmeno_produktu, cena_produktu, datum_nakupu, serial_number, imei) VALUES (1, "IPhone 5S 64GB", 15620, "2015-02-03", "1235454874asdasd", "2234870sdf");
INSERT INTO MOBIL (ref_produkt, jmeno_produktu, cena_produktu, datum_nakupu, serial_number, imei) VALUES (2, "IPhone 4S 16GB", 9820, "2015-03-07", "asd81223has89123basd", "9-08sdf234");
INSERT INTO MOBIL (ref_produkt, jmeno_produktu, cena_produktu, datum_nakupu, serial_number, imei) VALUES (3, "IPhone 6S 32GB", 22320, "2015-04-11", "8724has981b122890sdf", "2233409sdf");
INSERT INTO MOBIL (ref_produkt, jmeno_produktu, cena_produktu, datum_nakupu, serial_number, imei) VALUES (4, "Samsung Galaxy S4 16GB", 11520, "2015-05-14", "1287asd8712nasd0", "ccxv98w2234");
INSERT INTO MOBIL (ref_produkt, jmeno_produktu, cena_produktu, datum_nakupu, serial_number, imei) VALUES (5, "LG Nexus 5 16GB", 13005, "2015-06-18", "122897s89s2ns09sdf", "087fd234");


INSERT INTO TABLET (ref_produkt, jmeno_produktu, cena_produktu, datum_nakupu, serial_number, imei, verze) VALUES (6, "IPad v3 32GB", 12775, "2015-06-07", "2114787214nsdf0823", "287f23n283", 3);
INSERT INTO TABLET (ref_produkt, jmeno_produktu, cena_produktu, datum_nakupu, serial_number, imei, verze) VALUES (7, "Samsung Galaxy Pad v2 16GB", 11089, "2015-08-10", "1224789df82ndf09", "89sdf2b3498", 2);
INSERT INTO TABLET (ref_produkt, jmeno_produktu, cena_produktu, datum_nakupu, serial_number, imei, verze) VALUES (8, "Prestigo PB320 8GB", 5250, "2015-12-13", "2337dfn240sdf", "3344897f234nu", 1);
INSERT INTO TABLET (ref_produkt, jmeno_produktu, cena_produktu, datum_nakupu, serial_number, imei, verze) VALUES (9, "NVIDIA Shield 32GB", 13725, "2015-02-16", "234908dxn2309ssds", "23uy8yc234n", 1);
INSERT INTO TABLET (ref_produkt, jmeno_produktu, cena_produktu, datum_nakupu, serial_number, imei, verze) VALUES (10, "IPad v4 32 GB", 24625, "2015-04-18", "1234uysd8234mnsdf8", "23309df23m90", 4);


INSERT INTO NAROKY_BEN VALUES (1, 1);
INSERT INTO NAROKY_BEN VALUES (2, 2);
INSERT INTO NAROKY_BEN VALUES (3, 3);
INSERT INTO NAROKY_BEN VALUES (4, 4);
INSERT INTO NAROKY_BEN VALUES (5, 5);
INSERT INTO NAROKY_BEN VALUES (6, 6);
INSERT INTO NAROKY_BEN VALUES (7, 7);
INSERT INTO NAROKY_BEN VALUES (8, 8);
INSERT INTO NAROKY_BEN VALUES (9, 9);
INSERT INTO NAROKY_BEN VALUES (10, 10);
INSERT INTO NAROKY_BEN VALUES (11, 11);
INSERT INTO NAROKY_BEN VALUES (12, 12);
INSERT INTO NAROKY_BEN VALUES (13, 13);
INSERT INTO NAROKY_BEN VALUES (14, 14);
INSERT INTO NAROKY_BEN VALUES (15, 15);
INSERT INTO NAROKY_BEN VALUES (16, 16);
INSERT INTO NAROKY_BEN VALUES (17, 17);
INSERT INTO NAROKY_BEN VALUES (18, 18);

INSERT INTO NAROKY_BEN VALUES (1, 19);
INSERT INTO NAROKY_BEN VALUES (1, 20);
INSERT INTO NAROKY_BEN VALUES (1, 21);


INSERT INTO NAROKY_PRO VALUES (1, 1);
INSERT INTO NAROKY_PRO VALUES (2, 2);
INSERT INTO NAROKY_PRO VALUES (3, 3);
INSERT INTO NAROKY_PRO VALUES (4, 4);
INSERT INTO NAROKY_PRO VALUES (5, 5);
INSERT INTO NAROKY_PRO VALUES (6, 6);
INSERT INTO NAROKY_PRO VALUES (7, 7);
INSERT INTO NAROKY_PRO VALUES (8, 8);
INSERT INTO NAROKY_PRO VALUES (9, 9);
INSERT INTO NAROKY_PRO VALUES (10, 10);
INSERT INTO NAROKY_PRO VALUES (2, 11);
INSERT INTO NAROKY_PRO VALUES (5, 12);
INSERT INTO NAROKY_PRO VALUES (7, 13);
INSERT INTO NAROKY_PRO VALUES (9, 14);
INSERT INTO NAROKY_PRO VALUES (3, 15);
INSERT INTO NAROKY_PRO VALUES (6, 16);
INSERT INTO NAROKY_PRO VALUES (1, 17);
INSERT INTO NAROKY_PRO VALUES (4, 18);

INSERT INTO NAROKY_PRO VALUES (3, 19);
INSERT INTO NAROKY_PRO VALUES (6, 20);
INSERT INTO NAROKY_PRO VALUES (7, 21);



INSERT INTO `sso` (`jmeno`, `prijmeni`, `prava`, `email`, `heslo`) VALUES ('Jakub', 'Váverka', 'admin', 'jakvav@seznam.cz', 'adminjvaverka');
INSERT INTO `sso` (`jmeno`, `prijmeni`, `prava`, `email`, `heslo`) VALUES ('Josef', 'Novák', 'user', 'josnov@seznam.cz', 'josnov');

INSERT INTO `sso` (`jmeno`, `prijmeni`, `prava`, `email`, `heslo`) VALUES ("Jiri", "Nohac", "admin", "jirnoh@seznam.cz", "adminjnohac");
INSERT INTO `sso` (`jmeno`, `prijmeni`, `prava`, `email`, `heslo`) VALUES ("Zdenek", "Ziegler", "admin", "zdezie@seznam.cz", "adminzziegler");
INSERT INTO `sso` (`jmeno`, `prijmeni`, `prava`, `email`, `heslo`) VALUES ("Michal", "Strunc", "admin", "michstr@seznam.cz", "adminmstrunc");
INSERT INTO `sso` (`jmeno`, `prijmeni`, `prava`, `email`, `heslo`) VALUES ("Karel", "Hrnec", "user", "karhrn@seznam.cz", "karhrn");
INSERT INTO `sso` (`jmeno`, `prijmeni`, `prava`, `email`, `heslo`) VALUES ("Josef", "Pantofel", "user", "jospan@seznam.cz", "jospan");
INSERT INTO `sso` (`jmeno`, `prijmeni`, `prava`, `email`, `heslo`) VALUES ("Marek", "Poklicka", "user", "marpok@seznam.cz", "marpok");
INSERT INTO `sso` (`jmeno`, `prijmeni`, `prava`, `email`, `heslo`) VALUES ("Jakub", "Skrinka", "user", "jakskr@seznam.cz", "jakskr");
INSERT INTO `sso` (`jmeno`, `prijmeni`, `prava`, `email`, `heslo`) VALUES ("Borivoj", "Cednik", "user", "borced@seznam.cz", "borced");
INSERT INTO `sso` (`jmeno`, `prijmeni`, `prava`, `email`, `heslo`) VALUES ("Ladislav", "Lednicka", "user", "ladled@seznam.cz", "ladled");
INSERT INTO `sso` (`jmeno`, `prijmeni`, `prava`, `email`, `heslo`) VALUES ("Tomas", "Mrazak", "user", "tommra@seznam.cz", "tommra");
INSERT INTO `sso` (`jmeno`, `prijmeni`, `prava`, `email`, `heslo`) VALUES ("Petr", "Vidlicka", "user", "petvid@seznam.cz", "petvid");
INSERT INTO `sso` (`jmeno`, `prijmeni`, `prava`, `email`, `heslo`) VALUES ("Frantisek", "Nuz", "user", "franuz@seznam.cz", "franuz");
INSERT INTO `sso` (`jmeno`, `prijmeni`, `prava`, `email`, `heslo`) VALUES("Jarmoir", "Lzice", "user", "jarlzi@seznam.cz", "jarlzi");
INSERT INTO `sso` (`jmeno`, `prijmeni`, `prava`, `email`, `heslo`) VALUES ("Ivan", "Drez", "user", "ivadre@seznam.cz", "ivadre");
INSERT INTO `sso` (`jmeno`, `prijmeni`, `prava`, `email`, `heslo`) VALUES ("Richard", "Jablko", "user", "richjab@seznam.cz", "richjab");
INSERT INTO `sso` (`jmeno`, `prijmeni`, `prava`, `email`, `heslo`) VALUES ("Otakar", "Steak", "user", "otaste@seznam.cz", "otaste");
INSERT INTO `sso` (`jmeno`, `prijmeni`, `prava`, `email`, `heslo`) VALUES ("Ctirad", "Chleba", "user", "ctichle@seznam.cz", "ctichle");
INSERT INTO `sso` (`jmeno`, `prijmeni`, `prava`, `email`, `heslo`) VALUES ("Alexandr", "Rohlik", "user", "aleroh@seznam.cz", "aleroh");