<!DOCTYPE php>
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
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">SearchEngine</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
            <li><a href="#">About</a></li>
          </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>



    <div class="row" style="margin-top:50px;margin-left:10px;">
      <div class"col-md-4" style="color:white;">
        <form class="navbar-form navbar-left" role="search" method="post" action="search.php">
          <div class="form-group">
            <h3>Search Keyword</h3>
            <input type="text" name="keyword" class="form-control" placeholder="<?php echo $_POST['keyword']; ?>">
          </br>
          <h5>Platforms to search:</h5>
          <input type="checkbox" name="website" value="http://www.twitter.com"><label>&nbsp;Twitter.com&nbsp;</label>
          <input type="checkbox" name="website" value="http://www.zastone.ba" checked><label>&nbsp; Zastone.ba&nbsp;</label>
          <input type="checkbox" name="website" value="http://point.zastone.ba" checked><label>&nbsp; Point.zastone.ba&nbsp;</label>
          </div>
        </br>
          <button type="submit" class="btn btn-default">Apply Criteria</button>
        </form>
      </div>
      <div class="col-md-8" style="background-color:white;">
    <?php
    include 'functions.php';
    if ($_POST['keyword']==null || !isset($_POST['website']))
    {
      echo "<h1> Please enter a valid search keyword or select a website to search...</h1>";
    } else {
      $url=$_POST['website'];
      $query=$_POST['keyword'];
      echo "<h2>Search Results:</h2></br>";
      searchsite($url,$query);
    }

     ?>
      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
