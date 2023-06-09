<?php
$title = "Contact us | Logic Lane";
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
        $mail->Body  = "User " . $_POST['name'] . " has sent the following message <br/><br/>";
        $mail->Body  .= "<b>" . $_POST['message'] . "</b>. <br/><br/>";
        $mail->Body  .= "Email is " . $_POST['email'] . ".";
        //Send the message, check for errors
        if (!$mail->send()) {
            //The reason for failing to send will be in $mail->ErrorInfo
            $msg = 'Sorry, something went wrong. Please try again later.';
        } else {
            $msg = 'Message sent! Thanks for contacting us.';
        }
    } else {
        $msg = 'Invalid email address, message not sent.';
    }

    $_POST['email'] = null;
    $_POST['name'] = null;
    $_POST['message'] = null;
}
?>
<svg data-aos="fade-left" data-aos-offset="300" data-aos-duration="1000" class="form--svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 700.34 654.17">
    <g id="Layer_2" data-name="Layer 2">
        <g id="Layer_1-2" data-name="Layer 1">
            <g id="Group_86" data-name="Group 86">
                <g id="Polygon_12" data-name="Polygon 12">
                    <path class="cls-1" d="M700.34,8l-.48,646.17L119.72,291.58Z" />
                    <path class="cls-2" d="M699.54,9.28,121.37,291.67l577.7,361.06.47-643.45m.8-1.28-.47,646.17L119.72,291.58Z" />
                </g>
                <g id="Polygon_11" data-name="Polygon 11">
                    <path class="cls-1" d="M580.62,0l-.48,646.17L0,283.58Z" />
                    <path class="cls-2" d="M579.82,1.28,1.65,283.67l577.7,361.06.47-643.45m.8-1.28-.47,646.17L0,283.58Z" />
                </g>
            </g>
        </g>
    </g>
</svg>


<div class="form--container">
    <h2 class="form--text" id="#form-text" data-aos="fade-right" data-aos-offset="100" data-aos-duration="1000">Send us
        a message</h2>
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
    <p class="form--message">
        <?php echo $msg; ?>
    </p>
</div>




<div class="map">
    <h2 class="form--text text-right" data-aos="fade-left" data-aos-offset="300" data-aos-duration="1000">..or visit us
        in our office</h2>
    <div class="map--container">
        <div class="map--left">
            <h3>Reach out at:</h3>
            <p><a class="mail--contact" href="mailto:logiclane@gmail.com"><i class="fa fa--contact fa-sharp fa-thin fa-envelope"></i>logiclane@gmail.com</a></p>
            <p> <i class="fa fa--contact fa-thin fa-map-marker"></i>Ulica Hrvatske Mladeži BB, 34551 Lipik</p>
            <p><a class="mail--contact" href="tel:+385 97 736 0408"><i class=" fa fa--contact fa-sharp fa-thin fa-phone"></i>+385 97 736
                    0408</a> </p>
        </div>
        <div class="map--right">
            <iframe class="map--google" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2800.8751878937683!2d17.155162173762793!3d45.41185638949885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476773aee49c16e7%3A0x3e37ba3eb85ad8ed!2sUl.%20Hrvatske%20mlade%C5%BEi%2032%2C%2034551%2C%20Lipik!5e0!3m2!1sen!2shr!4v1678814327800!5m2!1sen!2shr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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