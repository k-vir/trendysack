<?php
session_start();
// $Product_Id = $_SESSION["Product_Id"];
$Product_Id = $_GET["id"];
if ($Product_Id < 1){
    header("Location: index.php");
}
// $Product_Id = "1";
// echo $Product_Id;
    # connect to database
    require_once 'connectdb.php';

    $sql = "SELECT * FROM products WHERE ID='" . $Product_Id . "'";
    $result = $conn->query($sql);
    $singleRow = mysqli_fetch_assoc($result);
    // print_r($singleRow);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name_product="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="css/product_style.css">
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
            <div class="data_product">
                <content class="content_product">
                    <ul class="name_product"><?php echo $singleRow['product_name']; ?></ul>
                    <div class="product_frame">
                        <div class="image_product_box">
                            <div class="image_product"><?php echo $singleRow['image_link']; ?></div>
                        </div>
                        <div>
                            <ul class="id"><?php echo $singleRow['id']; ?></ul>
                            <ul class="sht_dscr"><?php echo $singleRow['short_desc']; ?></ul>
                        </div>
                    </div>
                    <ul class="lng_dscr"><?php echo $singleRow['long_decs']; ?></ul>
                    <div class="buttons">
                        <a href="https://<?php echo $singleRow['Short link']; ?>"><button class="buy_it">Buy From Amazon</button></a>
                        <a href="https://<?php echo $singleRow['Short link']; ?>"><button>Share Product</button></a>
                        <a href="https://<?php echo $singleRow['Short link']; ?>"><button>Copy Product Link</button></a>
                        <a href="index.php"><button>Cancel</button></a>
                    </div>
                </content>
            </div>
            <Div class="right_sidebar">
            </Div>
        </container>
        <footer id="footer" class="footer"></footer>
    </grid>
</body>

</html>
<?php
$conn->close();
?>