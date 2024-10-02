<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Complete Your Order</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            // Retrieve product data from the previous page (via POST or SESSION)
                            $product_name = $_POST['product_name'];
                            $product_price = $_POST['product_price'];

                            // Handle form submission for customer details
                            if (isset($_POST['submit'])) {
                                $name = $_POST['name'];
                                $email = $_POST['email'];
                                $number = $_POST['number'];
                                $address = $_POST['address'];

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

                                // SQL query to insert order details
                                $sql = "INSERT INTO customer_orders (name, email, number, address, product_name, product_price) 
                                        VALUES ('$name', '$email', '$number', '$address', '$product_name', '$product_price')";

                                if ($conn->query($sql) === TRUE) {
                                    echo "<script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                Swal.fire({
                                                    icon: 'success',
                                                    title: 'Order Placed',
                                                    text: 'Thank you $name, your order for $product_name priced at $product_price has been placed!'
                                                });
                                            });
                                          </script>";
                                } else {
                                    echo "<script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Error',
                                                    text: 'Error: " . $conn->error . "'
                                                });
                                            });
                                          </script>";
                                }

                                // Close the connection
                                $conn->close();
                            }
                        }
                        ?>
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="number" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="number" name="number" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="product_name" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="product_name" name="product_name" readonly value="<?php echo htmlspecialchars($product_name); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="product_price" class="form-label">Product Price</label>
                                <input type="text" class="form-control" id="product_price" name="product_price" readonly value="<?php echo htmlspecialchars($product_price); ?>"> <!-- Display product price -->
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
</body>
</html>
