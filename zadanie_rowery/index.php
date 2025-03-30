<?php
// nie jestem pewnien czy to jest tak jak powinno być ale lepsze to niż nic
$rowery = [
    'opcja1' => [
        ['src' => 'https://kross.pl/media/catalog/product/cache/95a480c323a36b77b1ea03f80f97aed2/K/R/KRHE5Z29X17M008544_KR_Hexagon_5.0_LTD_M_29_M_grf_sza_p_1_3fb7.jpg', 'opis' => 'Rower górski 1'],
        ['src' => 'https://kross.pl/media/catalog/product/cache/95a480c323a36b77b1ea03f80f97aed2/K/R/KRHE3U29X17M008789_KR_Hexagon_3.0_ULT.RA_M_29_M_grf_hol_p_1_6b0e.jpg', 'opis' => 'Rower górski 2'],
        ['src' => 'https://kross.pl/media/catalog/product/cache/95a480c323a36b77b1ea03f80f97aed2/K/R/KRLE3U29X17W008796_KR_Lea_3.0_ULT.RA_D_29_M_roz_hol_p_1_5210.jpg', 'opis' => 'Rower górski 3']
    ],
    'opcja2' => [
        ['src' => 'https://kross.pl/media/catalog/product/cache/95a480c323a36b77b1ea03f80f97aed2/K/R/KRVE9Z28X19M007383_KR_Vento_9.0_M_28_M_zie_kam_p_57_81c7.jpg', 'opis' => 'Rower szosowy 1'],
        ['src' => 'https://kross.pl/media/catalog/product/cache/95a480c323a36b77b1ea03f80f97aed2/K/R/KRVE8Z28X19M007379_KR_Vento_8.0_M_28_M_per_p_53_1225.jpg', 'opis' => 'Rower szosowy 2'],
        ['src' => 'https://kross.pl/media/catalog/product/cache/95a480c323a36b77b1ea03f80f97aed2/K/R/KRVD8Z28X19M002639_KR_Vento_8.0_M_28_M_cza_sza_m_1_9e88.jpg', 'opis' => 'Rower szosowy 3']
    ],
    'opcja3' => [
        ['src' => 'https://kross.pl/media/catalog/product/cache/95a480c323a36b77b1ea03f80f97aed2/K/R/KRTR5U28X21M008763_KR_Trans_5.0_ULT.RA_M_28_L_cza_hol_m_1_8109.jpg', 'opis' => 'Rower miejski 1'],
        ['src' => 'https://kross.pl/media/catalog/product/cache/95a480c323a36b77b1ea03f80f97aed2/K/R/KRTR5U28X19W008766_KR_Trans_5.0_ULT.RA_D_28_L_sre_hol_m_1_78f9.jpg', 'opis' => 'Rower miejski 2'],
        ['src' => 'https://kross.pl/media/catalog/product/cache/95a480c323a36b77b1ea03f80f97aed2/K/R/KRTR3U28X21M008770_KR_Trans_3.0_ULT.RA_M_28_L_sre_hol_p_1_905d.jpg', 'opis' => 'Rower miejski 3']
    ]
];

if (isset($_POST['wyborRoweru'])) {
    $wybranaOpcja = $_POST['wyborRoweru'];
} else {
    $wybranaOpcja = 'opcja1';
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rowery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        #kontener {
            display: flex;
            flex-direction: column;
            height: 100vh;
        }
        header {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }
        #glowna {
            display: flex;
            flex: 1;
        }
        #menu {
            width: 20%;
            background-color: #444;
            color: white;
            padding: 10px;
        }
        #menu select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
        }
        #content {
            flex: 1;
            padding: 20px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
        }
        .rower {
            text-align: center;
            margin: 10px;
        }
        .rower img {
            max-width: 600px;
            height: auto;
            border: 2px solid #ccc;
            border-radius: 10px;
        }
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div id="kontener">
        <header>
            <h1>Witamy w sklepie rowerowym</h1>
        </header>
        <div id="glowna">
            <div id="menu">
                <h2>Wybierz kategorię</h2>
                <form method="POST">
                    <select name="wyborRoweru" onchange="this.form.submit()">
                        <option value="opcja1" <?php echo $wybranaOpcja === 'opcja1' ? 'selected' : ''; ?>>Rowery górskie</option>
                        <option value="opcja2" <?php echo $wybranaOpcja === 'opcja2' ? 'selected' : ''; ?>>Rowery szosowe</option>
                        <option value="opcja3" <?php echo $wybranaOpcja === 'opcja3' ? 'selected' : ''; ?>>Rowery miejskie</option>
                    </select>
                </form>
            </div>
            <div id="content">
                <?php foreach ($rowery[$wybranaOpcja] as $rower): ?>
                    <div class="rower">
                        <img src="<?php echo $rower['src']; ?>" alt="<?php echo $rower['opis']; ?>">
                        <p><?php echo $rower['opis']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <footer>
            <p>footer</p>
        </footer>
    </div>
</body>
</html>