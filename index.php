
<?php
session_start();
    # connect to database
    require_once 'connectdb.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrendySack</title>
    
    <script src="js/min.js"></script>
    <script>
        $(function () {
            $("#header").load("header.php");
            $("#footer").load("footer.php");
        });
    </script>
</head>

<body>
    <grid class="grid">
        <header id="header" class="header"></header>
        <container class="container">
            <Div class="left_sidebar">
            </Div>
            <div class="data">
                <div class="line">Being an Amazon Associate I earn form Qualifying Purchases.</div>
                <content class="content">
                    <?php
                            $sql = "SELECT * FROM products";
                            $result = $conn->query($sql);
                            // $singleRow = mysqli_fetch_assoc($result);
                            // print_r($singleRow);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        echo "<div class='product'><a href='product.php?id=".$row['id']."'>
                                        <div class='image'>".$row['image_link']."</div>
                                        <div class='name'>".$row["product_name"]." </div>
                                        <div class='discription'> ".$row["short_desc"]."</div>
                                        </a>
                                        </div>";
                                        }
                                } else {
                                    echo "0 results";
                                }
                                $conn->close();
                    ?>
                </content>
            </div>
            <Div class="right_sidebar">
            </Div>
        </container>
        <footer id="footer" class="footer">
        </footer>
    </grid>

</body>

</html>