$(document).ready( function()
{
        console.log("Hello")
        $("#ProfileForm").validate({
            rules: {
                age: {
                    required: true,
                    min:18,
                    max:90
                 },
                dob: {
                    required: true,
                   
                },
                contact: {
                    required: true,
                    minlength: 6,
                 },
                
            },
            messages: {
                 age: {
                    required:"Please enter a valid age value",
                    min:"Must contain min value as 18",
                    max:"Must contain max value as 90"
                },
                dob: {
                    required: " Please enter DOB",
                    
                },
                contact: {
                    required: " Please enter a contact address",
                    minlength: " At least 5 characters",
                  
                },
                
                }
        });








           });
