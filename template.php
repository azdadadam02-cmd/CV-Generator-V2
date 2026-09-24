<?php
session_start();
require 'db.php';

if (!isset($_GET['id'])) {
    die("CV introuvable.");
}

$cv_id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM cvs WHERE id = :id");
$stmt->execute(['id' => $cv_id]);
$cv = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$cv) {
    die("CV introuvable.");
}

$tpl_db = $cv['template'];
$tpl_file = 'de1';

if ($tpl_db == 'modele_1') $tpl_file = 'de1';
elseif ($tpl_db == 'modele_2') $tpl_file = 'de2';
elseif ($tpl_db == 'modele_3') $tpl_file = 'de3';
elseif ($tpl_db == 'modele_4') $tpl_file = 'de4';
elseif ($tpl_db == 'modele_5') $tpl_file = 'de5';
elseif ($tpl_db == 'modele_6') $tpl_file = 'de6';
elseif ($tpl_db == 'modele_7') $tpl_file = 'de7';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon CV - <?= htmlspecialchars($cv['nom_complet']) ?></title>
    
    <link rel="stylesheet" href="templates/<?= $tpl_file ?>.css">
    
    <style>
        body { background-color: #f4f7f6; margin: 0; padding: 20px; }
        .actions-bar { text-align: center; margin-bottom: 30px; }
        .btn { padding: 10px 25px; margin: 0 10px; border-radius: 5px; text-decoration: none; color: white; font-weight: bold; border: none; cursor: pointer; font-size: 16px; }
        .btn-back { background-color: #3e556d; }
        .btn-print { background-color: #27ae60; }
        
        @media print {
    .actions-bar { display: none !important; }
    body { background-color: white; padding: 0; margin: 0; }
    
    * {
        -webkit-print-color-adjust: exact !important;
        color-adjust: exact !important;
        print-color-adjust: exact !important;
    }
    
    div[class^="cv-de"] { 
        box-shadow: none !important; 
        border: none !important; 
        margin: 0 !important;
    }
}
    </style>
</head>
<body>

    <div class="actions-bar">
        <a href="index.php" class="btn btn-back">Retour à l'accueil</a>
        <button onclick="window.print()" class="btn btn-print">Imprimer / Sauvegarder en PDF</button>
    </div>

    <?php include "templates/" . $tpl_file . ".php"; ?>

</body>
</html>
