<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: indexx.php");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
     <link rel="icon" href="html.FAMILY 20230309_015639" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <style>
        body{
            background-image: url('logo.jpg');
            background-size: 50px;
            background-position: ;
        }
        form{
             margin: 0 auto;
            width: 50%;
/*            background-color: black;*/
            padding: 0px 10px;
            text-align: center;
            border-radius: 10px;

/*            background-image: url('img/2349067019742_status_8bcbfae7019348a2aea6268350ce09da.jpg');*/
            
        }
          h1{
             margin: 0 auto;
            width: 50%;
            text-align: center;
            color: white;
         }
          p{
            margin: 0 auto;
            width: 50%;
            text-align: center;
            color: white;
          }
           h2{
             margin: 0 auto;
            width: 50%;
            font-size: 15px;
           }
            label{
                font-size:15px;
                text-align: center;
                color: white;
            }
            input{
                text-align: center;
                margin: 0 auto;
                width: 50%;
                border: 1px solid #ccc;

            }
             a{
                color: white;
                font-size: 20px;
             }
              h4{
                text-align: center;
                color: white;
              }
               


    </style>
    

    
    <?php if ($is_invalid): ?>
        <h2><em>Invalid login</em></h2>
    <?php endif; ?>

    <marquee><h3>hyper tasty meal language</h3></marquee>
    
    <form method="post">
        <h1>Login</h1>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" 
               value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <br>
        <button>Log in</button>
    </form>

    <p><a href="forgot.php">Forget password?</a></p>
    
</body>
</html>
