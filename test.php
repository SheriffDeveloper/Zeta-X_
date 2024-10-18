<?php
include("connection/connect.php");
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html>
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
      <meta name="keywords" content="Food Delivery">
      <meta name="description" content="Decentralizing Food Delivery">
      <meta name="author" content="Muhammad Sheriff">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- font css -->
      <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> -->
      <!-- Scrollbar Custom CSS -->
      <!-- <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css"> -->
      <!-- Tweaks for older IEs-->
      <!-- <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css"> -->
      <style>
         .navbar_section{
            position: fixed;
            background-color: orangered;
            border-bottom-right-radius: 20px;
            border-bottom: 2px solid #000;
         }
         .free_delivery{
            height: 25px;
            display: flex;
            background-color: orangered;
         }
         .free_delivery p{
            margin-left: 20px;
            margin-right: 20px;
            margin-top: 0px;
            color: #fff;
         }
         #overflowTest {
         background: ;
         color: white;
         /* padding: 15px; */
         width: 100%;
         height: 220px;
         overflow: scroll;
         /* border: 1px solid #ccc; */
         }
        .menulist{
           width: 100%;
           /* height: inherit; */
           display: flex;
           background: ;
           padding: 0px 10px;
           margin-top: 10px;
           overflow: scroll;
           align-items: space-between;
        }
        .menulist .menusingle{
           width: 400px;
           height: 220px;
           margin-right: 10px;
           border-radius: 10px;
           background-color: transparent;
           box-shadow: 0px 0px 20px 0px;
        }
        .menulist .menusingle img{
           width: 300px;
           height: 100px;
           border-top-left-radius: 10px;
           border-top-right-radius: 10px;
        }
        .menulist .menusingle .menubottomsection{
           height: 120px;
           background-color: transparent;
           border: 2px solid orangered;
           border-bottom-left-radius: 10px;
           border-bottom-right-radius: 10px;
        }
        .menulist .menusingle .menubottomsection .foodname{
         height: 40px;
         background-color: #000;
         color: #fff;
        }
        .menulist .menusingle p{
           width: 150px;
           height: 0px;
           margin-left: 10px;
           color: #fff;
           font-size: 15px;
        }
        .menulist .menusingle .menu_price{
            /* margin-top: 10px;
            margin-left: 10px; */
            /* position: relative; */
            top: 10px;
            left: 30px;
        }
        .down_info{
         margin-top: -10px;
         align-items: space-around;
        }
         .down_info p{
            display: flex;
            width: 100%;
            margin-top: 5px;
            /* margin-bottom: 20px; */
            margin-left: 20px;
            color: orangered;
         }
         .down_info p input{
            width: 30px;
            height: 20px;
            margin-top: -20px;
            margin-left: 80px;
         }
         .down_info button{
            width: 100%;
            height: 30px;
            /* position: relative; */
            margin-bottom: -50px;
            border-color: orangered;
            border: 2px solid orangered;
            color: #000;
            background-color: #0000;
            border-radius: 10px;
         }
         .down_info input:hover{
            border-color: rgb(0, 0, 0);
            color: #fff;
            background-color: orangered;
            border-radius: 5px;
         }
         .down_info button:hover{
            border: 2px solid orangered;
            color: #000;
            background-color: orangered;
         }
         .menu-categories {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            overflow: scroll;
        }
        .menu-categori {
            /* padding: 0px 20px; */
            background-color: #fff;
            border: 2px solid orangered;
            color: #ff6f00;
            width: 500px;
            height: 30px;
            border-radius: 20px;
            cursor: pointer;
            font-weight: 600;
        }
        .menu-categories button.active {
            background-color: orangered;
            color: #fff;
        }
        //Desktop Start//
        @media screen and (min-width: 480px) {
      }
      </style>
   </head>
   <body>
      <!-- Nav Bar section start -->
<div style="" class="navbar_section">
   <div class="container">
      <h2 class="navbar_text">2024 All Rights Reserved. Build by <a href="">Zeta</a></h2>
   </div>
</div>
<!-- Nav Bar section end -->
    <!-- Restaurant List start -->
<div style="margin-top: -30px;" class="blog_section layout_padding">
   <!-- Pages Section start-->
   <div class="free_delivery">
   <p>Select a Restaurant</p><p>Based On GPS</p>
   </div>
   <div class="menu-categories">
      <?php $ress= mysqli_query($db,"select * from restaurant");
			while($rows=mysqli_fetch_array($ress))
				{ echo'
               <a href="dishes.php?res_id='.$rows['rs_id'].'" ><h5>'.$rows['title'].'</h5></a>';
            }
      ?>
   </div>
    <!-- Pages Section Ends-->
   <!-- Menu List Start-->
   <div class="free_delivery">
   <p>Soft Drinks Section</p><p>Enjoy Your Day</p>
   </div>
    <div class="menulist" id="overflowTest">
        <div class="menusingle">
           <img src="images/img/pimg.jpg" alt="">
           <div class="menubottomsection">
               <div class="foodname">
                  <p>Name Of Menu</p>
                  <p class="menu_price">$20.0 <del>$25.3</del></p>
               </div>
               <div class="down_info">
                  <p>Quantity - <input type="number" name="quantity" value="1" size="2" /></p>
                  <button type="submit">Add to Cart</button>
               </div>
           </div>
        </div>
        <div class="menusingle">
           <img src="images/img/pimg.jpg" alt="">
           <div class="menubottomsection">
               <div class="foodname">
               <p>Name Of Menu</p>
               <p class="menu_price">$20.0 <del>$25.3</del></p>
               </div>
               <div class="down_info">
                  <p>Quantity - <input type="number" name="quantity" value="1" size="2" /></p>
                  <button type="submit">Add to Cart</button>
               </div>
           </div>
        </div>
        <div class="menusingle">
           <img src="images/img/pimg.jpg" alt="">
           <div class="menubottomsection">
               <div class="foodname">
               <p>Name Of Menu</p>
               <p class="menu_price">$20.0 <del>$25.3</del></p>
               </div>
               <div class="down_info">
                  <p>Quantity - <input type="number" name="quantity" value="1" size="2" /></p>
                  <button type="submit">Add to Cart</button>
               </div>
           </div>
        </div>
        <div class="menusingle">
           <img src="images/img/pimg.jpg" alt="">
           <div class="menubottomsection">
               <div class="foodname">
                  <p>Name Of Menu</p>
                  <p class="menu_price">$20.0 <del>$25.3</del></p>
               </div>
               <div class="down_info">
                  <p>Quantity - <input type="number" name="quantity" value="1" size="2" /></p>
                  <button type="submit">Add to Cart</button>
               </div>
           </div>
        </div>
        <div class="menusingle">
           <img src="images/img/pimg.jpg" alt="">
           <div class="menubottomsection">
               <div class="foodname">
                  <p>Name Of Menu</p>
                  <p class="menu_price">$20.0 <del>$25.3</del></p>
               </div>
               <div class="down_info">
                  <p>Quantity - <input type="number" name="quantity" value="1" size="2" /></p>
                  <button type="submit">Add to Cart</button>
               </div>
           </div>
        </div>
        <div class="menusingle">
           <img src="images/img/pimg.jpg" alt="">
           <div class="menubottomsection">
               <div class="foodname">
                  <p>Name Of Menu</p>
                  <p class="menu_price">$20.0 <del>$25.3</del></p>
               </div>
               <div class="down_info">
                  <p>Quantity - <input type="number" name="quantity" value="1" size="2" /></p>
                  <button type="submit">Add to Cart</button>
               </div>
           </div>
        </div>
        <div class="menusingle">
           <img src="images/img/pimg.jpg" alt="">
           <div class="menubottomsection">
               <div class="foodname">
                  <p>Name Of Menu</p>
                  <p class="menu_price">$20.0 <del>$25.3</del></p>
               </div>
               <div class="down_info">
                  <p>Quantity - <input type="number" name="quantity" value="1" size="2" /></p>
                  <button type="submit">Add to Cart</button>
               </div>
           </div>
        </div>
        <div class="menusingle">
           <img src="images/img/pimg.jpg" alt="">
           <div class="menubottomsection">
               <div class="foodname">
                  <p>Name Of Menu</p>
                  <p class="menu_price">$20.0 <del>$25.3</del></p>
               </div>
               <div class="down_info">
                  <p>Quantity - <input type="number" name="quantity" value="1" size="2" /></p>
                  <button type="submit">Add to Cart</button>
               </div>
           </div>
        </div>
        <div class="menusingle">
           <img src="images/img/pimg.jpg" alt="">
           <div class="menubottomsection">
               <div class="foodname">
                  <p>Name Of Menu</p>
                  <p class="menu_price">$20.0 <del>$25.3</del></p>
               </div>
               <div class="down_info">
                  <p>Quantity - <input type="number" name="quantity" value="1" size="2" /></p>
                  <button type="submit">Add to Cart</button>
               </div>
           </div>
        </div>
        <div class="menusingle">
           <img src="images/img/pimg.jpg" alt="">
           <div class="menubottomsection">
               <div class="foodname">
                  <p>Name Of Menu</p>
                  <p class="menu_price">$20.0 <del>$25.3</del></p>
               </div>
               <div class="down_info">
                  <p>Quantity - <input type="number" name="quantity" value="1" size="2" /></p>
                  <button type="submit">Add to Cart</button>
               </div>
           </div>
        </div>
     </div>
   <!-- Menu List End-->
   <!-- Menu List Start-->
   <div class="free_delivery">
   <p>Foods Section</p><p>Place Your Oder Now</p>
   </div>
    <div class="menulist" id="overflowTest">
        <div class="menusingle">
           <img src="images/img/pimg.jpg" alt="">
           <div class="menubottomsection">
               <div class="foodname">
                  <p>Name Of Menu</p>
                  <p class="menu_price">$20.0 <del>$25.3</del></p>
               </div>
               <div class="down_info">
                  <p>Quantity - <input type="number" name="quantity" value="1" size="2" /></p>
                  <button type="submit">Add to Cart</button>
               </div>
           </div>
        </div>
        <div class="menusingle">
           <img src="images/img/pimg.jpg" alt="">
           <div class="menubottomsection">
               <div class="foodname">
               <p>Name Of Menu</p>
               <p class="menu_price">$20.0 <del>$25.3</del></p>
               </div>
               <div class="down_info">
                  <p>Quantity - <input type="number" name="quantity" value="1" size="2" /></p>
                  <button type="submit">Add to Cart</button>
               </div>
           </div>
        </div>
        <div class="menusingle">
           <img src="images/img/pimg.jpg" alt="">
           <div class="menubottomsection">
               <div class="foodname">
               <p>Name Of Menu</p>
               <p class="menu_price">$20.0 <del>$25.3</del></p>
               </div>
               <div class="down_info">
                  <p>Quantity - <input type="number" name="quantity" value="1" size="2" /></p>
                  <button type="submit">Add to Cart</button>
               </div>
           </div>
        </div>
        <div class="menusingle">
           <img src="images/img/pimg.jpg" alt="">
           <div class="menubottomsection">
               <div class="foodname">
                  <p>Name Of Menu</p>
                  <p class="menu_price">$20.0 <del>$25.3</del></p>
               </div>
               <div class="down_info">
                  <p>Quantity - <input type="number" name="quantity" value="1" size="2" /></p>
                  <button type="submit">Add to Cart</button>
               </div>
           </div>
        </div>
        <div class="menusingle">
           <img src="images/img/pimg.jpg" alt="">
           <div class="menubottomsection">
               <div class="foodname">
                  <p>Name Of Menu</p>
                  <p class="menu_price">$20.0 <del>$25.3</del></p>
               </div>
               <div class="down_info">
                  <p>Quantity - <input type="number" name="quantity" value="1" size="2" /></p>
                  <button type="submit">Add to Cart</button>
               </div>
           </div>
        </div>
        <div class="menusingle">
           <img src="images/img/pimg.jpg" alt="">
           <div class="menubottomsection">
               <div class="foodname">
                  <p>Name Of Menu</p>
                  <p class="menu_price">$20.0 <del>$25.3</del></p>
               </div>
               <div class="down_info">
                  <p>Quantity - <input type="number" name="quantity" value="1" size="2" /></p>
                  <button type="submit">Add to Cart</button>
               </div>
           </div>
        </div>
        <div class="menusingle">
           <img src="images/img/pimg.jpg" alt="">
           <div class="menubottomsection">
               <div class="foodname">
                  <p>Name Of Menu</p>
                  <p class="menu_price">$20.0 <del>$25.3</del></p>
               </div>
               <div class="down_info">
                  <p>Quantity - <input type="number" name="quantity" value="1" size="2" /></p>
                  <button type="submit">Add to Cart</button>
               </div>
           </div>
        </div>
        <div class="menusingle">
           <img src="images/img/pimg.jpg" alt="">
           <div class="menubottomsection">
               <div class="foodname">
                  <p>Name Of Menu</p>
                  <p class="menu_price">$20.0 <del>$25.3</del></p>
               </div>
               <div class="down_info">
                  <p>Quantity - <input type="number" name="quantity" value="1" size="2" /></p>
                  <button type="submit">Add to Cart</button>
               </div>
           </div>
        </div>
        <div class="menusingle">
           <img src="images/img/pimg.jpg" alt="">
           <div class="menubottomsection">
               <div class="foodname">
                  <p>Name Of Menu</p>
                  <p class="menu_price">$20.0 <del>$25.3</del></p>
               </div>
               <div class="down_info">
                  <p>Quantity - <input type="number" name="quantity" value="1" size="2" /></p>
                  <button type="submit">Add to Cart</button>
               </div>
           </div>
        </div>
        <div class="menusingle">
           <img src="images/img/pimg.jpg" alt="">
           <div class="menubottomsection">
               <div class="foodname">
                  <p>Name Of Menu</p>
                  <p class="menu_price">$20.0 <del>$25.3</del></p>
               </div>
               <div class="down_info">
                  <p>Quantity - <input type="number" name="quantity" value="1" size="2" /></p>
                  <button type="submit">Add to Cart</button>
               </div>
           </div>
        </div>
     </div>
   <!-- Menu List End-->

    <div class="container">
       <div class="">
          <div class="row">
          <?php $ress= mysqli_query($db,"select * from restaurant");
									      while($rows=mysqli_fetch_array($ress))
										  { echo'
                <div class="blog_box active">
                   <div class="blog_img">
                     <a class="img-fluid" href="dishes.php?res_id='.$rows['rs_id'].'" > <img src="admin/Res_img/'.$rows['image'].'" alt="Food logo"></a>
                   </div>
                   <h4 class="burger_text active">'.$rows['title'].'</h4>
                   <h6 class="date_text">'.$rows['address'].'</h6>
                   <a href="dishes.php?res_id='.$rows['rs_id'].'" class="btn btn-purple">View Menu</a>
                </div>
               ';
            }
            ?>
              </div>
            </div>
          </div>
       </div>
    </div>
 </div>
 <!-- Restaurant List end -->



      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript -->
   </body>
</html>