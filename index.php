<?php
session_start();
require 'db.php';

$my_cvs = [];
if (isset($_SESSION['user_id'])) {
    $stmt = $conn->prepare("SELECT * FROM cvs WHERE user_id = :user_id ORDER BY id DESC");
    $stmt->execute(['user_id' => $_SESSION['user_id']]);
    $my_cvs = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV gen</title>
    
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="nav_bar">
    <ul>
        <li><a href="#section_1">home</a></li>
        
        <?php if(isset($_SESSION['user_nom'])): ?>
            <li><a href="logout.php">déconnexion</a></li>
        <?php else: ?>
            <li><a href="login.php">connexion</a></li>
        <?php endif; ?>

        <li><a href="javascript:void(0)" onclick="openStory()">story</a></li>
        
        <?php if(isset($_SESSION['user_nom'])): ?>
            <?php 
                $nom = $_SESSION['user_nom'];
                $premiere_lettre = strtoupper(substr($nom, 0, 1)); 
            ?>
            <li class="profile-item">
                <div class="user-profile-btn">
                    <span class="avatar-circle"><?php echo $premiere_lettre; ?></span>
                    <span class="user-name"><?php echo htmlspecialchars($nom); ?></span>
                </div>
            </li>
        <?php endif; ?>
    </ul>
</nav>
    <section id="section_1" class="section_1">
        
        <div class="container-left">
            <img src="img/logo.png" alt="CV Logo" class="title-image">

    
            <h1 class="main-title">Create a Professional CV quickly</h1>

   
            <p class="main-desc">
                A quickCV is one of the easiest ways to start your job hunt. Use our the best native designs.
            </p>
            <a href="#section_2" class="generat-home">generat now</a>
        </div>

        
        <div class="container-right">
            <img src="img/a3.png" class="cv-img">
        </div>
    </section>

    <section id="section_2" class="section_2">
    <div class="cv_desing">
       
        <div class="preview-70">
           
            <img id="main-preview" src="img/cv_1.png" alt="Aperçu du CV">
        </div>

        
       <div class="options-30">
    
    <button type="button" class="design-btn active" onclick="changeDesign('img/cv_1.png', 'modele_1', this)">
        <img src="img/cv_1.png" alt="Design 1">
    </button>
    
    <button type="button" class="design-btn" onclick="changeDesign('img/cv_2.png', 'modele_2', this)">
        <img src="img/cv_2.png" alt="Design 2">
    </button>
    
    <button type="button" class="design-btn" onclick="changeDesign('img/cv_3.png', 'modele_3', this)">
        <img src="img/cv_3.png" alt="Design 3">
    </button>
    
    <button type="button" class="design-btn" onclick="changeDesign('img/cv_4.png', 'modele_4', this)">
        <img src="img/cv_4.png" alt="Design 4">
    </button>
    
    <button type="button" class="design-btn" onclick="changeDesign('img/cv_5.png', 'modele_5', this)">
        <img src="img/cv_5.png" alt="Design 5">
    </button>
    

</div>
        
    </div>
    <div class="cv_container">
        <h2 class="cv_title">Saisissez vos informations</h2>
        
        <form id="cv_data" method="POST" action="save_cv.php" target="_blank">
    <input type="hidden" id="selected_template" name="template" value="modele_1">

    <h3>Informations Personnelles</h3>
    <input type="text" id="cv_nom" name="nom_complet" placeholder="Nom Complet" required>
    <input type="text" id="cv_titre" name="titre" placeholder="Titre du Profil (ex: Développeur Web)">
    <input type="email" id="cv_email" name="email" placeholder="Email" required>
    <input type="tel" id="cv_tele" name="telephone" placeholder="Téléphone">
    <input type="text" id="cv_adresse" name="adresse" placeholder="Adresse (Ville, Pays)">

    <h3>Profil Professionnel</h3>
    <textarea id="cv_profil" name="profil" placeholder="Rédigez une courte description de vous et de vos objectifs..."></textarea>

    <h3>Expérience Professionnelle</h3>
    <textarea id="cv_experience" name="experience" placeholder="Décrivez vos expériences professionnelles ou stages..."></textarea>

    <h3>Formation & Diplômes</h3>
    <textarea id="cv_formation" name="formation" placeholder="Diplômes, établissement et année..."></textarea>

    <h3>Compétences</h3>
    <input type="text" id="cv_competences" name="competences" placeholder="Ex : HTML, CSS, Python, MySQL">
    
    <button type="submit" class="btn-generer">Générer le CV</button>
</form>
    </div>

     


    </section>
    <div id="storyModal" class="story-modal">
    <div class="story-modal-content">
        <span class="close-story" onclick="closeStory()">&times;</span>
        <h2 style="color: #3e556d; text-align: center; margin-bottom: 20px;">Historique des CVs</h2>
        
        <div class="cv-grid">
            <?php if (isset($my_cvs) && count($my_cvs) > 0): ?>
                <?php foreach ($my_cvs as $cv): ?>
                    <?php 
                        $img_src = 'img/cv_1.png';
                        if ($cv['template'] == 'modele_2') $img_src = 'img/cv_2.png';
                        elseif ($cv['template'] == 'modele_3') $img_src = 'img/cv_3.png';
                        elseif ($cv['template'] == 'modele_4') $img_src = 'img/cv_4.png';
                        elseif ($cv['template'] == 'modele_5') $img_src = 'img/cv_5.png';
                        elseif ($cv['template'] == 'modele_6') $img_src = 'img/cv_6.png';
                        elseif ($cv['template'] == 'modele_7') $img_src = 'img/cv_7.png';
                    ?>
                    
                    <a href="template.php?id=<?= $cv['id'] ?>" target="_blank" class="cv-card" style="text-decoration: none; color: inherit;">
                        <img src="<?= $img_src ?>" alt="Design CV">
                        
                        <h3 style="margin-top: 10px;"><?= htmlspecialchars($cv['titre'] != '' ? $cv['titre'] : 'CV - ' . $cv['nom_complet']) ?></h3>
                        <p style="color: #7f8c8d; font-size: 13px;">Date: <?= htmlspecialchars($cv['date_creation'] ?? 'Nouveau') ?></p>
                    </a>
                    
                <?php endforeach; ?>
            <?php else: ?>
                <p style="text-align: center; width: 100%; color: #7f8c8d;">Vous n'avez pas encore créé de CV.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<script src="index.js"></script>
</body>
</html>
