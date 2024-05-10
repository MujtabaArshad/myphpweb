<?php

include('dbcon.php');
if(isset($_GET['id'])){
$id=$_GET['id'];
$query=$pdo->prepare('delete from category where id=:cid');
$query->bindParam('cid',$id);
$query->execute();
header('location:viewcategory.php');
}
     

?>