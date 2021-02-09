<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "", "test");

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"],
                'item_image'			=>	$_POST["image"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"],
            'item_image'			=>	$_POST["image"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="shoping-cart.php"</script>';
			}
		}
	}
}

?>
<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from preview.colorlib.com/theme/ogani/shoping-cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Feb 2021 02:32:58 GMT -->
<head>
<meta charset="UTF-8">
<meta name="description" content="Ogani Template">
<meta name="keywords" content="Ogani, unica, creative, html">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Ogani | Template</title>

<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&amp;display=swap" rel="stylesheet">

<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
<link rel="stylesheet" href="css/nice-select.css" type="text/css">
<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
<link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
<link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>

<div id="preloder">
<div class="loader"></div>
</div>

<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
<div class="humberger__menu__logo">
<a href="#"><img src="img/logo.png" alt=""></a>
</div>
<div class="humberger__menu__cart">
<ul>
<li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
<li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
</ul>
<div class="header__cart__price">item: <span>$150.00</span></div>
</div>
<div class="humberger__menu__widget">
<div class="header__top__right__language">
<img src="img/language.png" alt="">
<div>English</div>
<span class="arrow_carrot-down"></span>
<ul>
<li><a href="#">Spanis</a></li>
<li><a href="#">English</a></li>
</ul>
</div>
<div class="header__top__right__auth">
<a href="#"><i class="fa fa-user"></i> Login</a>
</div>
</div>
<nav class="humberger__menu__nav mobile-menu">
<ul>
<li class="active"><a href="index-2.html">Home</a></li>
<li><a href="shop-grid.html">Shop</a></li>
<li><a href="#">Pages</a>
<ul class="header__menu__dropdown">
<li><a href="shop-details.html">Shop Details</a></li>
<li><a href="shoping-cart.html">Shoping Cart</a></li>
<li><a href="checkout.html">Check Out</a></li>
<li><a href="blog-details.html">Blog Details</a></li>
</ul>
</li>
<li><a href="blog.html">Blog</a></li>
<li><a href="contact.html">Contact</a></li>
</ul>
</nav>
<div id="mobile-menu-wrap"></div>
<div class="header__top__right__social">
<a href="#"><i class="fa fa-facebook"></i></a>
<a href="#"><i class="fa fa-twitter"></i></a>
<a href="#"><i class="fa fa-linkedin"></i></a>
<a href="#"><i class="fa fa-pinterest-p"></i></a>
</div>
<div class="humberger__menu__contact">
<ul>
<li><i class="fa fa-envelope"></i> <a href="https://preview.colorlib.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="761e131a1a193615191a19041a1f145815191b">[email&#160;protected]</a></li>
<li>Free Shipping for all Order of $99</li>
</ul>
</div>
</div>


<header class="header">
<div class="header__top">
<div class="container">
<div class="row">
<div class="col-lg-6">
<div class="header__top__left">
<ul>
<li><i class="fa fa-envelope"></i> <a href="https://preview.colorlib.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="4129242d2d2e01222e2d2e332d28236f222e2c">[email&#160;protected]</a></li>
<li>Free Shipping for all Order of $99</li>
</ul>
</div>
</div>
<div class="col-lg-6">
<div class="header__top__right">
<div class="header__top__right__social">
<a href="#"><i class="fa fa-facebook"></i></a>
<a href="#"><i class="fa fa-twitter"></i></a>
<a href="#"><i class="fa fa-linkedin"></i></a>
<a href="#"><i class="fa fa-pinterest-p"></i></a>
</div>
<div class="header__top__right__language">
<img src="img/language.png" alt="">
<div>English</div>
<span class="arrow_carrot-down"></span>
<ul>
<li><a href="#">Spanis</a></li>
<li><a href="#">English</a></li>
</ul>
</div>
<div class="header__top__right__auth">
<a href="#"><i class="fa fa-user"></i> Login</a>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="container">
<div class="row">
<div class="col-lg-3">
<div class="header__logo">
<a href="index-2.html"><img src="img/logo.png" alt=""></a>
</div>
</div>
<div class="col-lg-6">
<nav class="header__menu">
<ul>
<li><a href="index-2.html">Home</a></li>
<li class="active"><a href="shop-grid.html">Shop</a></li>
<li><a href="#">Pages</a>
<ul class="header__menu__dropdown">
<li><a href="shop-details.html">Shop Details</a></li>
<li><a href="shoping-cart.html">Shoping Cart</a></li>
<li><a href="checkout.html">Check Out</a></li>
<li><a href="blog-details.html">Blog Details</a></li>
</ul>
</li>
<li><a href="blog.html">Blog</a></li>
<li><a href="contact.html">Contact</a></li>
</ul>
</nav>
</div>
<div class="col-lg-3">
<div class="header__cart">
<ul>
<li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
<li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
</ul>
<div class="header__cart__price">item: <span>$150.00</span></div>
</div>
</div>
</div>
<div class="humberger__open">
<i class="fa fa-bars"></i>
</div>
</div>
</header>


<section class="hero hero-normal">
<div class="container">
<div class="row">
<div class="col-lg-3">
<div class="hero__categories">
<div class="hero__categories__all">
<i class="fa fa-bars"></i>
<span>All departments</span>
</div>
<ul>
<li><a href="rose-bear.html">Rose Bear</a></li>

</ul>
</div>
</div>
<div class="col-lg-9">
<div class="hero__search">
<div class="hero__search__form">
<form action="#">
<div class="hero__search__categories">
All Categories
<span class="arrow_carrot-down"></span>
</div>
<input type="text" placeholder="What do yo u need?">
<button type="submit" class="site-btn">SEARCH</button>
</form>
</div>
<div class="hero__search__phone">
<div class="hero__search__phone__icon">
<i class="fa fa-envelope"></i>
</div>
<div class="hero__search__phone__text">

<span>support@paymentechnologies.co.uk</span>
</div>
</div>
</div>
</div>
</div>
</div>
</section>


<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
<div class="container">
<div class="row">
<div class="col-lg-12 text-center">
<div class="breadcrumb__text">
<h2>Shopping Cart</h2>
<div class="breadcrumb__option">
<a href="index-2.html">Home</a>
<span>Shopping Cart</span>
</div>
</div>
</div>
</div>
</div>
</section>

<div style="clear:both"></div>
			<br />
			
			</div>
		</div>

<section class="shoping-cart spad">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="shoping__cart__table">
<h3>Order Details</h3>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th class="shoping__product">Item Name</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Total</th>
						<th>Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
                   
                    <!-- <td><img src="img/product/details/ //<?php echo $values["item_image"]; ?> </td> -->
                   
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>$ <?php echo $values["item_price"]; ?></td>
                        
						<td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td><a href="rose-bear.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					
					<?php
					}
					?>
						
				</table>
                </div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<div class="shoping__cart__btns">
<a href="index.html" class="primary-btn cart-btn">CONTINUE SHOPPING</a>

<div class="col-lg-6">
<div class="shoping__checkout">
<h5>Cart Total</h5>
<ul>

<li>Total <span>$ <?php echo number_format($total, 2); ?></span></li>
</ul>
<a href="checkout.php" class="primary-btn">PROCEED TO CHECKOUT</a>
</div>
</div>
</div>
</div>
</section>


<footer class="footer spad">
<div class="container">
<div class="row">
<div class="col-lg-3 col-md-6 col-sm-6">
<div class="footer__about">
<div class="footer__about__logo">
<a href="index-2.html"><img src="img/logo.png" alt=""></a>
</div>
<ul>
<li>Address: 60-49 Road 11378 New York</li>
<li>Phone: +65 11.188.888</li>
<li>Email: <a href="https://preview.colorlib.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="234b464f4f4c63404c4f4c514f4a410d404c4e">[email&#160;protected]</a></li>
</ul>
</div>
</div>
<div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
<div class="footer__widget">
<h6>Useful Links</h6>
<ul>
<li><a href="#">About Us</a></li>
<li><a href="#">About Our Shop</a></li>
<li><a href="#">Secure Shopping</a></li>
<li><a href="#">Delivery infomation</a></li>
<li><a href="#">Privacy Policy</a></li>
<li><a href="#">Our Sitemap</a></li>
</ul>
<ul>
<li><a href="#">Who We Are</a></li>
<li><a href="#">Our Services</a></li>
<li><a href="#">Projects</a></li>
<li><a href="#">Contact</a></li>
<li><a href="#">Innovation</a></li>
<li><a href="#">Testimonials</a></li>
</ul>
</div>
</div>
<div class="col-lg-4 col-md-12">
<div class="footer__widget">
<h6>Join Our Newsletter Now</h6>
<p>Get E-mail updates about our latest shop and special offers.</p>
<form action="#">
<input type="text" placeholder="Enter your mail">
<button type="submit" class="site-btn">Subscribe</button>
</form>
<div class="footer__widget__social">
<a href="#"><i class="fa fa-facebook"></i></a>
<a href="#"><i class="fa fa-instagram"></i></a>
<a href="#"><i class="fa fa-twitter"></i></a>
<a href="#"><i class="fa fa-pinterest"></i></a>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<div class="footer__copyright">
<div class="footer__copyright__text"><p>
Copyright &copy;<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com/" target="_blank">Colorlib</a>
</p></div>
<div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
</div>
</div>
</div>
</div>
</footer>


<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/mixitup.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/ogani/shoping-cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Feb 2021 02:33:00 GMT -->
</html>