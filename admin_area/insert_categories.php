<?php

include('../includes/connect.php');
if(isset($_POST['insert_cat'])){
    $category_title=$_POST['cat_title'];

    //select data from database
    $select_query="select * from categories where category_title='$category_title'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
        echo "<script>alert('this category is present in the database')</script>";
    }else{

    $insert_query="insert into categories (category_title) values ('$category_title')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<script>alert('category has been inserted successfully')</script>";
    }
}}


?>

<h2 class="class text-center">Insert Categories</h2>

<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info"><i class="fa-solid fa-receipt"></i></span>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInputGroup1" name="cat_title" placeholder="Insert Categories">
            </div>
    </div>

    <div class="input-group w-10 mb-2 m-auto ">
             <div class="form-floating">
                <input type="submit" class="border-0 p-2 my-3 bg-info" id="floatingInputGroup1" name="insert_cat" value="Insert Categories">
            </div>
    </div>
</form>