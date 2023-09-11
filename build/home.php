<?php
require_once __DIR__ . '/../src/vendor/autoload.php';

use App\Models\CMS\{News, Announcements, Events};
use App\Viewers\CMS\ManagementView;

$allowed = ['status' => 1, 'visibility' => 1];

?>
<!-- Start hero section-->  
<!-- <section id="goldenminds_hero"  >
  <img decoding="async" src="/public/resources/images/general/gmc/test3.PNG" class="card-img-top w-100" />
</section> -->
<section id="goldenminds_hero"  >
  <div id="hero_carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item">
        <img decoding="async" src="/public/resources/images/slider/hero/aim.PNG" class="card-img-top w-100" />
      </div>
      <div class="carousel-item">
        <img decoding="async" src="/public/resources/images/slider/hero/offers2.PNG" class="card-img-top w-100" />
      </div>
      <div class="carousel-item active">
        <img decoding="async" src="/public/resources/images/slider/hero/enrolment6.PNG" class="card-img-top w-100"/>
      </div>   
      <button class="carousel-control-prev" 
        type="button" 
        data-bs-target="#hero_carousel" 
        data-bs-slide="prev"><i class="fa-solid fa-chevron-left btnIcon_carousel"></i>
      </button>
      <button class="carousel-control-next" 
        type="button" 
        data-bs-target="#hero_carousel" 
        data-bs-slide="next"><i class="fa-solid fa-chevron-right btnIcon_carousel"></i>
      </button>
    </div>
  </div> 
</section>      
<!-- end hero section-->

<!-- start offers -->
<section id="goldenminds_offers" class="mt-2">
  <div class="container mb-3">
    <center>
      <div class=" mb-4">
        <span class="header_text">WHAT WE OFFER</span>
        <div class="header_bottom"></div>
      </div> 
    </center>
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-6 mb-2">
        <div class="card p-3 card_wwoffers">
          <center>
            <div class="card-body">
              <i class="fa-solid fa-gem icons_wwoffers"></i>
              <h5 class="card-title">Quality Education</h5>
              <p>Golden Minds delivers quality education with its students.</p>
            </div>
          </center>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-6 mb-3 mb-2">
        <div class="card p-3 card_wwoffers">
          <center>
            <div class="card-body">
              <i class="fa-solid fa-users icons_wwoffers"></i>
              <h5 class="card-title">Competent Faculty</h5>
              <p>Golden Minds provides qualified and competent faculty.</p>
            </div>
          </center>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-6 mb-2">
        <div class="card p-3 card_wwoffers wow fadeInUp">
          <center>
            <div class="card-body">
              <i class="fa-solid fa-building icons_wwoffers"></i>
              <h5 class="card-title">Competitive Facilities</h5>
              <p>Golden Minds offers competitive facilities in the region.</p>
            </div>
          </center>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-6 mb-2">
        <div class="card p-3 card_wwoffers wow fadeInUp"> 
          <center>
            <div class="card-body">
              <i class="fa fa-map icons_wwoffers"></i>
              <h5 class="card-title">Accessible Location</h5>
              <p>The location of Golden Minds is more accessible.</p>
            </div>
          </center>
        </div>
      </div>
    </div>          
  </div>
</section><br/>
<!-- end offers -->

<!-- Start section for announcementss and news -->
<section id="diff_contents">
  <div class="container">
    <div class="row">
      <div class="col-md-8"><!-- start first col -->
        <!--start News-->
        <div class="header_border_left mb-3">
          <span class="header_text">&nbsp;NEWS</span>
        </div>
        <div class="row">
          <?php
            $newsData = ManagementView::getAllData(new News(), $allowed);
            foreach($newsData as $row):
              $formattedDate = date('F j, Y', strtotime($row['news_date_uploaded']));
              ?>
                <div class="col-xs-12 col-sm-6 col-md-6 mb-2">
                  <div class="news wow fadeInUp">
                    <a href="/news/?id=<?= $row['news_id'] ?>/<?= urlencode(str_replace(' ', '-', strtolower($row['news_title']))) ?>/" class="card_href">
                      <div class="news_card card">
                        <img src="/src/storage/uploads/cms/news/<?= $row['news_imgname'] . '.' . $row['news_imgext'];?>"width="100" height="190" class="img-responsive news_image bd-placeholder-img card-img-top"  
                        />
                        <div class="card-body news_content">
                          <span class="badge mb-2 news_date_badge"><?=$formattedDate?></span>
                          <h6 class="news_title mb-1"><?=$row['news_title']?></h6>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              <?php
            endforeach; 
          ?>    
          <div class="read_more mb-3">
            <div class="row">
              <div class="col-md-12">
                <a href="/news/" class="btn float-end btn_more">View More News 
                  <i class="fa fa-chevron-right fa-fw"></i>
                </a>
              </div>
            </div>
          </div>
        </div><!--end News-->
              
        <!--start Events-->
        <div class="header_border_left mb-3">
          <span class="header_text">&nbsp;EVENTS</span>
        </div>
        <div class="row">
          <?php
            $eventData = ManagementView::getAllData(new Events(), $allowed);
            foreach($eventData as $row):
              $formattedDate = date('F j, Y', strtotime($row['events_date_uploaded']));
              ?>
                <div class="col-xs-12 col-sm-6 col-md-6 mb-2">
                  <div class="events wow fadeInUp">
                    <a href="/events/?id=<?= $row['events_id'] ?>/<?= urlencode(str_replace(' ', '-', strtolower($row['events_title']))) ?>/" class="card_href">
                      <div class="events_card_home card">
                        <img src="/src/storage/uploads/cms/events/<?= $row['events_imgname'] . '.' . $row['events_imgext'];?>" class="img-responsive  card-img-top" width="100" height="190"
                        />
                        <div class="card-body news_content">
                          <span class="badge mb-2 events_date_home"><?=$formattedDate?></span>
                          <h6 class="events_title mb-1"><?=$row['events_title']?></h6>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              <?php
            endforeach; 
          ?>
          <div class="read_more mb-2">
            <div class="row">
              <div class="col-md-12">
                <a href="/events/" class="btn float-end btn_more">View News
                  <i class="fa fa-chevron-right fa-fw"></i>
                </a>
              </div>
            </div>
          </div>
        </div><!--end Events-->
      </div><!--end first column-->

      <div class="col-md-4"><!--start second col-->
        <!--start announcements-->
        <div class="header_border_left mb-3">
          <span class="header_text">&nbsp;ANNOUNCEMENTS</span>
        </div>
        <div class="row">
          <?php
            $announcementsData = ManagementView::getAllData(new Announcements(), $allowed);
            foreach($announcementsData as $row):
              $formattedDate = date('F j, Y', strtotime($row['announce_date_uploaded']));
              ?>
                <div class="col-md-12 col-sm-6 col-xs-12 mb-2">
                   <div class="wow fadeInUp">
                    <a href="/announcements/?id=<?= $row['announce_id'] ?>/<?= urlencode(str_replace(' ', '-', strtolower($row['announce_title']))) ?>/" class="card_href">
                      <div class="pin_announcement_card card">
                        <div class="card-body">
                          <small class="mb-1 pin_announcement_date"><?=$formattedDate?></small><br/>    
                          <p class="pin_announcement_title "><?=$row['announce_title']?></p>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              <?php
            endforeach;
          ?>
          <div class="read_more">
            <div class="row">
              <div class="col-md-12 mt-1">
                <a href="/announcements/" class="btn float-end btn_more">View More 
                  <i class="fa fa-chevron-right fa-fw"></i>
                </a>
              </div>
            </div>
          </div>
        </div><!--end announcements-->
      </div><!--end second column-->
    </div><!--end row-->
  </div><!--end container-->
</section>
<!-- end section for diff_contents -->

<!-- start calendar -->
<section id="calendar">
  <div class="container mt-3">
    <center>
      <div class="mb-4">
        <span class="header_text">GoldenMinds CALENDAR</span>
        <div class="header_bottom"></div>
      </div> 
    </center>
    <div class="row">
      <div class="col-md-3 col-sm-6 wow fadeInUp">
        <center class="mb-3">
          <div class="calendar_border">
            <h4 class="month_calendar">JUL</h4>
            <h1><strong>01</strong></h1>
          </div>
          <small class="calendar_description">Enrollment Period</small>
        </center>
      </div>
      <div class="col-md-3 col-sm-6 wow fadeInUp">
        <center class="mb-3">
          <div class="calendar_border center-block">
            <h4 class="month_calendar">AUG</h4>
            <h1><strong>08</strong></h1>
          </div>
          <small class="calendar_description">Classes Begin</small>
        </center>
      </div>
      <div class="col-md-3 col-sm-6 wow fadeInUp">
        <center class="mb-3">  
          <div class="calendar_border">
            <h4 class="month_calendar">AUG</h4>
            <h1><strong>09</strong></h1>
          </div>
          <small class="calendar_description">Freshies Day</small>
        </center>
      </div>
      <div class="col-md-3 col-sm-6 wow fadeInUp">
        <center class="mb-3">  
          <div class="calendar_border">
            <h4 class="month_calendar">AUG</h4>
            <h1><strong>05</strong></h1>
          </div>
          <small class="calendar_description">Bulacan Foundation Day</small>
        </center>
      </div>
    </div>
    <div class="read_more mb-3">
      <div class="row">
        <div class="col-md-12 mt-1">
          <a href="/about/goldenminds-calendar/" class="btn float-end btn_more">View Full Calendar 
            <i class="fa fa-chevron-right fa-fw"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end calendar -->

<!-- start section for events and calendar -->
<section id="affliations" class="mt-3">
  <div class="container">
    <center>
      <div class=" mb-4">
        <span class="header_text">AFFILIATIONS</span>
        <div class="header_bottom"></div>
      </div> 
    </center>
    <div class="row">
      <div class="col-md-12 mb-2">
        <div align="center">
          <span>
            <img src="/public/resources/images/general/depedLogo.png" class="zoom" 
              data-toggle="tooltip" 
              data-placement="bottom" 
              title="Department of Education (DepEd)"
            />
          </span>
          <!--<span>
            <img src="/public/resources/images/general/chedLogo.png" class="zoom"
              data-toggle="tooltip" 
              data-placement="top" 
              title="Technical Education and Skills Development Authority (TESDA)"
            />
          </span> -->
          <span>
            <img src="/public/resources/images/general/tesdaLogo.png" class="zoom" 
              data-toggle="tooltip" 
              data-placement="top" 
              title="Technical Education and Skills Development Authority (TESDA)"
            />
          </span>   
        </div>
      </div><!--end col-->
    </div>
  </div><!--end container-->
</section>
<!-- end section for events and calendar -->