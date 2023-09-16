<?php
    // print_r($_SESSION);
    session_start();
    include_once('config.php');
    
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']);
        
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    $logado = $_SESSION['email'];
    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM usuarios WHERE id LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' ORDER BY id DESC";
    }
    else
    {
        $sql = "SELECT * FROM usuarios ORDER BY id DESC";
    }
    $result = $conexao->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>USUARIOS</title>
    <style>
        body{
            background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            color: white;
            text-align: center;
            
        }
        .table-bg{
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px 15px 0 0;
        }

        .box-search{
            display: flex;
            justify-content: center;
            gap: .1%;
        }

        .container {
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        font-style: italic;
        font-weight: bold;
        font-size: 1.2em;
        display: grid;
        gap: 2em;
        place-content: center;
        width: 400px;
        }

        .container input[type=radio] {
         display: none;
          }

        .input-btn:is(:checked) + .neon-btn .span {
        inset: 2px;
        background-color: #4090b5;
        background: repeating-linear-gradient(to bottom, transparent 0%, #4090b5 1px, #4090b5 3px, #4090b5 5px, #4090b5 4px, transparent 0.5%), repeating-linear-gradient(to left, hsl(295, 60%, 12%) 100%, hsl(295, 60%, 12%) 100%);
        box-shadow: inset 0 40px 20px hsl(296, 59%, 10%);
      }

      .input-btn:is(:checked) + .neon-btn .txt {
        text-shadow: 2px 4px 1px #9e30a9, 2px 2px 1px #4090b5, 0 0 20px rgba(255, 255, 255, 0.616);
        color: rgb(255, 255, 255);
        animation: colorchange 0.3s ease;
      }

      .input-btn:is(:checked) + .neon-btn::before {
        animation-duration: 0.6s;
      }

      .input-btn:is(:checked) + .neon-btn::after {
        animation-duration: 0.6s;
      }

      .neon-btn {
        width: 300px;
        height: 60px;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0.5em 5em;
        text-align: right;
        background: transparent;
        position: relative;
        overflow: hidden;
        transition: all 2s ease-in-out;
        -webkit-clip-path: polygon(6% 0, 93% 0, 100% 8%, 100% 86%, 90% 89%, 88% 100%, 5% 100%, 0% 85%);
        clip-path: polygon(6% 0, 93% 0, 100% 8%, 100% 86%, 90% 89%, 88% 100%, 5% 100%, 0% 85%);
      }

      .neon-btn .span {
        display: flex;
        -webkit-clip-path: polygon(6% 0, 93% 0, 100% 8%, 100% 86%, 90% 89%, 88% 100%, 5% 100%, 0% 85%);
        clip-path: polygon(6% 0, 93% 0, 100% 8%, 100% 86%, 90% 89%, 88% 100%, 5% 100%, 0% 85%);
        position: absolute;
        inset: 1px;
        background-color: #212121;
        z-index: 1;
      }

      .neon-btn .txt {
        text-align: right;
        position: relative;
        z-index: 2;
        color: aliceblue;
        font-size: 1em;
        transition: all ease-in-out 2s linear;
        text-shadow: 0px 0px 1px #4090b5, 0px 0px 1px #9e30a9, 0 0 1px white;
      }

      .neon-btn::before {
        content: "";
        position: absolute;
        height: 300px;
        aspect-ratio: 1.5/1;
        box-shadow: -17px -19px 20px #9e30a9;
        background-image: conic-gradient(#9e30a9, transparent, transparent, transparent, transparent, transparent, transparent, #9e30a9);
        animation: rotate 4s linear infinite -2s;
      }

      .neon-btn::after {
        content: "";
        position: absolute;
        height: 300px;
        aspect-ratio: 1.5/1;
        box-shadow: -17px -19px 10px #4090b5;
        background-image: conic-gradient(#4090b5, transparent, transparent, transparent, transparent, transparent, transparent, transparent, #4090b5);
        animation: rotate 4s linear infinite;
      }

    </style>
</head>
<body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php">RevUP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="d-flex">
            <a href="sair.php" class="btn btn-danger me-5">Sair</a>
        </div>
    </nav>
    <br>
    <?php
        echo "<h1>Bem vindo <u>$logado</u></h1>";
    ?>
    <br>
    
    <div class="box">
        <a href="meupedido.php">Meus Pedidos</a>
        <a href="formulario_pedido.php">Solcitar novo Serviço</a>
        <a href="servicos.php">Trabalhe conosco</a>
    </div>
</body>
</html>