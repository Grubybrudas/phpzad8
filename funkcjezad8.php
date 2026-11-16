<?php

function obliczWiek($rokProdukcji) {
    $aktualnyRok = (int)date("Y");
    return $aktualnyRok - $rokProdukcji;
}

function okreslKategorieWieku($wiek) {
    if ($wiek <= 3) {
        return "samochód prawie nowy";
    } elseif ($wiek >= 4 && $wiek <= 7) {
        return "samochód kilkuletni";
    } elseif ($wiek >= 8 && $wiek <= 15) {
        return "samochód używany";
    } else {
        return "samochód zabytkowy lub starszy";
    }
}

function wyszukajSamochody($samochody, $maksymalnaCena) {
    $znaleziono = false;
    foreach ($samochody as $auto) {
        if ($auto['cena'] <= $maksymalnaCena) {
            echo $auto['marka'] . " " . $auto['model'] . " - " . $auto['cena'] . " zł\n";
            $znaleziono = true;
        }
    }
    if (!$znaleziono) {
        echo "Nie znaleziono żadnego samochodu w cenie do " . $maksymalnaCena . " zł.\n";
    }
}

function najdrozszySamochod($samochody) {
    $najdrozszy = $samochody[0];
    foreach ($samochody as $auto) {
        if ($auto['cena'] > $najdrozszy['cena']) {
            $najdrozszy = $auto;
        }
    }
    return $najdrozszy;
}

function najtanszySamochod($samochody) {
    $najtanszy = $samochody[0];
    foreach ($samochody as $auto) {
        if ($auto['cena'] < $najtanszy['cena']) {
            $najtanszy = $auto;
        }
    }
    return $najtanszy;
}

function obliczSredniaCene($samochody) {
    $suma = 0;
    $ilosc = count($samochody);
    if ($ilosc === 0) {
        return 0;
    }
    foreach ($samochody as $auto) {
        $suma += $auto['cena'];
    }
    return round($suma / $ilosc, 2);
}

function sortujOdNajtanszego(&$samochody) {
    usort($samochody, function($a, $b) {
        return $a['cena'] <=> $b['cena'];
    });
}
