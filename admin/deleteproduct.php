<?php
include('dbcon.php');
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query=$pdo->prepare('delete from products where id=:pid');
    $query->bindParam('pid',$id);
    $query->execute();
    header('location:viewproducts.php');
    }
   
?>