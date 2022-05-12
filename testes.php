<!DOCTYPE html>
<!-- PHP packages -->
<?php require_once './includes/connect.php'; ?>
  <?php require_once './includes/login.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
              $result = $db->query("SELECT * FROM courses");
              if (!$result) {
                echo "Something went wrong loading the course";
              } else {
                if ($result->num_rows == 0) {
                  echo "Nothing here";
                } else {
                  while($course = $result->fetch_object()){
                    echo "$course->courseDescription";
                  }
                  echo "<br><br><br><br><br><br><br><br>";
                      
                }
              }
              ?>


<h1>Essential Information</h1>

<p>
    Drawing, design and cartooning courses prepare students to work as illustrators. Students in an illustrator degree or certificate program learn about working with pens, oils, watercolors and gouaches, drawing from live models and their own imaginations. Illustration courses are usually required in art, visual arts, agriculture and life sciences and fine arts degree programs.
</p>

<h3>Here is an outline of concepts taught in illustration course:</h3>
<ul>
    
    <li>Concepts and theory of drawing</li>
    <li>Character creation and design</li>
    <li>Sequential illustration</li>
    <li>Digital illustration software</li>
    <li>Figure and observational art</li>
    <li>Art studies in anatomy</li>
    
</ul>
<p>
    Some classes show students how to use computer software such as Adobe Illustrator to render images for digital use. Computer classes for this subject can be found online and at colleges and universities' continuing education divisions, as well as in undergraduate and graduate degree programs in illustrator-related majors.
    List of Courses for Illustrators
</p>

    <h2>Drawing for Illustrators</h2>

<p>
    An introductory drawing course provides illustration students with a survey of the art and practice of drawing. Concepts taught in a drawing course include visual communication, composition, and media. Students in a drawing course generally work extensively on drawing projects and participate in lectures and discussions.
</p>

    <h2>Storytelling Through Illustration</h2>

<p>
    In this course, students learn how to use paintings, drawings and cartoons to render characters, plots and ideas to their audience. This illustrator course challenges students to create characters and settings from fiction, non-fiction and current events. Some storytelling courses discuss comic books and storyboarding, while others focus on drawing as it relates to the written word.
</p>

<h2>Digital Illustration</h2>

<p>
    A digital illustration course gives students an overview of how computer software is used in illustration. A variety of imaging programs are discussed, and students learn how to manipulate images, apply colors, use textures and take advantage of the flexibility associated with computers. Instruction takes place primarily through class projects and demonstrations.
</p>

    <h2>Figure Drawing and Anatomy</h2>

<p>
    Figure drawing courses explore the structure and form of the human anatomy, including outward appearance and internal features like musculature and the skeleton. Proportion and movement are covered, and students watch lectures and slide shows and draw from models. Some anatomy-focused courses require students to create a small, 3-D clay model of a human body.
</p>

    <h2>Illustration for Children's Books</h2>

<p>
    Students in this illustrator course learn how to interpret children's stories and create characters, settings and scenes that relate to the text. Storyboarding, layout and cover art are discussed. In some courses children's book illustration courses, students will create a mock book, including cover art and story art.
</p>




</body>
</html>