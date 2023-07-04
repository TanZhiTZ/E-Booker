<?php
                if (isset($_SESSION['user_name'])) {
                    $name = $_SESSION['user_name'];
                    $id = $_SESSION['user_id'];
                    ini_set('display_errors', 0);

                    $json = file_get_contents("http://localhost/e_booker/api/product/read_cart.php?id=$id");
                    $data = json_decode($json);

                    if ($data !=null) {
                        echo "<th style='display: flex; justify-content: center;'>
                        <a href='cart.php'>
                            <span class='material-symbols-outlined'>
                                    shopping_cart_checkout
                            </span>
                        </a>
                    </th>";
                    }
                    
                    
                    echo "<th width='15%'>
                            <div align='center'>
                                Welcome! <b style='background-color:#32284a; color:white; padding:5px;'>
                                    <a href='user_library.php?id=$id' style='color: white; font-size:16px;'>$name</a>
                                </b>
                            </div>
                        </th>
                        <th width='10%'>
                        <center><a href='config/logout.php'>Log Out</a></center>
                        </th>";
                    
                } else {

                    echo '<th style="display: flex; justify-content: center;">
                    <a>
                        <span class="material-symbols-outlined">
                                shopping_cart_checkout
                        </span>
                    </a>
                </th>
                <th width="10%">
                            <form action="login.php">
                                <button class="btn-signup" >
                                    <span class="material-symbols-outlined">login</span>
                                    <b>LOGIN</b>
                                </button>
                            </form>
                        </th>
                        <th width="10%"><form action="register.php">
                                <button class="btn-signup">
                                    <span class="material-symbols-outlined">menu_book</span>
                                    <span><b>SIGN UP</b></span>
                                </button>
                            </form>
                        </th>';
                }
                ?>