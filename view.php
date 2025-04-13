<?php
session_start();
require_once 'database.php';

$valid_username = "mkuu";
$valid_password = "Mwita.@123";

$is_logged_in = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['logged_in'] = true;
        $is_logged_in = true;
    } else {
        $login_error = "Invalid username or password";
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: view.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Submissions</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>View Submissions</h1>
        <nav>
            <a href="index.html">Back to Home</a> |
            <a href="form.php">Add New Entry</a>
        </nav>
    </header>

    <main>
        <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
            <div class="alert success">
                Form submitted successfully!
            </div>
        <?php endif; ?>

        <?php if (!$is_logged_in): ?>
            <section>
                <h2>Login Required</h2>
                <form method="POST" action="view.php" class="login-form">
                    <?php if (isset($login_error)): ?>
                        <div class="alert error"><?php echo $login_error; ?></div>
                    <?php endif; ?>
                    
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                    </div>

                    <button type="submit" name="login">Login</button>
                </form>
            </section>
        <?php else: ?>
            <section>
                <div class="header-actions">
                    <h2>Submitted Information</h2>
                    
                </div>
                
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Favorite Foods</th>
                            <th>Favorite Quote</th>
                            <th>Education</th>
                            <th>Favorite Time</th>
                            <th>Submitted</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        try {
                            $stmt = $pdo->query("SELECT * FROM user_info ORDER BY created_at DESC");
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['first_name'] . " " . $row['last_name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
                                
                                $foods = [];
                                if ($row['steak']) $foods[] = "Steak";
                                if ($row['pizza']) $foods[] = "Pizza";
                                if ($row['chicken']) $foods[] = "Chicken";
                                echo "<td>" . htmlspecialchars(implode(", ", $foods)) . "</td>";
                                
                                echo "<td>" . htmlspecialchars($row['favorite_quote']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['education_level']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['favorite_time']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                                echo "</tr>";
                            }
                        } catch(PDOException $e) {
                            echo "<tr><td colspan='7'>Error retrieving data: " . $e->getMessage() . "</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </section>
        <?php endif; ?>
    </main>

    <footer>
        <p id="lastModified"></p>
        <p id="pageLocation"></p>
    </footer>

    <script src="script.js"></script>
</body>
</html>

<style>
.header-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.logout-btn {
    background-color: #dc3545;
    color: white;
    padding: 8px 16px;
    border-radius: 4px;
    text-decoration: none;
}

.logout-btn:hover {
    background-color: #c82333;
    text-decoration: none;
}

.alert {
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 4px;
}

.success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.error {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

.login-form {
    max-width: 400px;
    margin: 0 auto;
}
</style>