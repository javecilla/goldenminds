<?php
require_once __DIR__ . '/../src/vendor/autoload.php';

use App\Models\CMS\Announcements;
use App\Viewers\CMS\ManagementView;
use App\Controllers\CMS\Management;

//check http request via GET
$page_no = isset($_GET['page_no']) && !empty($_GET['page_no']) ? $_GET['page_no'] : 1;
$searchQuery = isset($_GET['search']) && !empty($_GET['search']) ? $_GET['search'] : "";
$id = isset($_GET['id']) && !empty($_GET['id']) ? $_GET['id'] : "";

$total_records_per_page = 4; 
$offset = ($page_no - 1) * $total_records_per_page; 
$previous_page = $page_no - 1; 
$next_page = $page_no + 1; 

$dataSet = [
  'perpage' => $total_records_per_page,
  'offset' => $offset,
  'search' => $searchQuery
];

$result = Management::requestOperation(new Announcements(), 'read', 'announcements', $dataSet);
$response = ManagementView::getDataThisAnnouncement($id); 
?>
<section class="announcements mt-4" >
  <div class="container">
    <div class="input-group">
      <input type="search" class="form-control search" placeholder="Search GoldenMinds Announcements..." 
        value="<?= isset($_GET['search']) ? $_GET['search'] : ''; ?>" 
      />
      <button type="button" class="input-group-text"
        onclick="searchData('announcements')"><i class="fa-solid fa-magnifying-glass"></i>&nbsp;Search
      </button>
    </div><br/>
    <div id="announce_check">
      <?php
        if(isset($_GET['id']) && !empty($_GET['id'])) 
        {
          if($response !== null)
          {
            $formattedDateUploaded = date('F j, Y', strtotime($response['announce_date_uploaded']));
            ?>
              <div id="announcements_id"> 
                <div class="header_border_left mb-3">
                  <span class="header_text">&nbsp;HIGHLIGHT NEWS</span>
                </div>
                <div class="card mb-3 highlight_announcement_card">
                  <div class="row g-0">
                    <div class="col-md-7">
                      <img src="/src/storage/uploads/cms/announcements/<?= $response['announce_imgname'] . '.' . $response['announce_imgext'];?>" class="img-fluid rounded-start highlight_announcement_img" 
                      />
                    </div>
                    <div class="col-md-5">
                      <div class="card-body">
                        <h5>
                          <strong class="highlight_announcement_date"><?=$formattedDateUploaded?></strong>
                          <button type="button" id="copyLinkButton" class="copyLinkButton float-end mb-2">
                            <i class="fa-solid fa-copy copyIcon"></i>
                            <i class="fa-solid fa-check checkIcon hideIcon"></i>&nbsp;
                            <span class="copytext">Copy Link</span>
                          </button>
                        </h5><hr/>
                        <span class="highlight_announcement_title">
                          <strong><?=stripcslashes($response['announce_title'])?>:</strong> 
                        </span>
                        <p class="highlight_announcement_desc"><?=stripcslashes($response['announce_desc'])?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php
          }
        }
      ?>
    </div><br/>
    <div class="datalist">
      <div class="row">
        <div id="latest_announcements" class="col-md-4">
          <div class="header_border_left mb-3">
            <span class="header_text">&nbsp;PIN ANNOUNCEMENT</span>
          </div>
          <div class="row">
            <?php
              foreach($result['pinData'] as $row):
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
          </div>
        </div><!--end first column-->
        <!--start second col-->
        <div id="more_announcements" class="col-md-8" >
          <div class="header_border_left mb-3">
             <span class="header_text">&nbsp;MORE ANNOUNCEMENT</span>
          </div>
          <div class="row">
            <?php
              $data = (isset($_GET['search']) && !empty($_GET['search'])) ? $result['dataBySearch'] : $result['allDataPagination'];
              foreach ($data as $row):
                $formattedDate = date('F j, Y', strtotime($row['announce_date_uploaded']));
                ?>
                  <div class="col-md-6 col-sm-3 col-xs-6 mb-2">
                    <div class="wow fadeInUp">
                      <div class="accordion" id="accordion_announce<?= $row['announce_id'] ?>">
                        <div class="accordion-item card more_announcements_card">
                          <h6 class="accordion-header" id="headingAnnouncement">
                            <img src="/src/storage/uploads/cms/announcements/<?= $row['announce_imgname'] . '.' . $row['announce_imgext'];?>" 
                              aria-expanded="true"
                              data-bs-target="#announce_desc_collapse<?= $row['announce_id'] ?>"
                              data-bs-toggle="collapse" 
                              class="card-img-top more_announcements_img" 
                            />
                          </h6>
                          <div class="card-body">
                            <span class="more_announcement_date"><?=$formattedDate?></span>
                            <h6 class="mt-2 more_announcement_title"><?= stripcslashes($row['announce_title'])?></h6>
                          </div>
                          <div class="accordion-collapse collapse"  
                            id="announce_desc_collapse<?= $row['announce_id'] ?>" 
                            aria-labelledby="headingAnnouncement" 
                            data-bs-parent="#accordion_announce<?= $row['announce_id'] ?>">
                            <div class="accordion-body">
                              <p class="more_announcement_desc">
                                <?= stripcslashes($row['announce_desc']) ?> 
                                <a href="/announcements/?id=<?= $row['announce_id'] ?>/<?= urlencode(str_replace(' ', '-', strtolower($row['announce_title']))) ?>/" class="more_link">
                                  View this Announcements
                                </a>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
              endforeach;
            ?>
          </div>
          <nav id="announcements_pagination" aria-label="Page navigation" class="mb-2">
            <ul class="pagination">
              <!-- prev button -->
              <li class="page-item">
                <a class="page-link <?= ($page_no <= 1) ? 'disabled' : ''; ?>" 
                  <?= ($page_no >= 1) ? 'href=/announcements/?page_no='.$previous_page : ''; ?>>Previous
                </a>
              </li>
              <?php
                $total_records = $result['totalRecords'];
                $total_no_of_pages = ceil($total_records / $total_records_per_page);
                $max_pages = 5;
                $starting_page = max(1, $page_no - floor($max_pages / 2));
                $ending_page = min($starting_page + $max_pages - 1, $total_no_of_pages);
                $starting_page = max(1, $ending_page - $max_pages + 1);
                echo ($starting_page > 1) ? '<li class="page-item"><a class="page-link">...</a></li>' : '';             
                //Loop through the pages
                for($page = $starting_page; $page <= $ending_page; $page++) {
                  ?>
                    <li class="page-item">
                      <a class="page-link <?= ($page_no == $page) ? 'active' : ''; ?>" 
                        href="/announcements/?page_no=<?= $page; ?>"><?= $page; ?>
                      </a>
                    </li> 
                  <?php
                }
                //add ellipsis if there are more pages after the ending page
                echo ($ending_page < $total_no_of_pages) ? '<li class="page-item"><a class="page-link">...</a></li>' : '';
              ?>
              <!-- next button -->
              <li class="page-item">
                <a class="page-link <?= ($page_no >= $total_no_of_pages) ? 'disabled' : ''; ?>" 
                  <?= ($page_no < $total_no_of_pages) ? 'href=/announcements/?page_no='.$next_page : ''; ?>>Next
                </a>
              </li>
            </ul>     
          </nav>
        </div><!--end second col | announcement-->
      </div><!--end row-->
    </div>
  </div>
</section>
<script src="/public/custom/scripts/functions.js"></script>