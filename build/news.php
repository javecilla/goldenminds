
<?php
require_once __DIR__ . '/../src/vendor/autoload.php';

use App\Models\CMS\News;
use App\Viewers\CMS\ManagementView;
use App\Controllers\CMS\Management;

//check http request via GET
$page_no = isset($_GET['page_no']) && !empty($_GET['page_no']) ? $_GET['page_no'] : 1;
$searchQuery = isset($_GET['search']) && !empty($_GET['search']) ? $_GET['search'] : "";
$id = isset($_GET['id']) && !empty($_GET['id']) ? $_GET['id'] : "";

$total_records_per_page = 4; //total data rows or records to display
$offset = ($page_no - 1) * $total_records_per_page; 
$previous_page = $page_no - 1; //previous page 
$next_page = $page_no + 1; //next page

$dataSet = [
  'perpage' => $total_records_per_page,
  'offset' => $offset,
  'search' => $searchQuery
];


$result = Management::requestOperation(new News(), 'read', 'news', $dataSet);
$response = ManagementView::getDataThisNews($id);

?>

<section id="news" class="mt-4">
  <div class="container">
    <div class="input-group">
      <input class="form-control search"
        type="search" 
        placeholder="Search GoldenMinds News..." 
        value="<?= isset($_GET['search']) ? $_GET['search'] : ''; ?>" 
      />
      <button class="input-group-text"
        type="button"
        onclick="searchData('news')"><i class="fa-solid fa-magnifying-glass"></i>&nbsp;Search
      </button>
    </div><br/>
    <?php
      if(isset($_GET['id']) && !empty($_GET['id']))
      {
        if($response !== null)
        {
          $formattedDateUploaded = date('F j, Y', strtotime($response['news_date_uploaded']));
          ?>
            <div id="news_id"> 
              <div class="header_border_left mb-3">
                <span class="header_text">&nbsp;HIGHLIGHT NEWS</span>
              </div>
              <div class="card mb-3 highlight_news_card">
                <div class="row g-0">
                  <div class="col-md-7">
                    <img src="/src/storage/uploads/cms/news/<?= $response['news_imgname'] . '.' . $response['news_imgext'];?>" class="img-fluid rounded-start highlight_news_img" 
                    />
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
                        <strong>
                          <?=stripcslashes($response['news_subj'])?>:<?=stripcslashes($response['news_title'])?> 
                        </strong>
                      </span>
                      <p class="highlight_news_desc"><?=stripcslashes($response['news_desc'])?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php
        }
      }
    ?>
    <div id="news_list">
      <div class="row">
        <div class="col-md-4">
          <div class="header_border_left mb-3">
            <span class="header_text">&nbsp;PIN NEWS</span>
          </div>
          <div id="pin_news">
            <div class="row">
              <?php
                foreach ($result['filteredData'] as $row):
                  $formattedDate = date('F j, Y', strtotime($row['news_date_uploaded']));
                  ?>
                    <div class="col-md-12 col-sm-6 col-xs-12 mb-3">
                      <div class="wow fadeInUp">
                        <a href="/news/?id=<?= $row['news_id'] ?>/<?= urlencode(str_replace(' ', '-', strtolower($row['news_title']))) ?>" class="card_href">
                          <div class="pin_news_card card">
                            <div class="card-body">
                              <small class="mb-1 pin_news_date"><?=$formattedDate?></small><br/>    
                              <p class="pin_news_title "><?=$row['news_title']?></p>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                  <?php
                endforeach; 
              ?>
            </div>
          </div>    
        </div>
        <div class="col-md-8">
          <div id="more_news">
            <div class="header_border_left mb-3">
              <span class="header_text">&nbsp;MORE NEWS</span>
            </div>
            <div class="row">
              <?php
                $data = (isset($_GET['search']) && !empty($_GET['search'])) ? $result['searchData'] : $result['data'];
                foreach($data as $row):
                  $formattedDate = date('F j, Y', strtotime($row['news_date_uploaded']));
                  ?>
                    <div class="col-12 mb-3">
                      <div class="wow fadeInUp">
                        <a href="/news/?id=<?= $row['news_id'] ?>/<?= urlencode(str_replace(' ', '-', strtolower($row['news_title']))) ?>" class="card_href">
                          <div class="card ls_news_card">
                            <div class="row g-0">
                              <div class="col-md-4">
                                <img src="/src/storage/uploads/cms/news/<?= $row['news_imgname'] . '.' . $row['news_imgext'];?>" class="img-fluid rounded-start img-responsive" 
                                />
                              </div>
                              <div class="col-md-8">
                                <div class="card-body">
                                  <h5 class="card-title ls_card_title">
                                    <strong><?=stripcslashes($row['news_subj'])?>:&nbsp;</strong>
                                    <?= stripcslashes($row['news_title'])?>
                                  </h5>
                                  <p class="card-text text-muted desc_card">
                                    <small class="text-body-secondary"><?=stripcslashes($row['news_desc'])?></small>
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                  <?php
                endforeach;
              ?>
            </div><hr/>
            <nav id="news_pagination" aria-label="Page navigation" class="mb-3">
              <ul class="pagination">
                <!-- prev button -->
                <li class="page-item">
                  <a class="page-link <?= ($page_no <= 1) ? 'disabled' : ''; ?>" 
                    <?= ($page_no >= 1) ? 'href=/news/?page_no='.$previous_page : ''; ?>>Previous
                  </a>
                </li>
                <?php
                  $total_records = $result['total_records'];
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
                          href="/news/?page_no=<?= $page; ?>"><?= $page; ?>
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
                    <?= ($page_no < $total_no_of_pages) ? 'href=/news/?page_no='.$next_page : ''; ?>>Next
                  </a>
                </li>
              </ul>     
            </nav>

          </div> <!--end news-->
        </div>
      </div><!--end outer row-->
    </div><!--end news list-->
  </div><!--end container-->
</section>

<script src="/public/custom/scripts/functions.js"></script>