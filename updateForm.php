<?php include_once ('layouts/header.php'); ?>
<?php require_once ('database/config.php'); ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch data from database based on ID
    $sql = "SELECT * FROM admissions WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        // Data fetching successful, now pre-fill the form fields
        $fullname = $row['fullname'];
        $username = $row['username'];
        $email = $row['email'];
        $phone = $row['phone'];
        $courseChoice = explode(',', $row['courseChoice']);
        $courseFee = $row['courseFee'];
        $socialUrl = $row['socialUrl'];
        $city = $row['city'];
        $gender = $row['gender'];
        $dob = $row['dob'];
        $image = $row['image'];
        $certificates = json_decode($row['certificates'], true); // Assuming JSON storage
        $description = $row['description'];
    } else {
        echo "No data found";
        exit;
    }
} else {
    echo "ID not provided";
    exit;
}
?>

<form action="updateFormSave.php" method="post" enctype="multipart/form-data">
    <h3 class="text-dark text-center"><b>Update Admission Form</b></h3>
    <div class="row d-flex justify-content-center">
        <div class="col-md-9">
            <div class="row" style="border: 2px solid green;">
                <div class="col-md-4 col-sm-6">
                    <div>
                        <label for="fullname">Full Name</label><br>
                        <input type="text" name="fullname" value="<?php echo htmlspecialchars($fullname); ?>"><br>
                        <label for="username">Username</label><br>
                        <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>"><br>
                        <label for="email">Email</label><br>
                        <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>"><br>
                        <label for="phone">Phone</label><br>
                        <input type="tel" name="phone" value="<?php echo htmlspecialchars($phone); ?>"><br>
                        <label for="socialUrl">Social Url</label><br>
                        <input type="url" name="socialUrl" value="<?php echo htmlspecialchars($socialUrl); ?>"><br>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div>
                        <label for="courseChoice">Course Choice</label><br>
                        <input type="checkbox" name="courseChoice[]" value="HTML" <?php echo in_array('HTML', $courseChoice) ? 'checked' : ''; ?>>HTML
                        <input type="checkbox" name="courseChoice[]" value="CSS" <?php echo in_array('CSS', $courseChoice) ? 'checked' : ''; ?>>CSS
                        <input type="checkbox" name="courseChoice[]" value="JS" <?php echo in_array('JS', $courseChoice) ? 'checked' : ''; ?>>JS
                        <input type="checkbox" name="courseChoice[]" value="PHP" <?php echo in_array('PHP', $courseChoice) ? 'checked' : ''; ?>>PHP <br>

                        <label for="courseFee">Course Fee</label><br>
                        <input type="number" name="courseFee" value="<?php echo htmlspecialchars($courseFee); ?>"><br>
                        <label for="city">City</label><br>
                        <select name="city" id="">
                            <option value=""> --Select City-- </option>
                            <option value="Dhaka" <?php echo ($city == 'Dhaka') ? 'selected' : ''; ?>> Dhaka </option>
                            <option value="Rajshahi" <?php echo ($city == 'Rajshahi') ? 'selected' : ''; ?>> Rajshahi
                            </option>
                            <option value="Pabna" <?php echo ($city == 'Pabna') ? 'selected' : ''; ?>> Pabna </option>
                        </select><br>

                        <label for="dob">Date of Birth</label><br>
                        <input type="date" name="dob" value="<?php echo htmlspecialchars($dob); ?>"><br>

                        <label for="image">Upload Photo</label><br>
                        <img src="<?php echo htmlspecialchars($image); ?>" alt="image" width="50px" height="50px"><br>
                        <input type="file" name="image"><br>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="field_wrapper">
                        <label for="gender">Gender</label><br>
                        <input type="radio" name="gender" value="male" <?php echo ($gender == 'male') ? 'checked' : ''; ?>> Male
                        <input type="radio" name="gender" value="female" <?php echo ($gender == 'female') ? 'checked' : ''; ?>> Female
                        <input type="radio" name="gender" value="other" <?php echo ($gender == 'other') ? 'checked' : ''; ?>> Other<br>
                        <label for="certificate">Upload Certificate</label><br>
                        <a href="javascript:void(0);" class="btn btn-warning add_button"><i class="fa-solid fa-plus"></i>Add More</a><br>
                        <?php
                        $certificateView = explode(',', $row['certificates']);
                        foreach ($certificateView as $certificate) {
                            echo "<a href='" . htmlspecialchars($certificate) . "' target='_blank'>View</a><br>";
                        }
                        ?>
                        <input type="file" name="certificate[]" multiple><br><br>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="description">Description</label><br>
                    <textarea name="description" cols="10"
                        rows="1"><?php echo htmlspecialchars($description); ?></textarea>
                </div>
                <div class="text-center py-2">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input class="btn btn-success" type="submit" value="Update">
                </div>
            </div>
        </div>
    </div>
</form>

<?php include_once ('layouts/footer.php'); ?>