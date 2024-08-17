
<?php
  require '../configuration/db.php';
  if (isset($_POST['submit'])) {
    $pname=$_POST['name'];
    $price=$_POST['price'];
    $qty=$_POST['qty'];
    $category=$_POST['category'];
    $description=$_POST['Description'];
                             
    $sql="INSERT INTO `product`( `productname`, `price`, `qty`,`category`, `description`) VALUES ('$pname','$price','$qty','$category','$description')";
    if (mysqli_query($conn, $sql)){
        echo'<script> alert("successfully added"); </script>';  
        echo"<script>  window.location.assign('table.php');</script>";
    }else{
      echo'<script> alert("successfully deleted"); </script>';
    }
  }
  if (isset($_GET['delete'])) {
    $id= $_GET['delete'];
    $deleteQuery = "DELETE FROm product where id =" . $id ;
    if (mysqli_query($conn, $deleteQuery)){
        echo'<script> alert("successfully deleted"); </script>';
        echo"<script>  window.location.assign('table.php');</script>";
    }else{
         echo'<script> alert("successfully deleted"); </script>';
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product list</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./home.css">
   
</head>
<body>
  <div class="container mt-5">
      <h2 class="title-text">Product Inventory Managment Details</h2>
      <button type="button" class="btn btn-primary btn-sm add-btn" data-bs-toggle="modal" data-bs-target="#popupForm"> Add new </button>
      <table class="table table-striped table-bordered">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Product Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Category</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
      <?php  
        require '../configuration/db.php';
        $sql = "SELECT * FROM product";
        $result = mysqli_query($conn, $sql);
        $tableData;
        if ($result && mysqli_num_rows($result) > 0) {
          $tableData = mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
          $tableData = [];
        }
        if (empty($tableData)) {
          echo "<tr>";
          echo "<td colspan='5' class='text-center'>No data available to display.</td>";
          echo "</tr>";
        
        }else{
          foreach ($tableData as $product) {
            echo "<tr>";
            echo "<td>" . $product['productname'] . "</td>";
            echo "<td>" . $product['price'] . "</td>";
            echo "<td>" . $product['qty'] . "</td>";
            echo "<td>" . $product['category'] . "</td>";
            echo "<td>
            <a href='edit.php?id=" . $product['id'] . "' class='btn btn-success btn-sm'>Edit</a>
            <a href='table.php?delete=" . $product['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this product?\")'>Delete</a>
            </td>";
            echo "</tr>";
          }
        }
      
  ?>
</tbody>  
      </table>
  </div>
  <div class="modal fade" id="popupForm" tabindex="-1" aria-labelledby="popupFormLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="popupFormLabel">Create Product</h5>
          <button type="button" lass="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="table.php" method="post"onsubmit="return validateForm()"> 
            <div class="mb-3">
              <label for="name" class="form-label">Product Name</label>
              <input type="text" class="form-control" id="name" name="name"  placeholder="Enter your Product Name    ">
            </div>
            <div class="mb-3">
              <label for="Price" class="form-label">Price</label>
              <input type="number" class="form-control" id="price" name="price"  placeholder="Enter the  price">
            </div>
            <div class="mb-3">
                <label for="Quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="qty" name="qty"  placeholder="Enter the  Quantity">
              </div>
              <div class="mb-3">
                <label for="Category" class="form-label">Category</label>
                <input type="text" class="form-control" id="category" name="category" placeholder="Enter the  Category">
              </div>
            <div class="mb-3">
              <label for="message" class="form-label">Description</label>
              <textarea class="form-control" id="message" name="Description"  rows="3" placeholder="Enter your message"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </form>

    </div>
</div>

        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="../js/home.js"></script>
  <script src="../js/home1.js"></script>
</body>
</html>
