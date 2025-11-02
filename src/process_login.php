<?php
session_start();
include 'config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    try {
        $database = new Database();
        $db = $database->getConnection();

        $query = "SELECT user_id, user_firstname, user_lastname, user_password 
                 FROM tbl_users WHERE user_email = :email";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $user_id = $row['user_id'];
            $user_firstname = $row['user_firstname'];
            $hashed_password = $row['user_password'];

            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_firstname'] = $user_firstname;
                $_SESSION['loggedin'] = true;
                
                header("Location: dashboard.php");
                exit();
            } else {
                header("Location: login.php?error=Invalid email or password");
                exit();
            }
        } else {
            header("Location: login.php?error=Invalid email or password");
            exit();
        }
    } catch(PDOException $exception) {
        header("Location: login.php?error=Database error: " . $exception->getMessage());
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>