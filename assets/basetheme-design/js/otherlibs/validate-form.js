function isEmail(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
};
 
$(document).ready(function(){
    $("form#contactForm").submit(function() {
        //When the form is submitted         
        var help_block = $("span.help-block");
        var email = $("input#email");
        var elem = $("input, textarea").not("#submit, #reset");
		var messages_lang = $("html").attr("lang");
		switch (messages_lang) {
			case "en": {
				var error_message_string = "All fields must be filled. ";
				var error_email_message_string = "Please Enter A Valid Email Address. ";
				break;
			}
			case "ua": {
				var error_message_string = "Всі поля повинні бути заповнені. ";
				var error_email_message_string = "Будь ласка, введіть дійсну адресу електронної пошти. ";
				break;
			}
                        case "ru": {
				var error_message_string = "Все поля должны быть заполнены. ";
				var error_email_message_string = "Пожалуйста, введите действительный адрес электронной почты. ";
			}
			default: {
				var error_message_string = "Все поля должны быть заполнены. ";
				var error_email_message_string = "Пожалуйста, введите действительный адрес электронной почты. ";
			}
		}		
        var error, foc; 
        //If email is filled in and the function isEmail returns true
        if(email && !isEmail(email.val())){
            email.focus();
            if ($("span").is("#error_email_message")) {
                $("span#error_email_message").remove();
            }
			if ($("span").is("#success_message")) {
                $("span#success_message").remove();
            }
            help_block.append("<span id=\"error_email_message\">" + error_email_message_string + "</span>");
            error = true;
        }else{
            if ($("span").is("#error_email_message")) {
                $("span#error_email_message").remove();
            }
        } 
        //Loop through each input and textarea
        elem.each(function(index){             
            //Does this have the class "required"?
            if($(this).hasClass('required') == true){
                //It has the class, is it empty or still have the default value?
                if(!this.value) {                 
                    //Add the error class for CSS styling
                    $(this).addClass("error"); 
                    //Switch the error var to true
                    error = true; 
                    //If this is the first required element not filled out, save the ID
                    if(!foc)foc = $(this).attr("id");                    
                } else {                    
                    if ($("span").is("#error_message")) {
                        $("span#error_message").remove();
                    }
                    //If this is filled out make sure it doesn't have the error class
                    $(this).removeClass("error");
                }
            } 
        }); 
        //If error has been switched to true
        if (error){      
            //Focus on the first required element that hasn't been filled out.
            if(foc)$('#'+foc).focus();            
            if ($("span").is("#error_message")) {
                $("span#error_message").remove();
            }
			if ($("span").is("#success_message")) {
                $("span#success_message").remove();
            }
            //console.log(this.value);
            help_block.append("<span id=\"error_message\">" + error_message_string + "</span>");
 
            //Stop the form from submitting
            return false;
        }else{
            //Clear default values on non required elements before submit continues
            if(elem.value == this.defaultValue)
            this.value = "";
        }
    });  
});