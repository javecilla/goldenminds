  <style type="text/css">


input[id="navcheckbox"] {
        -webkit-appearance: none;
        visibility: hidden!important;
        display: none!important;
        background: transparent;
}
.bar {
  position: relative;
  cursor: pointer;
  display: flex;
  justify-content: right;
  opacity: .8;
}
.bar .mid {
  height: 3px;
  width: 28px;
  background: #000;
  border-radius: 50px;
  position: absolute;
  transition: 0.2s ease;
}
.bar .top {
  bottom: 3px;
  height: 3px;
  width: 28px;
  background: #000;
  border-radius: 50px;
  position: absolute;
  transition: 0.2s ease;
}
.bar .bot {
  top: 7px;
  height: 3px;
  width: 28px;
  background: #000;
  border-radius: 50px;
  position: absolute;
  transition: 0.2s ease;
}
input[id="navcheckbox"]:checked ~ .bar .top {
  transform: rotate(-45deg);
  width: 27px;
  transform-origin: right;
  top: -10px;
}
input[id="navcheckbox"]:checked ~ .bar .bot {
  transform: rotate(45deg);
  width: 27px;
  transform-origin: right;
  top: 10px;
}
input[id="navcheckbox"]:checked ~ .bar .mid {
  transform: translateX(1px);
  opacity: 0;
}

    a.nav-link {
      font-weight: bolder!important;
      font-size: 17px!important;
    }
          li a.dropdown-item:focus{
        background: #996515;
        opacity: .7;
      }

      a.link_ud:focus {
        background: #996515!important;
        opacity: .7!important;
      }
      .navbar {
  border-bottom: 1px solid lightgrey;
}
.navbar-brand {
  cursor: pointer;
}
.nav_logo {
  width: 80px;
  height: 90px;
}
.school_name {
  color: #000;
  font-family: 'Crimson Text', serif;
  font-weight: 400!important;
  font-size: 25px!important;
  letter-spacing: 1px;
  cursor: pointer; 
}

.school_name:hover {
  color: #996515!important;
}

.nav-link {
  font-weight: 400!important;
}
.nav-link:hover {
  display: inline-block;
  border-bottom: 2px solid #996515;
  color: #996515!important;
  transition: 0.2s ease;
}
.nav_btn {
  background: #996515;
  opacity: .8;
  color: #fff;
  margin-left: 3px;
  margin-top: 5px!important;
}
.nav_btn:hover {
  background: transparent;
  border: 2px solid #996515;
  font-weight: 600;
  color: #996515;
}
.nav-link {
  color: #000000;
}
.active_nav-link {
  color: #996515!important;
  display: inline-block;
  border-bottom: 2px solid #996515;
}
.nav_btn_search {
  background: #996515!important;
  color: #ffffff;
  border: none;
  opacity: .7;
}
.nav_btn_search:hover {
  opacity: 1;
}
.nav_input_search {
  background: transparent;
}
.nav_input_search:focus {
  border: 1px solid #996515;
  opacity: .8;
  box-shadow: none;
}
.nav-link:focus {
  color:#996515;
}
.fa-angle-down {
  font-size: 13px!important;
}
/*.nav2top{
  overflow: hidden;
  position: fixed;
  top: 0;
  width: 100%;
} */
  </style>
<!--Main Navigation-->
<header class="nav2top ">
  <!-- Jumbotron -->
  <div class="text-center border-bottom" 
  style="
/*  background:#b4813f!important;*/
  background-image: linear-gradient(to right, #5a3b2f, #5a3b2f, #5a3b2f, #b4813f); 
  color: #f3f3f3!important;
  padding: 5px;">
    <div class="container-fluid">
      <div class="row">
        <!-- Left elements -->
        <div class="col-md-6 d-flex justify-content-center justify-content-md-start  mb-3 mb-md-0 d-none d-lg-inline"
        style="opacity: .8;">
          <div class="d-flex">
            <span class="phone_number">
              <small class="d-none d-lg-inline"><i class="fa-solid fa-phone"></i>&nbsp;Contact Us: (+63) 939 449 9844</small>&nbsp;
              <small class="d-none d-lg-inline"><i class="fa-solid fa-envelope"></i>&nbsp;info@goldenmindsbulacan.com</small>
            </span>

          </div>
        </div>
        <!-- Left elements -->
        <!-- Right elements -->
        <div class="col-md-6 d-flex justify-content-center justify-content-md-end align-items-center">
          <div class="d-flex">
            <span class="facebook" style="margin-left: 10px;">
              <small><i class="fa-brands fa-facebook-f"></i></small>
            </span>
            <span class="youtube" style="margin-left: 10px;">
              <small><i class="fa-brands fa-youtube"></i></small>
            </span>
            <span class="linkedin" style="margin-left: 10px;">
              <small><i class="fa-brands fa-linkedin-in"></i></small>
            </span>
            <span class="email d-lg-none" style="margin-left: 10px;">
              <small><i class="fa-solid fa-envelope"></i></small>
            </span>
            <span class="email d-lg-none" style="margin-left: 10px;">
              <small><i class="fa-solid fa-phone"></i></small>
            </span>

          </div>
        </div>
        <!-- Right elements -->
      </div>
    </div>
  </div>
  <!-- Jumbotron -->

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <!-- Container wrapper -->
    <div class="container-fluid ">
      <a class="navbar-brand" onclick="location.reload();">
         <img src="http://localhost/public_html/public/resources/images/general/gmc/gmlogo.PNG" height="65" />
        </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
      <input type="checkbox" id="navcheckbox"/>
      <div class ="bar">
        <span class="top"></span>
        <span class="mid"></span>
        <span class="bot"></span>
      </div>
    </label>
      <!-- Left links -->
       <div class="collapse navbar-collapse flex-row " id="navbarContent">
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link <?= (strpos($routes, 'home') !== false) ? 'active_nav-link' : ''; ?>" 
              href="http://localhost/public_html/"> Home </a>
            </li>
          <li class="nav-item dropdown">
            <a class="nav-link <?= (strpos($routes, 'academics') !== false) ? 'active_nav-link' : ''; ?>" data-bs-toggle="dropdown" href="javascript:void(0)">
              Academics <i class="fa-solid fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="http://localhost/public_html/academics/senior-high/">Senior High School Department</a></li>  
              <li><a class="dropdown-item" href="http://localhost/public_html/academics/basic-education/">Basic Education Department</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= (strpos($routes, 'news') !== false) ? 'active_nav-link' : ''; ?>" 
              href="http://localhost/public_html/news/"> News</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= (strpos($routes, 'announcements') !== false) ? 'active_nav-link' : ''; ?>" 
              href="http://localhost/public_html/announcements/"> Announcements</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= (strpos($routes, 'events') !== false) ? 'active_nav-link' : ''; ?>" 
              href="http://localhost/public_html/events/"> Events</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= (strpos($routes, 'gallery') !== false) ? 'active_nav-link' : ''; ?>" 
              href="http://localhost/public_html/gallery/"> Gallery</a> 
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link <?= (strpos($routes, 'about') !== false) ? 'active_nav-link' : ''; ?>" 
            data-bs-toggle="dropdown" href="javascript:void(0)">
              About <i class="fa-solid fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="http://localhost/public_html/about/history/">History</a></li>
              <li><a class="dropdown-item" href="http://localhost/public_html/about/golden-minds-seal/">Seal</a></li>
              <li><a class="dropdown-item" href="http://localhost/public_html/about/golden-minds-hymn/">Hymn</a></li>
              <li><a class="dropdown-item" href="http://localhost/public_html/about/vision-mission/">Vision and Mission</a></li>

              <li><a class="dropdown-item" href="http://localhost/public_html/about/calendar/">Golden Minds Calendar</a></li>                
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="http://localhost/public_html/about/administration/">Administration</a></li>
              <li><a class="dropdown-item" href="http://localhost/public_html/about/faculty-staff/">Faculty and Staff</a></li>
              <li><a class="dropdown-item" href="http://localhost/public_html/about/student-life/">Student Life</a></li>
              <!-- <li><a class="dropdown-item" href="http://localhost/public_html/about/alumni/">Alumni</a></li> -->
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="http://localhost/public_html/about/research-development-extension/">Research, Development & Extension</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= (strpos($routes, 'contact') !== false) ? 'active_nav-link' : ''; ?>" 
              href="http://localhost/public_html/contact/golden-minds-colleges-sta-maria-campus/"> Contact Us</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" data-bs-toggle="dropdown" href="javascript:void(0)">
              Online Services <i class="fa-solid fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="http://public_html/sis/gmc login.html" target="_blank">Online Portal</a></li>
              <li><a class="dropdown-item" href="http://public_html/sis/gmc account registration.php" target="_blank">Online Application</a></li>
            </ul>
          </li> 
          <li class="nav-item">
            <div class="input-group">
              <input type="search" class="form-control nav_input_search" placeholder="Search..."/>
              <button type="button" class="input-group-text nav_btn_search">
                <i class="fa-solid fa-magnifying-glass"></i>
              </button>
            </div>
          </li>
        </ul>      
      </div>
      <!-- Left links -->
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
</header>
<!--Main Navigation-->

<!-- golden midns social chat icon-> contact -->
<span class="chat_icon btnblinkkanmin"></span>