<?php
$metaData = [
  'home' => [
    'title' => 'Golden Minds Bulacan',
    'description' => 'Golden Minds Bulacan -- the school grew a year older on February _ as it celebrated its founding day. It was established to help the students realize their full potential not just as a student but also as an individual. In line with this celebration, activities were made for the GMCians.'
  ],
  'academics' => [
    'title' => 'Academics - Golden Minds',
    'description' => 'Description for Events page goes here.'
  ],
  'news' => [
    'title' => 'News - Golden Minds',
    'description' => 'Description for News page goes here.'
  ],
  'announcements' => [
    'title' => 'Announcements - Golden Minds',
    'description' => 'Description for Announcements page goes here.'
  ],
  'events' => [
    'title' => 'Events - Golden Minds',
    'description' => 'Description for Events page goes here.'
  ],
  'gallery' => [
    'title' => 'Gallery - Golden Minds',
    'description' => 'Description for Events page goes here.'
  ],
  'about' => [
    'title' => 'About - Golden Minds',
    'description' => 'Description for Events page goes here.'
  ],
  'contact' => [
    'title' => 'Contact - Golden Minds',
    'description' => 'Description for Events page goes here.'
  ],
  'registration' => [
    'title' => 'Student Registration Form - Golden Minds',
    'description' => 'Golden Minds Colleges Online Enrollment or Application - Senior High School. Be future ready, Be GMCians.'
  ],

];

$pageTitle = '404 NOT FOUND'; // Default title for unmatched routes
$pageDescription = ''; // Default description for unmatched routes

foreach ($metaData as $route => $data) {
  if (strpos($routes, $route) !== false) {
    $pageTitle = $data['title'];
    $pageDescription = $data['description'];
    break;
  }
}
?>

<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<head>
  <title><?= $pageTitle; ?></title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0"/>
  <meta name="robots" content="index, follow">
  <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1"/>
  <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1"/>

  <!-- Open Graph Meta Tags -->
  <meta property="og:url" content="http://goldenmindsbulacan.com/" />
  <meta property="og:site_name" content="Golden Minds Bulacan"/>
  <meta property="og:locale" content="en_US">
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?= $pageTitle; ?>" />
  <meta property="og:description" content="<?= $pageDescription; ?>" />
  <meta property="og:image" content="http://localhost/public_html/public/resources/images/goldenminds.PNG" />

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/png" sizes="16x16" href="http://localhost/public_html/public/resources/images/general/gmc/gmc.favicon.png" />
  <!-- Icons -->
  <link href="http://localhost/public_html/public/assets/libs/fontawesome/css/all.min.css" rel="stylesheet" type="text/css"/>
  <!-- Jquery file -->
  <script src="http://localhost/public_html/public/assets/libs/jquery/jquery-3.7.0.min.js" ></script>
  <!-- Bootstrap file -->
  <script src="http://localhost/public_html/public/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
  <link href="http://localhost/public_html/public/assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- Sweetalert -->
  <script src="http://localhost/public_html/public/assets/plugins/sweetalert2/sweetalert2@11.min.js"></script>
  <!-- Animate -->
  <script src="http://localhost/public_html/public/assets/plugins/animate/js/preloader.js"></script>
  <link href="http://localhost/public_html/public/assets/plugins/animate/css/preloader.css" rel="stylesheet"/>
  <script src="http://localhost/public_html/public/assets/plugins/animate/js/wow.min.js"></script>
  <link href="http://localhost/public_html/public/assets/plugins/animate/css/animate.css" rel="stylesheet"/>

  <!-- Custom style-->
  <link defer href="http://localhost/public_html/public/custom/css/front/main.css" rel="stylesheet" media="all"/>
  <!-- <link defer href="http://localhost/public_html/public/custom/css/front/main.min.css" rel="stylesheet" media="all"/> -->

  <!-- Global Site Tag (gtag.js) - Google Analytics -->
<!--   <script async src="https://www.googletagmanager.com/gtag/js?id=UA-106468860-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments)};
    gtag('js', new Date());

    gtag('config', 'UA-106468860-1');
  </script> -->
</head>
<body>


