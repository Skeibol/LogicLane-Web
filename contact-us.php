<?php
$title = "Logic Lane - AI rješenja";
include "header.php";
?>

<div class="form--container">
    <h1 class="form--text">Send us a message</h1>
    <form class="form--action" action="action_page.php">
        <label for="name">Your name:</label>
        <input type="text" id="name" name="firstname">

        <label for="email">Your email:</label>
        <input type="text" id="email" name="lastname">

        <label for="subject">Your message:</label>
        <textarea id="subject" name="subject" style="height:200px" placeholder=".."></textarea>

        <input class="btn-contact btn-send" type="submit" value="Send">

    </form>
</div>
<div class="map">
    <h1 class="form--text ">..or visit us in our office</h1>
    <div class="map--container">
        <div class="map--left">
            <h1>Lorem ipsum dolor</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, officia?</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, officia?</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, officia?</p>
        </div>
        <div class="map--right">
            <iframe class="map--google" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1665.3805683685646!2d17.151815362450392!3d45.41286637343932!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4767730e148178e9%3A0x3e1e5255632ab353!2sAI%20Centar%20Lipik!5e0!3m2!1sen!2shr!4v1678050425801!5m2!1sen!2shr" width="700" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>