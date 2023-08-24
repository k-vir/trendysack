<?php
session_start();
$file = $_SESSION['output_data'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/download_style.css">
    <script src="js/min.js"></script>
    <script src="js/my_custom.js"></script>
    <script>
        $(function () {
            $("#header").load("header.php");
            $("#footer").load("footer.php");
            $("#ads").load("sidebarads.php");
        });
    </script>
    <title>Download</title>
</head>

<body>
    <div id="loading">
        <img id="loading_image" src="resources\Circles-menu-3.gif" alt="Loading..." />
    </div>
    <container>
        <div class="grid">
            <div id="header" class="header"></div>
            <div class="content">
                <div class="download_btn_area">
                    <a download= "<?php echo $_SESSION['output_data']; ?>" href= "<?php echo $_SESSION['output_data']; ?>">
                    <input type="download" name="download_button" class="download_button" action="includes/download_includes.php" id="download_button" hidden/>
                    </a>
                    <label class="download_btn" for="download_button"><i class="fa fa-download"></i> Download</label>
                    <p>Your file is Ready to Download!!!</p>
                </div>
                <!-- <div id="lower_ads_area" class="lower_ads_area">
                    <div class="horizontal_ad">Place for ad!!!</div>
                </div> -->
                <div class="content_sidebar"></div>
            </div>
        </div>
        <div id="footer" class="footer"></div>
        </div>
    </container>
    <script src="js/my_custom.js"></script>
</body>

</html>
