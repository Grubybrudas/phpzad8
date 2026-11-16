<?php
require_once 'funkcjezad8.php';

$samochody = [
    [
        'marka' => 'BMW',
        'model' => '320d',
        'rok_produkcji' => 2018,
        'cena' => 85000,
        'przebieg' => 120000,
        'paliwo' => 'diesel',
        'moc' => 190
    ],
    [
        'marka' => 'Audi',
        'model' => 'A4',
        'rok_produkcji' => 2020,
        'cena' => 110000,
        'przebieg' => 80000,
        'paliwo' => 'benzyna',
        'moc' => 150
    ],
    [
        'marka' => 'Opel',
        'model' => 'Astra',
        'rok_produkcji' => 2012,
        'cena' => 24000,
        'przebieg' => 195000,
        'paliwo' => 'benzyna',
        'moc' => 115
    ],
    [
        'marka' => 'Toyota',
        'model' => 'Corolla',
        'rok_produkcji' => 2024,
        'cena' => 125000,
        'przebieg' => 15000,
        'paliwo' => 'hybryda',
        'moc' => 140
    ],
    [
        'marka' => 'Volkswagen',
        'model' => 'Passat',
        'rok_produkcji' => 2017,
        'cena' => 68000,
        'przebieg' => 165000,
        'paliwo' => 'diesel',
        'moc' => 150
    ],
    [
        'marka' => 'Ford',
        'model' => 'Focus',
        'rok_produkcji' => 2015,
        'cena' => 36000,
        'przebieg' => 142000,
        'paliwo' => 'diesel',
        'moc' => 120
    ],
    [
        'marka' => 'Mercedes-Benz',
        'model' => 'W124',
        'rok_produkcji' => 1992,
        'cena' => 45000,
        'przebieg' => 290000,
        'paliwo' => 'benzyna',
        'moc' => 136
    ],
    [
        'marka' => 'Skoda',
        'model' => 'Octavia',
        'rok_produkcji' => 2021,
        'cena' => 89000,
        'przebieg' => 74000,
        'paliwo' => 'benzyna',
        'moc' => 150
    ],
    [
        'marka' => 'Mazda',
        'model' => '6',
        'rok_produkcji' => 2019,
        'cena' => 79000,
        'przebieg' => 98000,
        'paliwo' => 'benzyna',
        'moc' => 165
    ],
    [
        'marka' => 'Volvo',
        'model' => 'XC60',
        'rok_produkcji' => 2022,
        'cena' => 165000,
        'przebieg' => 52000,
        'paliwo' => 'diesel',
        'moc' => 197
    ]
];

sortujOdNajtanszego($samochody);

echo "<pre>";
echo "================================\n";
echo "KOMIS SAMOCHODOWY\n";
echo "================================\n";

$iloscWszystkich = count($samochody);
foreach ($samochody as $index => $auto) {
    $wiek = obliczWiek($auto['rok_produkcji']);
    $kategoria = okreslKategorieWieku($wiek);

    echo $auto['marka'] . " " . $auto['model'] . "\n";
    echo "Rok produkcji: " . $auto['rok_produkcji'] . "\n";
    echo "Cena: " . $auto['cena'] . " zł\n";
    echo "Przebieg: " . $auto['przebieg'] . " km\n";
    echo "Paliwo: " . $auto['paliwo'] . "\n";
    echo "Moc: " . $auto['moc'] . " KM\n";
    echo "Wiek: " . $wiek . " lat\n";
    echo "Kategoria: " . $kategoria . "\n";

    if ($index < $iloscWszystkich - 1) {
        echo "--------------------------------\n";
    }
}

echo "================================\n";
echo "WYSZUKIWANIE (DO 80000 ZŁ)\n";
echo "================================\n";
wyszukajSamochody($samochody, 80000);

$najdrozszy = najdrozszySamochod($samochody);
$najtanszy = najtanszySamochod($samochody);
$sredniaCena = obliczSredniaCene($samochody);

$licznikDiesel = 0;
$licznikPo2020 = 0;
$licznikPrzebiegPonizej100k = 0;

foreach ($samochody as $auto) {
    if (strtolower($auto['paliwo']) === 'diesel') {
        $licznikDiesel++;
    }
    if ($auto['rok_produkcji'] > 2020) {
        $licznikPo2020++;
    }
    if ($auto['przebieg'] < 100000) {
        $licznikPrzebiegPonizej100k++;
    }
}

echo "================================\n";
echo "STATYSTYKI\n";
echo "================================\n";
echo "Liczba samochodów: " . $iloscWszystkich . "\n";
echo "Średnia cena: " . $sredniaCena . " zł\n";
echo "Najdroższy: " . $najdrozszy['marka'] . " " . $najdrozszy['model'] . "\n";
echo "Najtańszy: " . $najtanszy['marka'] . " " . $najtanszy['model'] . "\n";
echo "Samochody diesel: " . $licznikDiesel . "\n";
echo "Samochody po 2020 roku: " . $licznikPo2020 . "\n";
echo "Przebieg poniżej 100000 km: " . $licznikPrzebiegPonizej100k . "\n";
echo "================================\n";
echo "</pre>";
