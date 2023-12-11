<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registratie en Inloggen</title>
    <link rel="stylesheet" href="css/registeren.css">
</head>
<body>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet">

    <div class="navbar">
        <a href="website.html">Home</a>
        <a href="producten.html">Producten</a>
        <a href="over_ons.html">About-Us</a>
        <a href="contact.html">Contact</a>
        <div class="svg-container">
            <div class="dropdown">
                <svg data-v-ce5606dc="" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="">
                    <ellipse data-v-ce5606dc="" cx="13.1962" cy="6.71075" rx="3.27273" ry="4" transform="rotate(15 13.1962 6.71075)" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></ellipse>
                    <path data-v-ce5606dc="" d="M19.875 15.8573C20.2117 16.5413 20.5483 17.8393 20.7644 19.0164C20.9638 20.1028 20.1046 21.0001 19 21.0001L5.38972 21C4.14416 21 3.28086 19.8901 3.70239 18.718C4.14045 17.5 4.7173 16.1126 5.25 15.2858C6.23182 13.762 7.70455 12.9999 9.75 13L15.9375 13.0001C18.1875 13.0001 19.3125 14.7144 19.875 15.8573Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <span class="svg-text">Profiel</span>
                <div class="dropdown-content">
                    <a href="registeren.html">Registeren</a>
                    <a href="inloggen.html">Inloggen</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h2>Registeren</h2>
        
        <form id="register-form" action="registreren.php" method="post">
            <div class="form-group">
                <input type="text" id="naam" name="naam" placeholder="Naam" required>
            </div>
            
            <div class="form-group">
                <input type="email" id="registreerder-email" name="registreerder-email" placeholder="E-mail" required>
            </div>
            <div class="form-group">
                <input type="password" id="registreerder-password" name="registreerder-password" placeholder="Wachtwoord" required>
            </div>
            
            <div class="form-group">
                <button class="button1" type="submit">Registreren</button>
            </div>
        </form>
        
    </div>

    <div class="contentarea">
        <div class='light x1'></div>
        <div class='light x2'></div>
        <div class='light x3'></div>
        <div class='light x4'></div>
        <div class='light x5'></div>
        <div class='light x6'></div>
        <div class='light x7'></div>
        <div class='light x8'></div>
        <div class='light x9'></div>
    </div>
</body>
</html>
