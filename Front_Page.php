<?php
session_start();
   ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Computer Science and Engineering</title>
  <link rel="stylesheet" href="Front_Page_CSS.css">
  <link rel="stylesheet" href="header.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<?php include 'header.php';?>
<?php include 'connection.php' ?>
  <!-- Carousel -->
  <div id="carouselExampleFade" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-item active">
        <img src="http://www.knit.ac.in/images/administration_img.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Administrative Blog</h5>
          <p>Section handling all the behind the scene work</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="http://www.knit.ac.in/images/bui_09.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Administrative Blog</h5>
          <p>Section handling all the behind the scene work.</p>
        </div>

      </div>
      <div class="carousel-item">
        <img src="https://cdn.s3waas.gov.in/s38f53295a73878494e9bc8dd6c3c7104f/uploads/2018/03/2018031234.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Administrative Blog</h5>
          <p>Section handling all the behind the scene work.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <?php $stmt = sqlsrv_query( $conn, "select TOP 10 * from Notice_table ORDER BY Published_Date",array());
    if ($stmt !== NULL) {
   ?>

  <div class="container">
    <div class="row">
      <!--News Section Start-->
      <div class="col-lg-6 col-md-6 news_header">
        <h3>Announcements</h3>
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
              <div class="col-xs-12">
                <ul class="demo1">
                  <?php
                  while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
                  ?>
                  <li class="news-item">
                    <a href=<?php echo $rows["Notice_Link"]?> >  <?php echo $rows["Heading"] ?> </a>
                    <!--<span></span>-->
                  </li>
                <?php }
              }
              else{
                echo "something went wrong";
              } ?>
                </ul>
              </div>
            </div>
          </div>
        <div class="panel-footer"><a href="" class="btn">All News</a></div>
        <button type="button" class="btn btn-default" aria-label="Up">
  <span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
</button>
<button type="button" class="btn btn-defaul" aria-label="down">
  <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
</button>
    <!--<div class="clearfix"></div>-->
  </div>
</div>

<!--News Section End-->
<div class="welcome">
  <h2>Welcome!</h2>
  <h3>Our Vision</h3>
  <p>here is the vision of cse department of knit Sultanpur.</p>
  <h3>Our Mission</h3>
  <p>here is the mission of cse department of knit Sultanpur.</p>
</div>
</div>
<div class='space'>
  <p>KNIT was established as the Faculty of Technology in Kamla Nehru Institute of Science and Technology, Lucknow, in 1976 by the Kamla Nehru Memorial Trust. It was taken over by the government of Uttar Pradesh in 1979 with a view to develop an engineering institute in the Eastern region of Uttar Pradesh. In 1983 it was registered as a separate society and was renamed as the Kamla Nehru Institute Of Technology.</p>
</div>
<div class="footer" >
  <a class="nav-item nav-link" href="#">Contact Us <span class="sr-only">(current)</span></a>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
