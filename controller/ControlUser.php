<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    $host ="localhost";
    $dbname ="GestionRV";
    $user = "root";
    $mdp = "Cheikh@mbow123";

    $dsn="mysql:host=$host;dbname=$dbname";
    $pdo= new PDO($dsn, $user, $mdp, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
} catch (PDOException $ex) {
    die('Erreur:'.$ex->getMessage());
}




if (isset($_POST['connecter'])) {

 session_start();
 $login=$_POST['login'];
 $motpasse=$_POST['motpasse'];
 $_SESSION['log']=$login;
    $req= $pdo->query("SELECT * FROM User
    WHERE login='$login' AND motpasse='$motpasse'");
    if($req->rowCount()!=0){
        echo "<script language='javascript' type='text/javascript'>
        location.href='home.php' </script>";
    }else{
        echo "<script type='text/javascript'>
        alert('Login ou Mot de Passe incorrect!') </script>";
    }

   
}