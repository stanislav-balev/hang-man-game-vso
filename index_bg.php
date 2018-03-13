<!DOCTYPE html><html>
  <head>
    <title></title>
    <style>
    .navbar .navbar-nav {
      display: inline-block;
      float: none;
      vertical-align: top;
    }

    .navbar .navbar-collapse {
        text-align: center;
    }
    .nav > li {
      display: inline-block!important;
    }
    </style>
    <script src="js/jquery-3.3.1.min.js"></script>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <script src="js/bootstrap.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <ul class="nav navbar-left">
        <li>
          <a href="index.php">НАЧАЛО</a>
        </li>
        <li>
          <button type="button" onclick="location.href = 'index_bg.php'" name="bg" class="btn btn-default" aria-label="Left Align">
          <img src="img/bg.png" alt="bg_site_version">
          </button>
        </li>
        <li>
          <button type="button" onclick="location.href = 'index_en.php'" name="en" class="btn btn-default" aria-label="Left Align">
          <img src="img/en.png" alt="en_site_version">
          </button>
        </li>
      </ul>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a class="navbar-brand" href="#">ТОЧКИ:</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> ВХОД</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Играй "Бесеница!"</h1>
    <h3>игра с думи</h3>
    <hr>
    <div class="col-lg-6">
      <h3>Игра №</h3>
      <a href="https://placeholder.com"><img src="http://via.placeholder.com/450x450"></a>
    </div>
    <div class="col-lg-6">
      <h3>Моето класиране</h3>
      <a href="https://placeholder.com"><img src="http://via.placeholder.com/450x450"></a>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <div class="row">
    <div class="jumbotron">
      <div class="col-lg-12" align="center">
        <h3>Бесеница!</h3>
        <p>Developed by: Dimitar Gospodinov & Stanislav Balev</p>
      </div>
    </div>
  </div>
</footer>



    <div class="container-fluid">
      <div class="row">
        <div class="jumbotron">
          <div class="col-lg-12" align="center">

          </div>
        </div>
      </div>
    </div>
  </body>
</html>
