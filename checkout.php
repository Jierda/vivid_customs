<?php
   include('session.php');
?>
<html>
<head>
    <title>ui</title>
    <script src="fabric.min.js"></script>
    <!--JQUERY-->
    <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>

    <!--BOOTSRAP INFO-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Niconne" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
    <style type="text/css">
        body{
            background-color: #000000;
        }
        img:hover{
            background-color: #eeeeee;
            border: 1px solid #000000;
        }
        .active{
            border: 1px solid #eeeeee;
            background: none !important;
        }
    </style>
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>    
    <h1> 
        <?php 
            if (!$Guest) {
                echo 'Welcome: '.$login_session; 
                echo  '<h2><a href = "logout.php">Sign Out</a></h2>';    
            }  
            else
            {
               echo $_SESSION['Guest'];       
            }         

        ?>
    </h1> 
    <form  name="Checkout" action="save_order.php" method="POST" role="form" >
        <div class="row">
          <div class="col-sm-2"></div>
          <div class="col-sm-8">
              <div class="panel panel-info class">
                  <div class="panel-heading">Contact Information</div>
                  <div class="panel-body" >
                      <label for="usr">Name:</label>
                      <input type="text" class="form-control" name="name"  value="<?php echo( htmlspecialchars( $fullname ) ); ?>">
                      <label for="usr">Phone:</label>
                      <input type="text" class="form-control" name="phone" value="<?php echo( htmlspecialchars( $phone ) ); ?>">
                      <label for="usr">Email:</label>
                      <input type="text" class="form-control" name="email" value="<?php echo( htmlspecialchars( $email ) ); ?>">    
                  </div>
              </div>
              <div class="panel panel-info class">
                  <div class="panel-heading">Order Information</div>
                  <div class="panel-body">
                    <label for="usr">Payment info:</label>
                    <input type="text" class="form-control" name="paymentinfo" >
                    <label for="usr">Product info:</label>
                    <input type="text" class="form-control" name="productinfo" >
                    <label for="usr">Quantity:</label>
                    <input type="text" class="form-control" name="quantity" >
                    <label for="usr">Size:</label>
                    <input type="text" class="form-control" name="size" >
                    <label for="usr">Color:</label>
                    <input type="text" class="form-control" name="color" >       
                  </div>
              </div>
              <div class="panel-group">
                  <div class="panel panel-info class">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapse1">Shipping Information</a>
                      </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse">
                      <div class="panel-body">
                          <label for="usr">Pickup:</label>                         
                            <div name="pickup" id="pickup"> 
                                <label class="radio-inline"><input type="radio" name="pickup" id="pickup" value="0" data-parent="#parent" data-toggle="collapse" data-target="#div1" >NO</label>
                                <label class="radio-inline"><input type="radio" name="pickup" id="pickup" value="1" data-parent="#parent" data-toggle="collapse" data-target="#div1" checked="true">YES</label>
                                <div class="panel-collapse collapse in" id="div1">  
                                    <label for="usr">Shipping Type:</label>
                                    <label class="radio-inline"><input type="radio" name="ShippingType" id="ShippingType" value="ShippingType1">ShippingType1</label>
                                    <label class="radio-inline"><input type="radio" name="ShippingType" id="ShippingType" value="ShippingType2">ShippingType2</label>
                                    <label class="radio-inline"><input type="radio" name="ShippingType" id="ShippingType" value="ShippingType3">ShippingType3</label>
                                    <br>
                                    <label for="usr">Street:</label>
                                    <input type="text" class="form-control" name="street" >
                                    <label for="usr">Number:</label>
                                    <input type="text" class="form-control" name="number" >
                                    <label for="usr">City / Town:</label>
                                    <input type="text" class="form-control" name="city" >
                                    <label for="usr">State / Province / Region:</label>
                                    <input type="text" class="form-control" name="state" >
                                    <label for="usr">Zip / Postal Code:</label>
                                    <input type="text" class="form-control" name="postalcode" >
                                </div>
                            </div>
                    </div>
                  </div>
                </div>
              <div class="panel panel-warning class">
                  <div class="panel-heading">Shipping Options</div>
                  <div class="panel-body">Shipping Options Content</div>
              </div>
              <br>
              <div class="row">
                  <div class="col-sm-5"></div>
                  <div class="col-sm-2">
                      <button type="submit" class="btn btn-success">Save Order</button>
                  </div>
                   <div class="col-sm-5"></div>
                  
                </div>
              
          </div>
          <div class="col-sm-2"></div>

        </div>
    </form>
</body>
</html>