<?php
include('query.php');
include('header.php');
?>
<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row vh-100 bg-light rounded  justify-content-center mx-0">
        <div class="col-md-6 ">
            <h3>Add Product</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="pName" id="" class="form-control" placeholder="" aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" name="pDes" id="" class="form-control" placeholder="" aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="text" name="pPrice" id="" class="form-control" placeholder="" aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="pImage" id="" class="form-control" placeholder="" aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Quantity</label>
                    <input type="text" name="pQty" id="" class="form-control" placeholder="" aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Category</label>
                    <select name="cId" class="form-control" id="">
                        <option value="">Select Category </option>
                        <?php
                        $query = $pdo->query("select * from category");
                        $allcategories =  $query->fetchAll
                        (PDO ::FETCH_ASSOC);
                        foreach($allcategories as $categories){
                            ?>
                            <option value="<?php echo $categories['Id']?>"><?php echo $categories['Name']?></option>
                            <?php
                        }
                        
                        ?>
                        </select>
                    </div>
                    <button type="submit" name="addProduct" class="btn btn-info mt-4">Add product</button>
                    </form>

                    </div>  
                </div>



                </div>

<?php
include('footer.php');
?>  