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
							 	 </div>
							
       </div>
  </div>
</section>
