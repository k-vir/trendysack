<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/subscribe_style.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/min.js"></script>
    <script>
        $(function () {
            $("#header").load("header.php");
            $("#footer").load("footer.php");
        });
    </script>
    <title>Subscribe</title>
</head>

<body>
    <div id="loading">
        <img id="loading_image" src="resources\Circles-menu-3.gif" alt="Loading..." />
    </div>
    <container>
        <div class="grid">
            <div id="header" class="header">
            </div>
            <div class="subscribe_box">
                <h3>Subscribe</h3>
                <h5>For Email Notification</h5>
                <form class="subscribe_form" action="..\includes\add_mail_subscriber.php" method="post" enctype="multipart/form-data">
                    <span>First Name</span>
                    <input type="text" class="firstname" placeholder=" First Name..." name="firstname" required>
                    <span>Last Name</span>
                    <input type="text" class="lastname" placeholder=" Last Name..." name="lastname">
                    <span>Email</span>
                    <input type="email" class="email" placeholder="Email..." name="email" required>
                    <span>Date of Birth</span>
                    <input type="date" class="dob" name="birth_date" required>
                    <span>Gender</span>
                    <div class="gender_select">
                        <input type="radio" id="male" value="male" name="gender" checked>
                        <label for="male">Male</label>
                        <input type="radio" id="female" value="female" name="gender">
                        <label for="female">Female</label>
                        <input type="radio" id="other" value="other" name="gender">
                        <label for="other">Other</label>
                    </div>
                    <button type="submit" class="subscribe_btn" name="submit_subscriber">Subscribe</button>
                </form>
            </div>
            <div id="footer" class="footer">
            </div>
        </div>
    </container>
    <script src="js/my_custom.js"></script>
</body>