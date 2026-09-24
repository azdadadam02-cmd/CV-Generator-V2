<?php
$cv = [
    'nom_complet' => 'Yassine Azdad',
    'titre' => 'Développeur Web / Data Science',
    'email' => 'yassine.azdad@email.com',
    'telephone' => '+212 6 00 00 00 00',
    'adresse' => 'Nador, Maroc',
    'profil' => 'Étudiant en 1ère année Informatique Décisionnelle et Science des Données (IDSD) à l\'ESTN. Développeur passionné, créatif et organisé. J\'aime concevoir des applications web performantes et résoudre des problèmes complexes.',
    'experience' => 'Stage d\'initiation - 3A BUREAU (Ain Sebaa, Casablanca)
- Recherche et analyse des avis d\'appels d\'offres sur marchespublics.gov.ma.
- Développement d\'une application web e-commerce de vente de fournitures de bureau.',
    'formation' => '2025 - Présent : Diplôme Universitaire de Technologie en IDSD (ESTN)
2024 - 2025 : Baccalauréat (Option Sciences)',
    'competences' => 'Langages : Python, JavaScript, HTML/CSS
Frameworks : Flask
Bases de données : MySQL Workbench
Conception : UML (draw.io)
Maintenance : Montage PC & Hardware'
];

$v = $_GET['v'] ?? '1';
$tpl_file = 'de' . $v;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Capture Design <?= $v ?></title>
    <link rel="stylesheet" href="templates/<?= $tpl_file ?>.css">
    
    <style>
        body {
            background-color: #808e9b;
            display: flex;
            justify-content: center;
            padding: 40px;
            margin: 0;
        }
        .cv-wrapper {
            width: 800px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.3);
            background: white;
        }
    </style>
</head>
<body>
    
    <div class="cv-wrapper">
        <?php include "templates/" . $tpl_file . ".php"; ?>
    </div>

</body>
</html>
