<?php
  require '../configuration/db.php';
  if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $query = "SELECT * FROM product WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $product_id = $_POST['product_id'];
    $productname = $_POST['product_name'];
    $price = $_POST['price'];
    $quantity = $_POST['qty'];
    $category = $_POST['category'];
    $description = $_POST['description'];

    $update_query = "UPDATE product SET productname=?, price=?, qty=?, category=?, description=? WHERE id=?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("sdissi", $productname, $price, $quantity, $category, $description, $product_id);

    if ($stmt->execute()) {
        header("Location: table.php?updated=1");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Product</h2>
        <form action="edit.php" method="POST">
            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
            <div class="form-group">
                <label for="productName">Product Name</label>
                <input type="text" class="form-control" id="productName" name="product_name" value="<?php echo $product['productname']; ?>" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?php echo $product['price']; ?>" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="qty" value="<?php echo $product['qty']; ?>" required>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" class="form-control" id="category" name="category" value="<?php echo $product['category']; ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required><?php echo $product['description']; ?></textarea>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update Product</button>
        </form>
    </div>
</body>
</html>