<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-lg">
                    <div class="card-header bg-success text-white text-center">
                        <h4>User Data</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Height (cm)</th>
                                    <th>Weight (kg)</th>
                                    <th>Category</th>
                                    <th>Blood Group</th>
                                </tr>
                            </thead>
                            <tbody>
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

                                // Fetch all data from user_data table
                                $result = $conn->query("SELECT * FROM user_data");

                                // Check if there are records
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<tr>';
                                        echo '<td>' . htmlspecialchars($row['id']) . '</td>';
                                        echo '<td>' . htmlspecialchars($row['name']) . '</td>';
                                        echo '<td>' . htmlspecialchars($row['age']) . '</td>';
                                        echo '<td>' . htmlspecialchars($row['height']) . '</td>';
                                        echo '<td>' . htmlspecialchars($row['weight']) . '</td>';
                                        echo '<td>' . htmlspecialchars($row['category']) . '</td>';
                                        echo '<td>' . htmlspecialchars($row['blood_group']) . '</td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="7" class="text-center">No records found.</td></tr>';
                                }

                                // Close connection
                                $conn->close();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
