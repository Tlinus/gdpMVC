

<!DOCTYPE html>

<html lang="fr">

<head>

    <meta charset="UTF-8">

    <title>Connection</title>

    <style>

        body{
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url("./views/background.jpg");
            background-size: cover;
        }

        .inputStyle {
            border-radius: 3px;
            border-color: black;
        }

        .red {
            color: red;
        }

        #Connect {
            font-family: arial;
            font-size: 16px;
            text-align: center;
            padding-top: 250px;
            color: white;

        }


        #submit{
            border-color: black;
            background-color: white;
            border-radius: 3px;
        }

        #submit:hover{
            background-color: black;
            color: white;
            border-radius: 3px;
        }
    </style>

</head>
<body>

<div id="Connect">

    <p class="red">
        <?php

        if(isset($error)) {
            echo $error;
        }

        ?>
    </p>

    <form method="post" action="">

        <p>
            <label for="email">Email:</label>
            <input class="inputStyle" type="text" name="email" id="email ">
        </p>

        <p>
            <label for="password">Password:</label>
            <input class="inputStyle" type="password" name="password" id="password">
        </p>

        <p>
            <input type="submit" value="Login" id="submit" name="login">
        </p>

    </form>

</div>


</body>
</html>