<?php

    global $conncetion;
    global $id;

    function connect($username1, $password1)
    {
        /*** mysql hostname ***/
        $hostname = 'localhost';
        /*** mysql username ***/
        $username = 'root';
        /*** mysql password ***/
        $password = null;
        try
        {
            if($username1 == null || $password1 == null)
            {
                echo "Nebyli zadany prihlasovaci udaje!";
                return null;
            }
            else
            {
                $GLOBALS['connection'] = new PDO("mysql:host=$hostname;dbname=databaze_test", $username, $password);
                $stt = $GLOBALS['connection']->prepare("SELECT id_uzi, jmeno, prijmeni, prava FROM uzivatele WHERE uzivatele.email = '$username1' AND uzivatele.heslo = '$password1';");
                $stt->execute();
                $array = $stt->fetch(PDO::FETCH_ASSOC);
                $cislo = 1;
                if ($array == null)
                {
                    echo "Zadany email/heslo neni v databazi uzivatelu!";
                    $GLOBALS['connection'] = null;
                    return null;
                }
                foreach($array as $value)
                {
                    if($cislo == 1)
                    {
                        $GLOBALS['id'] = $value;
                        $cislo = 2;
                    }
                    echo $value . " ";
                }
                echo "connected </br>";

            }

        }
        catch(PDOException $e)
        {
            // zobrazit chybu
            echo $e->getMessage();
        }
    }


    function mobilAll()
    {
        $stmt = $GLOBALS['connection']->prepare("SELECT id_benefitu,
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
        foreach($array as $innerarray)
        {
            foreach ($innerarray as $value)
            {
                echo $value . "</br>";
            }
        }
        return $array;
    }

    function tabletAll()
    {
        $stmt = $GLOBALS['connection']->prepare("SELECT id_benefitu,
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
        foreach($array as $innerarray)
        {
            foreach ($innerarray as $value)
            {
                echo $value . "</br>";
            }
        }
        return $array;
    }

    function userDataMobil()
    {
        $stmt = $GLOBALS['connection']->prepare("SELECT id_benefitu,
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
        datum_naskoceni_benefitu, datum_vyplaceni_benefitu, poznamky FROM SEZ_BENEFITU, MOBIL, produkty, naroky_pro, naroky_ben, uzivatele WHERE mobil.ref_produkt = produkty.id_produktu AND naroky_pro.pro_id_produktu = produkty.id_produktu AND naroky_pro.pro_id_benefitu = id_benefitu AND naroky_ben.ben_id_benefitu = id_benefitu AND naroky_ben.ben_id_uzi = uzivatele.id_uzi AND id_uzi = " . $GLOBALS['id'] . " ORDER BY id_benefitu;");
        $stmt->execute();
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($array as $innerarray)
        {
            foreach ($innerarray as $value)
            {
                echo $value . "</br>";
            }
        }
        return $array;
    }

function userDataTablets()
{
    $stmt = $GLOBALS['connection']->prepare("SELECT id_benefitu,
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
    datum_naskoceni_benefitu, datum_vyplaceni_benefitu, poznamky FROM SEZ_BENEFITU, tablet, produkty, naroky_pro, naroky_ben, uzivatele WHERE tablet.ref_produkt = produkty.id_produktu AND naroky_pro.pro_id_produktu = produkty.id_produktu AND naroky_pro.pro_id_benefitu = id_benefitu AND naroky_ben.ben_id_benefitu = id_benefitu AND naroky_ben.ben_id_uzi = uzivatele.id_uzi AND id_uzi = " . $GLOBALS['id'] .  " ORDER BY id_benefitu;");
    $stmt->execute();
    $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($array as $innerarray)
    {
        foreach ($innerarray as $value)
        {
            echo $value . "</br>";
        }
    }
    return $array;
}

?>