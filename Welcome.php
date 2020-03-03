<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
  <meta charset="utf-8">
  <title>Computer Science and Engineering</title>
  <link rel="stylesheet" href="Welcome.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="header.css">
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






  <?php //$stmt = sqlsrv_query( $conn, "select * from Notice_table ORDER BY Published_Date desc",array());
  $stmt = sqlsrv_query( $conn, "EXEC GetAllNotice_by_pub_date;",array());
  if ($stmt !== NULL) {
    ?>

    <div class="content">
      <div class="row">
        <!--News Section Start-->

        <div class=" col-md-8">

          <div class="welcome">
            <h2>Welcome!</h2>
            <p class="text-justify">Computer Science & Engineering Department is the largest department of the Institute. It offers B.Tech.
              (Computer Science. & Engineering), B.Tech. (Information Technology) and MCA programmes. The Department is well equipped
              with high end computers, latest software & state of the art IT infrastructure. All computing resources are interconnected
              with high speed internet. The campus wide Networking facility is also managed by the department. The Department has a well
              qualified faculty and several well equipped laboratories catering to the needs of not only the CSE, IT and MCA students but
              also students from other departments. The present infrastructure is sufficient enough to carry out research and other academic
              work by UG and PG students. The Department has following Computing facilities/Laboratories.</p>
              <h3>Our Vision</h3>
              <p class="text-justify">To be the center of excellence in the field of computer science and engineering and to produce competent, ethical
                 professionals empowered with high impact research leading to sustainable innovation and entrepreneurship inculcating
                 moral values and societal concern.</p>
              <h3>Our Mission</h3>
              <p class="text-justify">M1: To provide a learning ambience to enhance problem solving skills, communication skills and leadership quality with
                 team spirit.<br>
                 M2: To provide exposure for the theoretical and practical concepts, with the latest tools and technologies in area of
                 computer science and engineering.<br>
                 M3: To encourage industry and research based projects / activities in the emerging area of computer science and provide
                 a platform for the implementation of innovative ideas and entrepreneurial concept.<br>
                 M4: To inculcate professional behavior and strong ethical values.</p>
            </div>
        </div>
        <div class=" col-md-4 news_header">
          <h3>Announcements</h3>
          <div id="ann_banner"class="col-md-4 panel" style="padding:0px 0px 5px 0px; ">
            <div class="panel-body">
                <div class="col-xs-12">
                  <ul class="">
                    <?php
                    while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
                    {
                      ?>
                      <li class="news-item">
                        <a title="<?php echo $rows["Heading"] ?>" target="_blank" href=<?php echo "Added_Notices/" . $rows["Notice_Link"]?> >  <?php echo $rows["Heading"] ?> </a>
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

          <div class="panel-footer"><a href="All_News.php" class="btn">All News</a></div>
</div>

      </div>
      <!--News Section End-->
    </div>
      <div class="footer" >
        <div class="container">
          <p class="lead">Contact Us</p>
        </div>
      </div>

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>

    </html>
