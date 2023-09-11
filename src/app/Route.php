<?php
declare(strict_types = 1);

namespace App;

use App\Service;

class Route
{
  public static function GET($purpose, $path, $filename)
  {
    $cMethod = $_SERVER['REQUEST_METHOD'];
    $cURI = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    //specify register path 
    $registerPath = [
      '/',
      '/academics/senior-high-school/',
      '/academics/senior-high-school/strands-offered/',
      '/academics/senior-high-school/curriculum/',
      '/academics/senior-high-school/admission-requirements/',
      '/academics/basic-education/',
      '/news/',
      '/announcements/',
      '/events/',
      '/gallery/',
      '/about/history/',
      '/about/school-seal/',
      '/about/school-hymn/',
      '/about/mission-vission/',
      '/about/goldenminds-calendar/',
      '/about/administration/',
      '/about/faculty-staff/',
      '/about/student-life/',
      '/about/research-development-extension/',
      '/contact/sta-maria-campus/',
      '/contact/balagtas-campus/',
      '/contact/guiginto-campus/',
      //for cms registered path
      '/cms/dashboard/'
    ];

    if(in_array($cURI, $registerPath) ) {
      if($cURI === $path) {
        $title = self::getPageTitle($cURI); 
        $desc = self::getPageDescription($cURI); 
        echo Service::render($filename, $title, $desc, $purpose); 
      } 
    } else {
      echo Service::error();
    }
  }

  //help method to determine the page title
  private static function getPageTitle($uri)
  {
    $pageTitle = '';
    
    switch($uri) {
      case '/':
        $pageTitle = 'Golden Minds Bulacan';
        break;

      case '/academics/senior-high-school/':
        $pageTitle = 'SHS | Golden Minds Bulacan';
        break;

      case '/academics/senior-high-school/strands-offered/':
        $pageTitle = 'Strands - SHS | Golden Minds Bulacan';
        break; 
 
      case '/academics/senior-high-school/curriculum/':
        $pageTitle = 'Curriculum- SHS | Golden Minds Bulacan';
        break;

      case '/academics/senior-high-school/admission-requirements/':
        $pageTitle = 'Admission Requirements - SHS | Golden Minds Bulacan';
        break;

      case '/academics/basic-education/':
        $pageTitle = 'Basic Education | Golden Minds Bulacan';
        break;

      case '/news/':
        $pageTitle = 'News | Golden Minds Bulacan';
        break;

      case '/announcements/':
        $pageTitle = 'Announcements | Golden Minds Bulacan';
        break;

      case '/events/':
        $pageTitle = 'Events | Golden Minds Bulacan';
        break;

      case '/gallery/':
        $pageTitle = 'Gallery | Golden Minds Bulacan';
        break;

      case '/about/history/':
        $pageTitle = 'History | Golden Minds Bulacan';
        break;

      case '/about/school-seal/':
        $pageTitle = 'Seal | Golden Minds Bulacan';
        break;

      case '/about/school-hymn/':
        $pageTitle = 'Hymn | Golden Minds Bulacan';
        break;

      case '/about/mission-vission/':
        $pageTitle = 'Mission and Vission | Golden Minds Bulacan';
        break;

      case '/about/goldenminds-calendar/':
        $pageTitle = 'Calendar | Golden Minds Bulacan';
        break;

      case '/about/administration/':
        $pageTitle = 'Administration | Golden Minds Bulacan';
        break;

      case '/about/faculty-staff/':
        $pageTitle = 'Faculty and Staff | Golden Minds Bulacan';
        break;

      case '/about/student-life/':
        $pageTitle = 'Student Life | Golden Minds Bulacan';
        break;

      case '/about/research-development-extension/':
        $pageTitle = 'Reseach Development | Golden Minds Bulacan';
        break;

      case '/contact/sta-maria-campus/':
        $pageTitle = 'Contact - Sta. Maria Campus | Golden Minds Bulacan';
        break;

      case '/contact/balagtas-campus/':
        $pageTitle = 'Contact - Balagtas Campus | Golden Minds Bulacan';
        break; 

      case '/contact/guiginto-campus/':
        $pageTitle = 'Contact - Guiginto Campus | Golden Minds Bulacan';
        break;

      case '/cms/dashboard/':
        $pageTitle = 'Dashboard | GMCVS';
        break;


      default:
        $pageTitle = 'Unknown'; 
        break;
    }
    return $pageTitle;
  }

  private static function getPageDescription($uri) 
  {
    $pageDescription = '';
    switch($uri) {
      case '/':
        $pageDescription = 'Welcome to Golden Minds Bulacan Inc. - Empowering Young Minds for Success. Explore our academic programs and learn more about our mission to produce competitive graduates.';
        break;

      case '/academics/senior-high-school/':
        $pageDescription = 'Discover our Senior High School program at Golden Minds Bulacan Inc. We offer a variety of tracks, including General Academic Strand (GAS), Accountancy, Business and Management Strand (ABM), and Technical-Vocation Livelihood Strands with Majors in Home Economics (TVL-HE) and Information and Communication Technology (TVL-ICT).';
        break;

      case '/academics/senior-high-school/strands-offered/':
        $pageDescription = 'Explore the different strands offered in our Senior High School program, including General Academic Strand (GAS), Accountancy, Business and Management Strand (ABM), and Technical-Vocation Livelihood Strands with Majors in Home Economics (TVL-HE) and Information and Communication Technology (TVL-ICT).';
        break;

      case '/academics/senior-high-school/curriculum/':
        $pageDescription = 'Learn about the curriculum and educational offerings in our Senior High School program, designed to prepare students for a successful future.';
        break;

      case '/academics/senior-high-school/admission-requirements/':
        $pageDescription = 'Discover the admission requirements for our Senior High School program and start your journey to becoming a Golden Minds Bulacan Inc. student.';
        break;

      case '/academics/basic-education/':
        $pageDescription = 'Explore our basic education programs, designed to provide high-quality education to students of all ages.';
        break;

      case '/news/':
        $pageDescription = 'Stay updated with the latest news and updates from Golden Minds Bulacan Inc. Read about our achievements, events, and more.';
        break;

      case '/announcements/':
        $pageDescription = 'Check out our announcements to stay informed about important updates, events, and activities happening at Golden Minds Bulacan Inc.';
        break;

      case '/events/':
        $pageDescription = "Join us at our upcoming events and activities. Find out what's happening at Golden Minds Bulacan Inc.";
        break;

      case '/gallery/':
        $pageDescription = 'Explore our gallery to view photos and images showcasing the vibrant life and activities at Golden Minds Bulacan Inc.';
        break;

      case '/about/history/':
        $pageDescription = 'Learn about the history and journey of Golden Minds Bulacan Inc., from its inception to becoming a leading educational institution.';
        break;

      case '/about/school-seal/':
        $pageDescription = 'Discover the meaning and significance of our school seal, representing our commitment to excellence and education.';
        break;

      case '/about/school-hymn/':
        $pageDescription = 'Listen to our school hymn, a symbol of unity and pride for the Golden Minds Bulacan Inc. community.';
        break;

      case '/about/mission-vission/':
        $pageDescription = 'Explore our mission and vision, which guide us in nurturing and empowering young minds to become successful, God-fearing, and intelligent individuals.';
        break;

      case '/about/goldenminds-calendar/':
        $pageDescription = 'Stay updated with our academic calendar to know the important dates and events throughout the year at Golden Minds Bulacan Inc.';
        break;

      case '/about/administration/':
        $pageDescription = 'Meet our dedicated administration team who work tirelessly to ensure the success and growth of Golden Minds Bulacan Inc.';
        break;

      case '/about/faculty-staff/':
        $pageDescription = 'Get to know our passionate and knowledgeable faculty and staff members who are committed to providing top-notch education.';
        break;

      case '/about/student-life/':
        $pageDescription = 'Experience student life at Golden Minds Bulacan Inc., where we foster personal and academic growth, and create a vibrant campus community.';
        break;

      case '/about/research-development-extension/':
        $pageDescription = 'Discover our commitment to research, development, and extension programs aimed at making a positive impact on society and the country.';
        break;

      case '/contact/sta-maria-campus/':
        $pageDescription = 'Contact our Sta. Maria campus for inquiries, admissions, and more information about Golden Minds Bulacan Inc.';
        break;

      case '/contact/balagtas-campus/':
        $pageDescription = 'Contact our Balagtas campus for inquiries, admissions, and more information about Golden Minds Bulacan Inc.';
        break;

      case '/contact/guiginto-campus/':
        $pageDescription = 'Contact our Guiginto campus for inquiries, admissions, and more information about Golden Minds Bulacan Inc.';
        break;
 
      case '/cms/dashboard/':
        $pageDescription = 'Description for dashboard vs page page goes here.';
        break;


      default:
        $pageDescription = 'Unknown'; 
        break;
    }
    return $pageDescription;
  }


}

