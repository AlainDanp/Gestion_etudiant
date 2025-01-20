<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$user = $_SESSION['user'] ?? null;
$role = $user['role'] ?? 'guest';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/etudiants.css">
    <title>Navbar Dynamique</title>
</head>
    <main>
        <?php if ($role === 'etudiant'): ?>
        <header class="uper">
            <p> DASHBOARD ETUDIANT</p>
        </header>
        <?php endif; ?>
        <?php if ($role === 'admin'): ?>
            <header class="uper">
                <p> DASHBOARD ADMIN</p>
            </header>
        <?php endif; ?>
        <div class="stats-container">
            <div class="stat-card" style=" background-color: #6a1b9a;">
                <i class="icon ri-book-line"></i>
                <div class="stat-info">
                    <h3>3256</h3>
                    <p>STUDENTS</p>
                </div>
            </div>
            <div class="stat-card" style="background-color: #e64a19;">
                <i class="icon ri-user-line"></i>
                <div class="stat-info">
                    <h3>68</h3>
                    <p>EMPLOYEES</p>
                </div>
            </div>
            <div class="stat-card" style="background-color: #00796b;">
                <i class="icon ri-book-open-line"></i>
                <div class="stat-info">
                    <h3>16</h3>
                    <p>COURSES</p>
                </div>
            </div>
            <div class="stat-card" style="background-color: #0288d1;">
                <i class="icon ri-money-dollar-box-line"></i>
                <div class="stat-info">
                    <h3>3,47,000</h3>
                    <p>REVENUE</p>
                </div>
            </div>
        </div>

        <div class="dig-container">
            <div class="dig-card" >
                <div class="stat-info">
                    <div class="circular-chart">
                        <div class="circle" data-percentage="95">
                            <span>95%</span>
                        </div>
                        <p>Admission</p>
                    </div>
                </div>
            </div>
            <div class="dig-card">
                <div class="stat-info">
                    <div class="circular-chart">
                        <div class="circle" data-percentage="60">
                            <span>60%</span>
                        </div>
                        <p>Admission</p>
                    </div>
                </div>
            </div>
            <div class="dig-card">
                <div class="stat-info">
                    <div class="circular-chart">
                        <div class="circle" data-percentage="15">
                            <span>95%</span>
                        </div>
                        <p>Admission</p>
                    </div>
                </div>
            </div>
            <div class="dig-card">
                <div class="stat-info">
                    <div class="circular-chart">
                        <div class="circle" data-percentage="55">
                            <span>95%</span>
                        </div>
                        <p>Admission</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="stats-container">
            <button type="button" class="btn-card" style="background: red">
                <span class="btn__text"> AJouter Etudiant</span>
                <span class="btn__icon">
                    <i class="ri-add-line"></i>
                </span>
            </button>
            <button type="button" class="btn-card"  style="background: #0288d1" >
                <span class="btn__text"> AJouter Class</span>
                <span class="btn__icon">
                    <i class="ri-add-line"></i>
                </span>
            </button>
            <button type="button" class="btn-card" style="background: hsl(220, 24%, 12%)">
                <span class="btn__text"> AJouter Cours</span>
                <span class="btn__icon">
                    <i class="ri-add-line"></i>
                </span>
            </button>
            <button type="button" class="btn-card">
                <span class="btn__text"> Génere un rapport</span>
                <span class="btn__icon">
                    <i class="ri-add-line"></i>
                </span>
            </button>
        </div>
    </main>
<?php
include 'footer.php';
?>
<script src="assets/js/pourcentage.js"></script>
</html>

