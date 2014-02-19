<?php 

/*
  Example of use:
  ---------------

  include 'verify-email.org.class.php';
  $verify = new Verify_Email('emailadress@host.com', 'USER', 'PASSWORD');
  $result = $verify->verify(); //json
  var_dump($result->verify_status);

*/

class Verify_Email{

    var $email;
    var $username;
    var $password;
    var $api = 'http://api.verify-email.org/api.php?usr=#username&pwd=#password&check=#email';

    public function __construct($email, $username, $password){

        $this->email = $email;
        $this->username = $username;
        $this->password = $password;

    }

    public function verify(){

        $endpoint = $this->api;
        $endpoint = str_replace('#username', $this->username, $endpoint);
        $endpoint = str_replace('#password', $this->password, $endpoint);
        $endpoint = str_replace('#email', $this->email, $endpoint);


        $data = json_decode($this->get_contents($endpoint));

        return $data;
    }

    function get_contents($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);        
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

}

?>