<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurantul nostru</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #333;
            color: #fff;
            padding: 10px 15px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            transition: background-color 0.3s, transform 0.3s;
            display: none;
            z-index: 999;
        }
        .back-to-top:hover {
            background-color: #555;
            transform: scale(1.1);
        }
        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        nav h1 {
            margin: 0;
        }
        .nav-links a {
            margin: 0 10px;
        }
        .user-info {
            margin-left: 20px;
        }
        .btn {
            padding: 6px 12px;
            background-color: #333;
            color: white;
            border-radius: 6px;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #555;
        }
    </style>
</head>
<body id="top">

    <!-- HEADER -->
    <header>
        <nav>
            <a href="cos.html">🛒 Coș</a>
            <h1>Restaurantul nostru</h1>
            <div class="nav-links">
                <a href="index.php">Acasă</a>
                <a href="meniu.html">Meniu</a>
                <a href="despre-noi.html">Despre noi</a>
                <a href="contact.html">Contact</a>

                <?php if (isset($_SESSION['utilizator'])): ?>
                    <span class="user-info">👋 Bun venit, <strong><?= htmlspecialchars($_SESSION['utilizator']); ?></strong></span>
                    <a href="logout.php" class="btn">Logout</a>
                <?php else: ?>
                    <a href="login.html" class="btn">Login</a>
                    <a href="register.html" class="btn">Înregistrare</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>

    <!-- HERO SECTION -->
    <section class="hero">
        <h1>Bun venit la Restaurantul nostru!</h1>
        <p>Gusturi autentice, preparate cu pasiune și ingrediente proaspete.</p>
        <a href="meniu.html" class="btn">Vezi meniul</a>
    </section>

    <!-- RESTUL PAGINII -->
    <main>
        <section id="specialitati">
            <h2 class="section-title">Specialitățile noastre</h2>
            <div class="menu-grid">
                <div class="menu-item">
                    <img src="papanasi.jpg" alt="Papanași">
                    <div class="content">
                        <h3>Papanași</h3>
                        <p>Desert tradițional cu dulceață și smântână.</p>
                    </div>
                </div>

                <div class="menu-item">
                    <img src="ciorbadeburta.jpg" alt="Ciorbă de burtă">
                    <div class="content">
                        <h3>Ciorbă de burtă</h3>
                        <p>Preparat românesc clasic, servit fierbinte și gustos.</p>
                    </div>
                </div>

                <div class="menu-item">
                    <img src="sarmalecumamaliga.jpg" alt="Sarmale cu mămăligă">
                    <div class="content">
                        <h3>Sarmale cu mămăligă</h3>
                        <p>Rețetă autentică, ca la bunica acasă.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="about">
            <img src="restaurant.jpg" alt="Restaurantul nostru">
            <div class="text">
                <h2 class="section-title">Despre noi</h2>
                <p>
                    La <strong>Restaurantul nostru</strong>, credem că mâncarea bună aduce oamenii împreună.
                    Oferim o experiență culinară autentică, cu preparate tradiționale reinterpretate modern.
                </p>
                <a href="despre-noi.html" class="btn">Află mai multe</a>
            </div>
        </section>

        <section>
            <h2 class="section-title">Rezervă o masă</h2>
            <p style="text-align:center; max-width:600px; margin:auto;">
                Vrei să iei masa la noi? Fă o rezervare rapidă completând formularul de contact.
            </p>
            <div style="text-align:center; margin-top:1.5rem;">
                <a href="contact.html" class="btn">Contactează-ne</a>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Restaurantul nostru. Toate drepturile rezervate.</p>
    </footer>

    <a href="#top" class="back-to-top" id="backToTop">⬆️ Mergi sus</a>

    <script>
        const backToTop = document.getElementById("backToTop");
        window.addEventListener("scroll", () => {
            backToTop.style.display = window.scrollY > 300 ? "block" : "none";
        });
        backToTop.addEventListener("click", function(e) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: "smooth" });
        });
    </script>
</body>
</html>
