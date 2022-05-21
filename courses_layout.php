<div class="container">
  <div class="row">
    <div class="col-md-4">
      <br>
      <p>Courses /
        <?php
        $c = $_GET['course'] ?? 0;
        $result = $db->query("SELECT * FROM courses WHERE courseId = '$c'");
        echo $result->fetch_assoc()['courseCategory'];
        ?>
      </p>
      <br>

      <?php
      $c = $_GET['course'] ?? 0;
      $result = $db->query("SELECT * FROM courses WHERE courseId = '$c'");
      $course = $result->fetch_assoc()['courseName'];
      $image = './img/Logos/' . str_replace(' ', '', $course) . 'Logo.png'; 
      echo '<img src="'.$image.'" alt="" width="50px">';
      ?>


      <img src="./img/logo_progeto_final_logo.png" alt="" width="50px" class="float-end">
      <br>
      <h1>
        <?php
        $c = $_GET['course'] ?? 0;
        $result = $db->query("SELECT * FROM courses WHERE courseId = '$c'");
        echo $result->fetch_assoc()['courseName'];
        ?>
        Course</h1>
      <br>

      <p class="rating">5 stars rating</p>
      <img src="./img/star.svg" width="20px">
      <img src="./img/star.svg" width="20px">
      <img src="./img/star.svg" width="20px">
      <img src="./img/star.svg" width="20px">
      <img src="./img/star.svg" width="20px">
      <br>
      <br>
      <p>
        <?php
        $c = $_GET['course'] ?? 0;
        $result = $db->query("SELECT * FROM courses WHERE courseId = '$c'");
        echo $result->fetch_assoc()['courseName'];
        ?>
        course from 0 to advanced, with the purpose of teaching the software completely.</p>
      <br>
      <a href="#courseplans"><button class="cartbtn">Add to cart</button></a>
    </div>
    <div class="col-md-8">
      <br>
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="./img/Adobe_image.png" class="d-block w-100" alt="">
          </div>
          <div class="carousel-item">
            <img src="./img/Adobe_image.png" class="d-block w-100" alt="">
          </div>
          <div class="carousel-item">
            <img src="./img/Adobe_image.png" class="d-block w-100" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="my-5"></div>

  <div class="row">
    <div class="col-md-3 coursecards">
      <span class="material-symbols-outlined">
        calendar_month
      </span>
      <h6>Duration</h6>
      <p>
        <?php
        $c = $_GET['course'] ?? 0;
        $result = $db->query("SELECT * FROM courses WHERE courseId = '$c'");
        echo $result->fetch_assoc()['courseTime'];
        ?>
      </p>
    </div>
    <div class="col-md-3 coursecards">
      <span class="material-symbols-outlined">
        timer
      </span>
      <h6>Total class hours</h6>
      <p>
        <?php
        $c = $_GET['course'] ?? 0;
        $result = $db->query("SELECT * FROM courses WHERE courseId = '$c'");
        $time = $result->fetch_assoc()['courseTime'];
        $time = explode(" ", $time);
        echo $time[0] * 10;

        ?>
        hours</p>
    </div>
    <div class="col-md-3 coursecards">
      <span class="material-symbols-outlined">
        devices
      </span>
      <h6>Method</h6>
      <p>100% online</p>
    </div>
    <div class="col-md-3 coursecards">
      <span class="material-symbols-outlined">
        payments
      </span>
      <h6>Price</h6>
      <p>
        <?php
        $c = $_GET['course'] ?? 0;
        $result = $db->query("SELECT * FROM courses WHERE courseId = '$c'");
        echo $result->fetch_assoc()['coursePrice'] . ".0€";
        ?>, Base plan</p>
    </div>
  </div>

  <div class="my-5"></div>

  <div class="row">
    <div class="col-md-12 coursedesc">

      <?php
      $c = $_GET['course'] ?? 0;
      $result = $db->query("SELECT * FROM courses WHERE courseId = '$c'");
      echo $result->fetch_assoc()['courseDescription'];
      ?>

    </div>
  </div>

  <div class="my-5"></div>

  <div class="row teachersdiv">
    <div class="col-md-12">
      <h2>Who will you learn with?</h2>
      <br>
      <div class="my-2">
        <div class="row">
          <div class="col-md-3" style="text-align: right !important;">
            <?php
            $c = $_GET['course'] ?? 0;
            $result = $db->query("select teachers.teacherName, teachers.teacherDescription, teachers.teacherImage, courses.courseName, courses.courseId from courses inner join teachers on courses.courseName = teachers.teacherCourse where courseId = $c order by teacherID asc;");
            echo $result->fetch_assoc()['teacherDescription'];
            ?>
          </div>
          <div class="col-md-3">
            <?php
            $c = $_GET['course'] ?? 0;
            $result = $db->query("select teachers.teacherName, teachers.teacherDescription, teachers.teacherImage, courses.courseName, courses.courseId from courses inner join teachers on courses.courseName = teachers.teacherCourse where courseId = $c order by teacherID asc;");
            echo '<img src="./img/teachers/' . $result->fetch_assoc()["teacherImage"] . '." alt="" class="img-fluid teacherimg" width="150px">'
            ?>
            <h6>
              <?php
              $c = $_GET['course'] ?? 0;
              $result = $db->query("select teachers.teacherName, teachers.teacherDescription, teachers.teacherImage, courses.courseName, courses.courseId from courses inner join teachers on courses.courseName = teachers.teacherCourse where courseId = $c order by teacherID asc;");
              echo $result->fetch_assoc()['teacherName'];
              ?>
            </h6>
          </div>
          <div class="col-md-3">
            <?php
            $c = $_GET['course'] ?? 0;
            $result = $db->query("select teachers.teacherName, teachers.teacherDescription, teachers.teacherImage, courses.courseName, courses.courseId from courses inner join teachers on courses.courseName = teachers.teacherCourse where courseId = $c order by teacherID desc;");
            echo '<img src="./img/teachers/' . $result->fetch_assoc()["teacherImage"] . '." alt="" class="img-fluid teacherimg" width="150px">'
            ?>
            <h6>
              <?php
              $c = $_GET['course'] ?? 0;
              $result = $db->query("select teachers.teacherName, teachers.teacherDescription, teachers.teacherImage, courses.courseName, courses.courseId from courses inner join teachers on courses.courseName = teachers.teacherCourse where courseId = $c order by teacherID desc;");
              echo $result->fetch_assoc()['teacherName'];
              ?>
            </h6>
          </div>
          <div class="col-md-3" style="text-align: left !important;">
            <?php
            $c = $_GET['course'] ?? 0;
            $result = $db->query("select teachers.teacherName, teachers.teacherDescription, teachers.teacherImage, courses.courseName, courses.courseId from courses inner join teachers on courses.courseName = teachers.teacherCourse where courseId = $c order by teacherID desc;");
            echo $result->fetch_assoc()['teacherDescription'];
            ?>
          </div>
        </div>
        <br>
        <h3>You can chose your teacher!</h3>
        <p>For a better enjoyment of your studies we give you the unique opportunity to choose your teacher. (you can
          change at any time)</p>

      </div>
    </div>
  </div>

  <div style="height: 100px;"></div>

  <div class="row" id="courseplans">
    <div class="col-md-12">
      <table class="table">
        <thead class="align-top">
          <tr>
            <th scope="col">
              <h2>Our Planes</h2>
              <h6>Choose you plan</h6>
            </th>
            <th scope="col">
              <h5 class="planname">Basic Plan</h5>
              <h5 class="planprice">
                <?php
                $c = $_GET['course'] ?? 0;
                $result = $db->query("SELECT * FROM courses WHERE courseId = '$c'");
                echo $result->fetch_assoc()['coursePrice'] . ".0€";
                ?>
              </h5>
              <p class="plandesc">Full course but some features locked</p>
              <a href="#courseplans"><button class="cartbtn">Add to cart</button></a>
            </th>
            <th scope="col">
              <h5 class="planname">Pro Plan</h5>
              <h5 class="planprice">
                <?php
                $c = $_GET['course'] ?? 0;
                $result = $db->query("SELECT * FROM courses WHERE courseId = '$c'");
                echo $result->fetch_assoc()['coursePrice'] + 50 . ".0€";
                ?>
              </h5>
              <p class="plandesc">Full course all unlocked</p>
              <a href="#courseplans"><button class="cartbtn">Add to cart</button></a>
            </th>
            <th scope="col">
              <h5 class="planname">Extreme Plan</h5>
              <h5 class="planprice">
                <?php
                $c = $_GET['course'] ?? 0;
                $result = $db->query("SELECT * FROM courses WHERE courseId = '$c'");
                echo $result->fetch_assoc()['coursePrice'] + 90 . ".0€";
                ?>
              </h5>
              <p class="plandesc">Full course all unlocked and some extras</p>
              <a href="#courseplans"><button class="cartbtn">Add to cart</button></a>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Full Course</th>
            <td>
              <span class="material-symbols-outlined">
                check
              </span>
            </td>
            <td>
              <span class="material-symbols-outlined">
                check
              </span>
            </td>
            <td>
              <span class="material-symbols-outlined">
                check
              </span>
            </td>
          </tr>
          <tr>
            <th scope="row">Online</th>
            <td>
              <span class="material-symbols-outlined">
                check
              </span>
            </td>
            <td>
              <span class="material-symbols-outlined">
                check
              </span>
            </td>
            <td>
              <span class="material-symbols-outlined">
                check
              </span>
            </td>
          </tr>
          <tr>
            <th scope="row">Choose Teacher</th>
            <td>
              <span class="material-symbols-outlined">
                check
              </span>
            </td>
            <td>
              <span class="material-symbols-outlined">
                check
              </span>
            </td>
            <td>
              <span class="material-symbols-outlined">
                check
              </span>
            </td>
          </tr>
          <tr>
            <th scope="row">Final Exam</th>
            <td>
              1 Attempts
            </td>
            <td>
              2 Attempts
            </td>
            <td>
              3 Attempts
            </td>
          </tr>
          <tr>
            <th scope="row">Certificate</th>
            <td>
              <span class="material-symbols-outlined">
                check
              </span>
            </td>
            <td>
              <span class="material-symbols-outlined">
                check
              </span>
            </td>
            <td>
              <span class="material-symbols-outlined">
                check
              </span>
            </td>
          </tr>
          <tr>
            <th scope="row">Exercises</th>
            <td>At the end of each module</td>
            <td>In every class</td>
            <td>In all lessons and extras to train for the exam</td>
          </tr>
          <tr>
            <th scope="row">Software License</th>
            <td>
              <span class="material-symbols-outlined">
                close
              </span>
            </td>
            <td>1 Year</td>
            <td>2 Years</td>
          </tr>
          <tr>
            <th scope="row">Online Exclusive Forum</th>
            <td>
              <span class="material-symbols-outlined">
                close
              </span>
            </td>
            <td>
              <span class="material-symbols-outlined">
                check
              </span>
            </td>
            <td>
              <span class="material-symbols-outlined">
                check
              </span>
            </td>
          </tr>
          <tr>
            <th scope="row">Clarify Doubts</th>
            <td>
              <span class="material-symbols-outlined">
                close
              </span>
            </td>
            <td>At the end of each module</td>
            <td>Whenever you need</td>
          </tr>
          <tr>
            <th scope="row">Private Class</th>
            <td>
              <span class="material-symbols-outlined">
                close
              </span>
            </td>
            <td>
              <span class="material-symbols-outlined">
                close
              </span>
            </td>
            <td>At the end of each module</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="my-5"></div>

  <div class="row text-center">
    <div class="col-md-12">
      <h3>Hope you enjoy the course,</h3>
      <h4>Good Studies and Keep Learning!</h4>
    </div>
  </div>

  <div class="my-5"></div>

  <!-- footer -->
  <?php require_once('./footer.php'); ?>
</div>


<script src="./js/animations.js"></script>