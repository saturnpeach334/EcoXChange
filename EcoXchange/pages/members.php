<?php

// Include database connection and fetch user data
include('../includes/dbconn.php');
include('../includes/fetchUserData.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoXchange | Items</title>
    <!-- ===== BOX ICONS ===== -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../style/items-1.css">
</head>
<body>
    
    <!-- =============== Navigation ================ -->
    <div class="container">
        <?php include('sidebar-1.php'); ?>
        <!-- ========================= Main ==================== -->
        <div class="main">
            <?php include('header.php'); ?>
            <div class="content">
                 <!-- !!!!!!!!!!CODES HERE!!!!!!!! -->
                <div class="details">
                    <div class="itemlist">
                        <div class="tableHeader">
                            <h2>Members</h2>
                            <div class="searchbar">
                                <label>
                                <input type="text" name="" id="search-member" placeholder="member's name" onkeyup="searchmember()">
                                <ion-icon name="search-outline"></ion-icon>
                                </label>
                            </div>
                         
                    </div>
                        <?php
                            
                            $sql = "SELECT * FROM customer";
                            $query = mysqli_query($dbconn, $sql);
                            $num_rows = mysqli_num_rows($query);
                            if($num_rows == 0){
                                echo "No item found";
                            } else {
                                echo '<table class="table1">';
                                echo "<thead>";
                                echo"<tr>";
                                echo"<td>Customer ID</td>";
                                echo"<td>Username</td>";
                                echo"<td>First Name</td>";
                                echo"<td>Last Name</td>";
                                echo"<td>Contact</td>";
                                echo"<td>Email</td>";
                                echo"<td>Picture</td>";
                                echo"<td>Bank</td>";
                                echo"</tr>";
                                echo "</thead>";


                                while($row = mysqli_fetch_array($query)){ 
                                    echo "<tbody>";
                                        echo"<tr>";
                                            echo '<td class="idcust">' . $row["cust_ID"] . "</td>";
                                            
                                            echo"<td>".$row["cust_username"]."</td>";
                                            echo"<td>".$row["cust_first_name"]."</td>";
                                            echo"<td>".$row["cust_last_name"]."</td>";
                                            echo"<td>".$row["cust_contact_no"]."</td>";
                                            echo"<td>".$row["cust_email"]."</td>";
                                            echo '<td><img src="' . $row['cust_pict'] . '" alt=""></td>';
                                            // echo"<td><a href='edit.php?item_ID=".$row["item_ID"]."'>Edit</a></td>";
                                        echo"</tr>";
                                    echo "</tbody>";
                                }
                                echo '</table>';
                            
                            } 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- =========== Scripts =========  -->
    <script src="../js/main.js"></script>
    <script src="../js/searchbar.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
