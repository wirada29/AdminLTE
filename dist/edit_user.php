<?php
    $username = $_GET['username'];
    require '../connect.php';
    //นำข้อมูลเดิมจาก database
    $sql = "SELECT * FROM users WHERE username ='$username'";
    $result = $con->query($sql);
    $row = mysqli_fetch_array($result);
    if(isset($_POST['save'])) {
        $password = $_POST['password'];
        $fullname = $_POST['fullname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $filename = $_FILES['user_img']['name'];
        if ($filename !="") {
            @unlink(('assets/user_img/'.$row['image']));
            move_uploaded_file($_FILES['user_img']['tmp_name'],'assets/user_img/'.$filename); //ย้ายรูปใหม่ไปแทน
        $sql = "UPDATE users SET password='$password',fullname='$fullname',phone='$phone',email='$email,image='$filename'' WHERE
        username='$username'"; //update ชื่อไฟล์ลงใน daatbase
        } else {
        $sql = "UPDATE users SET password='$password',fullname='$fullname',phone='$phone',email='$email' WHERE
        username='$username'"; //ไม่ต้อง update ชื่อไฟล์ใน database
        }
        $result = $con->query($sql);
        if (!$result) {
                echo "<script>alert('บันทึกข้อมูลผิดพลาด');history.back</script>";
            } else {
                echo "<script>window.location.href='index.php?page=users'</script>";
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
                <h3 class="mb-0">Add_user</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">add_user</li>
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
                        <div class="card-title">Add_user</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->
                    <form acction="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Username</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="username"
                                    id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="<?php echo $row['username']?>" readonly />
                                <div id="emailHelp" class="form-text">
                                    username ต้องไม่ซ้ำกับคนอื่น
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="exampleInputPassword1" 
                                value="<?php echo $row['password']?>"/>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">ชื่อ-สกุล</label>
                                <input type="text" class="form-control" name="fullname" id="exampleInputPassword1" 
                                value="<?php echo $row['fullname']?>"/>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">เบอร์โทรศัพท์</label>
                                <input type="text" class="form-control" name="phone" id="exampleInputPassword1" 
                                value="<?php echo $row['phone']?>"/>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="exampleInputPassword1" 
                                value="<?php echo $row['email']?>"/>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">รูปภาพเดิม</label>
                                <img src="assets/user_img/<?php echo $roe['image'] ?>" alt="" class="mb-3"
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">รูปภาพใหม่</label>
                                <input type="file" class="form-control" name="user_img" id="exampleInputPassword1" 
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