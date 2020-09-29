<!-- By Luke Pring -->

<?php 

session_start();

if($_SERVER['QUERY_STRING'] == 'noname'){
    unset($_SESSION['name']);
}

$name = $_SESSION['name'] ?? 'Guest';

// get cookie

$gender = $_COOKIE['gender'] ?? 'Unknown';

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FridgePizza</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .brand {
            background: #b30000 !important;
        }
        .brand-text {
            color: #b30000 !important;
        }
        form {
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;
        }
        .error {
            background-color: rgb(255, 87, 87);
            color: white;
            font-weight: bold;
        }
        .msg {
            color: white;
            background-color: #b30000;
            padding: 70px;
            background-image: url("images/pizzaBG.jpg");
            background-size: 100%;
            font-weight: bold;
            text-shadow:
                3px 3px 0 #000,
                -1px -1px 0 #000,  
                1px -1px 0 #000,
                -1px 1px 0 #000,
                1px 1px 0 #000;
        }

        @media only screen and (max-width: 480px) {
            .msg {
                background-size: 250%;
            }
        }

        @media only screen and (min-width: 920px) {
            .msg {
                background-position-y: 300px;
            }
        }

        .input-field input[type=text]:focus + label {
            color: #b30000 !important;
        }

        .input-field input[type=text]:focus {
            border-bottom: 1px solid #b30000 !important;
            box-shadow: 0 1px 0 0 #b30000 !important;
        }

        .back {
            margin-top: 10px;
        }

        .rainbow-text {
            background-image: repeating-linear-gradient(45deg, violet, indigo, blue, green, yellow, orange, red, violet);
            text-align: center;
            background-size: 800% 800%;
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 24px;
            animation: rainbow 8s ease infinite;
        }

        @keyframes rainbow { 
            0%{background-position:0% 50%}
            50%{background-position:100% 25%}
            100%{background-position:0% 50%}
        }
    </style>
</head>
<body class ="grey lighten-4">
    <div class="navbar-fixed">
    <nav class="white header hoverable">
        <div class="container">
            <a href="https://lukesfridge.xyz/pizza" class="brand-logo brand-text hide-on-small-and-down"><b>FridgePizza</b></a>
            <ul id="nav-mobile" class="right hide-on-small-and-down">
                <?php 
                
                if(isset($name)) {
                    echo '<li class="grey-text">Hi, ' . htmlspecialchars($name) . '</li>';
                    echo '<li class="grey-text">(' . htmlspecialchars($gender) . ') </li>';
                }
                
                ?>
                <li><a href="add.php" class="btn brand waves-effect waves-light">Add a Pizza</a></li>
            </ul>
            <a href="https://lukesfridge.xyz/pizza" class="brand-logo brand-text hide-on-med-and-up left">FridgePizza</a>
            <ul id="nav-mobile" class="show-on-small hide-on-med-and-up mobile-btn right">
                <li><a href="add.php" class=" btn brand waves-effect waves-light">Add a Pizza</a></li>
                <?php 
                
                if(isset($name)) {
                    echo '<li class="grey-text">Hi, ' . htmlspecialchars($name) . '</li>';
                    echo '<li class="grey-text">(' . htmlspecialchars($gender) . ') </li>';
                }
                
                ?>
            </ul>
        </div>
    </nav>
    </div>
    