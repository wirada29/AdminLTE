<?php
require '../connect.php';
$sql = "SELECT * FROM products";
$result = $con->query($sql);
?>

<!--begin::App Content Header-->
<div class="app-content-header">
  <!--begin::Container-->
  <div class="container-fluid">
    <!--begin::Row-->
    <div class="row">
      <div class="col-sm-6">
        <h3 class="mb-0">products Tables</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">products Tables</li>
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
    <div class="row">
      <div class="col-md-15">
        <div class="card-md-4 shadow-lg rounded-3 ">
          <div class="card-header bg-primary text-white rounded-3">
            <h3 class="card-title">products_list</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <a href="index.php?page=add_products" class="btn btn-success mb-4">
              <i class="bi bi-person-add"></i> add products</a>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Id</th>
                  <th>Name</th>
                  <th style="width: 40px">Price</th>
                  <th>Amount</th>
                  <th>Status</th>
                  <th>image</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                while ($row = mysqli_fetch_array($result)) {
                ?>
                  <tr class="align-middle">
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['pro_id'] ?></td>
                    <td><?php echo $row['pro_name'] ?></td>
                    <td><?php echo $row['pro_price'] ?></td>
                    <td><?php echo $row['pro_amount'] ?></td>
                    <td><?php echo $row['pro_status'] ?></td>
                    <td><img src="assets/products_img/<?php echo $row['image']; ?> width="100" </td>
                    <td>
                      <a href="index.php?page=edit_products&pro_id=<?php echo $row['pro_id'] ?>" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i>
                      </a>
                      <a href="index.php?page=del_products&pro_id=<?php echo $row['pro_id'] ?>" class="btn btn-danger"
                        onclick="return confirm('Are you sure')">
                        <i class="bi bi-trash"></i>
                      </a>
                    </td>
                  </tr>
                <?php
                  $i++;
                }
                ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-end">
              <li class="page-item">
                <a class="page-link" href="#">&laquo;</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">2</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">&raquo;</a>
              </li>
            </ul>
          </div>
        </div>
        <!-- /.card -->
        <!--end::Row-->
      </div>
      <!--end::Container-->
    </div>