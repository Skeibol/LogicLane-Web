<?php
$title = "Logic Lane - AI rješenja";
include "header.php";
/**
 * This example shows how to handle a simple contact form safely.
 */

//Import PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

# start session handling.

if (!isset($msg)) {
    $msg = '';
}
//Don't run this unless we're handling a form submission
if (array_key_exists('email', $_POST)) {
    date_default_timezone_set('Etc/UTC');

    require 'vendor/autoload.php';

    //Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;

    $mail->isSMTP();
    $mail->SMTPAuth = true;
    //Send using SMTP to localhost (faster and safer than using mail()) – requires a local mail server
    //See other examples for how to use a remote server such as gmail
    $mail->Host = "in-v3.mailjet.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = "44b23ce71ec4c516f6b302978d8ec0e0";
    $mail->Password = "135fb6d96545b09a58822f1a604d7b3e";

    //Use a fixed address in your own domain as the from address
    //**DO NOT** use the submitter's address here as it will be forgery
    //and will cause your messages to fail SPF checks
    $mail->setFrom('akezele35@gmail.com', 'Antonio Kezele');

    //Fall back to a fixed address if dept selection is invalid or missing
    $mail->addAddress('akezele35@gmail.com');

    //Put the submitter's address in a reply-to header
    //This will fail if the address provided is invalid,
    //in which case we should ignore the whole request


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
            //but it's unsafe to display errors directly to users - process the error, log it on your server.
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
        <input type="text" id="name" name="name">

        <label for="email">Your email:</label>
        <input type="email" id="email" name="email">

        <label for="message">Your message:</label>
        <textarea id="message" name="message" style="height:200px" placeholder=".." required></textarea>

        <button class="btn-contact btn-send" type="submit" name="submit" id="contact-submit"><a
                class="contact-hero">Send</a></button>
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