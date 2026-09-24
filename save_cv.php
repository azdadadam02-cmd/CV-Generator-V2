<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Vous devez être connecté pour enregistrer votre CV !'); window.location.href='login.php';</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    
    $template = $_POST['template'] ?? 'modele_1';
    $nom_complet = $_POST['nom_complet'] ?? '';
    $titre = $_POST['titre'] ?? '';
    $email = $_POST['email'] ?? '';
    $telephone = $_POST['telephone'] ?? '';
    $adresse = $_POST['adresse'] ?? '';
    $profil = $_POST['profil'] ?? '';
    $experience = $_POST['experience'] ?? '';
    $formation = $_POST['formation'] ?? '';
    $competences = $_POST['competences'] ?? '';

    try {
        $sql = "INSERT INTO cvs (user_id, template, nom_complet, titre, email, telephone, adresse, profil, experience, formation, competences) 
                VALUES (:user_id, :template, :nom_complet, :titre, :email, :telephone, :adresse, :profil, :experience, :formation, :competences)";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'user_id' => $user_id,
            'template' => $template,
            'nom_complet' => $nom_complet,
            'titre' => $titre,
            'email' => $email,
            'telephone' => $telephone,
            'adresse' => $adresse,
            'profil' => $profil,
            'experience' => $experience,
            'formation' => $formation,
            'competences' => $competences
        ]);

        $cv_id = $conn->lastInsertId();
        
        header("Location: template.php?id=" . $cv_id);
        exit();

    } catch (PDOException $e) {
        echo "Erreur lors de la sauvegarde : " . $e->getMessage();
    }
}
?>
