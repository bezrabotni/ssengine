<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" href="favicon.ico">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Social Search Engine</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body background="img/bg.jpg">
    <div class="row" style="color:white;">
      <form class="screen-centered" action="search.php" method="post">
        <div class="input-group">
        <input type="text" name="keyword" class="form-control" placeholder="Search for...">
        <span class="input-group-btn">
          <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-search"></span></button>
        </span>
        </div>
        <hr>
        <h5>Choose the websites to search:</h5>
        <input type="checkbox" name="website" value="http://www.twitter.com"><label>&nbsp;Twitter.com&nbsp;</label>
        <input type="checkbox" name="website" value="http://www.zastone.ba" checked><label>&nbsp; Zastone.ba&nbsp;</label>
        <input type="checkbox" name="website" value="http://point.zastone.ba" checked><label>&nbsp; Point.zastone.ba&nbsp;</label>
      </form>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
