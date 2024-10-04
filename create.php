<?php include_once ('layouts/header.php'); ?>
<form action="createSave.php" method="post" enctype="multipart/form-data" id="registrationForm">
    <input type="hidden" name="ip" value="<?php echo $_SERVER['REMOTE_PORT'] ?>">
    <h3 class="text-dark text-center"><b>Create Admission Form</b></h3>
    <div class="row d-flex justify-content-center">
        <div class="col-md-9">
            <div class="row" style="border: 2px solid green;">
                <div class="col-md-4 col-sm-6">
                    <div>
                        <label for="fullname">Full Name</label><br>
                        <input type="text" name="fullname"><br>
                        <label for="username">Username</label><br>
                        <input type="text" name="username"><br>
                        <label for="email">Email</label><br>
                        <input type="email" name="email"><br>
                        <label for="phone">Phone</label><br>
                        <input type="tel" name="phone">
                        <label for="password">Password</label><br>
                        <span style="position: relative;">
                            <input type="password" name="password" id="password">
                            <i class="fa-solid fa-eye" id="togglePassword"></i>
                        </span>
                        <label for="confirmPassword">Confirm Password</label><br>
                        <span style="position: relative;">
                            <input type="password" name="confirmPassword" id="confirmPassword">
                            <i class="fa-solid fa-eye" id="toggleConfirmPassword"></i>
                        </span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div>
                        <label for="courseChoice">Course Choice</label><br>
                        <input type="checkbox" name="courseChoice[]" value="HTML">HTML
                        <input type="checkbox" name="courseChoice[]" value="CSS">CSS
                        <input type="checkbox" name="courseChoice[]" value="JS">JS
                        <input type="checkbox" name="courseChoice[]" value="PHP">PHP <br>
                        <label for="courseFee">Course Fee</label><br>
                        <input type="number" name="courseFee"><br>
                        <label for="socialUrl">Social Url</label><br>
                        <input type="url" name="socialUrl"><br>
                        <label for="city">City</label><br>
                        <select name="city" id="">
                            <option value=""> --Select City-- </option>
                            <option value="Dhaka"> Dhaka </option>
                            <option value="Rajshahi"> Rajshahi </option>
                            <option value="Pabna"> Chittagong </option>
                        </select><br>
                        <label for="gender">Gender</label><br>
                        <input type="radio" name="gender" value="male">Male
                        <input type="radio" name="gender" value="female">Female
                        <input type="radio" name="gender" value="other">Other<br>
                        <label for="dob">Date of Birth</label><br>
                        <input type="date" name="dob"><br>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="field_wrapper">
                        <label for="image">Upload Photo</label><br>
                        <input type="file" name="image"><br>
                        <label for="certificate">Upload Certificate</label><br>
                        <a href="javascript:void(0);" class="btn btn-warning add_button"><i
                                class="fa-solid fa-plus"></i>Add More</a>
                        <input type="file" name="certificate[]"><br><br>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="description">Description</label><br>
                    <textarea name="description" id="description" cols="10" rows="1"></textarea>
                </div>
                <div class="text-center py-2">
                    <input class="btn btn-success" type="submit" value="Submit">
                    <input class="btn btn-dark" type="reset" value="Reset">
                </div>
            </div>
        </div>
    </div>
</form>
<?php include_once ('layouts/footer.php'); ?>