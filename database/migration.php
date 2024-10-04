<?php
//connection
require_once ("config.php");

// user table
$createAdmissionTable = "CREATE TABLE admissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    password VARCHAR(255) NOT NULL,
    courseChoice TEXT,
    courseFee DECIMAL(10, 2),
    socialUrl VARCHAR(255),
    city VARCHAR(50),
    gender ENUM('male', 'female', 'other'),
    dob DATE,
    ip VARCHAR(50),
    image VARCHAR(255),
    certificates TEXT,
    description LONGTEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

// Execute each table creation query individually
$tables = [
    'Admission' => $createAdmissionTable
];

foreach ($tables as $tableName => $createQuery) {
    $sql = $conn->query($createQuery);
    if ($sql) {
        echo "Table $tableName created successfully<br>";
    } else {
        echo "Error creating table $tableName: " . $conn->error . "<br>";
    }
}
?>