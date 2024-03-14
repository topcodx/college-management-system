<?php
    // Adjust the path to helper.php based on its location relative to index.php
    require_once "common/helper.php";
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $universityName = getUniversityName('University_name');
    $string = trim(preg_replace('!\s+!', ' ', $universityName));
    $array = explode(" ", $string);
    $aboutText = isset($array[0]) ? $array[0] : ''; // Selecting the first word from the array
?>

<footer>
  <div class="footer-top">
    <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12 segment-one md-mb-30 sm-mb-30">
            <h3><?php echo getUniversityName('University_name'); ?></h3>
            <p>This Project has been made by Vidhi Jogani, Manjari Desai
              and also Janvi Anghan.
              The prupose of this project is Learning Computer Languages.
              I hope you realy enjoyed to visit this project. Thanks!
            </p>
          </div>
          <div class="col-md-2 col-sm-6 col-xs-12 segment-two md-mb-30 sm-mb-30">
            <h2>Quick Links</h2>
            <ul>
              <li><a href="">About <?php echo $aboutText; ?></a></li>
              <li><a href="">Admissions Policy</a></li>
              <li><a href="">Apply for Admission</a></li>
              <li><a href="">Download Prospectus</a></li>
              <li><a href="">Contact Us</a></li>
            </ul>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12 segment-two md-mb-30 sm-mb-30">
            <h2>UNDERGRADUATE PROGRAMS</h2>
            <ul>
              <li><a href="">B.Sc. Civil Engineering</a></li>
              <li><a href="">B.Sc. Electrical Engineering</a></li>
              <li><a href="">B.Sc. Mechanical Engineering</a></li>
              <li><a href="">B. Architecture</a></li>
              <li><a href="">BS Computer Science</a></li>
              <li><a href="">Bachelors of Business Administration</a></li>
            </ul>
          </div>  
          <div class="col-md-3 col-sm-6 col-xs-12 segment-two md-mb-30 sm-mb-30">
            <h2>CONTACT DETAILS</h2>
              <p>Address:<?php echo getUniversityName('University_name'); ?> of Business Computers,
                  Sitanagar Chowk,Ramnagar Road,Nana varchha,Surat 395006 Gujarat – India</p>
              <p>Telephones: (+91) 1800 192 1800</p>
              <p>E-mail: admissions@<?php echo $aboutText; ?>.edu</p>
        </div>
      </div>
    </div>
    </div>
  <p class="footer-bottom-text">CopyRights © reserved by <?php echo getUniversityName('University_name'); ?>.2024</p>
</footer>
