<?php
include('query.php');
include('header.php');
?>
<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = $pdo->prepare("SELECT category.Name AS 'categoryName' ,category.Id AS 'categoryId' , products.*
    FROM products
    INNER JOIN
    category
    ON
    products.C_id = category.Id where products.Id = :pId");
    $query->bindParam('pId',$id);
    $query->execute();
    $product = $query->fetch(pdo::FETCH_ASSOC);
    // print_r($product);   
}

?>

<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row vh-100 bg-light rounded  justify-content-center mx-0">
        <div class="col-md-6 ">
            <h3>This is Product page</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Name</label>
                    <input value="<?php echo $product['Name']?>" type="text" name="pName" id="" class="form-control" placeholder="" aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <input value="<?php echo $product['Des']?>" type="text" name="pDes" id="" class="form-control" placeholder="" aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input value="<?php echo $product['Price']?>" type="text" name="pPrice" id="" class="form-control" placeholder="" aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="pImage" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    <img height="100px" src="img/<?php echo $product['Image'] ?>" alt="">
               
                </div>
                <div class="form-group">
                    <label for="">Quantity</label>
                    <input value="<?php echo $product['Qty']?>" type="text" name="pQty" id="" class="form-control" placeholder="" aria-describedby="helpId">

                </div>

                <div class="form-group">
                    <label for="">Category</label>
                    <select name="cId" class="form-control" id="">
                        <option value="<?php echo $product['categoryId']?>"><?php echo $product['categoryName']?></option>
                        <?php
                        // $query = $pdo->prepare("select * from category where Name  != :cName");
                        $query = $pdo->prepare("select * from category where Name !=:cName");
                        $query->bindParam('cName',$product['categoryName']);
                        $query->execute();
                        $allcategories =  $query->fetchAll(PDO::FETCH_ASSOC);
                        foreach($allcategories as $category){
                            ?>
                            <option value="<?php echo $category['Id']?>"><?php echo $category['Name']?></option>
                            <?php
                        }
                        
                        ?>
                        </select>
                    </div>
                    <button type="submit" name="editProduct" class="btn btn-info mt-4">Update product</button>
                    </form>

                    </div>  
                </div>


<?php
include('footer.php');
?>  