<?php include('config/constants.php'); ?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/html.html to edit this template
-->
<html>
    <head>
        <title>E ★ BOOKER &bull; Cart</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body style="justify-content: center; align-items: center;">
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
        
        
        
        <!-- main -->
        <div class="main row align-items-start">
            <div class="left-main col-sm" style="min-width: 80%; max-width: auto;">
                        <section>
                            <header>
                                <h2 class="container main" id="all-books" style="background-color: #32284a; color:white">User Library</h2>
                            </header>
                        </section>
                        <div style="padding-left: 15px;">
                        <?php
                        if (isset($_SESSION['user_id'])) {
                            $user_id = $_SESSION['user_id'];
                            $json = file_get_contents("http://localhost/e_booker/api/product/read_library.php?id=$user_id");
                            $data = json_decode($json);

                            if (count($data->records)) {
                                // Open the table
                                echo "<div>";

                                // Cycle through the array
                                foreach ($data->records as $idx => $records) {

                                    echo "<div id='book' style='width:266px;'>
                                                    <a href='book-description.php?id=$records->book_id' class='book-link'><img src='img/books/$records->book_img_name' class='book-img' width='240' height='340' /></a>
                                                    <div style='height:45px;'>$records->book_title</div>
                                                    <div class='book-button'>
                                                        <ul class='books'>
                                                            <li class='preview'>
                                                                <a href='book-description.php?id=$records->book_id' class='preview' target='_blank'>View Book</a>
                                                            </li>
                                                            <li class='cart'>";

                                    echo "                   </li>
                                                        </ul>
                                                    </div>
                                                </div>";
                                }

                                // Close the table
                                echo "</div>";
                            }
                        }
                        ?>

                        </div>
                    </div>
                </div>
<br/><br/>
        <footer class="footer">
            © E BOOKER
        </footer>
    </body>
</html>
