<?php
include('query.php');
include('header.php');

if(isset($_GET['id'])){
    $cId=$_GET['id'];
    $query=$pdo->prepare('select*from category where id=:cId');
    $query->bindParam('cId',$cId);
    $query->execute();
    $Allcategory=$query->fetch(PDO:: FETCH_ASSOC);
}
?>
      <div class="container">
    <form action="" method="post" enctype="multipart/form-data" >
        <div class="form-group">
          <label for="">Name</label>
          <input type="text" name="cName" value="<?php echo $Allcategory['Name'] ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
          
        </div>
        <div class="form-group">
          <label for="">Description</label>
          <input type="text" name="cDes" id="" value="<?php echo $Allcategory['Des'] ?>" class="form-control" placeholder="" aria-describedby="helpId">
          
        </div>
        <div class="form-group">
          <label for="">Image</label>
          <input type="file" name="cImage" id="" class="form-control" placeholder="" aria-describedby="helpId">
          <img src="img/<?php echo $Allcategory['Image'] ?>" alt="" width="120px">
          
        </div>
        <br><br>
        <button name="aditcategory" type="submit" class="btn btn-danger">Edit category</button>
    </form>
</div>
<?php
include('footer.php');
?>