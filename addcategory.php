<?php
include('query.php');
include('header.php');
?>
<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row vh-100 bg-light rounded  justify-content-center mx-0">
        <div class="col-md-6 ">
            <h3>Add Category</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="cname" id="" class="form-control" placeholder="" aria-describedby="helpId">

                </div>


                <div class="form-group">
                    <label for="Des">Description</label>
                    <input type="text" name="cDes" id="" class="form-control" placeholder="" aria-describedby="helpId">

                </div>

                <div class="form-group">
                    <label for="img">img</label>
                    <input type="file" name="cimg" id="" class="form-control" placeholder="" aria-describedby="helpId">

                </div>
                <button name="addcategory" type="submit" class="btn btn-primary"> Add category </button>

            </form>
        </div>
    </div>
</div>
<!-- Blank End -->


<?php
include('footer.php');
?>  