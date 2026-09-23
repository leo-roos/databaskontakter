<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title>W3.CSS Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/w3_y6jI.css">
</head>

<body class="w3-content" style="max-width:1500px">

    <!-- Navbar (Sits on top) -->
    <div class="w3-flex w3-top w3-white w3-wide w3-padding w3-card" style="max-width:1500px">
        <a href="#home" class="w3-button">
            <b>BR</b> Architects
        </a>
        <nav class="w3-flex w3-hide-small" style="margin-left:auto">
            <a href="#projects" class="w3-button">Projects</a>
            <a href="#about" class="w3-button">About</a>
            <a href="#contact" class="w3-button">Contact</a>
        </nav>
    </div>

    <!-- Header -->
    <header id="home" class="w3-display-container">
        <img class="w3-image" src="assets/architect_y6jI.jpg" alt="Architecture" style="width:100%">
        <div class="w3-display-middle">
            <h1 class="w3-text-white w3-wide">
                <span class="w3-padding w3-black w3-opacity-min"><b>BR</b></span>
                <span class="w3-hide-small w3-text-light-grey">Architects</span>
            </h1>
        </div>
    </header>

    <!-- Projects -->
    <section id="projects" class="w3-container w3-padding-32">

        <h2 class="w3-border-bottom w3-border-light-grey w3-padding-16">Projects</h2>

        <div class="w3-grid" style="grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:16px">

            <div class="w3-display-container">
                <div class="w3-display-topleft w3-black w3-padding">Summer House</div>
                <img src="assets/house5_y6jI.jpg" class="w3-image" style="width:100%" alt="Summer House">
            </div>

            <div class="w3-display-container">
                <div class="w3-display-topleft w3-black w3-padding">Brick House</div>
                <img src="assets/house2_y6jI.jpg" class="w3-image" style="width:100%" alt="Brick House">
            </div>

            <div class="w3-display-container">
                <div class="w3-display-topleft w3-black w3-padding">Renovated</div>
                <img src="assets/house3_y6jI.jpg" class="w3-image" style="width:100%" alt="Renovated House">
            </div>

            <div class="w3-display-container">
                <div class="w3-display-topleft w3-black w3-padding">Barn House</div>
                <img src="assets/house4_y6jI.jpg" class="w3-image" style="width:100%" alt="Barn House">
            </div>

        </div>
    </section>

    <!-- About -->
    <section id="about" class="w3-container w3-padding-32">

        <h2 class="w3-border-bottom w3-border-light-grey w3-padding-16">About</h2>
        <div class="w3-grid w3-grayscale" style="grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:16px">
            <div>
                <img src="assets/team2_y6jI.jpg" class="w3-image" alt="John" style="width:100%">
                <h3>John Doe</h3>
                <p class="w3-opacity">CEO &amp; Founder</p>
                <p>Phasellus eget enim eu lectus faucibus vestibulum.</p>
                <p><button class="w3-button w3-light-grey w3-block">Contact</button></p>
            </div>

            <div>
                <img src="assets/team1_y6jI.jpg" class="w3-image" alt="Jane" style="width:100%">
                <h3>Jane Doe</h3>
                <p class="w3-opacity">Architect</p>
                <p>Phasellus eget enim eu lectus faucibus vestibulum.</p>
                <p><button class="w3-button w3-light-grey w3-block">Contact</button></p>
            </div>

            <div>
                <img src="assets/team3_y6jI.jpg" class="w3-image" alt="Mike" style="width:100%">
                <h3>Mike Ross</h3>
                <p class="w3-opacity">Architect</p>
                <p>Phasellus eget enim eu lectus faucibus vestibulum.</p>
                <p><button class="w3-button w3-light-grey w3-block">Contact</button></p>
            </div>

            <div>
                <img src="assets/team4_y6jI.jpg" class="w3-image" alt="Dan" style="width:100%">
                <h3>Dan Star</h3>
                <p class="w3-opacity">Architect</p>
                <p>Phasellus eget enim eu lectus faucibus vestibulum.</p>
                <p><button class="w3-button w3-light-grey w3-block">Contact</button></p>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="w3-container w3-padding-32">
        <h2 class="w3-border-bottom w3-border-light-grey w3-padding-16">Contact</h2>
        <p>Let's get in touch and talk about your next project.</p>

        <form action="form-request.php" method="post" target="_blank">
            <input class="w3-input w3-section w3-border" type="text" placeholder="Name" required="" name="Name">

            <input class="w3-input w3-section w3-border" type="email" placeholder="Email" required="" name="Email">

            <input class="w3-input w3-section w3-border" type="text" placeholder="Subject" required="" name="Subject">

            <input class="w3-input w3-section w3-border" type="text" placeholder="Comment" required="" name="Comment">

            <button class="w3-button w3-black w3-section" type="submit">
                SEND MESSAGE
            </button>
        </form>
    </section>

    <section id="contacts" class="w3-container w3-padding-32">
        <h2 class="w3-border-bottom w3-border-light-grey w3-padding-16">Contacts</h2>

        <div class="w3-grid" style="grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:16px">
            <?php
                $DB_servername = 'localhost';
                $DB_username = 'root';
                $DB_password = '';
                $DB_name = 'introduction';
                try
                {
                    $con = new PDO("mysql:host=$DB_servername;dbname=$DB_name;charset=utf8mb4", $DB_username, $DB_password);
                    // $con = new PDO("mysql:host = $DB_servername; dbname = $DB_name", $DB_username, $DB_password);
                    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    $sql = "SELECT * FROM `contact`;";
                    $result = $con->query($sql);

                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo '
                        <div class="w3-display-container">
                            <div>ID: ' . $row["id"] . '</div>
                            <div>Name: ' . $row["name"] . '</div>
                            <div>E-mail: ' . $row["email"] . '</div>
                            <div>Subject: ' . $row["subject"] . '</div>
                            <div>Comment: ' . $row["comment"] . '</div>
                        </div>';
                    }
                }

                catch(PDOException $e)
                {
                    echo "Connection failed: " . $e->getMessage();
                }
            ?>
        </div>
    </section>



    <img src="assets/map_y6jI.jpg" class="w3-image" alt="Map" style="width:100%">
    <footer class="w3-center w3-black w3-container">
        <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank"
                class="w3-hover-text-green">w3.css</a></p>
    </footer>

</body>

</html>