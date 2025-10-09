<?php
$page_title = "Accueil - Gestion de Scolarité";
require_once 'includes/header.php';
require_once 'config/database.php';

// Get some statistics for the dashboard
$database = new Database();
$db = $database->getConnection();

// Count students
$query = "SELECT COUNT(*) as total FROM eleve";
$stmt = $db->prepare($query);
$stmt->execute();
$total_students = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

// Count teachers
$query = "SELECT COUNT(*) as total FROM prof";
$stmt = $db->prepare($query);
$stmt->execute();
$total_teachers = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

// Count classes
$query = "SELECT COUNT(*) as total FROM classe";
$stmt = $db->prepare($query);
$stmt->execute();
$total_classes = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

// Count subjects
$query = "SELECT COUNT(*) as total FROM matiere";
$stmt = $db->prepare($query);
$stmt->execute();
$total_subjects = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Bienvenue, <?php echo $_SESSION['username']; ?>!</h1>
            <p>Tableau de bord - Gestion de Scolarité</p>
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-bottom: 30px;">
            <div class="stat-card" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 30px; border-radius: 15px; text-align: center;">
                <h3 style="font-size: 36px; margin-bottom: 10px;"><?php echo $total_students; ?></h3>
                <p style="font-size: 18px; opacity: 0.9;">Étudiants</p>
            </div>
            
            <div class="stat-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); color: white; padding: 30px; border-radius: 15px; text-align: center;">
                <h3 style="font-size: 36px; margin-bottom: 10px;"><?php echo $total_teachers; ?></h3>
                <p style="font-size: 18px; opacity: 0.9;">Enseignants</p>
            </div>
            
            <div class="stat-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); color: white; padding: 30px; border-radius: 15px; text-align: center;">
                <h3 style="font-size: 36px; margin-bottom: 10px;"><?php echo $total_classes; ?></h3>
                <p style="font-size: 18px; opacity: 0.9;">Classes</p>
            </div>
            
            <div class="stat-card" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); color: white; padding: 30px; border-radius: 15px; text-align: center;">
                <h3 style="font-size: 36px; margin-bottom: 10px;"><?php echo $total_subjects; ?></h3>
                <p style="font-size: 18px; opacity: 0.9;">Matières</p>
            </div>
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
            <div style="background: #f8f9fa; padding: 25px; border-radius: 12px;">
                <h3 style="color: #333; margin-bottom: 15px;">Actions Rapides</h3>
                <div style="display: flex; flex-direction: column; gap: 10px;">
                    <a href="students.php" class="btn btn-primary">Gérer les Étudiants</a>
                    <a href="teachers.php" class="btn btn-success">Gérer les Enseignants</a>
                    <a href="classes.php" class="btn btn-warning">Gérer les Classes</a>
                </div>
            </div>
            
            <div style="background: #f8f9fa; padding: 25px; border-radius: 12px;">
                <h3 style="color: #333; margin-bottom: 15px;">Informations Système</h3>
                <p><strong>Type d'utilisateur:</strong> <?php echo ucfirst($_SESSION['user_type']); ?></p>
                <p><strong>Dernière connexion:</strong> <?php echo date('d/m/Y H:i'); ?></p>
                <p><strong>Statut:</strong> <span style="color: #28a745;">Connecté</span></p>
            </div>
        </div>
    </div>
</div>

 <!-- Section de déconnexion en bas -->
    <div class="logout-section">
        <div class="logout-card">
            <div class="user-info">
                <div class="user-avatar">
                    <span>👤</span>
                </div>
                <div class="user-details">
                    <h3>Bonjour, <?php echo $_SESSION['user_name'] ?? 'Utilisateur'; ?></h3>
                    <p>Vous êtes connecté au système de gestion</p>
                </div>
            </div>
            
            <a href="logout.php" class="logout-btn-bottom" 
               onclick="return confirm('Êtes-vous sûr de vouloir vous déconnecter ?')">
                <span class="logout-icon">🚪</span>
                Se Déconnecter
            </a>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
