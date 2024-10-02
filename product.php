<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Product List</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php
                            // Sample static products with images
                            $products = [
                                ["id" => 1, "name" => "Product 1", "price" => 100, "image" => "img/pro1.jpg"],
                                ["id" => 2, "name" => "Product 2", "price" => 200, "image" => "img/pro2.jpg"],
                                ["id" => 3, "name" => "Product 3", "price" => 300, "image" => "img/pro3.jpg"],
                                ["id" => 4, "name" => "Product 4", "price" => 400, "image" => "img/pro4.jpg"],
                                ["id" => 5, "name" => "Product 5", "price" => 500, "image" => "img/pro5.jpg"],
                                ["id" => 6, "name" => "Product 6", "price" => 600, "image" => "img/pro6.jpg"],
                                ["id" => 7, "name" => "Product 7", "price" => 700, "image" => "img/pro7.jpg"],
                                ["id" => 8, "name" => "Product 8", "price" => 800, "image" => "img/pro8.jpg"],
                                ["id" => 9, "name" => "Product 9", "price" => 900, "image" => "img/pro9.jpg"],
                                ["id" => 10, "name" => "Product 10", "price" => 1000, "image" => "img/pro10.jpg"],
                                ["id" => 10, "name" => "Product 10", "price" => 1000, "image" => "img/pro11.jpg"],
                                ["id" => 10, "name" => "Product 10", "price" => 1000, "image" => "img/pro12.jpg"],
                                ["id" => 10, "name" => "Product 10", "price" => 1000, "image" => "img/pro13.jpg"],
                                ["id" => 10, "name" => "Product 10", "price" => 1000, "image" => "img/pro14.jpg"],
                                ["id" => 10, "name" => "Product 10", "price" => 1000, "image" => "img/pro15.jpg"],
                                ["id" => 10, "name" => "Product 10", "price" => 1000, "image" => "img/pro16.jpg"],
                            ];

                            foreach ($products as $product) {
                                echo '<div class="col-md-4 mb-4">';
                                echo '<div class="card">';
                                echo '<img src="' . htmlspecialchars($product['image']) . '" class="card-img-top" alt="' . htmlspecialchars($product['name']) . '">';
                                echo '<div class="card-body">';
                                echo '<h5 class="card-title">' . htmlspecialchars($product['name']) . '</h5>';
                                echo '<p class="card-text">Price: $' . htmlspecialchars($product['price']) . '</p>';
                                echo '<form action="order.php" method="POST">';
                                echo '<input type="hidden" name="product_name" value="' . htmlspecialchars($product['name']) . '">';
                                echo '<input type="hidden" name="product_price" value="' . htmlspecialchars($product['price']) . '">';
                                echo '<button type="submit" class="btn btn-primary">Order</button>';
                                echo '</form>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>

    <?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gym"; // Use your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get product data from form submission
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];

        // Insert product order into the database
        $sql = "INSERT INTO orders (product_id, product_name, product_price) VALUES ('$product_id', '$product_name', '$product_price')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Order Placed',
                        text: 'Your order for $product_name has been placed successfully!'
                    });
                  </script>";
        } else {
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error: " . $conn->error . "'
                    });
                  </script>";
        }
    }

    // Close connection
    $conn->close();
    ?>
</body>
</html>
