<?php include('config/constants.php'); ?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<html>
    <head>
        <title>E ★ BOOKER</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
        <script type="text/javascript" 
       src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </head>
    <body>
        <!-- Header -->
        <div class="header">
            <div>
                <a href="index.php"><img class="header-logo" src="img/E-Booker.jpg" alt="main_logo" width="235"/></a>
            </div>
            <table class="header">
                <th>
                    <form action="search.php" role="search" method="POST">
                        <fieldset class="header-searchbar">
                            <input type="search" id="search-bar" class="header-input" placeholder="Books search by Title・Author" name="bookSearch" maxlength="150">
                            <button class="header-button" type="submit">
                                <span class="material-symbols-outlined" style="color:white">
                                    search
                                </span>
                            </button>
                        </fieldset>  
                    </form>
                </th>
                
                <?php include('header/loginandout.php'); ?>
                
            </table>
        </div>
        <div class="spacer"></div>
        
        <!-- Categories -->
        <div id="categories">
            <ul class="header container-fluid">
                <li>
                    <a href="index.php#categories" class="header btn "><button class="btn-frame"><span>All</span></button></a>
                </li>
                <li>
                    <a href="category_manga.php#categories" class="header btn "><button class="btn-frame"><span>Manga</span></button></a>
                </li>
                <li>
                    <a href="category_lightNovel.php#categories" class="header btn "><button class="btn-frame"><span>LightNovel</span></button></a>
                </li>
                <li>
                    <a href="category_doujinshi.php#categories" class="header btn "><button class="btn-frame"><span>Doujinshi</span></button></a>
                </li>
                <li>
                    <a href="category_free.php#categories" class="header btn "><button class="btn-frame"><span>Free</span></button></a>
                </li>
            </ul>
        </div>
       
                 
        <!-- Main Content & Books -->
            <div class="main row align-items-start">

                <div class="left-main col-sm" style="min-width: 80%; max-width: auto;">
                    <section>
                        <header>
                            <h2 class="container main" id="all-books" style="background-color: #32284a; color:white">News and Popular!</h2>
                        </header>
                    </section>
                    <div style="padding-left: 15px;">
                    <?php
                        $json = file_get_contents("http://localhost/e_booker/api/product/read_category.php?category_id=0");
                        $data = json_decode($json);

                        if (count($data->records)) {
                            // Open the table
                            echo "<div>";

                            // Cycle through the array
                            foreach ($data->records as $idx => $records) {

                                echo "<div id='book' style='width:266px;'>
                                                <a href='book-description.php?id=$records->id' class='book-link'><img src='img/books/$records->img_name' class='book-img' width='240' height='340' /></a>
                                                <div style='height:45px;'>$records->title</div>
                                                <div class='book-button'>
                                                    <ul class='books'>
                                                        <li class='preview'>
                                                            <a href='book-description.php?id=$records->id' class='preview' target='_blank'>Preview</a>
                                                        </li>
                                                        <li class='cart'>";

                                                        if (isset($_SESSION['user_id'])) {
                                                            $user_id = $_SESSION['user_id'];
                                                            

                                                            echo "<form action='http://localhost/e_booker/api/product/create.php' id='loginToIndex' method='POST'>
                                                                
                                                                        <input type='hidden' value='$user_id' name='user_id'>
                                                                        <input type='hidden' value='$records->id' name='id'>
                                                                        <input type='hidden' value='$records->title' name='title'>
                                                                        <input type='hidden' value='$records->description' name='description'>
                                                                        <input type='hidden' value='$records->img_name' name='img_name'>
                                                                        <input type='hidden' value='$records->price' name='price'>
                                                                ";

                                                            /$json = file_get_contents("http://localhost/e_booker/api/product/read_library.php?id=$user_id");
                                                            $dataLib = json_decode($json);
                                                            $json = file_get_contents("http://localhost/e_booker/api/product/read_cart.php?id=$user_id");
                                                            $dataCart = json_decode($json);
                                                            $duplicate = "no";

                                                            foreach ($dataLib->records as $idx => $recordsLib) {
                                                                if ($recordsLib->book_id==$records->id){
                                                                    echo "<button class='cart' style='pointer-events: none; background-color:#72a6a1;'>+Cart</button>";
                                                                    $duplicate = "yes";
                                                                }
                                                            }
                                                            foreach ($dataCart->records as $idx => $recordsCart) {
                                                                if ($recordsCart->book_id==$records->id){
                                                                    echo "<button class='cart' style='pointer-events: none; background-color:#72a6a1;'>+Cart</button>";
                                                                    $duplicate = "yes";
                                                                }
                                                            }
                                                            if ($duplicate == 'no') {
                                                                echo "<button type='submit' class='cart'>+Cart</button></form>";
                                                            }
                                                            
                                                        }
                                                        else {
                                                            echo "<button class='cart' style='pointer-events: none; background-color:#72a6a1;'>+Cart</button>";
                                                        }

                                echo "                   </li>
                                                    </ul>
                                                </div>
                                            </div>";
                            }

                            // Close the table
                            echo "</div>";
                        }
                    ?>

                    </div>
                    <br/><br/>
                </div>
                </div>
        <footer class="footer">
            © E BOOKER
        </footer>
            
    <style>
        .material-symbols-outlined {
            font-variation-settings:
            'FILL' 0,
            'wght' 500,
            'GRAD' 0,
            'opsz' 48
        }
    </style>
    <script src="js/main.js"></script>
    </body>
</html>
