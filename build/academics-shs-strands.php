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
          <span class="header_text">&nbsp;<strong>Senior High School Strands Offered</strong></span>
        </div>
       	<span>
       		Be college-ready with the knowledge, training, and preparation to pursue a degree, start a business, or gain employment.
       	</span><hr/>
        <div class="wow fadeIn">
	  			<div class="card">
					  <div class="card-header academics_card_header"><strong>Academic Track</strong></div>
					  	<div class="card-body">
								<div class="accordion accordion-flush" id="academicStrand">
						 			<div class="accordion-item">
										<h2 class="accordion-header">
											<button class="accordion-button collapsed" 
												type="button" 
												data-bs-toggle="collapse" 
												data-bs-target="#stemAccordion" 
												aria-expanded="false" 
												aria-controls="stemAccordion">
												  Science, Technology, Engineering, and Mathematics (STEM)
											</button>
										</h2>
						    		<div id="stemAccordion" class="accordion-collapse collapse" data-bs-parent="#academicStrand">
						      		<div class="accordion-body">
											  <div class="card accordion_card">
													<div class="row g-0">
														<div class="col-md-4">
															<img src="/public/resources/images/general/strands/stem/stem_logo.png" 
															 	class="img-fluid rounded-start"
															/>
														</div>
														<div class="col-md-8">
															<div class="card-body">
															  <p class="card-text">
															    <strong>STEM</strong> stands for <strong>Science, Technology, Engineering, and Mathematics</strong> strand. Through the STEM strand, senior high school students are exposed to complex mathematical and science theories and concepts which will serve as a foundation for their college courses.
															  </p>
															</div>
														</div>
													</div>
												</div>
										  </div>
										</div>
						  		</div><!--end stem accordion -->
						 			<div class="accordion-item">
										<h2 class="accordion-header">
											<button class="accordion-button collapsed" 
												type="button" 
												data-bs-toggle="collapse" 
												data-bs-target="#humssAccordion" 
												aria-expanded="false" 
												aria-controls="humssAccordion">
											    Humanities and Social Science (HUMSS)
											</button>
										</h2>
						    		<div id="humssAccordion" class="accordion-collapse collapse" data-bs-parent="#academicStrand">
						      		<div class="accordion-body">
												<div class="card accordion_card">
													<div class="row g-0">
														<div class="col-md-4">
															<img src="/public/resources/images/general/strands/humss/humss_logo.png" 
																class="img-fluid rounded-start"
															/>
														</div>
														<div class="col-md-8">
															<div class="card-body">
															  <p class="card-text">
															    <strong>The Humanities and Social Sciences (HUMSS)</strong> strand is designed for those who wonder what is on the other side of the wall. In other words, you are ready to take on the world and talk to a lot of people. This is for those who are considering taking up journalism, communication arts, liberal arts, education, and other social science-related courses in college.
															  </p>
															</div>
														</div>
													</div>
												</div>
						      		</div>
						    		</div>
						  		</div><!--end humss accordion -->
						  		<div class="accordion-item">
										<h2 class="accordion-header">
											<button class="accordion-button collapsed" 
												type="button" 
												data-bs-toggle="collapse" 
												data-bs-target="#abmAccordion" 
												aria-expanded="false" 
												aria-controls="abmAccordion">
											    Accountancy, Business, and Management (ABM)
											</button>
										</h2>
						    		<div id="abmAccordion" class="accordion-collapse collapse" data-bs-parent="#academicStrand">
						      		<div class="accordion-body">
						      			<div class="card accordion_card">
													<div class="row g-0">
														<div class="col-md-4">
															<img src="/public/resources/images/general/strands/abm/abm_logo.png" 
																class="img-fluid rounded-start"
															/>
														</div>
														<div class="col-md-8">
															<div class="card-body">
															  <p class="card-text">
															    <strong>Accountancy, Business and Management (ABM)</strong> strand would focus on the basic concepts of financial management, business management, corporate operations, and all things that are accounted for. This is definitely a suggested strand for those who have their eyes set on creating a business in the future or working in the business sector.
															  </p>
															</div>
														</div>
													</div>
												</div>
						      		</div>
						    		</div>
						  		</div><!--end abm accordion -->
						  		<div class="accordion-item">
										<h2 class="accordion-header">
											<button class="accordion-button collapsed" 
												type="button" 
												data-bs-toggle="collapse" 
												data-bs-target="#gasAccordion" 
												aria-expanded="false" 
												aria-controls="gasAccordion">
												  General Academic Strands (GAS)
											</button>
										</h2>
						    		<div id="gasAccordion" class="accordion-collapse collapse" data-bs-parent="#academicStrand">
						      		<div class="accordion-body">
						      			<div class="card accordion_card">
													<div class="row g-0">
														<div class="col-md-4">
															<img src="http://localhost/public_html/public/resources/images/general/strands/gas/gas_logo.png" class="img-fluid rounded-start"/>
														</div>
														<div class="col-md-8">
															<div class="card-body">
															  <p class="card-text">
															    <strong>General Academic Strand (GAS)</strong> is perfect for students who are still unsure about what they will take in college. Because GAS students are required to pick electives from other academic strands, they are expected to be skilled in different subjects.
															  </p>
														 	</div>
														</div>
													</div>
												</div>
						      		</div>
						    		</div>
						  		</div><!--end gas accordion -->
								</div>
						  </div>
					</div><!--end academic track card-->
				</div>
				<!-- start card for tvl track accordion -->
				<div class="wow fadeIn">
					<div class="card mt-3">
						<div class="card-header academics_card_header">
							<strong>Technical-Vocational-Livelihood Track</strong>
						</div>
					  <div class="card-body">
							<div class="accordion accordion-flush" id="tvlTrackStrand">
						  	<div class="accordion-item">
									<h2 class="accordion-header">
										<button class="accordion-button collapsed" 
											type="button" 
											data-bs-toggle="collapse" 
											data-bs-target="#ictAccordion" 
											aria-expanded="false" 
											aria-controls="ictAccordion">
											  Information and Communications Technology (ICT)
										</button>
									</h2>
						    	<div id="ictAccordion" class="accordion-collapse collapse" data-bs-parent="#tvlTrackStrand">
						      	<div class="accordion-body">
						      		<div class="card accordion_card">
	  										<div class="row g-0">
													<div class="col-md-4">
														<img src="/public/resources/images/general/strands/ict/ict_logo.png" class="img-fluid rounded-start"/>
													</div>
	    										<div class="col-md-8">
	      										<div class="card-body">
	        										<p class="card-text">
	       												<strong>Information Communication and Technology</strong> or <strong>ICT</strong> Strand is one of the strands offered under Technical-Vocational Livelihood (TVL) Track of K-12 curriculum. ICT strand subjects seek to teach students concepts and skills in information technology.<br/><br/>
																ICT in Senior High School equips students with the skills and knowledge they need to qualify for TESDA-backed certifications such as the Certificate of Competency (COC) and National Certifications (NC). These ICT strand courses ensure that TVL track graduates of the ICT strand in SHS can apply for IT jobs straight out of high school.
	      											</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div><!--end ict accordion -->
						  	<div class="accordion-item">
						    	<h2 class="accordion-header">
							      <button class="accordion-button collapsed" 
							      	type="button" 
							      	data-bs-toggle="collapse" 
							      	data-bs-target="#heAccordion" 
							      	aria-expanded="false" 
							      	aria-controls="heAccordion">
							      	 	Home Economics
							      </button>
						    	</h2>
						    	<div id="heAccordion" class="accordion-collapse collapse" data-bs-parent="#tvlTrackStrand">
						      	<div class="accordion-body">
						      		<div class="card accordion_card">
	  										<div class="row g-0">
													<div class="col-md-4">
														<img src="/public/resources/images/general/strands/he/he_logo.png" class="img-fluid rounded-start"/>
													</div>
													<div class="col-md-8">
														<div class="card-body">
															<p class="card-text">
															  While the ICT strand focuses on technology, the <strong>TVL-HE</strong> strand focuses on livelihood projects such as caregiving, cookery, bartending, baking, handicraft making, tourism, housekeeping, dressmaking, and such. This strand will greatly help students find jobs immediately. These are the HE strand specializations you will get.
															</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div><!--end he accordion -->
							</div>
						</div>
					</div><!--end tvl track card-->
				</div>
      </div><!--end column 8-->
    </div>
  </div>
</section>