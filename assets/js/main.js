// jquery add input field
$(document).ready(function(){
    var maxField = 3; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><input type="file" name="certificate[]" value=""/><a href="javascript:void(0);" class="remove_button"><i class="fa-solid fa-minus"></i></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    // Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){
            x++; //Increase field counter
            $(wrapper).append(fieldHTML); //Add field html
        }else{
            alert('A maximum of '+maxField+' fields are allowed to be added. ');
        }
    });
    
    // Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrease field counter
    });
});

//jquery form validation
$(document).ready(function(){
    $("#registrationForm").validate({
        rules:{
            fullname:{
                required:true
            },
            username:{
                required:true
            },
            email:{
                required:true,
                email:true
            },
            phone:{
                required:true,
                number:true,
            },
            gender:{
                required:true,
            },
            password:{
                required:true,
                rangelength:[8,12]
            },
            confirmPassword:{
                required:true,
                rangelength:[8,12],
                equalTo:"#password"
            },
            courseChoice:{
                required:true,
            },
            courseFee:{
                required:true,
            },
            dob:{
                required:true,
                date:true,
            },

            dob:{
                required:true,
                date:true,
            },

            socialUrl:{
                required:true,
                url:true
            },

            city:{
                required:true,
            },

            image:{
                required:true,
            },
            certificate:{
                required:true,
            },
            description:{
                required:true,
                rangelength: [1, 255]
            },
        },
        messages: {
            fullname: "Please enter your fullname.",
            username: "Please enter a username.",
            email: "Please enter an email.",
            phone: "Please enter phone number.",
            password: "Please enter password.",
            confirmPassword: "Please enter password again.",
            courseFee: "Please enter course fee.",
            socialUrl: "Please enter social url.",
            city: "Please select your city.",
            gender: "Please select your gender.",
            dob: "Please enter your birth date.",
            image: "Please upload your image.",
        },
        errorClass: "error",
        errorElement: "div",
        errorPlacement: function(error, element) {
            // Customize error placement based on your needs
            if (element.attr("name") === "fullname") {
                // Place the label and error message together
                error.insertAfter(element.closest('.row').find('label[for="' + element.attr('name') + '"]'));
            } else {
                // Default placement for other fields
                error.insertAfter(element);
            }
        }
    });
    //password eye icon on off
    $(document).ready(function() {
        $('#togglePassword').click(function() {
            togglePasswordVisibility('#password');
        });
    
        $('#toggleConfirmPassword').click(function() {
            togglePasswordVisibility('#confirmPassword');
        });
        // Other validation and form submission code goes here
        function togglePasswordVisibility(passwordField) {
            var passwordInput = $(passwordField);
            var type = passwordInput.attr('type') === 'password' ? 'text' : 'password';
            passwordInput.attr('type', type);
        }
    });
    
});