<?php
require_once 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Prepare data
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $gender = $_POST['gender'];
        
        // Convert checkbox values to boolean
        $steak = isset($_POST['favorite_foods']) && in_array('Steak', $_POST['favorite_foods']) ? 1 : 0;
        $pizza = isset($_POST['favorite_foods']) && in_array('Pizza', $_POST['favorite_foods']) ? 1 : 0;
        $chicken = isset($_POST['favorite_foods']) && in_array('Chicken', $_POST['favorite_foods']) ? 1 : 0;
        
        $favorite_quote = $_POST['favorite_quote'];
        $education = $_POST['education'];
        $favorite_time = $_POST['favorite_time'];

        // Insert data
        $sql = "INSERT INTO user_info (
                first_name, last_name, gender, 
                steak, pizza, chicken,
                favorite_quote, education_level, favorite_time
            ) VALUES (
                :first_name, :last_name, :gender,
                :steak, :pizza, :chicken,
                :favorite_quote, :education, :favorite_time
            )";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':first_name' => $first_name,
            ':last_name' => $last_name,
            ':gender' => $gender,
            ':steak' => $steak,
            ':pizza' => $pizza,
            ':chicken' => $chicken,
            ':favorite_quote' => $favorite_quote,
            ':education' => $education,
            ':favorite_time' => $favorite_time
        ]);

        // Redirect with success message
        header("Location: view.php?status=success");
        exit();
    } catch(PDOException $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    // Redirect to form if accessed directly
    header("Location: form.php");
    exit();
}
?> 