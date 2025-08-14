<?php
$pro_id = $_GET['pro_id'];
require '../connect.php';
//นำข้อมูลเดิมจาก database
$sql = "SELECT * FROM products WHERE pro_id ='$pro_id'";
$result = $con->query($sql);
$row = mysqli_fetch_array($result);
if (isset($_POST['save'])) {
    $pro_id = $_POST['pro_id'];
    $pro_name = $_POST['pro_name'];
    $pro_price = $_POST['pro_price'];
    $pro_amount = $_POST['pro_amount'];
    $pro_status = $_POST['pro_status'];
    $sql = "UPDATE products SET pro_id='$pro_id',pro_name='$pro_name',pro_price='$pro_price',pro_amount='$pro_amount',pro_status='$pro_status' WHERE
        pro_id='$pro_id'";
    $result = $con->query($sql);
    if (!$result) {
        echo "<script>alert('บันทึกข้อมูลผิดพลาด');history.back</script>";
    } else {
        echo "<script>window.location.href='index.php?page=products'</script>";
    }
}
?>

<!--begin::App Content Header-->
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
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
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::App Content Header-->
<!--begin::App Content-->
<div class="app-content">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row g-4">

            <!--begin::Col-->
            <div class="col-md-12">
                <!--begin::Quick Example-->
                <div class="card card-primary card-outline mb-4">
                    <!--begin::Header-->
                    <div class="card-header bg-primary text-white">
                        <div class="card-title">add_products</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->
                    <form acction="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">ID</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="id"
                                    id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="<?php echo $row['pro_id'] ?>" readonly />
                                <div id="emailHelp" class="form-text">
                                    ID ต้องไม่ซ้ำกับคนอื่น
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">NAME</label>
                                <input type="text" class="form-control" name="name" id="exampleInputPassword1"
                                    value="<?php echo $row['pro_name'] ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">PRICE</label>
                                <input type="number" class="form-control" name="pro_price" id="exampleInputPassword1"
                                    value="<?php echo $row['pro_price'] ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">AMOUNT</label>
                                <input type="number" class="form-control" name="pro_amount" id="exampleInputPassword1"
                                    value="<?php echo $row['pro_amount'] ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">STATUS</label>
                                <input type="text" class="form-control" name="pro_status" id="exampleInputPassword1"
                                    value="<?php echo $row['pro_status'] ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">รูปภาพเดิม</label>
                                <img src="assets/products_img/<?php echo $roe['image'] ?>" alt="" class="mb-3"
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">รูปภาพใหม่</label>
                                <input type="file" class="form-control" name="products_img" id="exampleInputPassword1" 
                            </div>
                        </div>
                        <!--end::Body-->
                        <!--begin::Footer-->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="save">Save</button>
                        </div>
                        <!--end::Footer-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Quick Example-->
                <!--end::Header-->

                <!--end::Footer-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Horizontal Form-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
</div>
<!--end::Container-->
</div>
<!--end::App Content-->
</main>