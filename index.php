<!doctype html>

<!-- PHP packages -->
  <?php require_once './includes/connect.php'; ?>
  <?php require_once './includes/login.php'; ?>

<html lang="en">

<head>
  <title>Artistic Design</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <link rel="stylesheet" href="./css/styleMain.css">

  <script src="./js/animations.js"></script>
  <script src="./js/partneres.js"></script>

</head>
<body>
  <!-- navbar -->
  <?php require_once './navbar.php'; ?>

  <!-- container -->
  <div class="container-fluid">

    <!-- carousel -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./img/adobe.png" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block text-black">
            <h4><b class="fs-3">Easy</b> job <br> with <b class="fs-3">high</b> <br> Adobe knowledge</h4>
            <br>
            <a href="">See the course</a>
          </div>
        </div>
        <div class="carousel-item">
          <img src="./img/autodesk.png" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block text-white">
            <h4><b class="fs-3">Create</b> <br> <b class="fs-3">high</b> quality 3D <br> artwork</h4>
            <br>
            <a href="">See the course</a>
          </div>
        </div>
        <div class="carousel-item">
          <img src="./img/office.png" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block text-black">
            <h4>Be the <br> <b class="fs-3">best</b> at <br> Office software</h4>
            <br>
            <a href="">See the course</a>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <!-- main input -->
    <div class="row maininputdiv unselectable">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <br>
        <input type="text" class="maininput" placeholder="Search" onfocus="maininputfocos();" onblur="maininputfocoslost();">
      </div>
      <div class="col-md-2">
        <br>
        <a href="#">
          <span class="Stext">Search</span>
          <img src="./img/arrow_back.png" alt="" width="20%" class="arrowb">
          <img src="./img/arrow_front.png" alt="" width="10%" class="arrowf">
        </a>
      </div>
    </div>

    <!-- adjust line -->
    <div class="row" style="height: 100px;"></div>

    <!-- about the courses -->
    <div class="row text-center cousesInfo">
      <h1>Courses</h1>
      <div class="col-md-4">
        <div class="coursesdiv">
          <h2>Office</h2>
          <h5>Course of :</h5>
          <br>
          <ul>
            <?php
              $result = $db->query("SELECT * FROM courses WHERE courseCategory = 'Office'");
              if (!$result) {
                echo "Something went wrong loading the course";
              } else {
                if ($result->num_rows == 0) {
                  echo "Nothing here";
                } else {
                  while($course = $result->fetch_object()){
                    echo "<li>$course->courseName</li>";
                  }
                      
                }
              }
              ?>
          </ul>
          <div class="bottomdiv">
            <p>The course offers a high level of knowledge in the area, with expert teachers, completely online so you can
              watch wherever and whenever you want</p>
            <a href="">See the course</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="coursesdiv">
          <h2>Adobe</h2>
          <h5>Course of :</h5>
          <br>
          <ul>
          <?php
              $result = $db->query("SELECT * FROM courses WHERE courseCategory = 'Adobe'");
              if (!$result) {
                echo "Something went wrong loading the course";
              } else {
                if ($result->num_rows == 0) {
                  echo "Nothing here";
                } else {
                  while($course = $result->fetch_object()){
                    echo "<li>$course->courseName</li>";
                  }

                }
              }
              ?>
          </ul>
          <div class="bottomdiv">
            <p>The course offers a high level of knowledge in the area, with expert teachers, completely online so you can
              watch wherever and whenever you want</p>
            <a href="">See the course</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="coursesdiv">
          <h2>Autodesk</h2>
          <h5>Course of :</h5>
          <br>
          <ul>
          <?php
              $result = $db->query("SELECT * FROM courses WHERE courseCategory = 'Autodesk'");
              if (!$result) {
                echo "Something went wrong loading the course";
              } else {
                if ($result->num_rows == 0) {
                  echo "Nothing here";
                } else {
                  while($course = $result->fetch_object()){
                    echo "<li>$course->courseName</li>";
                  }

                }
              }
              ?>
          </ul>
          <div class="bottomdiv">
            <p>The course offers a high level of knowledge in the area, with expert teachers, completely online so you can
              watch wherever and whenever you want</p>
            <a href="">See the course</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row cousesInfo">
      <div class="col-md-12">
        <div class="coursesdivcert text-center">
          <h2>Certification</h2>
          <p>all referred courses have access to their professional certificate, valid worldwide</p>
        </div>
      </div>
    </div>

    <!-- Partners -->
    <div class="row">
      <div class="col-md-12 partnersdiv">
        <h1 class="text-center">Partners</h1>
        <div class="container">
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 imgPartnersDiv">
              <div class="imgPartners activePartner" id="imgMicrosoft" onmouseenter="MicrosoftText();"><img src="./img/MicrosoftLogo.png" alt="" class="img-fluid" width="150px"></div>
              <div class="imgPartners" id="imgAdobe" onmouseenter="AdobeText();"><img src="./img/AdobeLogo.png" alt="" class="img-fluid" width="150px"></div>
              <div class="imgPartners" id="imgAutodesk" onmouseenter="AutodeskText();"><img src="./img/AutodeskLogo.png" alt="" class="img-fluid" width="150px"></div>
              <div class="imgPartners" id="imgCSM" onmouseenter="CSMText();"><img src="./img/CSMLogo.png" alt="" class="img-fluid" width="150px"></div>
            </div>
            <div class="col-md-2"></div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <img src="./img/Microsoft_image.png" alt="" class="img-fluid imgPartner">
            </div>
            <div class="col-md-6">
              <h2 id="thxPartner">Thanks Microsoft,</h2>
              <br>
              <p id="partnerDescib">For the trust and loyalty to our company and all the support given in funds and help
                to give us the opportunity to provide a better offer to our students in high quality software.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- adjust line -->
    <div class="row" style="height: 50px;"></div>

    <!-- Questions -->
    <div class="row questionsrow">
      <div class="col-md-12 questionsdiv">
        <h1 class="text-center">Frequently asked questions</h1>
        <br>
        <!-- accordion -->
        <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                How does the certificate work?
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <hr>
                The certificate is valid at the end of each course, the student can purchase certificates for all courses,
                each certificate has its price (there are plans for specific cases). <br>
                The certificate is valid at the global level, so you can apply it anywhere in the world without problem.
                <br>
                You can get your certificate by passing the final exam of the course you took.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                How are the classes?
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <hr>
                Our classes are completely online, with teachers who are experts in their fields. <br>
                When you purchase a course, you will have access to it on all devices with your account. <br>
                At the end of each lesson chapter there is a test, which you can only take once you have passed the test.
                <br>
                At the end of the course you take a final exam, which gives you access to the certificate with your final
                grade.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Minimum requirements (pc hardware) for the courses.
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <hr>
                The hardware requirements for our courses are those of the software itself, you can check the
                specifications needed on the official site of each software. <br>
                In case you don't have a PC to run the software we have PC's built by us at an affordable price so you can
                study at your best. (there are plans for specific cases)
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                Payment methods.
              </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <hr>
                We accept payment by credit card, debit card, or PayPal account. <br>
                You can also come to our headquarters if you need another method of payment.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- adjust line -->
    <div class="row" style="height: 100px;"></div>

    <!-- footer -->
    <?php require_once('./footer.php'); ?>

  </div>


  <script>
    var d = new Date();
    var year = d.getFullYear();
    document.getElementById("currentyear").innerHTML = year;
  </script>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<?php $db->close(); ?>

</body>

</html>