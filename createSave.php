<?php
require_once ('database/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
    $courseChoice = isset($_POST['courseChoice']) ? implode(',', $_POST['courseChoice']) : '';
    $courseFee = $_POST['courseFee'];
    $socialUrl = $_POST['socialUrl'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $ip = $_POST['ip'];
    $description = strip_tags($_POST['description']);

    // Handling file uploads
    $image = '';
    if (!empty($_FILES['image']['name'])) {
        $image = 'assets/images/uploads/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
    }

    $certificates = [];
    if (isset($_FILES['certificate']) && count($_FILES['certificate']['name']) > 0) {
        foreach ($_FILES['certificate']['name'] as $key => $certificate_name) {
            $certificate_path = 'assets/images/uploads/' . basename($certificate_name);
            move_uploaded_file($_FILES['certificate']['tmp_name'][$key], $certificate_path);
            $certificates[] = $certificate_path;
        }
    }
    $certificates = implode(',', $certificates);

    $stmt = $conn->prepare("INSERT INTO admissions (fullname, username, email, phone, password, courseChoice, courseFee, socialUrl, city, gender, dob, ip, image, certificates, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssdssssssss", $fullname, $username, $email, $phone, $password, $courseChoice, $courseFee, $socialUrl, $city, $gender, $dob, $ip, $image, $certificates, $description);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    header("location: read.php");
}

?>