<?php
 $f = "visit.php";
if(!file_exists($f)){
  touch($f);
  $handle =  fopen($f, "w" ) ;
  fwrite($handle,0) ;
  fclose ($handle);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>bar code gen</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../qr/qr/libs/style.css">
  <script src="../qr/qr/libs/navbarclock.js"></script>
</head>
<body onload="startTime()">
  <nav class="navbar-inverse" role="navigation">
      <a href=#>
        <img src="../qr/qr/img/niemand.png" class="hederimg">
      </a>
      <div id="clockdate">
        <div class="clockdate-wrapper">
          <div id="clock"></div>
          <div id="date"><?php echo date('l, F j, Y'); ?></div>
        </div>
      </div>
      <div class="pagevisit">
        <div class="visitcount">
          <?php
          $handle = fopen($f, "r");
          $counter = ( int ) fread ($handle,20) ;
          fclose ($handle) ;
          
          if(!isset($_POST["submit"])){
            $counter++ ;
          }
          
          echo "This Page is Visited ".$counter." Times";
          $handle =  fopen($f, "w" ) ;
          fwrite($handle,$counter) ;
          fclose ($handle) ;
          ?>
        </div>
      </div>
    </nav>

<div class="container">
  <div style="margin: 10%;">
  	<h2 class="text-center">Bar Code Generator <small>The Software Squad</small></h2>
  	<form class="form-horizontal" method="post" action="barcode.php" target="_blank">
  	<div class="form-group">
      <label class="control-label col-sm-2" for="product">Product:</label>
      <div class="col-sm-10">
        <input autocomplete="OFF" type="text" class="form-control" id="product" name="product">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="product_id">Product ID:</label>
      <div class="col-sm-10">
        <input autocomplete="OFF" type="text" class="form-control" id="product_id" name="product_id">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="rate">Rate</label>
      <div class="col-sm-10">          
        <input autocomplete="OFF" type="text" class="form-control" id="rate"  name="rate">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="print_qty">Barcode Quantity</label>
      <div class="col-sm-10">          
        <input autocomplete="OFF" type="print_qty" class="form-control" id="print_qty"  name="print_qty">
      </div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Generate</button>
      </div>
    </div>
  </form>
  </div>
</div>

</body>
</html>
