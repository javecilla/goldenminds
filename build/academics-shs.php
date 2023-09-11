<?php $curi = basename($_SERVER['REQUEST_URI'], PHP_URL_PATH); ?>
<section id="shs_hero">
  <img decoding="async" src="/public/resources/images/general/gmc/test3.PNG" class="card-img-top w-100" />
</section>

<section class="shs_content">
  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-3">
        <div class="card-header academics_card_header">
          <strong>On this page</strong>
        </div>
        <div class="card">
          <ul class="list-group list-group-flush otp">
            <li>
              <a href="/academics/senior-high-school/" 
                class="list-group-item <?= $curi === 'senior-high-school' ? 'otp_link_active' : ''?>">
                <i class="fa-solid fa-chevron-right"></i>&nbsp;Ojectives
              </a>
            </li>
            <li> 
              <a href="/academics/senior-high-school/strands-offered/" 
                class="list-group-item <?= $curi === 'strands-offered' ? 'otp_link_active' : ''?>">
                <i class="fa-solid fa-chevron-right"></i>&nbsp;Strand Offered
              </a>
            </li>
            <li>
              <a href="/academics/senior-high-school/curriculum/" 
                class="list-group-item <?= $curi === 'curriculum' ? 'otp_link_active' : ''?>">
                <i class="fa-solid fa-chevron-right"></i>&nbsp;SHS Curriculum
              </a>
            </li>
            <li>
              <a href="/academics/senior-high-school/admission-requirements/" 
                class="list-group-item <?= $curi === 'admission-requirements' ? 'otp_link_active' : ''?>">
                <i class="fa-solid fa-chevron-right"></i>&nbsp;Admission Requirements
              </a>
            </li>
          </ul>
        </div>
      </div><!--end column 4-->

      <div class="col-md-8">
        <div class="academics_header_text mb-3">
          <span class="header_text">&nbsp;<strong>Senior High School Department</strong></span>
        </div>
        <span>
          The Golden Minds aim to produce graduates that are competitive in the current global trends. Develop young minds to become God-fearing, inteligent and multiskilled individuals.
        </span><hr/>
        <div class="wow fadeIn">
          <div class="card mb-3">
            <div class="card-header academics_card_header">
              <strong>Objectives</strong>
            </div>
            <div class="card-body">
              <p class="card-text">
                The Senior High School department adheres and passionately affirms and practices the Vision, Mission, and Goals of the Institution. In accordance, the subsequent are the GMC-SHS program objectives:
                <br/><br/>
                <strong><i>After 2 years students will be able to:</i></strong><br/>
                <ol>
                  <li>
                    Realize their potentials in line with entrepreneurship, health, education, social work, etc. Or in any other chosen field/profession.
                  </li>
                  <li>
                    Recognize their significance as shown by substantial contribution in the community inform of their advocacy, leadership, and profession.
                  </li>
                  <li>
                    Applies strong leadership in their chosen field as expressed by extensive output in research and other scientific studies, innovations and other significant improvements in their area/profession in terms of practice and/delivery system.
                  </li>
                  <li>
                    Develop strong sense of spirituality by actively practicing Christian values as expressed in service for humanity and in all God’s creation.
                  </li>
                </ol>
              </p>
            </div>
          </div>
        </div>
        <div class="wow fadeIn">
          <div class="card mb-3">
            <div class="card-header academics_card_header">
              <strong>SHS Program Tri-focalization</strong>
            </div>
            <div class="card-body">
              <div class="card-text">
                <ul class="li-font-awesome">
                  <li class="li-check-circle">
                    <b>Explore</b>
                    <p>
                      Refining foundational and advance affective, cognitive, and psychomotor aspect thru Research or scientific studies. Cultivating conscious exploration of interests and preference among students within their chosen field.
                    </p>
                  </li>
                </ul>
                <ul class="li-font-awesome">
                  <li class="li-check-circle">
                    <b>Apply</b>
                    <p>
                      Appertains to affective, cognitive, and psychomotor process into an applicable platform that involves substantial contribution that promotes and improve the quality and preserves the integrity of life. 
                    </p>
                  </li>
                </ul>
                <ul class="li-font-awesome">
                  <li class="li-check-circle">
                    <b>Develop</b>
                    <p>
                      Transforming academic experience into construe of becoming a relevant Christian witness who advocates faith and pursues zealously stewardship of truth.
                    </p>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div><!--end column 8-->
    </div>
  </div>
</section>