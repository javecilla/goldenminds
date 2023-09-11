<?php
require_once __DIR__ . '/../src/vendor/autoload.php';

use App\Models\CMS\Events;
use App\Viewers\CMS\ManagementView;
use App\Controllers\CMS\Management;

//check http request via GET
$page_no = isset($_GET['page_no']) && $_GET['page_no'] !== "" ? $_GET['page_no'] : 1;
$searchQuery = isset($_GET['search']) && $_GET['search'] !== "" ? $_GET['search'] : "";
$id = isset($_GET['id']) && $_GET['id'] !== "" ? $_GET['id'] : "";

$total_records_per_page = 4; 
$offset = ($page_no - 1) * $total_records_per_page; 
$previous_page = $page_no - 1; 
$next_page = $page_no + 1; 

$dataSet = [
  'perpage' => $total_records_per_page,
  'offset' => $offset,
  'search' => $searchQuery
];

$result = Management::requestOperation(new Events(), 'read', 'events', $dataSet);
$response = ManagementView::getDataThisEvents($id); 

?>

 <section id="events" class="mt-4">
        <div class="container">
          
          <div id="events_dataid">

            <?php
              if(isset($_GET['id']) && $_GET['id'] !== '')
              {
                if($response !== null)
                {
                  $formattedDateUploaded = date('F j, Y', strtotime($response['events_date_uploaded']));
                  ?>
                    <div class="header_border_left mb-3" >
                      <span class="header_text" >&nbsp;HIGHLIGTHS EVENTS</span>
                    </div>
                    <div class="card mb-3 highlight_news_card">
                      <div class="row g-0">
                        <div class="col-md-7">
                          <img src="/src/storage/uploads/cms/events/<?= $response['events_imgname'] . '.' . $response['events_imgext'];?>" class="img-fluid rounded-start highlight_news_img" style=""/>
                        </div>
                        <div class="col-md-5">
                          <div class="card-body">
                            <h5>
                              <strong class="highlight_news_date"><?=$formattedDateUploaded?></strong>
                              <button type="button" id="copyLinkButton" class="copyLinkButton float-end mb-2">
                                <i class="fa-solid fa-copy copyIcon"></i>
                                <i class="fa-solid fa-check checkIcon hideIcon"></i>&nbsp;
                                <span class="copytext">Copy Link</span>
                              </button>
                            </h5><hr/>
                            <span class="highlight_news_title">
                              <strong><?=stripcslashes($response['events_title'])?></strong>
                            </span>
                              
                            <p class="highlight_news_desc"><?=stripcslashes($response['events_desc'])?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php
                }
              }
            ?>
          </div>
          <div class="header_border_left mb-3" >
            <span class="header_text" >&nbsp;ARCHIEVES EVENTS</span>
          </div>
          <div class="row">
            <?php
              foreach($result['allDataPagination'] as $row) 
              {
                $formattedDate = date('F j, Y', strtotime($row['events_date_uploaded']));
                ?>
                  <div class="col-xs-8 col-sm-4 col-md-4 mb-2">
                    <div class="events wow fadeInUp">
                      <a href="/events/?id=<?= $row['events_id'] ?>/<?= urlencode(str_replace(' ', '-', strtolower($row['events_title']))) ?>/" class="card_href">
                        <div class="events_card card">
                          <img src="/src/storage/uploads/cms/events/<?= $row['events_imgname'] . '.' . $row['events_imgext'];?>"
                            class="img-responsive news_image card-img-top" width="100" height="190"
                          />
                          <div class="card-body news_content">
                            <span class="badge mb-2 events_date"><?=$formattedDate?></span>
                            <h6 class="events_title mb-1">
                              <?=$row['events_title']?>
                            </h6>
                            <p class="events_desc"><?=$row['events_desc']?></p>
                          </div>
                        </div>
                      </a> 
                    </div>
                  </div>
                <?php
              }
            ?>
          </div>
          <!-- PAGINATION START -->
          <nav id="events_pagination" aria-label="Page navigation" class="mb-2">
            <ul class="pagination">
              <!-- prev button -->
              <li class="page-item">
                <a class="page-link <?= ($page_no <= 1) ? 'disabled' : ''; ?>" 
                  <?= ($page_no >= 1) ? 'href=/events/?page_no='.$previous_page : ''; ?>>Previous
                </a>
              </li>
              <?php
                $total_records = $result['totalRecords'];
                $total_no_of_pages = ceil($total_records / $total_records_per_page);
                $max_pages = 5;
                $starting_page = max(1, $page_no - floor($max_pages / 2));
                $ending_page = min($starting_page + $max_pages - 1, $total_no_of_pages);
                $starting_page = max(1, $ending_page - $max_pages + 1);
                if ($starting_page > 1) {
                  echo '<li class="page-item"><a class="page-link">...</a></li>';
                }
                for ($page = $starting_page; $page <= $ending_page; $page++) {
                  ?>
                    <li class="page-item">
                      <a class="page-link <?= ($page_no == $page) ? 'active' : ''; ?>" 
                        href="/events/?page_no=<?= $page; ?>"><?= $page; ?>
                      </a>
                     </li> 
                  <?php
                }
                if ($ending_page < $total_no_of_pages) {
                  echo '<li class="page-item"><a class="page-link">...</a></li>';
                }
              ?>
              <!-- next button -->
              <li class="page-item">
                <a class="page-link <?= ($page_no >= $total_no_of_pages) ? 'disabled' : ''; ?>" 
                  <?= ($page_no < $total_no_of_pages) ? 'href=/events/?page_no='.$next_page : ''; ?>>Next
                </a>
              </li>
            </ul>     
          </nav>
        </div>
      </section>