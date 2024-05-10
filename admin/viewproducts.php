<?php


include('query.php');
include('header.php');
    



?>

  <div class="container mt-5">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Product Name</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
      
      <th scope="col">Quantity</th>
      <th scope="col">Category Name</th>
      
      <th scope="col">Image</th>
      
    </tr>
  </thead>
  <tbody>
<?php 
$query=$pdo->query("SELECT category.Name As 'categoryName',products.* from products INNER JOIN category on products.C_id=category.Id");
// $query = $pdo->query("select * from products");

$allproduct=$query->fetchAll(PDO::FETCH_ASSOC);
foreach($allproduct as $product){

    ?>


    <tr>
    
      <td><?php echo $product['Name'] ?></td>
      <td><?php echo $product['Des'] ?></td>
      <td><?php echo $product['Price'] ?></td>
      <td><?php echo $product['Qty'] ?></td>
      <td><?php echo $product['categoryName'] ?></td>
      
      

      <td><img height="200px" src="img/<?php echo $product['Image'] ?>" alt=""></td>
      <td><a href="editproducts.php ?id=<?php echo $product['Id']?>" class="btn btn-info">Edit</a></td>
      
    <td><a href="deleteproduct.php?id=<?php echo $product['Id'] ?>" class='btn btn-danger'>Delete</a></td>
    </tr>  
      
    
    <?php
}

    ?>
    
  </tbody>
</table>
</div>