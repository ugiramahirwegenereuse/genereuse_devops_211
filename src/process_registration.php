<?php
include 'config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $gender = $_POST['gender'];
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validation
    if ($password !== $confirm_password) {
        header("Location: registration.php?error=Passwords do not match");
        exit();
    }

    if (strlen($password) < 6) {
        header("Location: registration.php?error=Password must be at least 6 characters");
        exit();
    }

    try {
        $database = new Database();
        $db = $database->getConnection();

        // Check if email already exists
        $check_query = "SELECT user_id FROM tbl_users WHERE user_email = :email";
        $stmt = $db->prepare($check_query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            header("Location: registration.php?error=Email already exists");
            exit();
        }

        // Insert new user
        $query = "INSERT INTO tbl_users 
                 (user_firstname, user_lastname, user_gender, user_email, user_password) 
                 VALUES (:firstname, :lastname, :gender, :email, :password)";
        
        $stmt = $db->prepare($query);
        
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $stmt->bindParam(":firstname", $firstname);
        $stmt->bindParam(":lastname", $lastname);
        $stmt->bindParam(":gender", $gender);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $hashed_password);
        
        if ($stmt->execute()) {
            header("Location: registration.php?success=Registration successful. Please login.");
        } else {
            header("Location: registration.php?error=Registration failed. Please try again.");
        }
    } catch(PDOException $exception) {
        header("Location: registration.php?error=Database error: " . $exception->getMessage());
    }
} else {
    header("Location: registration.php");
}
?>