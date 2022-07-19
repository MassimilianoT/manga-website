/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function checkUsername()
{
/*     firstName = $("#firstName");
    firstName_msg = $("#invalid-firstName");
    
    lastName = $("#lastName");
    lastName_msg = $("#invalid-lastName");
    
    var regularExpression = new RegExp("^([a-zA-Z]+)$", "g");
    var error = false;
    
    if (firstName.val().trim() === "")
    {
        firstName_msg.html("The first name field must not be empty");
        lastName_msg.html("");
        firstName.focus();
        error = true;
    } else if (!firstName.val().trim().match(regularExpression)) {
        firstName_msg.html("The first name must only contains letters, no digits or special characters");
        lastName_msg.html("");
        firstName.focus();
        error = true;
    } else if (lastName.val().trim() === "")
    {
        lastName_msg.html("The last name field must not be empty");
        firstName_msg.html("");
        lastName.focus();
        error = true;
    } else if (!lastName.val().trim().match(regularExpression))
    {
        lastName_msg.html("The last name must only contains letters, no digits or special characters");
        firstName_msg.html("");
        lastName.focus();
        error = true;
    }*/
    error = false;
    if (!error)

            username = $("#username");
            email = $("#email");
       
            $.ajax({

                type: 'GET',

                url: '/checkRegisterData',

                data: {username: username.val().trim(), email: email.val().trim()},

                success: function (data) {

                    if (data.foundUsername)
                    {
                        error = true;
                        $("#invalid-username").html("Username already exists in the database");
                    } 
                    else {
                        $("#invalid-username").html("");
                    }

                    if (data.foundEmail)
                    {
                        error = true;
                        $("#invalid-email").html("Email already exists in the database");
                    } 
                    else {
                        $("#invalid-email").html("");
                    }
                }

            });

    //}
    
}