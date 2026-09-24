<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action_type'] ?? 'login';
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($action == 'register') {
        $nom = $_POST['nom'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        try {
            $stmt = $conn->prepare("INSERT INTO utilisateurs (nom, email, password) VALUES (:nom, :email, :password)");
            $stmt->execute(['nom' => $nom, 'email' => $email, 'password' => $hashed_password]);
            
            $_SESSION['user_id'] = $conn->lastInsertId();
            $_SESSION['user_nom'] = $nom;
            
            header("Location: index.php");
            exit();
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                echo "<script>alert('Cet email est déjà enregistré !'); window.history.back();</script>";
            } else {
                echo "Erreur: " . $e->getMessage();
            }
        }
    } 
    elseif ($action == 'login') {
        try {
            $stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE email = :email");
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_nom'] = $user['nom'];
                
                header("Location: index.php");
                exit();
            } else {
                echo "<script>alert('Email ou mot de passe incorrect !'); window.history.back();</script>";
            }
        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }
    }
}
?>
