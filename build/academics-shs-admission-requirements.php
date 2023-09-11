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
          <div class="card" style="border: none">
            <ul class="list-group list-group-flush otp">
              <li>
                <a href="/academics/senior-high-school/" 
                class="list-group-item <?= $curi === 'senior-high-school' ? 'otp_link_active' : ''?>">
                <i class="fa-solid fa-chevron-right"></i>&nbsp;Ojectives</a>
              </li>
              <li> 
                <a href="/academics/senior-high-school/strands-offered/" 
                class="list-group-item <?= $curi === 'strands-offered' ? 'otp_link_active' : ''?>">
                <i class="fa-solid fa-chevron-right"></i>&nbsp;Strand Offered</a>
              </li>
              <li>
                <a href="/academics/senior-high-school/curriculum/" 
                class="list-group-item <?= $curi === 'curriculum' ? 'otp_link_active' : ''?>">
                <i class="fa-solid fa-chevron-right"></i>&nbsp;SHS Curriculum</a>
              </li>
              <li>
                <a href="/academics/senior-high-school/admission-requirements/" 
                class="list-group-item <?= $curi === 'admission-requirements' ? 'otp_link_active' : ''?>">
                <i class="fa-solid fa-chevron-right"></i>&nbsp;Admission Requirements</a>
              </li>
            </ul>
          </div>
        </div><!--end column 4-->

       <div class="col-md-8">
         			  							<div class="academics_header_text mb-3">
                	<span class="header_text">&nbsp;<strong>Senior High School Admission Requirements</strong></span>
              	</div><hr/>
              	<div class="wow fadeIn">
				  				<div class="card mb-3">
									  <div class="card-header academics_card_header">
									    <strong>Admission Requirements</strong>
									  </div>
								 	 	<div class="card-body">
								 	 		<p class="card-text">The following requirements must be submitted to the Registrar's Office before admission to any academic program:
				        				<br/><br/>
						            <strong><i>Senior High School (Incoming Grade 11)</i></strong><br/>
						            <ul>
						              <li>Original Form 138 / SF9-JHS (Learner's Progress Report Card)
						              </li>
						              <li>Original Form 137 / SF10-JHS (Learner's Permanent Academic Record)</li>
						              <li>PSA-issued Birth Certificate</li>
						            </ul>
						            <strong><i>Senior High School Transferees</i></strong><br/>
						            <ul>
						              <li>Certificate of Transfer (Honorable Dismissal)
						              </li>
						              <li>Original Form 138 / SF9-SHS</li>
						              <li>Original Form 137 / SF10-SHS (Copy for GMC)</li>
						              <li>PSA-issued Birth Certificate</li>
						            </ul>
				        			</p>
										</div>
									</div>
								</div>
								</div>
							
       </div>
  </div>
</section>
