<?php
$title = "Logic Lane - AI rješenja";
include "header.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


if (!isset($msg)) {
    $msg = '';
}


//Don't run this unless we're handling a form submission
if (array_key_exists('email', $_POST) && $_POST['med'] == "") {
    date_default_timezone_set('Etc/UTC');

    require 'vendor/autoload.php';
    $mail = new PHPMailer(true);

    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "in-v3.mailjet.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = "e1869b4f8bc7a80430aed0d1510b5384";
    $mail->Password = "4832eea214596cb06170a44415d8d7b7";


    $mail->setFrom('logiclane.info@gmail.com ', 'Logic Lane');
    $mail->addAddress('logiclane.info@gmail.com ');


    if ($mail->addReplyTo($_POST['email'], $_POST['name'])) {
        $mail->Subject = 'PHPMailer contact form';
        //Keep it simple - don't use HTML
        $mail->isHTML(false);
        //Build a simple message body
        $mail->Body = <<<EOT
        Email: {$_POST['email']}
        Name: {$_POST['name']}
        Message: {$_POST['message']}
        EOT;
        //Send the message, check for errors
        if (!$mail->send()) {
            //The reason for failing to send will be in $mail->ErrorInfo
            $msg = 'Sorry, something went wrong. Please try again later.';
        } else {
            $msg = 'Message sent! Thanks for contacting us.';
        }
    } else {
        $msg = 'Invalid email address, message ignored.';
    }

    $_POST['email'] = null;
    $_POST['name'] = null;
    $_POST['message'] = null;

}
?>

<div class="form--container">
    <h2 class="form--text" id="#form-text">Send us a message</h2>
    <form class="form--action" method="post" action="#form-text">
        <label for="name">Your name:</label>
        <input type="text" id="name" name="name" pattern="[a-zA-Z ]{1,}" required>

        <label for="email">Your email:</label>
        <input type="email" id="email" name="email">

        <label for="message">Your message:</label>
        <textarea id="message" name="message" style="height:200px" placeholder=".." required></textarea>

        <input type="text" id="med" name="med" style="display:none" value="">

        <button class="btn-contact" type="submit" name="submit" id="contact-submit">
            <a class="invert">Send</a>
        </button>
    </form>
    <p>
        <?php echo $msg; ?>
    </p>
</div>
<div class="map">
    <h2 class="form--text ">..or visit us in our office</h2>
    <div class="map--container">
        <div class="map--left">
            <h3>Lorem ipsum dolor</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, officia?</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, officia?</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, officia?</p>
        </div>
        <div class="map--right">
            <iframe class="map--google"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1665.3805683685646!2d17.151815362450392!3d45.41286637343932!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4767730e148178e9%3A0x3e1e5255632ab353!2sAI%20Centar%20Lipik!5e0!3m2!1sen!2shr!4v1678050425801!5m2!1sen!2shr"
                width="700" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>


<?php
include "footer.php";
?>

<script>
    $(".navbar").addClass("scrolled");
</script>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>