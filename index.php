


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Document</title>
</head>
<body>
<div class="container">  
  <form id="contact" action="" method="post" onsubmit="sendEmail(); reset(); return false;">
    <h3>Contact Form</h3>
    <fieldset>
      <input placeholder="Your name" type="text" tabindex="1" required autofocus name="name">
    </fieldset>
    <fieldset>
      <input placeholder="Your Email Address" type="email" tabindex="2" required name="email" id="email">
    </fieldset>
    <fieldset>
      <input placeholder="Your Phone Number (optional)" type="tel" tabindex="3" name="phone">
    </fieldset>
    <fieldset>
      <textarea placeholder="Type your message here...." tabindex="5" required name="message"></textarea>
    </fieldset>

    <div class="g-recaptcha" data-sitekey="6LcBcnQmAAAAAEUmFUdMO4_bkbhHPcb3zyvmECEW"></div>

    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
  </form>
    <div class="status">

    <?php 
    if(isset($_POST['submit'])){
        $secretKey = "6LcBcnQmAAAAAJsgm0MkaWUqiuyKl7jgnweXDkyl";
        $responseKey = $_POST['g-recaptcha-response'];
        $UserIP = '';

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $UserIP = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $UserIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $UserIP = $_SERVER['REMOTE_ADDR'];
        }
        
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$UserIP";

        $response = file_get_contents($url);
        $response = json_decode($response);

        if($response->success){ ?>
            <script>alert("Message sent!")</script>;
       <?php } else{
            echo "<script>alert('Invalid recaptcha')</script>";
        }
    }
    ?>

    </div>
</div>

</body>
</html>