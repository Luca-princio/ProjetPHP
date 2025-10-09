<?php
require_once 'includes/functions.php';
requireLogin();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title : 'Gestion de Scolarité'; ?></title>
    <!--link rel="stylesheet" href="assets/css/style.css"-->
    <link rel="stylesheet" href="assets/css/styl.css">
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <a href="index.php" class="logo">
    <div class="logo-circle">
        <span class="logo-icon">🎓</span>
    </div>
    <span class="logo-text">Gestion Scolarité</span>
</a>
            
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">Accueil</a>
                </li>
                
                <li class="nav-item">
                    <a href="#" class="nav-link">Étudiants</a>
                    <div class="dropdown">
                        <a href="students.php?specialite=GI" class="dropdown-item">GI</a>
                        <a href="students.php?specialite=TM" class="dropdown-item">TM</a>
                        <a href="students.php?specialite=GRH" class="dropdown-item">GRH</a>
                        <a href="students.php" class="dropdown-item">Tous les étudiants</a>
                    </div>
                </li>
                
                <li class="nav-item">
                    <a href="teachers.php" class="nav-link">Enseignants</a>
                </li>
                
                <li class="nav-item">
                    <a href="classes.php" class="nav-link">Classes</a>
                </li>
                
                <li class="nav-item">
                    <a href="stages.php" class="nav-link">Stages</a>
                </li>
                
                <li class="nav-item">
                    <a href="subjects.php" class="nav-link">Matières</a>
                </li>
                
                <li class="nav-item">
                    <a href="diplomas.php" class="nav-link">Diplômes</a>
                </li>
                
                <li class="nav-item">
                    <a href="teaching.php" class="nav-link">Enseignement</a>
                </li>
                
                
            </ul>
        </div>
    </nav>

    <!-- Added session message display -->
    <?php if (isset($_SESSION['message'])): ?>
        <div style="max-width: 1200px; margin: 20px auto; padding: 0 20px;">
            <div class="alert alert-<?php echo $_SESSION['message_type'] ?? 'info'; ?>">
                <?php echo $_SESSION['message']; ?>
            </div>
        </div>
        <?php 
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
        ?>
    <?php endif; ?>
