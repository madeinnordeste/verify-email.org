#verify-email.org

Validate real emails with verify-email.org API

##Example of use:
	
	include 'verify-email.org.class.php';
	$verify = new Verify_Email('emailadress@host.com', 'USER', 'PASSWORD');
	$result = $verify->verify();
	var_dump($result->verify_status);
	

##Result fields:
	
	
![Result Fields](https://raw.github.com/madeinnordeste/verify-email.org/master/verify-email-results.png "Result Fields")
