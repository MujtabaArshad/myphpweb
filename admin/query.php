<?php
include('dbcon.php');


if(isset($_POST['addcategory'])){
    $CategoryName=$_POST['cname'];
    $CategoryDes=$_POST['cdes'];
    $CategoryImageName=$_FILES['cimg']['name'];
    $CategoryTmpName=$_FILES['cimg']['tmp_name'];
    $destination="img/".$CategoryImageName;
    $extension=pathinfo($CategoryImageName,PATHINFO_EXTENSION);
    if($extension == "jpg" || $extension == "png" || $extension == "jpeg" || $extension == "webp"){
        if(move_uploaded_file($CategoryTmpName,$destination)){
                $query = $pdo->prepare("insert into category(Name , Des, Image) values (:cName , :cDes, :cImageName)");
                $query->bindParam('cName',$CategoryName);
                $query->bindParam('cDes',$CategoryDes);      
                $query->bindParam('cImageName',$CategoryImageName);
                $query->execute();
                echo "<script>alert('category Uploaded Successfully')</script>";
        }

    }
    else{
        echo "<script>alert('invalid extension')</script>";
    }
}

    //edit category




if(isset($_POST['aditcategory'])){
    $cId = $_GET['id'];
    $categaryName = $_POST['cName'];
    $categaryDescription = $_POST['cDes'];
   $query = $pdo ->prepare("update category set Name = :cName , Des = :cDes where id = :cId");
 if(isset($_FILES['cImage'])){
    $categaryImageName = $_FILES['cImage']['name'];
    $categaryImageTmpName = $_FILES['cImage']['tmp_name'];
    $extension = pathinfo($categaryImageName, PATHINFO_EXTENSION);
    $destination ="img/".$categaryImageName;
    if($extension == "jpg" || $extension == "png" || $extension == "jpeg" || $extension == "webp"){
        if(move_uploaded_file($categaryImageTmpName,$destination)){
            $query = $pdo ->prepare("update category set Name = :cName , Des = :cDes , Image = :cImage where id = :cId");
            $query->bindParam('cImage',$categaryImageName);  
        }
    }
 }
 $query->bindParam('cId',$cId);
 $query->bindParam('cName',$categaryName);
 $query->bindParam('cDes',$categaryDescription);
 $query->execute();
 echo "<script>alert('Record Uploaded Successfully')</script>";
}


    // // addProduct

 if(isset($_POST['addProduct'])){
    $productName = $_POST['pName'];
     $productPrice = $_POST['pPrice'];
      $productDes = $_POST['pDes'];
      $productQty = $_POST['pQty'];
     $categoryId = $_POST['C_id'];
      $productImageName = $_FILES['pImage']['name'];
      $productImageTmpName = $_FILES['pImage']['tmp_name'];
      $extension = pathinfo($productImageName,PATHINFO_EXTENSION);
      $destination = "img/".$productImageName;
      if($extension == "jpg" || $extension == "png" || $extension == "jpeg" || $extension == "webp")
      {if(move_uploaded_file($productImageTmpName,$destination)){
          $query = $pdo->prepare("insert into products(Name,Des,Price,Qty,Image,C_id)
          values (:pName , :pDes ,:pPrice ,:pQty ,:pImage , :cId)");
          $query->bindParam('pName',$productName);
          $query->bindParam('pPrice',$productPrice);          
          $query->bindParam('pDes',$productDes);          
          $query->bindParam('pQty',$productQty);          
          $query->bindParam('pImage',$productImageName);
          $query->bindParam('cId',$categoryId);          
          $query ->execute();
          echo "<script>alert('record added Successfully')</script>";
 
         }
      }
 
  }
 
if(isset($_POST['editProduct'])){
    $productId=$_GET['id'];
    $productName=$_POST['pName'];
    $productDes=$_POST['pDes'];
    $productPrice=$_POST['pPrice'];
    $productQty=$_POST['pQty'];
    $categoryId=$_POST['cId'];
    $query=$pdo->prepare('update products set Name=:pName,Des=:pDes,Price=:pPrice,Qty=:pQty,C_id=:cId where id=:pId');
    if(isset($_FILES['pImage'])){
        $productImageName=$_FILES['pImage']['name'];
        $productImageTmpName=$_FILES['pImage']['tmp_name'];
        $extension=pathinfo($productImageName,PATHINFO_EXTENSION);
        $destination="img/".$productImageName;
        if($extension=="jpg"|| $extension=="jpeg"|| $extension=="png"|| $extension=="jfif"|| $extension=="webp"){
            if(move_uploaded_file($productImageTmpName,$destination)){
                $query=$pdo->prepare('update products set Name=:pName,Des=:pDes,Price=:pPrice,Qty=:pQty,Image=:pImage,C_id=:cId where id=:pId');
                $query->bindParam('pImage',$productImageName);
            }
        }
    }
    $query->bindParam('pId',$productId);

    $query->bindParam('pName',$productName);
    $query->bindParam('pDes',$productDes);
    $query->bindParam('pPrice',$productPrice);
    $query->bindParam('pQty',$productQty);
    $query->bindParam('cId',$categoryId);
    $query->execute();
    echo "<script> alert('updata products')</script>";
}
    // editProduct

    // if(isset($_POST['editProduct'])){
    //     $productId=$_GET['id'];
    //     $productName = $_POST['pName'];
    //      $productPrice = $_POST['pPrice'];
    //       $productDes = $_POST['pDes'];
    //       $productQty = $_POST['pQty'];
    //      $categoryId = $_POST['cId'];
    //      $query = $pdo->prepare("update products set name= :pName , price= :pPrice , des= :pDes , qty= :pQty , c_id = :cId  where id= :pId");
    
    //     if(isset($_FILES['pImage'])){
    //         $pImageName = $_FILES['pImage']['name'];
    //         $pImageTmpName = $_FILES['pImage']['tmp_name'];      
    //         $extension = pathinfo($pImageName,PATHINFO_EXTENSION);          
    //         $destination = "img/".$pImageName;
    //  if($extension == "jpg" || $extension == "png" || $extension == "jpeg" || 
    //  $extension == "webp"){
    //     if(move_uploaded_file($pImageTmpName,$destination)){
    //         $query = $pdo->prepare("update products set name= :pName , price= :pPrice , des= :pDes , qty= :pQty , c_id = :cId , Image = :pImage where id= :pId");
    //          $query->bindParam('pImage',$pImageName);
    //     }
    // }    
    //      $query->bindParam('pId',$productId);    
    //      $query->bindParam('pName',$productName);
    //      $query->bindParam('pPrice',$productPrice);          
    //      $query->bindParam('pDes',$productDes);          
    //      $query->bindParam('pQty',$productQty);         
    //      $query->bindParam('cId',$categoryId);   
    //      $query ->execute();
    //      echo "<script>alert('product added Successfully')</script>";

    //     }
    //  }
     

      
?>