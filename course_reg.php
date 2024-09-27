<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data Form</title>
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
                        <h4>Insert Data</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" required>
                            </div>

                            <div class="mb-3">
                                <label for="age" class="form-label">Age:</label>
                                <input type="number" class="form-control" name="age" id="age" placeholder="Enter your age" required>
                            </div>

                            <div class="mb-3">
                                <label for="height" class="form-label">Height (cm):</label>
                                <input type="number" class="form-control" name="height" id="height" placeholder="Enter your height" required>
                            </div>

                            <div class="mb-3">
                                <label for="weight" class="form-label">Weight (kg):</label>
                                <input type="number" class="form-control" name="weight" id="weight" placeholder="Enter your weight" required>
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Category:</label>
                                <select class="form-select" name="category" id="category" required>
                                    <option value="Weight Loss">Weight Loss</option>
                                    <option value="Muscle Gain">Muscle Gain</option>
                                    <option value="Body Building">Body Building</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="blood_group" class="form-label">Blood Group:</label>
                                <input type="text" class="form-control" name="blood_group" id="blood_group" placeholder="Enter your blood group" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
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

    <?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gym";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $name = $_POST['name'];
        $age = $_POST['age'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $category = $_POST['category'];
        $blood_group = $_POST['blood_group'];

        // Insert data into the database
        $sql = "INSERT INTO user_data (name, age, height, weight, category, blood_group) 
                VALUES ('$name', '$age', '$height', '$weight', '$category', '$blood_group')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'New record created successfully!'
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
