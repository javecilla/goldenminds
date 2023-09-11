 	<style type="text/css">
 		#shs_content {
 			margin-top: 25px;
 		}

  	.btn_apply {
  		background: transparent;
  		border: 1px solid gray;
  		border-radius: 0px;
  		font-size: 17px;
  		font-weight: 550;
  	}
  	.btn_apply:hover {
  		background: #dddddd;
  		border: 0;
  	}
  	.academics_card_header {
  		background-image: linear-gradient(to right, #996515, #b4813f); 
/*  		background: #996515;*/
  		opacity: .9;
  		color: #ffffff;
  	}
  	.academics_header_text {
  		color: #996515;
  	}
  	.card-text {
  		line-height: 25px;
  		text-align: justify;
  		text-justify: inter-word;
  		opacity: 1!important;
  	}
  	ul.otp li {
  		list-style-type: none;
  	}
  	.list-group-item:hover {
  		color: #996515;
  		text-indent: 10px;
  		font-weight: 650;
  		transition: .5s all ease;
  	}
  	.otp_link_active {
  		color: #996515;
  		text-indent: 10px;
  		font-weight: 650;
  	}
  	.accordion-button:focus {
  		background: transparent;
  		opacity: .8; 
  		outline: none;
  		color: #996515;
  	}

  	.accordion-button:hover,
  	.accordion-button:active,
  	.accordion-button:visited {
  		color: #996515;
  		font-weight: bolder;
  		transition: .2s all ease;
  	}
  	.accordion_card {
  		border: none;
  		background: transparent;
  	}
  </style>

<main id="shs_content">
	<section id="shs_hero"  style="margin-top: -25px; background: #f3f3f3;">
    <img decoding="async" src="http://localhost/public_html/public/resources/images/general/gmc/test3.PNG" class="card-img-top w-100" />
    <!-- <div class="container" style=" opacity: .7; padding: 10px;">
     	<center>
      	<h5 class="card-title text-muted"><strong>Have more time for people and things you love!</strong></h5>
      	<p>Accepting DepEd voucher and ESC Grantees.</p>
      	<a href="javascript:void(0)" class="btn btn_apply">APPLY NOW</a>
      </center>
    </div> -->
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
					  		<a href="http://localhost/public_html/academics/senior-high/ojectives/" 
					  		class="list-group-item <?=!isset($_GET['otp']) || empty($_GET['otp']) || $_GET['otp'] === 'ojectives' ? 'otp_link_active' : ''?>">
					    	<i class="fa-solid fa-chevron-right"></i>&nbsp;Ojectives</a>
					  	</li>
					    <li> 
					    	<a href="http://localhost/public_html/academics/senior-high/strands-offered/" 
					    	class="list-group-item <?=isset($_GET['otp']) && !empty($_GET['otp']) && $_GET['otp'] === 'strands-offered' ? 'otp_link_active' : ''?>">
					    	<i class="fa-solid fa-chevron-right"></i>&nbsp;Strand Offered</a>
					    </li>
					    <li>
					    	<a href="http://localhost/public_html/academics/senior-high/curriculum/" 
					    	class="list-group-item <?=isset($_GET['otp']) && !empty($_GET['otp']) && $_GET['otp'] === 'curriculum' ? 'otp_link_active' : ''?>">
					    	<i class="fa-solid fa-chevron-right"></i>&nbsp;SHS Curriculum</a>
					    </li>
					    <li>
					    	<a href="http://localhost/public_html/academics/senior-high/admission-requirements/" 
					    	class="list-group-item <?=isset($_GET['otp']) && !empty($_GET['otp']) && $_GET['otp'] === 'admission-requirements' ? 'otp_link_active' : ''?>">
					    	<i class="fa-solid fa-chevron-right"></i>&nbsp;Admission Requirements</a>
					    </li>
					  </ul>
					</div>
  			</div><!--end column 4-->
  			<div class="col-md-8">
  				<?php
  				$otp = isset($_GET['otp']) && !empty($_GET['otp']) ? $_GET['otp'] : "";
  				switch ($otp) {
  					case 'strands-offered':
  						?>
  						 	<div class="academics_header_text mb-3">
                	<span class="header_text">&nbsp;<strong>Senior High School Strands Offered</strong></span>
              	</div>
        				<span>Be college-ready with the knowledge, training, and preparation to pursue a degree, start a business, or gain employment.</span><hr/>
        				<div class="wow fadeIn">
	  				      <div class="card">
					  				<div class="card-header academics_card_header"><strong>Academic Track</strong></div>
					  				<div class="card-body">
											<div class="accordion accordion-flush" id="academicStrand">
						 				 		<div class="accordion-item">
											    <h2 class="accordion-header">
											      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#stemAccordion" aria-expanded="false" aria-controls="stemAccordion">
											       	Science, Technology, Engineering, and Mathematics (STEM)
											      </button>
											    </h2>
						    					<div id="stemAccordion" class="accordion-collapse collapse" data-bs-parent="#academicStrand">
						      					<div class="accordion-body">
											      	<div class="card accordion_card">
															  <div class="row g-0">
															    <div class="col-md-4">
															      <img src="http://localhost/public_html/public/resources/images/general/strands/stem/stem_logo.png" class="img-fluid rounded-start">
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
											      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#humssAccordion" aria-expanded="false" aria-controls="humssAccordion">
											        Humanities and Social Science (HUMSS)
											      </button>
											    </h2>
						    					<div id="humssAccordion" class="accordion-collapse collapse" data-bs-parent="#academicStrand">
						      					<div class="accordion-body">
															<div class="card accordion_card">
															  <div class="row g-0">
															    <div class="col-md-4">
															      <img src="http://localhost/public_html/public/resources/images/general/strands/humss/humss_logo.png" class="img-fluid rounded-start">
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
											      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#abmAccordion" aria-expanded="false" aria-controls="abmAccordion">
											        Accountancy, Business, and Management (ABM)
											      </button>
											    </h2>
						    					<div id="abmAccordion" class="accordion-collapse collapse" data-bs-parent="#academicStrand">
						      					<div class="accordion-body">
						      						<div class="card accordion_card">
															  <div class="row g-0">
															    <div class="col-md-4">
															      <img src="http://localhost/public_html/public/resources/images/general/strands/abm/abm_logo.png" class="img-fluid rounded-start">
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
											      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#gasAccordion" aria-expanded="false" aria-controls="gasAccordion">
											        General Academic Strands (GAS)
											      </button>
											    </h2>
						    					<div id="gasAccordion" class="accordion-collapse collapse" data-bs-parent="#academicStrand">
						      					<div class="accordion-body">
						      						<div class="card accordion_card">
															  <div class="row g-0">
															    <div class="col-md-4">
															      <img src="http://localhost/public_html/public/resources/images/general/strands/gas/gas_logo.png" class="img-fluid rounded-start">
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
											      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ictAccordion" aria-expanded="false" aria-controls="ictAccordion">
											       	Information and Communications Technology (ICT)
											      </button>
											    </h2>
						    					<div id="ictAccordion" class="accordion-collapse collapse" data-bs-parent="#tvlTrackStrand">
						      					<div class="accordion-body">
						      						<div class="card accordion_card">
	  														<div class="row g-0">
															    <div class="col-md-4">
															      <img src="http://localhost/public_html/public/resources/images/general/strands/ict/ict_logo.png" class="img-fluid rounded-start">
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
						      					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#heAccordion" aria-expanded="false" aria-controls="heAccordion">
						      	 					Home Economics
						      					</button>
						    					</h2>
						    					<div id="heAccordion" class="accordion-collapse collapse" data-bs-parent="#tvlTrackStrand">
						      					<div class="accordion-body">
						      						<div class="card accordion_card">
	  														<div class="row g-0">
															    <div class="col-md-4">
															      <img src="http://localhost/public_html/public/resources/images/general/strands/he/he_logo.png" class="img-fluid rounded-start">
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
  						<?php
  						break;

  					case 'curriculum':
  						?>
  							<div class="academics_header_text mb-3">
                	<span class="header_text">&nbsp;<strong>Senior High School Curiculum</strong></span>
              	</div><hr/>
              	<!-- Core Subjects -->
              	<div class="wow fadeIn">
              	<div class="card mb-3">
									  <div class="card-header academics_card_header">
									    <strong>Core Subjects</strong>
									  </div>
							 	 		<div class="card-body p-0">
								 	 		<div class="p-2 table-responsive">
												<table class="table-bordered word-warp" style="border: 1px solid lightgray;"> 
													<thead>
														<tr>
															<th style="width: 20%; padding: 10px;">CORE LEARNING AREAS</th>
															<th class="text-center">SUBJECTS</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td rowspan="4" style="padding: 10px;"><i><b>Language</b></i></td>
															<td style="padding: 5px;">Oral Communication in Context</td>
														</tr>	
														<tr>
															<td style="padding: 5px;">Reading & Writing</td>
														</tr>
														<tr>
															<td style="padding: 5px;">Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino</td>
														</tr>
														<tr>
															<td style="padding: 5px;">Pagbasa at Pagsusuri ng Iba’t Ibang Teksto Tungo sa Pananaliksik</td>
														</tr>

														<tr>
															<td rowspan="2" style="padding: 10px;"><i><b>Humanities</b></i></td>
															<td style="padding: 5px;">21<sup>st</sup> Century Literature from the Philippines and the World</td>
														</tr>
														<tr>
															<td style="padding: 5px;">Contemporary Philippine Arts from the Regions</td>
														</tr>
														<tr>
															<td style="padding: 10px;"><i><b>Communication</b></i></td>
															<td>Media &#038; Information Literacy</td>
														</tr>
														<tr>
															<td rowspan="2" style="padding: 10px;"><i><b>Mathematics</b></i></td>
															<td style="padding: 5px;">General Mathematics</td>
														</tr>
														<tr>
															<td style="padding: 5px;">Statistics &#038; Probability</td>
														</tr>
														<tr>
															<td rowspan="2" style="padding: 10px;"><i><b>Science</b></i></td>
															<td style="padding: 5px;">
																Earth and Life Science (Lecture and Laboratory)
															</td>
														</tr>
														<tr>
															<td style="padding: 5px;">
																Physical Science (Lecture and Laboratory)
															</td>
														</tr>
														<tr>
															<td rowspan="2" style="padding: 10px;"><i><b>Social Science</b></i></td>
															<td style="padding: 5px;">Personal Development / Pansariling Kaunlaran</td>
														</tr>
														<tr>
															<td style="padding: 5px;">Understanding Culture, Society and Politics</td>
														</tr>
														<tr>
															<td style="padding: 10px;"><i><b>Philosophys</b></i></td>
															<td>Introduction to the Philosophy of the Human Person / Pambungad sa Pilosopiya ng Tao</td>
														</tr>
														<tr>
															<td style="padding: 10px;"><i><b>PE and Health</b></i></td>
															<td>Physical Education and Health</td>
														</tr>
													</tbody>
												</table>
  										</div>
										</div>
									</div>
									<!-- Applied Subjects -->
									<div class="wow fadeIn">
										<div class="card mb-3">
										  <div class="card-header academics_card_header">
										    <strong>Applied Subjects</strong>
										  </div>
								 	 		<div class="card-body">
								 	 			<div class="applied_subject ">
													<div class="academics_header_text mb-2" >
														<h6 class="card-title">&nbsp;APPLIED / CONTEXTUALIZED SUBJECTS</h6>
													</div><hr>
													<ul>
														<li class="li_content">English for Academic and Professional Purposes</li>
														<li class="li_content">
															Pagsulat sa Filipino sa Piling Larangan
															<ul>
																<li style="list-style-type: none; margin-left: -20px;">- Akademiko</li>
																<li style="list-style-type: none; margin-left: -20px;">- Tech-Voc</li>
															</ul>
														</li>
														<li class="li_content">Quantitative Practical Research 1</li>
														<li class="li_content">Qualitative Practical Research 2</li>
														<li class="li_content">Inquiries, Investigations and Immersion</a></li>
														<li class="li_content">Empowerment Technologies (E-Tech)</a></li>
														<li class="li_content">Entrepreneurship</li>
													</ul>
	  										</div>
								 	 		</div>
								 	 	</div>
							 	 	</div>
							 	 	<!-- Specialized Subjects -->
							 	 	<div class="wow fadeIn">
								 	 	<div class="card mb-3">
										  <div class="card-header academics_card_header">
										    <strong>Specialized Subjects</strong>
										  </div>
								 	 		<div class="card-body">
								 	 			<div class="specialized_subject">
													<div class="academics_header_text mb-2" >
														<h6 class="academics_header_text">&nbsp;SPECIALIZED SUBJECTS FOR EACH STRANDS <small>(Grade 11 to Grade 12)</small></h6>
													</div><hr>
													<div class="accordion accordion-flush" id="specializedSubjStrand">
								  					<div class="accordion-item">
													    <h2 class="accordion-header">
													      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#stemAccordion" aria-expanded="false" aria-controls="stemAccordion">
													       	Science, Technology, Engineering, and Mathematics (STEM)
													      </button>
													    </h2>
								    					<div id="stemAccordion" class="accordion-collapse collapse" data-bs-parent="#specializedSubjStrand">
								      					<div class="accordion-body">
								      						<div class="gmc-callout-strands">
																		<p>Specialized Subjects of STEM</p>
																			<ul class="original">
																				<li>Pre-Calculus</li>
																				<li>Basic Calculus</li>
																				<li>General Biology 1</li>
																				<li>General Biology 2</li>
																				<li>General Physics 1</li>
																				<li>General Physics 2</li>
																				<li>General Chemistry 1</li>
																				<li>General Chemistry 2</li>
																				<li>Work Immersion/Career Advocacy/Culminating Activity Research</li>
																			</ul>
																		</div>
												      	</div>
												    	</div>
												  	</div><!--end stem accordion -->

												  	<div class="accordion-item">
													    <h2 class="accordion-header">
													      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#humssAccordion" aria-expanded="false" aria-controls="humssAccordion">
													       	Humanities and Social Sciences (HUMSS)
													      </button>
													    </h2>
								    					<div id="humssAccordion" class="accordion-collapse collapse" data-bs-parent="#specializedSubjStrand">
								      					<div class="accordion-body">
								      						<div class="gmc-callout-strands">
																		<p>Specialized Subjects of HUMSS</p>
																			<ul class="original">
																			<li>Creative Writing</li>
																			<li>Creative Nonfiction: The Literary Essay</li>
																			<li>World Religions and Belief Systems</li>
																			<li>Megatrends and Critical Thinking in the 21st Century Culture</li>
																			<li>Philippine Politics and Governance</li>
																			<li>Community Involvement and Social Issues</li>
																			<li>Introducing the Social Sciences</li>
																			<li>Introducing the Applied Social Sciences</li>
																			<li>(Communication, Journalism, Guidance and Counseling, Social Work)</li>
																			<li>Work Immersion/Career Advocacy/Culminating Activity</li>
																		</ul>
																		</div>
												      	</div>
												    	</div>
												  	</div><!--end humss accordion -->

												  	<div class="accordion-item">
													    <h2 class="accordion-header">
													      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#abmAccordion" aria-expanded="false" aria-controls="abmAccordion">
													       Accountancy, Business, and Management (ABM)
													      </button>
													    </h2>
								    					<div id="abmAccordion" class="accordion-collapse collapse" data-bs-parent="#specializedSubjStrand">
								      					<div class="accordion-body">
								      						<div class="gmc-callout-strands">
																		<p>Specialized Subjects of ABM</p>
																			<ul class="original">
																				<li>Applied Economics</li>
																				<li>Business Ethics and Social Responsibility</li>
																				<li>Fundamentals of Accountancy, Business and Management 1</li>
																				<li>Fundamentals of Accountancy, Business and Management 2</li>
																				<li>Business Math</li>
																				<li>Business Finance</li>
																				<li>Organization and Management</li>
																				<li>Principles of Marketing</li>
																				<li>Work Immersion/Research/Career Advocacy/Culminating Activity i.e. Business Enterprise Simulation</li>
																			</ul>
																		</div>
												      	</div>
												    	</div>
												  	</div><!--end abm accordion -->

												  	<div class="accordion-item">
													    <h2 class="accordion-header">
													      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#gasAccordion" aria-expanded="false" aria-controls="gasAccordion">
													       General Academics Strand (GAS)
													      </button>
													    </h2>
								    					<div id="gasAccordion" class="accordion-collapse collapse" data-bs-parent="#specializedSubjStrand">
								      					<div class="accordion-body">
								      						<div class="gmc-callout-strands">
																		<p>Specialized Subjects of GAS</p>
																			<ul class="original">
																			<li>Humanities 1</li>
																			<li>Humanities 2</li>
																			<li>Social Science 1</li>
																			<li>Applied Economics</li>
																			<li>Elective 1 (from any Track/Strand)</li>
																			<li>Elective 2 (from any Track/Strand)</li>
																			<li>Work Immersion/Career Advocacy/Culminating Activity</li>
																		</ul>
																		</div>
												      	</div>
												    	</div>
												  	</div><!--end gas accordion -->

												  	<div class="accordion-item">
													    <h2 class="accordion-header">
													      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ictAccordion" aria-expanded="false" aria-controls="ictAccordion">
													       Information and Communication Technology (ICT)
													      </button>
													    </h2>
								    					<div id="ictAccordion" class="accordion-collapse collapse" data-bs-parent="#specializedSubjStrand">
								      					<div class="accordion-body">
								      						<div class="gmc-callout-strands">
																		<p>Specialized Subjects of ICT</p>
																		<ul class="original">
																			<li>Computer System Servicing 1 (Computer Hardware Components)</li>
																			<li>Computer System Servicing 2 (Computer Software Components & Networking)</li>
																			<li>Web Development (Front End)</li>
																			<li>Web Development (Back End)</li>
																			<li>Practical Research (Innovation)</li>
																			<li>Work Immersion</li>
																		</ul>
																	</div>
												      	</div>
												    	</div>
												  	</div><!--end ict accordion -->

												  	<div class="accordion-item">
													    <h2 class="accordion-header">
													      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#heAccordion" aria-expanded="false" aria-controls="heAccordion">
													       Home Economics (HE)
													      </button>
													    </h2>
								    					<div id="heAccordion" class="accordion-collapse collapse" data-bs-parent="#specializedSubjStrand">
								      					<div class="accordion-body">
								      						<div class="gmc-callout-strands">
																		<p>Specialized Subjects of HE</p>
																			<ul class="original">
																			<li>Food &#038; Beverages 1</li>
																			<li>Fundamentals of Accountancy, Business, and Management 1</li>
																			<li>Food &#038; Beverages 2 (Procedure)</li>
																			<li>Food &#038; Beverages 3 (Production)</li>
																			<li>Bread and Pastry Production NCII</li>
																			<li>Cookery NCII</li>
																		</ul>
																		</div>
												      	</div>
												    	</div>
												  	</div><!--end he accordion -->
													</div><!--accordion-flush-->
								 	 			</div>
								 	 		</div>
								 	 	</div>
							 	 	</div>
  							<?php
  							break;	

  					case 'admission-requirements':
  						?>
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
  						<?php
  						break;

  					default:
  						?>
			  				<div class="academics_header_text mb-3">
                	<span class="header_text">&nbsp;<strong>Senior High School Department</strong></span>
              	</div>
			        	<span>The Golden Minds aim to produce graduates that are competitive in the current global trends. Develop young minds to become God-fearing, inteligent and multiskilled individuals.</span><hr/>
			        	<div class="wow fadeIn">
				  				<div class="card mb-3">
									  <div class="card-header academics_card_header">
									    <strong>Objectives</strong>
									  </div>
								 	 	<div class="card-body">
								 	 		<p class="card-text">The Senior High School department adheres and passionately affirms and practices the Vision, Mission, and Goals of the Institution. In accordance, the subsequent are the GMC-SHS program objectives:
				        				<br/><br/>
						            <strong><i>After 2 years students will be able to:</i></strong><br/>
						            <ol>
						              <li>Realize their potentials in line with entrepreneurship, health, education, social work, etc. Or in any other chosen field/profession.
						              </li>
						              <li>Recognize their significance as shown by substantial contribution in the community inform of their advocacy, leadership, and profession.</li>
						              <li>Applies strong leadership in their chosen field as expressed by extensive output in research and other scientific studies, innovations and other significant improvements in their area/profession in terms of practice and/delivery system.</li>
						              <li>Develop strong sense of spirituality by actively practicing Christian values as expressed in service for humanity and in all God’s creation.</li>
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
														<b class="pink-text">Explore</b>
														<p>
															Refining foundational and advance affective, cognitive, and psychomotor aspect thru Research or scientific studies. Cultivating conscious exploration of interests and preference among students within their chosen field.
														</p>
													</li>
												</ul>
												<ul class="li-font-awesome">
													<li class="li-check-circle">
														<b class="pink-text">Apply</b>
														<p>
															Appertains to affective, cognitive, and psychomotor process into an applicable platform that involves substantial contribution that promotes and improve the quality and preserves the integrity of life. 
													 	</p>
													</li>
												</ul>
												<ul class="li-font-awesome">
													<li class="li-check-circle">
														<b class="pink-text">Develop</b>
														<p>
															Transforming academic experience into construe of becoming a relevant Christian witness who advocates faith and pursues zealously stewardship of truth.
														</p>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
  						<?php
  						break;
  				}
  				?>
				</div><!--end column 8-->
			</div><!--end row-->
		</div><!--end container-->
  </section>
</main>