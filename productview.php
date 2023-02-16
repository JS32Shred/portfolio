<?php
    if(!isset($_POST["productId"])){
        header("Location: index.php");
        exit;
    }

    else{
        $mysqli = require __DIR__ . "./includes/database.php";

        $sql = sprintf("SELECT * FROM watches WHERE id = '%s'",
                        $mysqli -> real_escape_string($_POST["productId"]));

        $result = $mysqli -> query($sql);
        $watch = $result -> fetch_assoc();
    }
?>

<?php include 'includes/header.php' ?>
<?php include 'login.php' ?>
<?php include 'includes/navbar-carousel.php' ?>

<div class="viewProductDetails">
    <div class="navBarColor"></div>
    <div class="detailContainer">
        <img src="./images/watches/<?php echo $watch["image"]; ?>" alt="Watch image">
        <div class="rightSide">
            <div>
                <?php if($watch["stock"] !== NULL) : ?>
                    <span><?php echo $watch["stock"]; ?> in stock</span>
                <?php else : ?>
                    <span><strong>out of stock</strong></span>
                <?php endif; ?>
                <?php if($watch["rating"] !== NULL) : ?>
                    <span class="ratingSpan">
                        <?php 
                            for($i=0; $i<$watch["rating"]; $i++){
                                ?>
                                <i class="fa fa-star"></i>
                                <?php
                            }

                            echo $watch["rating"];
                        ?>
                    </span>
                <?php endif; ?>
            </div>
            <h1><?php echo $watch["brand"]; ?></h1>
            <h2><?php if($watch["model"] !== NULL) { echo $watch["model"]; }?></h2>
            <h3>&euro;<?php echo $watch["price"]; ?></h3>
            <form action="addtocart.php" method="POST" id="addToCartForm">
                <input type="hidden" name="addwatch" value="<?=$watch["id"]?>">
                <button class="addToCartBtn">add to cart <i class="fa fa-shopping-cart"></i></button>
            </form>
        </div>
        <div class="productGradient"></div>
        <div class="descriptionDiv">
            <h1>product description</h1>
            <p><?php echo $watch["description"]; ?></p>
        </div>
    </div>
</div>

<?php include 'includes/footer.php' ?>