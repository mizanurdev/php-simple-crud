<?php
require_once ('database/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $courseChoice = isset($_POST['courseChoice']) ? implode(',', $_POST['courseChoice']) : '';
    $courseFee = $_POST['courseFee'];
    $socialUrl = $_POST['socialUrl'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $description = strip_tags($_POST['description']);

    // Handling file uploads
    $image = '';
    if (!empty($_FILES['image']['name'])) {
        $image = 'assets/images/uploads/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
    } else {
        // If no new image uploaded, retain the existing image path
        $sql_image = "SELECT image FROM admissions WHERE id=?";
        $stmt_image = $conn->prepare($sql_image);
        $stmt_image->bind_param("i", $id);
        $stmt_image->execute();
        $result_image = $stmt_image->get_result();
        $row_image = $result_image->fetch_assoc();
        $image = $row_image['image'];
    }

    $certificates = [];
    if (isset($_FILES['certificate']) && count($_FILES['certificate']['name']) > 0) {
        foreach ($_FILES['certificate']['name'] as $key => $certificate_name) {
            $certificate_path = 'assets/images/uploads/' . basename($certificate_name);
            move_uploaded_file($_FILES['certificate']['tmp_name'][$key], $certificate_path);
            $certificates[] = $certificate_path;
        }
    }

    // If no new certificates uploaded, retain the existing certificates paths
    if (empty($certificates)) {
        $sql_certificates = "SELECT certificates FROM admissions WHERE id=?";
        $stmt_certificates = $conn->prepare($sql_certificates);
        $stmt_certificates->bind_param("i", $id);
        $stmt_certificates->execute();
        $result_certificates = $stmt_certificates->get_result();
        $row_certificates = $result_certificates->fetch_assoc();
        $certificates = explode(',', $row_certificates['certificates']);
    }

    $certificates = implode(',', $certificates);

    $stmt = $conn->prepare("UPDATE admissions SET fullname=?, username=?, email=?, phone=?, courseChoice=?, courseFee=?, socialUrl=?, city=?, gender=?, dob=?, image=?, certificates=?, description=? WHERE id=?");
    $stmt->bind_param("sssssdsssssssi", $fullname, $username, $email, $phone, $courseChoice, $courseFee, $socialUrl, $city, $gender, $dob, $image, $certificates, $description, $id);

    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    header("location: read.php");
}

?>
