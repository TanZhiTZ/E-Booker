<?php include('config/constants.php'); ?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/html.html to edit this template
-->
<html>
    <head>
        <title>E ★ BOOKER &bull; Book</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
        <script src="js/main.js"></script>
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
        <div>
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
        
        <div class="main container" style=" background-color: white; padding: 20px 30px 30px 30px;">
            <div>
                <?php
                    $id = $_GET['id'];

                    $json = file_get_contents("http://localhost/e_booker/api/product/read_one.php?id=$id");
                    $data = json_decode($json);
                    
                        // Open the table
                        echo "<div>";
                        
                            echo "<div class='main_left' style='padding-bottom: 10px;'>
                            <h1 style='color: black'>$data->title</h1>
                        </div>
                        <div class='container'>
                            <div class='row'>
                                <div class='col-sm' style='max-width: 290px;'>
                                    <div>
                                        <a href'pdf/pdf.pdf' target='blank' class='book-link'><img src='img/books/$data->img_name' class='img-fluid book-img'/></a>
                                    </div>
                                    <div>
                                        <a href='pdf/pdf.pdf' target='blank'><span>Free Preview</span></a>
                                    </div>
                                </div>
    
    
                                        <div class='main_center col-sm' style='min-width: 55%'>
                                                <div>
                                                    <p>Author : <strong class='author'>$data->author</strong></p>
                                                </div>
                                                </br>
                                                <hr/>
                                                </br>
                                            <div>
                                                <div>
                                                    Content &bull; Description
                                                </div>
                                                </br>
                                                <div>
                                                    <p><i>
                                                        $data->description
                                                    </i></p>
                                                </div>
                                            </div>
                                        </div>";
                                if (isset($_SESSION['user_id'])) {
                                    $user_id = $_SESSION['user_id'];
                                    

                                    echo "<form action='http://localhost/e_booker/api/product/create.php'  id='loginToIndex' method='POST'>
                                        
                                                <input type='hidden' value='$user_id' name='user_id'>
                                                <input type='hidden' value='$data->id' name='id'>
                                                <input type='hidden' value='$data->title' name='title'>
                                                <input type='hidden' value='$data->description' name='description'>
                                                <input type='hidden' value='$data->img_name' name='img_name'>
                                                <input type='hidden' value='$data->price' name='price'>
                                        ";
                                        //echo "<a href='http://localhost/e_booker/api/product/create.php?user_id=".$user_id."&id=".$records->id."&title=".$records->title."&description=".$records->description."&img_name=".$records->img_name."&price=".$records->price."' class='cart'>+Cart</a>";
                                        $json = file_get_contents("http://localhost/e_booker/api/product/read_library.php?id=$user_id");
                                        $dataLib = json_decode($json);
                                        $json = file_get_contents("http://localhost/e_booker/api/product/read_cart.php?id=$user_id");
                                        $dataCart = json_decode($json);
                                        $duplicate = "no";

                                        foreach ($dataLib->records as $idx => $recordsLib) {
                                            if ($recordsLib->book_id==$data->id){
                                                
                                                $duplicate = "yes";
                                            }
                                        }
                                        foreach ($dataCart->records as $idx => $recordsCart) {
                                            if ($recordsCart->book_id==$records->id){
                                                
                                                $duplicate = "yes";
                                            }
                                        }
                                        if ($duplicate == 'no') {
                                            echo "<div class='col-sm'><button type='submit' class='cart' style='margin: 0 0px 0 70px; padding: 10px 20px 10px 20px;' target='blank'>+Cart</button></form>";
                                        }
                                        
                                    }
                                    
                                echo "</div>
                                
                            </div>
                        </div>";

                        // Close the table
                        echo "</div>";
                    
                ?>
                
            </div>
        </div>
</br></br>
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
    </body>
</html>
