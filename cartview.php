<?php include 'includes/header.php' ?>
<?php include 'login.php' ?>
<?php include 'includes/navbar-carousel.php' ?>

<?php
    if(isset($_POST["empty"])){
        unset($_SESSION["cart"]);
    }
?>

<div class="navBarColor"></div>

<div class="cartContainer">
    <div class="cartView">
        <?php 
            if(isset($_SESSION["cart"])){
                ?>
                <h1>shopping cart
                    <span>
                        <?php
                            if((count($_SESSION["cart"])) == 1){
                                echo "(" . count($_SESSION["cart"]) . " item)";
                            }

                            elseif((count($_SESSION["cart"])) > 1){
                                echo "(" . count($_SESSION["cart"]) . " items)";
                            }
                        ?>
                    </span>
                </h1>
                <?php
            }

            if(isset($_SESSION["cart"])){
                $mysqli = require __DIR__ . "./includes/database.php";
                $priceTotal = 0;
                

                foreach($_SESSION["cart"] as $key => $value){
                    $sql = sprintf("SELECT * FROM watches WHERE id = '%s'",
                                    $mysqli -> real_escape_string($value));
                                
                    $result = $mysqli -> query($sql);
                    $watch = $result -> fetch_assoc();
                    $priceTotal += $watch["price"];
                    ?>
                        <div class="cartItem">
                            <div class="watchImg"><img src="./images/watches/<?php echo $watch["image"] ?>" alt="Watch image"></div>
                            <div class="sideView">
                                <h1><?=$watch["brand"]?></h1>
                                <h2><?=$watch["model"]?></h2>
                                <h3>&euro;<?=$watch["price"]?></h3>
                                <form action="removeitem.php" method="post">
                                    <input type="hidden" name="itemtoremove" value="<?=$watch["id"]?>">
                                        <button type="submit"><i class="fa fa-close"></i></button>
                                </form>
                            </div>
                        </div>
                    <?php
                }
            }
        ?>
    </div>
    
    <?php if(isset($_SESSION["cart"])) : ?>
        <div class="checkOutContainer">
            <h1>order summary</h1>
            <div class="line"></div>
            <span>total:</span>
            <span class="toRight">
                &euro;<?=$priceTotal?>
            </span>
            <?php if(isset($_SESSION["user_id"])) : ?>
                <a href="#">continue to checkout</a>
                <div class="paymentMethods">
                    <i class="fa fa-cc-amex"></i>
                    <i class="fa fa-cc-diners-club"></i>
                    <i class="fa fa-cc-discover"></i>
                    <i class="fa fa-cc-jcb"></i>
                    <i class="fa fa-cc-mastercard"></i>
                    <i class="fa fa-cc-paypal"></i>
                    <i class="fa fa-cc-stripe"></i>
                    <i class="fa fa-cc-visa"></i>
                </div>
            <?php else : ?>
                <p>You must be logged in to check out.</p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    
    <?php if(!isset($_SESSION["cart"])) : ?>
        <div class="cartEmpty">
            <p>YOUR CART IS CURRENTLY EMPTY, PLEASE NAVIGATE TO THE ITEM YOU WISH TO PURCHASE AND CLICK "ADD TO CART"</p>
            <a href="index.php">continue shopping</a>
        </div>
    <?php endif; ?>

    <?php if(isset($_SESSION["cart"])) : ?>
        <form method="post">
            <a href="index.php">continue shopping</a></br>
            <input type="hidden" name="empty" value="empty">
            <button>empty cart <i class="far fa-trash-alt"></i></button>
        </form>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php' ?>