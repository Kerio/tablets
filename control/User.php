<?php
/*** Třída uživatele ***/
class USER{

    private $db; //promena uchovavajici pripojenou databazi


    /**
     * USER constructor.
     * @param $DB_con pripojeni k databazi
     */
    function __construct($DB_con){
        $this->db = $DB_con;
    }

    /**
     * Prihlasovaci funkce
     * @param $user pole dat o uzivateli
     * @param $umail email uzivatele
     */
    function login($user, $umail){
        /* predani hodnot z pole do promennych */
        $jmeno = $user['jmeno'];
        $prijmeni = $user['prijmeni'];
        $prava = $user['prava'];
        
        try {
            $old = $this->db->prepare("SELECT id_uzi, jmeno, prijmeni, prava FROM uzivatele WHERE uzivatele.email = '$umail';");
            $old->execute();
            $user_db = $old->fetch(PDO::FETCH_ASSOC);
            /* zalozeni noveho uzivatele */
            if ($user_db == null){
                $new = $this->db->prepare(" INSERT INTO UZIVATELE (jmeno, prijmeni, prava, email) VALUES ('$jmeno', '$prijmeni', '$prava', '$umail');");
                $new->execute();

                $new = $this->db->prepare("SELECT id_uzi, jmeno, prijmeni, prava FROM uzivatele WHERE uzivatele.email = '$umail';");
                $new->execute();
                $user_db = $new->fetch(PDO::FETCH_ASSOC);
            }
            /* update informaci o uzivateli */
            else{
                $update = $this->db->prepare("UPDATE uzivatele SET jmeno = '$jmeno', prijmeni = '$prijmeni', prava = '$prava' WHERE uzivatele.email = '$umail';");
                $update->execute();
            }
            
            /* predani dat o uzivateli do session */
            $_SESSION['user_session'] = $user_db['id_uzi'];
            $_SESSION['name_session'] = $user['jmeno'];
            $_SESSION['last_session'] = $user['prijmeni'];
            $_SESSION['prava_session'] = $user['prava'];
        }

        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * zjisteni zda je uzivatel prihlasen
     * @return bool
     */
    public function is_loggedIn(){
        if(isset($_SESSION['user_session'])){
            return true;
        }
    }

    /**
     * presmerovavaci funkce
     * @param $url url pro presmerovani
     */
    public function redirect($url){
        header("Location: $url");
    }

    /**
     * odhlasovaci funkce
     * @return bool
     */
    public function logout(){
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }

    /**
     * funkce, ktera provede kompletni prdani vsech potrebnych
     * informaci o novem benefitu do datbaze, vcetene kontroly
     * uzivatele, dotace a dodavatele.
     *
     * @param    $input     pole hodnot, ze ktereho se bude ukladat
     *                      do databaze
     */
    public function createBenefit($input)
    {
        $zadID = $_SESSION['user_session'];
        //kontrola uzivatele
        $stmt = $this->db->prepare('SELECT id_uzi FROM uzivatele WHERE email LIKE "'.$input[0].'";');
        $stmt->execute();
        $userId = $stmt->fetch(PDO::FETCH_ASSOC);
        $usID = $userId['id_uzi'];
        if($userId == null)
        {
            echo "Zadany uzivatele neexistuje!";
            sleep(3);
            $this->redirect("../page/admin_gui.php");
        }
        //kontrola dotace, ci pridani dotace
        $stmt = $this->db->prepare('SELECT id_dotace FROM dotace ORDER by datum_zapsani DESC, presny_cas DESC LIMIT 1;');
        $stmt->execute();
        $dotaceId = $stmt->fetch(PDO::FETCH_ASSOC);
        if($dotaceId == null)
        {
            $stmt = $this->db->prepare('INSERT INTO dotace (hodnota, datum_zapsani, presny_cas, typ_produktu, id_uzi) VALUES
                                      ('.$input[1].', "'.date("Y-m-d").'", "'.date("h:i:s").'", "'.$_POST['choose-device'].'", '.$zadID.');');
            $stmt->execute();
            $dotaceId = $this->db->lastInsertId();
        }
        $dotID = $dotaceId['id_dotace'];

        //pridani noveho benefitu do datbaze
        $stmt = $this->db->prepare('INSERT INTO sez_benefitu (dotace, zpusob_platby, datum_naskoceni_benefitu, datum_vyplaceni_benefitu, poznamky)
                                    VALUES ('.$dotID.', "'.$input[7].'", "'.$input[9].'", NULL,"'.$input[10].'");');
        $stmt->execute();
        $benefitId = $this->db->lastInsertId();
        $benID = $benefitId;
        $stmt = $this->db->prepare('INSERT INTO naroky_ben (ben_id_uzi, ben_id_benefitu) VALUES ('.$usID.', '.$benID.');');
        $stmt->execute();

        //kontrola dodavatele, ci pridani dodavatele do databaze
        $stmt = $this->db->prepare('SELECT id_dodavatele FROM dodavatele WHERE nazev_dodavatele LIKE "'.$input[8].'";');
        $stmt->execute();
        $dodavatelId = $stmt->fetch(PDO::FETCH_ASSOC);
        $dodID = $dodavatelId['id_dodavatele'];
        if($dodID == null)
        {
            $stmt = $this->db->prepare('INSERT INTO dodavatele (nazev_dodavatele) VALUES ("'.$input[8].'");');
            $stmt->execute();
            $dodavatelId = $this->db->lastInsertId();
            $dodID = $dodavatelId['id_dodavatele'];
        }

        //pridani produktu do databaze vceten zarizeni, ktereho se to tyka
        $stmt = $this->db->prepare('INSERT INTO produkty (dodavatel) VALUES ('.$dodID.');');
        $stmt->execute();
        $produktId = $this->db->lastInsertId();
        $proID = (int)$produktId;
        $stmt = $this->db->prepare('INSERT INTO naroky_pro (pro_id_produktu, pro_id_benefitu) VALUES ('.$produktId.', '.$benefitId.');');
        $stmt->execute();
        $cenaPro = (int)$input[3];
        if(strcmp($_POST['choose-device'],"smartphone") == 0)
        {
            $stmt = $this->db->prepare('INSERT INTO mobil (ref_produkt, jmeno_produktu, cena_produktu, datum_nakupu, serial_number, imei)
                                        VALUES ('.$proID.',"'.$input[2].'", '.$cenaPro.', "'.$input[4].'", "'.$input[5].'", "'.$input[6].'");');
            $stmt->execute();
        }
        else
        {
            $stmt = $this->db->prepare('INSERT INTO tablet (ref_produkt, jmeno_produktu, cena_produktu, datum_nakupu, serial_number, imei)
                                        VALUES ('.$proID.',"'.$input[2].'", '.$cenaPro.', "'.$input[4].'", "'.$input[5].'", "'.$input[6].'");');
            $stmt->execute();
        }
        //presmerovani na administratorskou stranku
        $this->redirect("../page/admin_gui.php");
    }

    /**
     * funkce, ktera provede kompletni update daneho benefitu
     * do datbaze, vcetene kontroly uzivatele, dotace a dodavatele.
     *
     * @param    $input     pole hodnot, ze ktereho se bude ukladat
     *                      do databaze
     */
    public function updateBenefit($input)
    {
        $zadID = $_SESSION['user_session'];
        //kontrola uzivatele
        $stmt = $this->db->prepare('SELECT id_uzi FROM uzivatele WHERE email LIKE "'.$input[0].'";');
        $stmt->execute();
        $userId = $stmt->fetch(PDO::FETCH_ASSOC);
        $usID = $userId['id_uzi'];
        if($usID == null)
        {
            echo "Zadany uzivatele neexistuje!";
            sleep(3);
            $this->redirect("../page/admin_gui.php");
        }

        //kontrola dotace, ci zapsani nove dotace
        $benID = $input[1];
        $stmt = $this->db->prepare('SELECT id_dotace, hodnota FROM dotace, sez_benefitu WHERE id_benefitu = '.$benID.' AND id_dotace = dotace;');
        $stmt->execute();
        $hodnotaDo = $stmt->fetch(PDO::FETCH_ASSOC);
//        if($hodnotaDo['hodnota'] != $input[4])
//        {
//            $stmt = $this->db->prepare('SELECT id_dotace FROM dotace ORDER by datum_zapsani DESC, presny_cas DESC LIMIT 1;');
//            $stmt->execute();
//            $dotaceId = $stmt->fetch(PDO::FETCH_ASSOC);
//            if($dotaceId == null)
//            {
//                $stmt = $this->db->prepare('INSERT INTO dotace (hodnota, datum_zapsani, presny_cas, typ_produktu, id_uzi) VALUES
//                                      ('.$input[1].', "'.date("Y-m-d").'", "'.date("h:i:s").'", "'.$_POST['choose-device'].'", '.$zadID.');');
//                $stmt->execute();
//                $hodnotaDo = $this->db->lastInsertId();
//            }
//        }
        $dotID = $hodnotaDo['id_dotace'];

        //update benefitu
        if($input[13] == false)
        {
            $input[13] = "NULL";
            $stmt = $this->db->prepare('UPDATE sez_benefitu SET dotace = '.$dotID.', zpusob_platby = "'.$input[10].
                '", datum_naskoceni_benefitu = "'.$input[12].'", datum_vyplaceni_benefitu = '.$input[13].', poznamky = "'.$input[14].'" WHERE id_benefitu = '.$benID.';');
            $stmt->execute();
        }
        else
        {
            $stmt = $this->db->prepare('UPDATE sez_benefitu SET dotace = '.$dotID.', zpusob_platby = "'.$input[10].
                '", datum_naskoceni_benefitu = "'.$input[12].'", datum_vyplaceni_benefitu = "'.$input[13].'", poznamky = "'.$input[14].'" WHERE id_benefitu = '.$benID.';');
            $stmt->execute();
        }

        //update dodavatele, ci vytvoreni noveho dodavatele
        $stmt = $this->db->prepare('SELECT id_dodavatele FROM dodavatele WHERE nazev_dodavatele LIKE "'.$input[11].'";');
        $stmt->execute();
        $dodavatelId = $stmt->fetch(PDO::FETCH_ASSOC);
        $dodID = $dodavatelId['id_dodavatele'];
        if($dodID == null)
        {
            $stmt = $this->db->prepare('INSERT INTO dodavatele (nazev_dodavatele) VALUES ("'.$input[11].'");');
            $stmt->execute();
            $dodID = $this->db->lastInsertId();
        }

        //update produkutu a konkretniho zarizeni
        $stmt = $this->db->prepare('SELECT id_produktu FROM produkty, naroky_pro WHERE id_produktu = pro_id_produktu AND pro_id_benefitu = '.$benID.';');
        $stmt->execute();
        $produktId = $stmt->fetch(PDO::FETCH_ASSOC);
        $proID = $produktId['id_produktu'];

        $stmt = $this->db->prepare('UPDATE produkty SET dodavatel = '.$dodID.' WHERE id_produktu = '.$proID.';');
        $stmt->execute();
        if(strcmp($_POST['b_e-choose-device'],"smartphone") == 0)
        {
            $stmt = $this->db->prepare('UPDATE mobil SET ref_produkt = '.$proID.', jmeno_produktu = "'.$input[5].'", cena_produktu = '.$input[6].'
                                        , datum_nakupu = "'.$input[7].'", serial_number = "'.$input[8].'", imei = "'.$input[9].'" WHERE ref_produkt = '.$proID.';');
            $stmt->execute();
        }
        else
        {
            $stmt = $this->db->prepare('UPDATE tablet SET ref_produkt = '.$proID.', jmeno_produktu = "'.$input[5].'", cena_produktu = '.$input[6].'
                                        , datum_nakupu = "'.$input[7].'", serial_number = "'.$input[8].'", imei = "'.$input[9].'" WHERE ref_produkt = '.$proID.';');
            $stmt->execute();
        }
        //presmerovani na administratorskou stranku
        $this->redirect("../page/admin_gui.php");
    }

    /**
     * funkce, ktera zprostredkuje pridani nove dotace do tabulky dotace
     * podle toho, kdo a kdy ji pridal na zaklade zarizeni. Tato zmena
     * nastane pouze v pripade, ze admin nastavil novou dotaci.
     *
     * @return zapis do databze.
     */
    public function dotaceCreate($input)
    {
        $usID = (int)($_SESSION['user_session']);
        $stmt = $this->db->prepare('SELECT COUNT(*) FROM dotace WHERE hodnota = "'.date("Y-m-d").'";');
        $stmt->execute();
        $dotace= $stmt->fetch(PDO::FETCH_ASSOC);
        $dodPocet = $dotace['COUNT(*)'];
        //Denne lze zmenit 5x menit dotaci, pri dalsim pokus se vyhodi chyba
        if($dodPocet < 5)
        {
            $stmt = $this->db->prepare('INSERT INTO dotace (hodnota, datum_zapsani, presny_cas, typ_produktu, id_uzi) VALUES ('.$input[1].',
                                      "'.date("Y-m-d").'", "'.date("h:i:s").'", "'.$input[0].'", '.$usID.');');
            $stmt->execute();
        }
        else
        {
            echo "Prekrocen pocet zmen v dotacich za den!<br>";
            sleep(3);
        }
        //presmerovani na administratorskou stranku
        $this->redirect("../page/admin_gui.php");
    }

    /**
     * funkce, ktera provede aktualizaci daneho
     * benefitu, kdyz se klikne v prislusne radce
     * na tlacitko ted.
     *
     * @param       $benID      id benefitu
     */
    public function updateBenefitDate($benID)
    {
        $stmt = $this->db->prepare('SELECT id_benefitu FROM sez_benefitu ORDER BY id_benefitu DESC LIMIT 1;');
        $stmt->execute();
        $tmp= $stmt->fetch(PDO::FETCH_ASSOC);
        $cislo = $tmp['id_benefitu'];
        if($cislo >= $benID)
        {
            $stmt = $this->db->prepare('UPDATE sez_benefitu SET datum_vyplaceni_benefitu = "'.date("Y-m-d").'" WHERE id_benefitu = '.$benID.';');
            $stmt->execute();
        }
        //presmerovani na administratorskou stranku
        $this->redirect("../page/admin_gui.php");
    }

    /**
     * funkce nacitajici data o vsech tabletech
     * @return mixed pole vsech informaci tykajicich se tabletu
     */
    public function allTablets(){
        $stmt = $this->db->prepare("
            SELECT id_benefitu,
            (SELECT jmeno FROM UZIVATELE, naroky_ben WHERE NAROKY_BEN.ben_id_benefitu = id_benefitu AND naroky_ben.ben_id_uzi = id_uzi) AS jmeno,
            (SELECT prijmeni FROM UZIVATELE, naroky_ben WHERE NAROKY_BEN.ben_id_benefitu = id_benefitu AND naroky_ben.ben_id_uzi = id_uzi) AS prijmeni,
            (SELECT email FROM UZIVATELE, naroky_ben WHERE NAROKY_BEN.ben_id_benefitu = id_benefitu AND naroky_ben.ben_id_uzi = id_uzi) AS email,
            (SELECT hodnota FROM DOTACE WHERE DOTACE.id_dotace = dotace) AS dotace,
            (SELECT jmeno_produktu FROM tablet, naroky_pro WHERE ref_produkt = naroky_pro.pro_id_produktu AND naroky_pro.pro_id_benefitu = id_benefitu) as jmeno_produktu,
            (SELECT cena_produktu FROM tablet, naroky_pro WHERE ref_produkt = naroky_pro.pro_id_produktu AND naroky_pro.pro_id_benefitu = id_benefitu) as cena,
            (SELECT datum_nakupu FROM tablet, naroky_pro WHERE ref_produkt = naroky_pro.pro_id_produktu AND naroky_pro.pro_id_benefitu = id_benefitu) as datum_nakupu,
            (SELECT serial_number FROM tablet, naroky_pro WHERE ref_produkt = naroky_pro.pro_id_produktu AND naroky_pro.pro_id_benefitu = id_benefitu) as seriove_cislo,
            (SELECT imei FROM tablet, naroky_pro WHERE ref_produkt = naroky_pro.pro_id_produktu AND naroky_pro.pro_id_benefitu = id_benefitu) as imei,
            zpusob_platby,
            (SELECT nazev_dodavatele FROM dodavatele, produkty, naroky_pro WHERE id_dodavatele = dodavatel AND id_produktu = pro_id_produktu AND pro_id_benefitu = sez_benefitu.id_benefitu) as dodavatel,
            datum_naskoceni_benefitu, datum_vyplaceni_benefitu, poznamky FROM SEZ_BENEFITU, tablet, produkty, naroky_pro WHERE tablet.ref_produkt = produkty.id_produktu AND naroky_pro.pro_id_produktu = produkty.id_produktu AND naroky_pro.pro_id_benefitu = id_benefitu ORDER BY id_benefitu;
            ");
        $stmt->execute();
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }

    /**
     * funkce nacitajici data o vsech mobilech
     * @return mixed pole vsech informaci tykajicich se mobilu
     */
    public function allMobiles(){
        $stmt = $this->db->prepare("
                SELECT id_benefitu,
                (SELECT jmeno FROM UZIVATELE, naroky_ben WHERE NAROKY_BEN.ben_id_benefitu = id_benefitu AND naroky_ben.ben_id_uzi = id_uzi) AS jmeno,
                (SELECT prijmeni FROM UZIVATELE, naroky_ben WHERE NAROKY_BEN.ben_id_benefitu = id_benefitu AND naroky_ben.ben_id_uzi = id_uzi) AS prijmeni,
                (SELECT email FROM UZIVATELE, naroky_ben WHERE NAROKY_BEN.ben_id_benefitu = id_benefitu AND naroky_ben.ben_id_uzi = id_uzi) AS email,
                (SELECT hodnota FROM DOTACE WHERE DOTACE.id_dotace = dotace) AS dotace,
                (SELECT jmeno_produktu FROM mobil, naroky_pro WHERE ref_produkt = naroky_pro.pro_id_produktu AND naroky_pro.pro_id_benefitu = id_benefitu) as jmeno_produktu,
                (SELECT cena_produktu FROM mobil, naroky_pro WHERE ref_produkt = naroky_pro.pro_id_produktu AND naroky_pro.pro_id_benefitu = id_benefitu) as cena,
                (SELECT datum_nakupu FROM mobil, naroky_pro WHERE ref_produkt = naroky_pro.pro_id_produktu AND naroky_pro.pro_id_benefitu = id_benefitu) as datum_nakupu,
                (SELECT serial_number FROM mobil, naroky_pro WHERE ref_produkt = naroky_pro.pro_id_produktu AND naroky_pro.pro_id_benefitu = id_benefitu) as seriove_cislo,
                (SELECT imei FROM mobil, naroky_pro WHERE ref_produkt = naroky_pro.pro_id_produktu AND naroky_pro.pro_id_benefitu = id_benefitu) as imei,
                zpusob_platby,
                (SELECT nazev_dodavatele FROM dodavatele, produkty, naroky_pro WHERE id_dodavatele = dodavatel AND id_produktu = pro_id_produktu AND pro_id_benefitu = sez_benefitu.id_benefitu) as dodavatel,
                datum_naskoceni_benefitu, datum_vyplaceni_benefitu, poznamky FROM SEZ_BENEFITU, MOBIL, produkty, naroky_pro WHERE mobil.ref_produkt = produkty.id_produktu AND naroky_pro.pro_id_produktu = produkty.id_produktu AND naroky_pro.pro_id_benefitu = id_benefitu ORDER BY id_benefitu;
                ");
        $stmt->execute();
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }

    /**
     * funkce, ktera provede dotaz nad databazi,
     * ktera vrati benefity konkretniho prihlaseneho
     * uzivatele, tyto benefity se tykaji mobilu.
     *
     * @return      mixed       vraci pole naplnene
     *                          daty z databaze
     */
    public function userDataMobil(){
        $stmt = $this->db->prepare("SELECT id_benefitu,
        (SELECT jmeno FROM UZIVATELE, naroky_ben WHERE NAROKY_BEN.ben_id_benefitu = id_benefitu AND naroky_ben.ben_id_uzi = id_uzi) AS jmeno,
        (SELECT prijmeni FROM UZIVATELE, naroky_ben WHERE NAROKY_BEN.ben_id_benefitu = id_benefitu AND naroky_ben.ben_id_uzi = id_uzi) AS prijmeni,
        (SELECT hodnota FROM DOTACE WHERE DOTACE.id_dotace = dotace) AS dotace,
        (SELECT jmeno_produktu FROM mobil, naroky_pro WHERE ref_produkt = naroky_pro.pro_id_produktu AND naroky_pro.pro_id_benefitu = id_benefitu) as jmeno_produktu,
        (SELECT cena_produktu FROM mobil, naroky_pro WHERE ref_produkt = naroky_pro.pro_id_produktu AND naroky_pro.pro_id_benefitu = id_benefitu) as cena,
        (SELECT datum_nakupu FROM mobil, naroky_pro WHERE ref_produkt = naroky_pro.pro_id_produktu AND naroky_pro.pro_id_benefitu = id_benefitu) as datum_nakupu,
        (SELECT serial_number FROM mobil, naroky_pro WHERE ref_produkt = naroky_pro.pro_id_produktu AND naroky_pro.pro_id_benefitu = id_benefitu) as seriove_cislo,
        (SELECT imei FROM mobil, naroky_pro WHERE ref_produkt = naroky_pro.pro_id_produktu AND naroky_pro.pro_id_benefitu = id_benefitu) as imei,
        zpusob_platby,
        (SELECT nazev_dodavatele FROM dodavatele, produkty, naroky_pro WHERE id_dodavatele = dodavatel AND id_produktu = pro_id_produktu AND pro_id_benefitu = sez_benefitu.id_benefitu) as dodavatel,
        datum_naskoceni_benefitu, datum_vyplaceni_benefitu, poznamky FROM SEZ_BENEFITU, MOBIL, produkty, naroky_pro, naroky_ben, uzivatele WHERE mobil.ref_produkt = produkty.id_produktu AND naroky_pro.pro_id_produktu = produkty.id_produktu AND naroky_pro.pro_id_benefitu = id_benefitu AND naroky_ben.ben_id_benefitu = id_benefitu AND naroky_ben.ben_id_uzi = uzivatele.id_uzi AND id_uzi = " . $_SESSION['user_session'] . " ORDER BY datum_nakupu DESC;");
        $stmt->execute();
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }

    /**
     * funkce, ktera provede dotaz nad databazi,
     * ktera vrati benefity konkretniho prihlaseneho
     * uzivatele, tyto benefity se tykaji tabletu.
     *
     * @return      mixed       vraci pole naplnene
     *                          daty z databaze
     */
    public function userDataTablet(){
        $stmt = $this->db->prepare("SELECT id_benefitu,
        (SELECT jmeno FROM UZIVATELE, naroky_ben WHERE NAROKY_BEN.ben_id_benefitu = id_benefitu AND naroky_ben.ben_id_uzi = id_uzi) AS jmeno,
        (SELECT prijmeni FROM UZIVATELE, naroky_ben WHERE NAROKY_BEN.ben_id_benefitu = id_benefitu AND naroky_ben.ben_id_uzi = id_uzi) AS prijmeni,
        (SELECT hodnota FROM DOTACE WHERE DOTACE.id_dotace = dotace) AS dotace,
        (SELECT jmeno_produktu FROM tablet, naroky_pro WHERE ref_produkt = naroky_pro.pro_id_produktu AND naroky_pro.pro_id_benefitu = id_benefitu) as jmeno_produktu,
        (SELECT cena_produktu FROM tablet, naroky_pro WHERE ref_produkt = naroky_pro.pro_id_produktu AND naroky_pro.pro_id_benefitu = id_benefitu) as cena,
        (SELECT datum_nakupu FROM tablet, naroky_pro WHERE ref_produkt = naroky_pro.pro_id_produktu AND naroky_pro.pro_id_benefitu = id_benefitu) as datum_nakupu,
        (SELECT serial_number FROM tablet, naroky_pro WHERE ref_produkt = naroky_pro.pro_id_produktu AND naroky_pro.pro_id_benefitu = id_benefitu) as seriove_cislo,
        (SELECT imei FROM tablet, naroky_pro WHERE ref_produkt = naroky_pro.pro_id_produktu AND naroky_pro.pro_id_benefitu = id_benefitu) as imei,
        (SELECT verze FROM tablet, naroky_pro WHERE ref_produkt = naroky_pro.pro_id_produktu AND naroky_pro.pro_id_benefitu = id_benefitu) as verze,
        zpusob_platby,
        (SELECT nazev_dodavatele FROM dodavatele, produkty, naroky_pro WHERE id_dodavatele = dodavatel AND id_produktu = pro_id_produktu AND pro_id_benefitu = sez_benefitu.id_benefitu) as dodavatel,
        datum_naskoceni_benefitu, datum_vyplaceni_benefitu, poznamky FROM SEZ_BENEFITU, tablet, produkty, naroky_pro, naroky_ben, uzivatele WHERE tablet.ref_produkt = produkty.id_produktu AND naroky_pro.pro_id_produktu = produkty.id_produktu AND naroky_pro.pro_id_benefitu = id_benefitu AND naroky_ben.ben_id_benefitu = id_benefitu AND naroky_ben.ben_id_uzi = uzivatele.id_uzi AND id_uzi = " . $_SESSION['user_session'] .  " ORDER BY datum_nakupu DESC;");
        $stmt->execute();
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }
}