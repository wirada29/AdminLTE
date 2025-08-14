<?php
require '../connect.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['save'])) {
    $pro_id = $_POST['pro_id'];
    $pro_name = $_POST['pro_name'];
    $pro_price = $_POST['pro_price'];
    $pro_amount = $_POST['pro_amount'];
    $pro_status = $_POST['pro_status'];
    $filename = $_FILES['image']['name'];
    if (empty($pro_id) || empty($pro_name) || empty($pro_price) || empty($pro_amount) || empty($pro_status)) {
        echo "<script>alert('Please enter all data');history.back();</script>";
    } else {
        $check_sql = "SELECT * FROM products WHERE pro_id = '$pro_id'";
        $check_result = $con->query($check_sql);

        if ($check_result && $check_result->num_rows > 0) {
            echo "<script>alert('Product ID นี้มีอยู่แล้ว');history.back();</script>";
        } else {
            move_uploaded_file($_FILES['image']['tmp_name'],'assets/products_img/'.$filename);
            $sql = "INSERT INTO products(pro_id, pro_name, pro_price, pro_amount, pro_status,image) 
                    VALUES('$pro_id','$pro_name','$pro_price','$pro_amount','$pro_status','$filename')";
            $result = $con->query($sql);
            if (!$result) {
                echo "<script>alert('บันทึกข้อมูลผิดพลาด');history.back();</script>";
            } else {
                echo "<script>window.location.href='index.php?page=products';</script>";
            }
        }
    }
}
?>

<!--begin::App Content Header-->
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">add_products</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">add_products</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="row g-4">
            <div class="col-md-12">
                <div class="card card-primary card-outline mb-4">
                    <div class="card-header bg-primary text-white">
                        <div class="card-title">add_products</div>
                    </div>
                    <!-- เปลี่ยน action="" เพื่อให้ส่งกลับหน้านี้ได้ถูกต้องแม้โหลดผ่าน index.php?page=add_products -->
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="pro_id" class="form-label">ID</label>
                                <input type="text" class="form-control" name="pro_id" id="pro_id" />
                            </div>
                            <div class="mb-3">
                                <label for="pro_name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="pro_name" id="pro_name" />
                            </div>
                            <div class="mb-3">
                                <label for="pro_price" class="form-label">Price</label>
                                <input type="number" class="form-control" name="pro_price" id="pro_price" />
                            </div>
                            <div class="mb-3">
                                <label for="pro_amount" class="form-label">Amount</label>
                                <input type="number" class="form-control" name="pro_amount" id="pro_amount" />
                            </div>
                            <div class="mb-3">
                                <label for="pro_status" class="form-label">Status</label>
                                <input type="text" class="form-control" name="pro_status" id="pro_status" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image" id="exampleInputPassword1" />
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="save">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
