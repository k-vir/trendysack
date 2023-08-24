<?php
session_unset();
session_start();
$_SESSION["tool_used"] = 'jpgtopng';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/jpgtopng_style.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/min.js"></script>

    
    <script>
        $(function () {
            $("#header").load("header.php");
            $("#footer").load("footer.php");
            $("#ads").load("sidebarads.php");
        });
    </script>
    
    <title>Convert JPG to PNG, online</title>
</head>

<body>
    <div id="loading">
        <img id="loading_image" src="resources\Circles-menu-3.gif" alt="Loading..." />
    </div>
    <container>
        <div class="grid">
            <div id="header" class="header"></div>
            <div class="errors_box">
            <?php
            if(isset($_SESSION["error"])) {
                if($_SESSION["error"]!="0"){
                    echo "<span id='message' value='". $_SESSION['error']. "'>". $_SESSION['error']. "</span>";
                }  
            }
            ?>
            </div>
            <div class="content">
                <div id="ads" class="ads"></div>
                <div class="tool_drag_area">
                    <div class="tool_head">
                        <h1 class="tool_name">JPG to PNG</h1>
                        <h2 class="naration"> Please select JPEG/JPG file to convert.</h2>
                        <p></p>
                    </div>
                    <div class="choose_files_area">
                        <div id="file_list1">
                            <ul><div id="image_preview">
                            <!-- uploaded files will get listed here. -->
                            </div></ul>
                        </div>
                        <div  class="select_files">
                            <form id="select_form" class="form">
                                <input id="browse" class="browse" type="file" accept=".jpg, .jpeg" onchange="image_select()"  multiple hidden>
                                
                                <!-- <input type="submit" name="upload_button" class="upload_btn" onclick="upload_files()" id="upload_btn" value="Upload" hidden/>
                                <label class="convert_btn" for="upload_btn" hidden>Convert</label> -->
                                
                                <!-- <button class="upload_btn" type="submit" name="submit">UPLOAD</button> -->
                            </form>
                            <input type="submit" name="upload_button" class="upload_btn" onclick="upload_files()" id="upload_btn" value="Upload" hidden/>
                            <label class="browse_btn" for="browse">Select JPG file</label>
                            <label class="convert_btn" for="upload_btn" hidden>Convert</label>
                        </div>  
                    </div>
                </div>
                <div class="tool_option_sidebar">
                    <div class="options">
                        <!-- <button class="convert_btn" type="submit" name="submit">Convert</button> -->
                        <h2>Tool Settings</h2>
                        <p>Uploaded JPG file will be converted to PNG.</p>
                    </div>
                </div>
            </div>
            <div id="footer" class="footer"></div>         
        </div>
    </container>
    <script src="js/my_custom.js"></script>
</body>
</html>