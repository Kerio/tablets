<?php

class USER{

    private $db;

    function __construct($DB_con){
        $this->db = $DB_con;
    }
    
    function login($user, $umail){
        $jmeno = $user['jmeno'];
        $prijmeni = $user['prijmeni'];
        $prava = $user['prava'];
        try {
            $old = $this->db->prepare("SELECT id_uzi, jmeno, prijmeni, prava FROM uzivatele WHERE uzivatele.email = '$umail';");
            $old->execute();
            $user_db = $old->fetch(PDO::FETCH_ASSOC);
            if ($user_db == null){
                $new = $this->db->prepare(" INSERT INTO UZIVATELE (jmeno, prijmeni, prava, email) VALUES ('$jmeno', '$prijmeni', '$prava', '$umail');");
                $new->execute();

                $new = $this->db->prepare("SELECT id_uzi, jmeno, prijmeni, prava FROM uzivatele WHERE uzivatele.email = '$umail';");
                $new->execute();
                $user_db = $new->fetch(PDO::FETCH_ASSOC);
            }
            else{
                $update = $this->db->prepare("UPDATE uzivatele SET jmeno = '$jmeno', prijmeni = '$prijmeni', prava = '$prava' WHERE uzivatele.email = '$umail';");
                $update->execute();
            }
                $_SESSION['user_session'] = $user_db['id_uzi'];
                $_SESSION['name_session'] = $user['jmeno'];
                $_SESSION['last_session'] = $user['prijmeni'];
                $_SESSION['prava_session'] = $user['prava'];
        }

        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function is_loggedIn(){
        if(isset($_SESSION['user_session'])){
            return true;
        }
    }

    public function redirect($url){
        header("Location: $url");
    }

    public function logout(){
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }
    
    public function allTablets(){
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
            datum_naskoceni_benefitu, datum_vyplaceni_benefitu, poznamky FROM SEZ_BENEFITU, tablet, produkty, naroky_pro WHERE tablet.ref_produkt = produkty.id_produktu AND naroky_pro.pro_id_produktu = produkty.id_produktu AND naroky_pro.pro_id_benefitu = id_benefitu ORDER BY id_benefitu;");
        $stmt->execute();
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }

    public function allMobiles(){
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
                datum_naskoceni_benefitu, datum_vyplaceni_benefitu, poznamky FROM SEZ_BENEFITU, MOBIL, produkty, naroky_pro WHERE mobil.ref_produkt = produkty.id_produktu AND naroky_pro.pro_id_produktu = produkty.id_produktu AND naroky_pro.pro_id_benefitu = id_benefitu ORDER BY id_benefitu;");
        $stmt->execute();
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }

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
      /**  foreach($array as $innerarray)
        {
            foreach ($innerarray as $value)
            {
                echo $value . "</br>";
            }
        }**/
        return $array;
    }

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
        /**foreach($array as $innerarray)
        {
            foreach ($innerarray as $value)
            {
                echo $value . "</br>";
            }
        }**/
        return $array;
    }
}