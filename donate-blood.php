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
class script{

        public $con;

        public function __construct(){

                $server = "mysqldb2022.c4a31adjeatg.us-west-2.rds.amazonaws.com";
                $user = "admin";
                $pass = "admin123";
                $db = "customers";

                $this->con = mysqli_connect($server,$user,$pass,$db) or die("unable to connect");
        }

        public function add($fname,$lname,$mobileno,$city,$bfrom,$bto,$dob,$bloodgroup){
                $sql = "insert into donors(fname,lname,mobileno,city,bfrom,bto,dob,bloodgroup) values('".urlencode($fname)."','".urlencode($lname)."','".urlencode($mobileno)."','".urlencode($city)."','".urlencode($bfrom)."','".urlencode($bto)."','".urlencode($dob)."','".urlencode($bloodgroup)."')";
                $res = mysqli_query($this->con,$sql) or die("unable to perform operation");
                if($res) {
                        echo "Data Added ";
                } else {
                        echo "Operational Failure";
                }
        }
                public function getdata() {
                        $sql = "select * from donors";
                        $res = mysqli_query($this->con,$sql) or die("unable to fetch");
                        $cp = mysqli_fetch_assoc($res);
                        //var_dump($cp);
                        if(count($cp)){
                                echo '
                                <table>
                                        <tr>
                                                <th>FName </th>
                                                <th>LName</th>
                                                 <th>Mobileno</th>
<th>City</th>
<th>bfrom</th>	
<th>bto</th>
<th>DOB</th><th>BloodGroup</th>											 
																			   
                                        </tr>
                                ';
                                while($row = mysqli_fetch_array($res)){
                                        echo '<tr>
                                         <td>'.urlencode($row['fname']).'</td>
                                              <td>'.urlencode($row['lname']).'</td>
											<td>'.urlencode($row['mobileno']).'</td>
												<td>'.urlencode($row['city']).'</td>
												<td>'.urlencode($row['bfrom']).'</td>
                                                <td>'.urlencode($row['bto']).'</td>
												 <td>'.urlencode($row['dob']).'</td>
											 	 <td>'.urlencode($row['bloodgroup']).'</td>
												 
												 
												 </tr>';
												  
                                }
                                        echo '
                                        </table>
                                        ';
                        }else{
                                echo "No Data Found";
                        }
                }
        }

?>

<html lang="en">
  <head>
    <title>Donate-Blood - LTIBB</title>
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
      <link href="./donate-blood.css" rel="stylesheet" />

      <div class="donate-blood-container">
        <main class="donate-blood-main">
          <div class="donate-blood-hero section-container">
            <div class="donate-blood-max-width max-content-container">
              <div class="donate-blood-content-container">
                <span class="donate-blood-text">LTI Blood Bank</span>
                <div class="donate-blood-card">
                  <h4 class="donate-blood-text01 heading4">Donate Blood</h4>
                  <svg viewBox="0 0 1024 1024" class="donate-blood-icon">
                    <path
                      d="M731.429 585.143h174.286c-6.857 7.429-11.429 11.429-12.571 12.571l-356 342.857c-6.857 6.857-16 10.286-25.143 10.286s-18.286-3.429-25.143-10.286l-356.571-344c-1.143-0.571-5.714-4.571-12-11.429h210.857c16.571 0 31.429-11.429 35.429-27.429l40-160.571 108.571 381.143c4.571 15.429 18.857 26.286 35.429 26.286v0c16 0 30.286-10.857 34.857-26.286l83.429-277.143 32 64c6.286 12 18.857 20 32.571 20zM1024 340.571c0 65.714-28.571 125.714-58.857 171.429h-210.857l-63.429-126.286c-6.286-13.143-21.143-21.143-35.429-20-15.429 1.714-28 11.429-32 26.286l-73.714 245.714-112-392c-4.571-15.429-18.857-26.286-36-26.286-16.571 0-30.857 11.429-34.857 27.429l-66.286 265.143h-241.714c-30.286-45.714-58.857-105.714-58.857-171.429 0-167.429 102.286-267.429 273.143-267.429 100 0 193.714 78.857 238.857 123.429 45.143-44.571 138.857-123.429 238.857-123.429 170.857 0 273.143 100 273.143 267.429z"
                    ></path>
                  </svg>
                  <span class="donate-blood-text02 content-Light">
                    A blood donation occurs when a person voluntarily has blood
                    drawn and used for transfusions and/or made into
                    biopharmaceutical medications by a process called
                    fractionation (separation of whole blood components).
                  </span>
                  <span class="donate-blood-text03">Donate Blood</span>
                </div>
              </div>
            </div>
          </div>
		
          <div class="donate-blood-section-one section-container">
  <form method="post">
<button type="submit" formaction="/index.html" style="background: grey; height: 45px; width: 200px; color:white; font:oblique;">Redirect to home page</button><br><br>
</form>
              <span class="donate-blood-text04"> 
                  <table>
                                    
			  <form method="post">
                         <tr>
                            <td>
                  
                  FName: 
                             </td>
                             
                            <td><input type="text" name="fname" required>
                                
                             </td>
                        </tr>
                  <tr><td>
                      LName: </td><td><input type="text" name="lname" required></td></tr>
       <tr>
           <td>
        MobileNo: </td><td><input name="mobileno"
    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
    type = "number"
    maxlength = "10"/> </td> </tr>
             <tr> <td>   
		City: </td><td><input type="text" name="city" required></td>  </tr> 
                  
                  
                  <tr><td>
		Donate From:</td><td> <input type="date" name="bfrom" required> </td> </tr>
                  <tr><td>
                      
                      
                                <tr><td>
		Donate To:</td><td> <input type="date" name="bto" required> </td> </tr>
                  <tr><td>
                      
		DOB: (Age 18-65)</td><td><input type="date" name="dob" max="<?php $d=strtotime("-18 Years"); echo date("Y-m-d", $d); ?>" required> </td> </tr>
                  <tr> <td>
                      
		 Blood Group: </td><td>  <select name = "bloodgroup" required>Blood Group 
            <option value = "AB_Positive">AB Positive</option>
            <option value = "AB_Negative">AB Negative</option>
            <option value = "A_Positive">A Positive</option>
			<option value = "A_Negative">A Negative</option>
			<option value = "B_Positive">B Positive</option>
			<option value = "B_Negative">B Negative</option>
			<option value = "O_Positive">O Positive</option>
			<option value = "O_Negative">O Negative</option>
         </select></td> </tr>
                  </table><br>
        <p><input type="submit" name="sub" style="background-color:Cyan"></p>
                  
</span>
</div>
</form>
<?php
$script = new script();
if(isset($_POST['sub'])){
        $script->add($_POST['fname'],$_POST['lname'],$_POST['mobileno'],$_POST['city'],$_POST['bfrom'],$_POST['bto'],$_POST['dob'],$_POST['bloodgroup']);
}
?>

          </div>
          <div class="donate-blood-section-four section-container">
            <div class="donate-blood-max-width1 max-content-container"></div>
            <div data-type="slider" class="donate-blood-slider">
              <div data-type="slide" class="donate-blood-slide slide">
                <div class="donate-blood-max-width2 max-content-container">
                  <div class="donate-blood-left-side">
                    <div class="donate-blood-image-container">
                      <img
                        alt="image"
                        src="public/playground_assets/blood%20donation%20logo-600w.png"
                        class="donate-blood-image"
                      />
                      <img
                        alt="image"
                        src="public/playground_assets/vector%202%20%5B2%5D-700w.png"
                        class="donate-blood-image01"
                      />
                      <div class="donate-blood-slider-controls">
                        <div
                          data-action="previousSlide"
                          class="donate-blood-go-left"
                        >
                          <svg
                            viewBox="0 0 1024 1024"
                            class="donate-blood-icon2"
                          >
                            <path
                              d="M854 470v84h-520l238 240-60 60-342-342 342-342 60 60-238 240h520z"
                            ></path>
                          </svg>
                        </div>
                        <div
                          data-action="nextSlide"
                          class="donate-blood-go-right"
                        >
                          <svg
                            viewBox="0 0 1024 1024"
                            class="donate-blood-icon4"
                          >
                            <path
                              d="M512 170l342 342-342 342-60-60 238-240h-520v-84h520l-238-240z"
                            ></path>
                          </svg>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="donate-blood-right-side">
                    <span class="donate-blood-testimonial">
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
          <div class="donate-blood-section-five section-container">
            <div class="donate-blood-max-width3 max-content-container">
              <div class="donate-blood-cards-container">
                <div class="donate-blood-grid-card">
                  <img
                    alt="image"
                    src="public/playground_assets/vector%203-600h.png"
                    class="donate-blood-image02"
                  />
                  <span class="donate-blood-text05">
                    You may need a blood donation in the future.
                  </span>
                  <span class="donate-blood-text06 content-Light">
                    Blood donation is considered as the gift of life as there is
                    no substitute present for human blood. At every 2 second
                    someone somewhere needs the blood. Every day more than
                    38,000 blood donations are needed.
                  </span>
                </div>
                <div class="donate-blood-grid-card1">
                  <img
                    alt="image"
                    src="public/playground_assets/vector%203%20%5B1%5D-200h.png"
                    class="donate-blood-image03"
                  />
                  <span class="donate-blood-text07">
                    Safe blood saves lives
                  </span>
                  <span class="donate-blood-text08">
                    Blood is needed by women with complications during pregnancy
                    and childbirth, children with severe anaemia, often
                    resulting from malaria or malnutrition, accident victims and
                    surgical and cancer patients.
                  </span>
                </div>
                <div class="donate-blood-grid-card2">
                  <img
                    alt="image"
                    src="public/playground_assets/vector%203%20%5B2%5D-200h.png"
                    class="donate-blood-image04"
                  />
                  <span class="donate-blood-text09">
                    Every donation makes a difference.
                  </span>
                  <span class="donate-blood-text10 content-Light">
                    Blood donation is considered as the gift of life as there is
                    no substitute present for human blood. At every 2 second
                    someone somewhere needs the blood. Every day more than
                    38,000 blood donations are needed.
                  </span>
                </div>
                <div class="donate-blood-grid-card3">
                  <img
                    alt="image"
                    src="public/playground_assets/vector%203%20%5B3%5D-200h.png"
                    class="donate-blood-image05"
                  />
                  <span class="donate-blood-text11">
                    You may need a blood donation in the future.
                  </span>
                  <span class="donate-blood-text12 content-Light">
                    Blood donation is considered as the gift of life as there is
                    no substitute present for human blood. At every 2 second
                    someone somewhere needs the blood. Every day more than
                    38,000 blood donations are needed.
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="donate-blood-section-six section-container">
            <div class="donate-blood-max-width4 max-content-container"></div>
            <div class="donate-blood-section-six1 section-container">
              <div class="donate-blood-max-width5 max-content-container">
                <div class="donate-blood-content-container1">
                  <h1 class="donate-blood-text13">
                    <span class="donate-blood-text14">
                      Start Registering for donating blood 
                    </span>
                    <br />
                    <br />
                  </h1>
                  <div class="donate-blood-input-container">
                    <img
                      alt="image"
                      src="public/playground_assets/stars-600h.png"
                      class="donate-blood-image06"
                    />
                    <img
                      alt="image"
                      src="public/playground_assets/vector%203-600h.png"
                      class="donate-blood-image07"
                    />
                  </div>
                </div>
                <div class="donate-blood-container1">
                  <div class="donate-blood-image-container1">
                    <img
                      alt="image"
                      src="public/playground_assets/blood%20donation%20logo-600w.png"
                      class="donate-blood-image08"
                    />
                    <img
                      alt="image"
                      src="public/playground_assets/vector%203%20%5B1%5D-200h.png"
                      class="donate-blood-image09"
                    />
                  </div>
                </div>
              </div>
              <button class="donate-blood-button button-primary button">
                Get started
              </button>
              <span class="donate-blood-text17">It improves your health.</span>
            </div>
          </div>
        </main>
        <footer class="donate-blood-footer section-container">
          <div class="donate-blood-max-width6 max-content-container">
            <div class="donate-blood-container2">
              <img
                alt="image"
                src="public/playground_assets/blood%20donation%20logo%20%5B1%5D-500h.png"
                class="donate-blood-image10"
              />
              <span class="donate-blood-text18">
                <br />
                <span>
                  Blood Donation Prerequisites is a thing that is required as a
                  prior condition for something else to happen or exist.A donor
                  is someone who gives a part of their body or some of their
                  blood to be used by doctors to help a person who is ill
                </span>
              </span>
            </div>
            <div class="donate-blood-container3">
              <div class="donate-blood-links"></div>
              <img
                alt="image"
                src="public/playground_assets/clipart1033863-600w.png"
                class="donate-blood-image11"
              />
            </div>
            <img
              alt="image"
              src="public/playground_assets/blood%20donation%20logo%20%5B1%5D-500h.png"
              class="donate-blood-image12"
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

