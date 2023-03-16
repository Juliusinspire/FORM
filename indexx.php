<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="icon" href="html.FAMILY 20230309_015639" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <style>
      h1{
        
            text-align: center;
            color: red;
            font-family: Lobster, cursive;


      }
        h3{
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: darkred;
            padding: 8px;
            text-align: center;

      }
        h5{
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
            color: black;
            background-color: ;
            line-height: 1.5;
            letter-spacing: 0.1em;
            color:lightcyan;
           
        }
         p{
            font: italic 16px Arial, sans-serif;
            color:lightcyan;
         }
          h2{
            text-align: center;
           font-family: 'Allura', cursive;
           color: lightgray;
          }
           h6{
            float: right;
            display: inline-block;
            background-color: ;
            font-family: Arial, sans-serif;
            font-size: 16px;
           }
            h4{
                font-size: 30px;
            }
    </style>    
    <h1>Home</h1>
        
    <?php if (isset($user)): ?>
         <marquee><p>Hello <?= htmlspecialchars($user["name"]) ?>! welcome to html.foods sales record</p></marquee>

        <h2>HTML.foods(hyper tasty meal language)</h2>
          
          <h5> Welcome to our food company, where we believe that good food should not only taste great but also be good for you. Our mission is to provide you with healthy, delicious food options that you can feel good about eating. We use only the highest quality ingredients, carefully sourced and prepared to maximize their nutritional value and flavor.<br> Our commitment to sustainability means that we prioritize environmentally friendly practices at every step of our production process. Whether you're looking for a quick and easy snack or a full meal, we have a wide variety of options to choose from, all designed to nourish your body and delight your taste buds. Thank you for choosing our food company and joining us on our journey towards healthier, more sustainable eating.</h5>
             
            <h6><a href="./record.html">NEXT</a></h6><br><br>

        <h3><a href="logout.php">Log out</a></h3>
        
    <?php else: ?>
        
        <h4><a href="login.php">Log in</a> or <a href="index.html">sign up</a></h4>
        
    <?php endif; ?>
    
</body>
</html>