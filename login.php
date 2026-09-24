<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Inscription</title>
    
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <nav class="nav_bar">
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
        </nav>
    <div class="login-container">
        
        
        <div class="login-left">
            
            <div class="logo-container">
                <img src="img/logo.png" alt="Logo" class="logo">
            </div>

            <div class="login-header">
                
                <h1 id="form-title">Welcome</h1>
                <p id="form-desc">Experience the new beauty in you.</p>
            </div>

           <form class="login-form" method="POST" action="auth.php">
    
    <input type="hidden" name="action_type" id="action_type" value="login">

    <div class="input-group" id="name-group" style="display: none;">
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" placeholder="Entrez votre nom">
    </div>

    <div class="input-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Entrez votre email" required>
    </div>

    <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>
    </div>

    <div class="form-actions" id="form-actions">
        <label class="remember-me">
            <input type="checkbox"> Remember me
        </label>
    </div>

    <button type="submit" class="btn btn-connexion" id="btn-main">Connexion</button>
    <button type="button" class="btn btn-creer" id="btn-toggle">Créer un compte</button>
    </form>

            <div class="login-footer">
                <a href="#">Terms & Conditions</a> • <a href="#">Privacy Policy</a>
            </div>
        </div>

        
        <div class="login-right">
            <img src="img/A5.png" alt="Background" class="right-image">
        </div>

    </div>
<script src="login.js"></script>
    
</body>
</html>