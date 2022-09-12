<?php
include "config.php";

// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: index.php');
}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: index.php');
}
?>
<!doctype html>
<html>
    <head></head>
    <body>
            <form method='post' action="">
            <input type="submit" value="Logout" name="but_logout">
        </form>
    </body>
</html>

<?php
$servername = "mysqldb2022.c4a31adjeatg.us-west-2.rds.amazonaws.com";
$username = "admin";
$password = "admin123";
$dbname = "customers";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT fname, lname, mobileno, city, bfrom, bto, dob, bloodgroup FROM donors WHERE bloodgroup='".$_POST['select']."'";
$result = $conn->query($sql);

?>


<html lang="en">
  <head>
 <style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  background-color: pink;
}
</style>
    <title>Find-Donor - LTIBB</title>
    <meta property="og:title" content="Find-Donor - LTIBB" />
    <meta property="og:title" content="Blood-Donation-Chart - LTIBB" />
    <meta property="og:title" content="Donate-Blood - LTIBB" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <meta property="twitter:card" content="summary_large_image" />
    <style data-tag="reset-style-sheet">
      html {  line-height: 1.15;}body {  margin: 0;}* {  box-sizing: border-box;  border-width: 0;  border-style: solid;}p,li,ul,pre,div,h1,h2,h3,h4,h5,h6 {  margin: 0;  padding: 0;}button,input,optgroup,select,textarea {  font-family: inherit;  font-size: 100%;  line-height: 1.15;  margin: 0;}button,select {  text-transform: none;}button,[type="button"],[type="reset"],[type="submit"] {  -webkit-appearance: button;}button::-moz-focus-inner,[type="button"]::-moz-focus-inner,[type="reset"]::-moz-focus-inner,[type="submit"]::-moz-focus-inner {  border-style: none;  padding: 0;}button:-moz-focus,[type="button"]:-moz-focus,[type="reset"]:-moz-focus,[type="submit"]:-moz-focus {  outline: 1px dotted ButtonText;}a {  color: inherit;  text-decoration: inherit;}input {  padding: 2px 4px;}img {  display: block;}html { scroll-behavior: smooth  }
    </style>
    <style data-tag="default-style-sheet">
      html {
        font-family: Lexend;
        font-size: 16px;
      }

      body {
        font-weight: 400;
        font-style:normal;
        text-decoration: none;
        text-transform: none;
        letter-spacing: normal;
        line-height: 1.1;
        color: var(--dl-color-grays-dark100);
        background-color: var(--dl-color-grays-white100);

      }
    </style>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      data-tag="font"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;200;300;400;500;600;700;800;900&display=swap"
      data-tag="font"
    />
    <style>
      ::placeholder{
      color: #63667066;
      }
    </style>
    <link rel="stylesheet" href="./style.css" />
  </head>
  <body>
    <div>
      <link href="./find-donor.css" rel="stylesheet" />

      <div class="find-donor-container">
        <main class="find-donor-main">
          <div class="find-donor-hero section-container">
            <div class="find-donor-max-width max-content-container">
              <div class="find-donor-content-container">
                <span class="find-donor-text">LTI Blood Bank</span>
                <a href="find-donor.php" class="find-donor-navlink">
                  <div class="find-donor-card">
                    <h4 class="find-donor-text01 heading4">Find Donor</h4>
                    <svg viewBox="0 0 1024 1024" class="find-donor-icon">
                      <path
                        d="M731.429 585.143h174.286c-6.857 7.429-11.429 11.429-12.571 12.571l-356 342.857c-6.857 6.857-16 10.286-25.143 10.286s-18.286-3.429-25.143-10.286l-356.571-344c-1.143-0.571-5.714-4.571-12-11.429h210.857c16.571 0 31.429-11.429 35.429-27.429l40-160.571 108.571 381.143c4.571 15.429 18.857 26.286 35.429 26.286v0c16 0 30.286-10.857 34.857-26.286l83.429-277.143 32 64c6.286 12 18.857 20 32.571 20zM1024 340.571c0 65.714-28.571 125.714-58.857 171.429h-210.857l-63.429-126.286c-6.286-13.143-21.143-21.143-35.429-20-15.429 1.714-28 11.429-32 26.286l-73.714 245.714-112-392c-4.571-15.429-18.857-26.286-36-26.286-16.571 0-30.857 11.429-34.857 27.429l-66.286 265.143h-241.714c-30.286-45.714-58.857-105.714-58.857-171.429 0-167.429 102.286-267.429 273.143-267.429 100 0 193.714 78.857 238.857 123.429 45.143-44.571 138.857-123.429 238.857-123.429 170.857 0 273.143 100 273.143 267.429z"
                      ></path>
                    </svg>
                    <span class="find-donor-text02">
                      <span>
                        A donor is someone who gives a part of their body or
                        some of their blood to be used by doctors to help a
                        person who is ill.
                      </span>
                      <br />
                      <span>
                        “It can be difficult to find someone willing to donate a
                        , but it isn&apos;t that difficult to find someone who
                        cares for the patient
                      </span>
                      <br />
                    </span>
                    <span class="find-donor-text07">Click Here</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
   <form method="post">
    <div id="select">
     <p> Select Blood Group :  <select name = "select" required>Blood Group
         <option value = "null"></option>
            <option value = "AB_Positive">AB Positive</option>
            <option value = "AB_Negative">AB Negative</option>
            <option value = "A_Positive">A Positive</option>
			<option value = "A_Negative">A Negative</option>
			<option value = "B_Positive">B Positive</option>
			<option value = "B_Negative">B Negative</option>
			<option value = "O_Positive">O Positive</option>
			<option value = "O_Negative">O Negative</option>
         </select></p><br>
        <p><input type="submit" name="sub" style="background-color:Cyan"></p><br><br>
               </div>
    
    </form>
	<?php
	if (isset($_POST['sub'])) {
  echo "<table><tr><th> First Name </th><th> Last Name </th><th> Mobile Number </th><th> City </th><th> Available From </th><th> Available To </th><th> Date of Birth </th><th> Blood Group </th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["fname"]. "</td><td>" . $row["lname"]. " </td> <td> " . $row["mobileno"]. "</td> <td> " . $row["city"]. "</td> <td> " . $row["bfrom"]. "</td> <td> " . $row["bto"]. "</td> <td> " . $row["dob"]. "</td> <td> " . $row["bloodgroup"]. "</td> </tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}

$conn->close(); 
?>
		  
          <div class="find-donor-section-four section-container">
            <div class="find-donor-max-width1 max-content-container"></div>
            <div data-type="slider" class="find-donor-slider">
              <div data-type="slide" class="find-donor-slide slide">
                <div class="find-donor-max-width2 max-content-container">
                  <div class="find-donor-left-side">
                    <div class="find-donor-image-container">
                      <img
                        alt="image"
                        src="public/playground_assets/blood%20donation%20logo-600w.png"
                        class="find-donor-image"
                      />
                      <img
                        alt="image"
                        src="public/playground_assets/vector%202%20%5B2%5D-700w.png"
                        class="find-donor-image01"
                      />
                      <div class="find-donor-slider-controls">
                        <div
                          data-action="previousSlide"
                          class="find-donor-go-left"
                        >
                          <svg viewBox="0 0 1024 1024" class="find-donor-icon2">
                            <path
                              d="M854 470v84h-520l238 240-60 60-342-342 342-342 60 60-238 240h520z"
                            ></path>
                          </svg>
                        </div>
                        <div
                          data-action="nextSlide"
                          class="find-donor-go-right"
                        >
                          <svg viewBox="0 0 1024 1024" class="find-donor-icon4">
                            <path
                              d="M512 170l342 342-342 342-60-60 238-240h-520v-84h520l-238-240z"
                            ></path>
                          </svg>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="find-donor-right-side">
                    <span class="find-donor-testimonial">
                      Blood donation is an extremely noble deed, yet there is a
                      scarcity of regular donors across LTI. We focus on
                      creating &amp; expanding a virtual army of blood donating
                      volunteers who could be searched and contacted by
                      family/care givers of a patient in times of need.
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="find-donor-section-five section-container">
            <div class="find-donor-max-width3 max-content-container">
              <div class="find-donor-cards-container">
                <div class="find-donor-grid-card">
                  <img
                    alt="image"
                    src="public/playground_assets/vector%203-600h.png"
                    class="find-donor-image02"
                  />
                  <span class="find-donor-text09">
                    You may need a blood donation in the future.
                  </span>
                  <span class="find-donor-text10 content-Light">
                    Blood donation is considered as the gift of life as there is
                    no substitute present for human blood. At every 2 second
                    someone somewhere needs the blood. Every day more than
                    38,000 blood donations are needed.
                  </span>
                </div>
                <div class="find-donor-grid-card1">
                  <img
                    alt="image"
                    src="public/playground_assets/vector%203%20%5B1%5D-200h.png"
                    class="find-donor-image03"
                  />
                  <span class="find-donor-text11">Safe blood saves lives</span>
                  <span class="find-donor-text12">
                    Blood is needed by women with complications during pregnancy
                    and childbirth, children with severe anaemia, often
                    resulting from malaria or malnutrition, accident victims and
                    surgical and cancer patients.
                  </span>
                </div>
                <div class="find-donor-grid-card2">
                  <img
                    alt="image"
                    src="public/playground_assets/vector%203%20%5B2%5D-200h.png"
                    class="find-donor-image04"
                  />
                  <span class="find-donor-text13">
                    Every donation makes a difference.
                  </span>
                  <span class="find-donor-text14 content-Light">
                    Blood donation is considered as the gift of life as there is
                    no substitute present for human blood. At every 2 second
                    someone somewhere needs the blood. Every day more than
                    38,000 blood donations are needed.
                  </span>
                </div>
                <div class="find-donor-grid-card3">
                  <img
                    alt="image"
                    src="public/playground_assets/vector%203%20%5B3%5D-200h.png"
                    class="find-donor-image05"
                  />
                  <span class="find-donor-text15">
                    You may need a blood donation in the future.
                  </span>
                  <span class="find-donor-text16 content-Light">
                    Blood donation is considered as the gift of life as there is
                    no substitute present for human blood. At every 2 second
                    someone somewhere needs the blood. Every day more than
                    38,000 blood donations are needed.
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="find-donor-section-six section-container">
            <div class="find-donor-max-width4 max-content-container"></div>
            <div class="find-donor-section-six1 section-container">
              <div class="find-donor-max-width5 max-content-container">
                <div class="find-donor-content-container1">
                  <h1 class="find-donor-text17">
                    <span class="find-donor-text18">
                      Start Registering for donating blood 
                    </span>
                    <br />
                    <br />
                  </h1>
                  <div class="find-donor-input-container">
                    <img
                      alt="image"
                      src="public/playground_assets/stars-600h.png"
                      class="find-donor-image06"
                    />
                    <img
                      alt="image"
                      src="public/playground_assets/vector%203-600h.png"
                      class="find-donor-image07"
                    />
                  </div>
                </div>
                <div class="find-donor-container1">
                  <div class="find-donor-image-container1">
                    <img
                      alt="image"
                      src="public/playground_assets/blood%20donation%20logo-600w.png"
                      class="find-donor-image08"
                    />
                    <img
                      alt="image"
                      src="public/playground_assets/vector%203%20%5B1%5D-200h.png"
                      class="find-donor-image09"
                    />
                  </div>
                </div>
              </div>
              <button class="find-donor-button button-primary button">
                Get started
              </button>
              <span class="find-donor-text21">It improves your health.</span>
            </div>
          </div>
        </main>
        <footer class="find-donor-footer section-container">
          <div class="find-donor-max-width6 max-content-container">
            <div class="find-donor-container2">
              <img
                alt="image"
                src="public/playground_assets/blood%20donation%20logo%20%5B1%5D-500h.png"
                class="find-donor-image10"
              />
              <span class="find-donor-text22">
                <br />
                <span>
                  Blood Donation Prerequisites is a thing that is required as a
                  prior condition for something else to happen or exist.A donor
                  is someone who gives a part of their body or some of their
                  blood to be used by doctors to help a person who is ill
                </span>
              </span>
            </div>
            <div class="find-donor-container3">
              <div class="find-donor-links"></div>
              <img
                alt="image"
                src="public/playground_assets/clipart1033863-600w.png"
                class="find-donor-image11"
              />
            </div>
            <img
              alt="image"
              src="public/playground_assets/blood%20donation%20logo%20%5B1%5D-500h.png"
              class="find-donor-image12"
            />
          </div>
        </footer>
      </div>
    </div>
    <script src="https://unpkg.com/@teleporthq/teleport-custom-scripts"></script>
    <script>
      window.onload = () => {
        const runAllScripts = () => {
          initializeAllSliders();
        };

        const listenForUrlChanges = () => {
          let url = location.href;
          document.body.addEventListener(
            "click",
            () => {
              requestAnimationFrame(() => {
                if (url !== location.href) {
                  runAllScripts();
                  url = location.href;
                }
              });
            },
            true
          );
        };

        const initializeAllSliders = () => {
          const allSliders = document.querySelectorAll('[data-type="slider"]');
          allSliders.forEach((carrousel) => {
            initializeSlider(carrousel);
          });
        };

        const initializeSlider = (carrousel) => {
          let currentSlide = 0;

          const slides = carrousel.querySelectorAll('[data-type="slide"]');
          const nextSlideBtns = carrousel.querySelectorAll(
            '[data-action="nextSlide"]'
          );
          const previousSlideBtns = carrousel.querySelectorAll(
            '[data-action="previousSlide"]'
          );

          const changeSlide = (slideIndex, action) => {
            currentSlide = slideIndex;

            switch (action) {
              case "next":
                slideIndex === slides.length - 1
                  ? (currentSlide = 0)
                  : currentSlide++;
                break;
              case "previous":
                slideIndex === 0
                  ? (currentSlide = slides.length - 1)
                  : currentSlide--;
            }

            carrousel.style.transform = `translateX(${-100 * currentSlide}%)`;
          };

          previousSlideBtns.forEach((btn) => {
            btn.addEventListener("click", () =>
              changeSlide(currentSlide, "previous")
            );
          });

          nextSlideBtns.forEach((btn) => {
            btn.addEventListener("click", () =>
              changeSlide(currentSlide, "next")
            );
          });
        };

        runAllScripts();
      };
    </script>
  </body>
</html>




