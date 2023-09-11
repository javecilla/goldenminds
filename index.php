<?php
/**
 * Wag mag change or mag modified ng kahit ano mang codes dito 
 * kung hindi alam how this router works, mainam na kumontak sakin
 * @link https://javecilla.vercel.app/
 * @link https://github.com/javecilla/
 * @link https://www.facebook.com/jerome.avecilla.24/
 */
require_once __DIR__ . '/src/vendor/autoload.php';

use App\Route;

/**
 * Routes for Content Management System as Admin Side -> 
 * @link https://www.goldenmindsbulacan.com/cms/
 */

#NOTE: under development this cms
Route::GET('AS', '/cms/dashboard/', './build/cms-dashboard.php');


/**
 * Routes for Client Side -> 
 * @link https://www.goldenmindsbulacan.com/
 */
Route::GET('CS', '/', './build/home.php');

Route::GET('CS', '/academics/senior-high-school/', './build/academics-shs.php');
Route::GET('CS', '/academics/senior-high-school/strands-offered/', './build/academics-shs-strands.php');
Route::GET('CS', '/academics/senior-high-school/curriculum/', './build/academics-shs-curriculum.php');
Route::GET('CS', '/academics/senior-high-school/admission-requirements/', './build/academics-shs-admission-requirements.php');
Route::GET('CS', '/academics/basic-education/', './build/academics-basic-education.php');

Route::GET('CS', '/news/', './build/news.php');
Route::GET('CS', '/announcements/', './build/announcements.php');
Route::GET('CS', '/events/', './build/events.php');
Route::GET('CS', '/gallery/', './build/gallery.php');

Route::GET('CS', '/about/history/', './build/about-history.php');
Route::GET('CS', '/about/school-seal/', './build/about-seal.php');
Route::GET('CS', '/about/school-hymn/', './build/about-hymn.php');
Route::GET('CS', '/about/mission-vission/', './build/about-mission-vission.php');
Route::GET('CS', '/about/goldenminds-calendar/', './build/about-goldenminds-calendar.php');
Route::GET('CS', '/about/administration/', './build/about-administration.php');
Route::GET('CS', '/about/faculty-staff/', './build/about-faculty-staff.php');
Route::GET('CS', '/about/student-life/', './build/about-student-life.php');
Route::GET('CS', '/about/research-development-extension/', './build/about-research-development.php');

Route::GET('CS', '/contact/sta-maria-campus/', './build/contact-sta-maria.php');
Route::GET('CS', '/contact/balagtas-campus/', './build/contact-balagtas.php');
Route::GET('CS', '/contact/guiginto-campus/', './build/contact-guiginto.php');
