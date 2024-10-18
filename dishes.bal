<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();

include_once 'product-action.php';

?>
    <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Zeta-X</title>
      <meta name="keywords" content="">
      <meta name="description" content="Decentralized Food Delivery System | Superteam Radar Hackerthon">
      <meta name="author" content="Muhammad Sheriff">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="test2.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- font css -->
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   </head>

<body>
    <?php
        include("header.php");
    ?>
    <!-- blog section start -->
    <div class="food_section layout_padding">
		<?php
			$stmt = $db->prepare("select * from dishes where rs_id='$_GET[res_id]'");
			$stmt->execute();
			$products = $stmt->get_result();
			if (!empty($products))
			{
				foreach($products as $product)
				{
		 ?>
        <div class="container">
            ..
            ..
            ..
            <div class="row">
                <!-- <div class="col-md-4"> -->
					<form method="post" action='dishesNew.php?res_id=<?php echo $_GET['res_id'];?>&action=add&id=<?php echo $product['d_id']; ?>'>
                        <div class="food_box active">
                            <div style="display: flex;">
                                <div class="food_img">
                                    <a class="" href="#"><?php echo '<img src="admin/Res_img/dishes/'.$product['img'].'" alt="Food logo">'; ?></a>
                                </div>
                                <div><h4 class="burger_text active"><?php echo $product['title']; ?></h4>
                                <h6 class="date_text"><?php echo $product['slogan']; ?></h6>
                                <h6 class="time_text">$<?php echo $product['price']; ?> - <del>$<?php echo $product['old_price']; ?></del></h6>
                            </div>
                        </div>
                        <div class="down_info">
                            <p>Quantity - <input type="number" name="quantity" value="1" size="2" /></p>
                            <button type="submit">Add to Cart</button>
                        </div>
                    </form>
                    </div>
            </div>
        </div>
		<?php
				}
			}
		?>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>

</html>
