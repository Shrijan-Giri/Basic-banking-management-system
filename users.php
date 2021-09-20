<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Gabriela&display=swap" rel="stylesheet">
<style> 

table {
    border-collapse: collapse;
    width: 100%;
    color:black;
    font-size: 25px;
    text-align: left;
}
th {
    background-color:skyblue;
    color: white;
}
tr:nth-child(even) {background-color:lightgray}

#sideNav{
    width: 250px;
    height: 100vh;
    position: fixed;
    right: -250px;
    top:0;
    background: skyblue;
    z-index: 2;
    transition: .5s;
}
nav ul li{
    list-style: none;
    margin: 50px 20px;
}
nav ul li a{
    text-decoration: none;
    color: #fff;
}
#menuBtn{
    width: 50px;
    position: fixed;
    right: 65px;
    top: 35px;
    z-index: 2;
    cursor: pointer;
}
 
</style>
</head>
<body>
<div style="font-family: 'Gabriela', serif;   font-size: 40px;
    text-align: center;
    margin: 20px;
}">
Bank Customer's</div>
<table>
<tr>
<th>S.No.</th> 
<th>Name</th>
<th>Email</th>
<th>Gender</th>
<th>Balance</th>
<th>Transaction</th>
</tr>

<!-- hojahojahojare jaldihojahojare -->



<?php

error_reporting(0);


// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "shrijan";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Die if connection was not successful

if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}


$sql = "SELECT * FROM `users`";
$result = mysqli_query($conn, $sql);

// Find the number of records returned
$num = mysqli_num_rows($result);

// Display the rows returned by the sql query
if($num> 0){
    

    // We can fetch in a better way using the while loop
    while($row = mysqli_fetch_assoc($result)){
      
    //  echo var_dump($row);
       
        
   echo "<tr>";
    echo '<form method ="post" action = "Details.php">';


    // PHP can't parse increments in strings, so you have to increment $counter explicitly:

    // $counter++;
    // echo "<td style='border:1px solid black'>$counter</td>";



    $counter++;

   echo "<td>".
  $counter.$row["S.No."]."</td><td>".
   $row["name"]. "</td></td><td>" 
  .$row["email"]. "</td><td>"
  . $row["gender"] . "</td><td>"
  . $row["balance"] . "</td><td>";
    
 echo "<a href='Details.php?user={$row["name"]}&message=no' type='button' name='user'  id='users1' >
   <span> Transfer Money</span>
    </a>";
 echo "</tr>";

}
echo "</table>";
}
?>
 </section>
        <nav id="sideNav">
            <ul>
                <li><a href="main.html">HOME</a></li>
                <li><a href="users.php">OUR CUSTOMERS</a></li>
                <li><a href="history.php">TRANSACTION HISTORY</a></li>
                <li><a href="users.php">TRANSFER MONEY</a></li>
                <li><a href="Register.php">NEW USER</a></li>
            </ul>
        </nav>
        <div id="hojaplz">
        <img src="images/menu.png" id="menuBtn">
</div>

        <script>
           let menuBtn = document.querySelector('#hojaplz');
            let sideNav = document.querySelector('#sideNav')
           
            let condition = true;

           menuBtn.addEventListener('click',function(){
               if(condition){
                   sideNav.style.right = '0px';
                   condition = false;
               }else{
                sideNav.style.right = '-250px';
                condition = true;
               }
           })
        </script>
</table>
</body>
</html>