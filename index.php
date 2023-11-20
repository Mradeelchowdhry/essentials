<?php 
include "header.php";
require "config.php";


if (isset($_POST['submit'])) {

    $tital=$_POST['name'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    if($_FILES['image']['error'] == 4) {
        echo"<script>alert('image does not exist');</script>";

    }
    else{
        $imagname=$_FILES['image']['name'];
        $imagsize=$_FILES['image']['size'];
        $tmpname=$_FILES['image']['tmp_name'];

        $validExtensions=['jpg','png','jpeg'];

        $extension=explode(".",$imagname);
        $extension=strtolower(end($extension));//jpg

        if($imagsize >10000000){
            echo"<script>alert('image is too large');</script>";
        }
        elseif(!in_array($extension,$validExtensions)){
            echo"<script>alert('file type is not supported');</script>";

    }
    else{
        $newimagename=uniqid();
        echo $newimagename .=".".$extension;
        move_uploaded_file($tmpname,"image/".$newimagename);

        $sql="INSERT INTO `form`(`tital`, `discripshin`, `price`, `image`) VALUES ('$tital','$description','$price','$newimagename');" ;

        $result=mysqli_query($connection,$sql);
        if($result){
            header ("veiw.php");
        }
        else{
            echo "<script>alert('failed to add a new user.');</script>";
    }
}
}
}
?>
<body>
    <div class="container">
        <h1 class="text-center display-3 fw-semibold">PRODUCT REGISTERATION</h1>
<form action="" method="post" enctype="multipart/form-data">
<input class="form-control my-3" type="text" name="name" id="name" placeholder="Enter tital">
<input class="form-control my-3" type="text" name="description" id="name" placeholder="Enter description ">
<input class="form-control my-3" type="number" name="price" id="price" placeholder="Enter price">
<input class="form-control my-3" type="file" name="image" id="image" accept=".jpg, .png, .jpeg">
<input class="form-control my-3 btn btn-success" type="submit" name="submit" value="ADD">


</form>

    </div>
</body>
</html>