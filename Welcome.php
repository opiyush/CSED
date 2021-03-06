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
  <link rel="stylesheet" href="css/bootstrap.min.css"  crossorigin="anonymous">
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


        <div class="col-md-4">
          <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
          <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">

          <div class="cardAnnouncements">
            <div class="cardAnnouncements-header"><strong>Announcements</strong>
              <span style="float:right;font-size:13px;"><a href="All_News.php" style="color:#fc3a47"> <strong>More</strong></a> &nbsp;&nbsp;&nbsp;
                <button class="button2" onclick="AnimationResume()">⏵</button>
                <button class="button1" onclick="AnimationStart()">⏸</button></span></div>
            <div class="cardAnnouncements-main">

              <div class="main-description"><div class="marquee-container" id="marquee-container">
                <div id="marquee">
                  <ul style="margin-left:-20px; color: #229bb1;line-height:26px;font-size: 12px;">
                    <?php
                    while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
                    {
                      ?>
                      <li>
                        <a title="<?php echo $rows["Heading"] ?>" target="_blank" href=<?php echo "Added_Notices/" . $rows["Notice_Link"]?> >  <?php echo $rows["Heading"] ?> </a>
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
        </div>
      </div>
      <script>
      var AnimationStart;
      var AnimationResume;
      var AnimationStart = function(){
        document.getElementById('marquee').style.animationPlayState="paused";
      }
      var AnimationResume = function(){
        document.getElementById('marquee').style.animationPlayState="running";
      }
      </script>
    </div>
      <!--News Section End-->
    </div><br>
    <script src="jquery/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="jquery/popper.min.js" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
    </body>
    <body>
        <?php include 'footer.php' ?>
    </body>
    </html>
