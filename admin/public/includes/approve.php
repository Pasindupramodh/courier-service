<?php

require "../../private/database.php";

$id = addsLashes($_POST["id"]);

$db = new Database();

$query = "update user set status_id = 1 where user_id = '$id'";
if($db->db_write($query)){

    $query = "SELECT * from customer where user_id = '$id'";
    $result = $db->db_read($query);
    $row = $result[0];
    $email = $row['email'];
    $body = '<!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Account Approval</title>
        <style>
            /* Styles for the email */
            body {
                font-family: Arial, sans-serif;
                background-color: #f6f6f6;
            }
            
            .container {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                background-color: #ffffff;
                border-radius: 10px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }
            
            .logo {
                text-align: center;
                margin-bottom: 20px;
            }
            
            .logo img {
                max-width: 150px;
            }
            
            .message {
                padding: 30px;
                background-color: #f2f2f2;
                border-radius: 10px;
            }
            
            h2 {
                color: #007bff;
                margin-top: 0;
            }
            
            p {
                margin: 10px 0;
                line-height: 1.5;
            }
            
            .button {
                display: inline-block;
                padding: 10px 30px;
                background-color: #007bff;
                color: #ffffff;
                text-decoration: none;
                border-radius: 5px;
                transition: background-color 0.3s ease;
            }
            
            .button:hover {
                background-color: #0056b3;
            }
            
            .footer {
                margin-top: 20px;
                text-align: center;
                font-size: 12px;
                color: #888888;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="logo">
                <img src="https://hopitexpress.com/img/logo.png" alt="Courier Service">
            </div>
            <div class="message">
                <h2>Account Approved</h2>
                <p>Your account has been approved for the Hopit Express[pvt] Ltd.</p>
                <p>You can now enjoy all the features and services offered by our platform.</p>
                <p>For any queries or assistance, feel free to contact our customer support team.</p>
                <p>
                    <a class="button" href="https://hopitexpress.com/login">Login to Your Account</a>
                </p>
            </div>
            <div class="footer">
                <p>This email was sent by Hopit Express[pvt] Ltd. Please do not reply to this email.</p>
                <p>&copy; 2023 Hopit Express[pvt] Ltd. All rights reserved.</p>
            </div>
        </div>
    </body>
    </html>';
    
        mail($email,
            "Account Approval",
            $body,
            "From: noreply@hopitexpress.com" . "\r\n" . "Content-Type: text/html; charset=utf-8",
            '-fnoreply@hopitexpress.com');
    echo "successfully";
}
?>