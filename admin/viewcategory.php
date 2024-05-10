<?php
include('query.php');
include('header.php');
?>
<div class="container mt-5">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Des</th>
      <th scope="col">Image</th>
    </tr>
  </thead>
  <tbody>
    <?php
    
$query=$pdo->query('select*from category');
$category=$query->fetchAll(PDO::FETCH_ASSOC);
foreach($category as $allcategory){


    ?>
    <tr>
      <td><?php echo $allcategory['Id'] ?></td>
      <td><?php echo $allcategory['Name'] ?></td>
      <td><?php echo $allcategory['Des'] ?></td>
      <td><img src="img/<?php echo $allcategory['Image'] ?>" alt="" width="50px"></td>
      <td><a href="editcategory.php ?id=<?php echo $allcategory['Id'] ?>" class="btn btn-info">Edit</a></td>
      <td><a href="delete.php ?id=<?php echo $allcategory['Id'] ?>"class="btn btn-info">Delete</a></td>
      
    </tr>
    <?php
    }

    ?>
    
  </tbody>
</table>
</div>