<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web videojuego</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="./my-styles.css" rel="stylesheet">
    
</head>

<body>
    <div class="bg-black m-body">
        <main>
            <header class="d-flex flex-wrap justify-content-center py-3 px-lg-5 mb-4 bg-black">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                    <svg class="bi me-2" width="40" height="32">
                        <use xlink:href="#bootstrap" />
                    </svg>
                    <span class="fs-4">
                        <img src="./personajes/Gunfire_Reborn_Logo.webp" class="w-50 h-auto">
                    </span>
                </a>

                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Characters</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Weapons</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">FAQs</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">About</a></li>
                </ul>
            </header>
            <div class="m-container">

            <?php
            
            // Import all characters data from the personajes.php file.
            require "personajes.php";
            // Import all functions from the funciones_web.php file.
            require "funciones_web.php";

            use funciones_web\createCharacterSheet;

            // Convert characters to JSON format.
            $charsJSON = convertJSONChar($personajes);
            // Create a character sheet for each character in the characters array.
            createCharacterSheet($personajes, "Lyn");
            createCharacterSheet($personajes, "Tao");
            createCharacterSheet($personajes, "Xing");
            createCharacterSheet($personajes, "Nona");
            createCharacterSheet($personajes, "Li");
            createCharacterSheet($personajes, "Momo");
            createCharacterSheet($personajes, "Crown");
            createCharacterSheet($personajes, "Zi");


            ?>


            </div>
        </main>
        
        <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 bg-black d-flex flex-column-reverse px-5" style="width: auto;">
           
                <div class="col mb-3 ">  
                    </a>
                    <p style="color: #CC5500;";>&copy; 2024 Company, Inc. All rights reserved</p>
                </div>

                <div class="col mb-3">
                    <h5 style="color: #CC5500;" class="my-5">Social Media</h5>
                    <ul class="nav">
                        <li class="nav-item mb-2 list-inline-item"><a href="#" class="nav-link p-0 text-warning"><img class="w-25" src="./icons/facebook_icon.png" alt=""></a></li>
                        <li class="nav-item mb-2 list-inline-item"><a href="#" class="nav-link p-0 text-warning"><img class="w-25" src="./icons/Instagram_icon.jpg" alt=""></a></li>
                        <li class="nav-item mb-2 list-inline-item"><a href="#" class="nav-link p-0 text-warning"><img class="w-25" src="./icons/twitter_icon.png" alt=""></a></li>
                        <li class="nav-item mb-2 list-inline-item"><a href="#" class="nav-link p-0 text-warning"><img class="w-25" src="./icons/youtube_icon.png" alt=""></a></li>
                    </ul>
                </div>
        </footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- JavaScript -->
<script src="./script.js"></script>
<!-- Import php data to JavasScript -->
<script>const characters = <?php echo ($charsJSON); ?>;</script>
</body>

</html>