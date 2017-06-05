<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/lancius-task/controllers/auth.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lancius-task/controllers/db.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lancius-task/controllers/common.php');

//get the products 
$products = getAllProducts($connection);
//get cart count
$cartCount = getCartCount($connection,$_SESSION['Auth']['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lancius</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />
    <link rel='stylesheet' href='css/index.css' />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src='js/index.js' ></script>
  </head>
  <body>
    <nav class="navbar navbar-default" style='background:white;height:70px;padding:8px'>
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="dashboard.php"><img src='img/logo.png' style='height:50px;margin-top:-20px;' /> </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li><a href="#"> </a></li>
            <li class="dropdown"> 
            </li>
        </ul>
        <form class="navbar-form navbar-left">
            <div class="input-group">
                <input type="text" class="form-control" placeholder='Search Products'>
                <span class="input-group-addon"><i class='glyphicon glyphicon-search'></i></span>
            </div>

        </form>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="cart.php">
                    <i class='glyphicon glyphicon-shopping-cart'></i> Cart <strong>[ <span id='cartCount'><?php echo $cartCount; ?></span> ]</strong>
                </a>
            </li>
            <li>
                <a href="logout.php"><i class='glyphicon glyphicon-off'></i> Logout</a>
            </li>
        </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
    </nav>

    <div class='container'>
        <div class='col-md-3'>
            <p><h4><i class='glyphicon glyphicon-list' ></i> Categories</h4></p>
            <table class="table">
                <tr>
                    <td>
                        <span class="glyphicon glyphicon-hdd text-primary"></span> <a href="">Laptops</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="glyphicon glyphicon-phone text-primary"></span> <a href="">Mobiles</a>
                    </td>
                </tr> 
                <tr>
                    <td>
                        <span class="glyphicon glyphicon-sunglasses text-primary"></span> <a href="">Fashion</a>
                    </td>
                </tr>
            </table>
        </div>
        <div class='col-md-9'>
            <div class="alert alert-success cart-suc" role="alert">
                <strong>Success! Product added to your cart.</strong>
            </div>
            <?php
                while($row = $products->fetch_assoc()){ ?>

                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="thumbnail">
                        <img src="<?php echo $row['img'];?>" alt=""  style='height:160px;'>
                        <div class="caption">
                            <h3><?php echo $row['name']; ?></h3>
                            <p>
                                <?php echo $row['description']; ?>
                            </p>
                            <p><strong><?php echo $row['price']; ?>$</strong></p>
                            <p>
                                <a data-id='<?php echo $row['id']; ?>' class="addToCart btn btn-sm btn-primary" role="button">
                                    <i class='glyphicon glyphicon-shopping-cart'></i> Add to Cart
                                </a> 
                                <!--<a href="#" class="btn btn-sm btn-default" role="button">
                                    <i class='glyphicon glyphicon-eye-open'></i> View Details
                                </a>-->
                            </p>
                        </div>
                        </div>
                    </div>

                <?php }
            ?>
        </div>
    </div>
  </body>
</html>