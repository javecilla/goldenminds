<?php $campus = basename($_SERVER['REQUEST_URI'], PHP_URL_PATH); ?>

		<section id="contact_details" class="container mt-3">
			<div class="row mb-3">	
  			<div class="col-md-4 mb-3">
  				<div class="card-header campuses_header">
   					<strong>Golden Minds Campuses</strong>
  				</div>
  				<div class="card" style="border: none">
					  <ul class="list-group list-group-flush campus">
					    <li> 
					    	<a href="/contact/sta-maria-campus/" 
					    	class="list-group-item <?= $campus === 'sta-maria-campus' ? 'campus_link_active' : ''?>">
					    	<i class="fa-solid fa-chevron-right"></i>&nbsp;Golden Minds Colleges Sta. Maria</a>
					    </li>
					    <li>
					    	<a href="/contact/balagtas-campus/" 
					    	class="list-group-item <?= $campus === 'balagtas-campus' ? 'campus_link_active' : ''?>">
					    	<i class="fa-solid fa-chevron-right"></i>&nbsp;Golden Minds Colleges Balagtas</a>
					    </li>
					    <li>
					    	<a href="/contact/guiginto-campus/" 
					    	class="list-group-item <?= $campus === 'guiginto-campus' ? 'campus_link_active' : ''?>">
					    	<i class="fa-solid fa-chevron-right"></i>&nbsp;Golden Minds Academy Guiginto</a>
					    </li>
					  </ul>
					</div>
  			</div>
  			<div class="col-md-8">
  				<div class="card-header campuses_header">
   					<strong>Contact Information</strong>
  				</div>
  				<div class="wow fadeIn">
  								<div class="mb-3" style="border: 1px solid #DDDDDD">
  									<div class="row g-0 p-0">
									    <div class="col-md-7">
									      <div class="card-body">
									        <div class="academics_header_text mb-2" >
														<h6 class="card-title">&nbsp;GUIGINTO CAMPUS</h6>
													</div><hr>
													<div class="card-text">
														<p><i class="fas fa-university"></i>&nbsp;SchoolID: <span><b>418655</b></span></p>
									        	<p><i class="fas fa-map-marker"></i>&nbsp;&nbsp;870 Estrella Village, Ilang-Ilang, Guiguinto, Bulacan</p>
									        	<p><i class="fas fa-phone-alt"></i>&nbsp;&nbsp;(+63) 944 306 9156</p>
									        	<p><i class="fas fa-envelope"></i>&nbsp;&nbsp;gmaguiguinto2010@gmail.com</p>
									        </div>
									      </div>
									    </div>
        							<div class="col-md-5">
      									<img src="/public/resources/images/goldenminds-guiginto.PNG" class="img-fluid rounded-start" />
									    </div>
									  </div>
									</div>
									<div id="gma_guiginto_map" class="form-control p-0 mb-2">
										<iframe src="https://www.google.com/maps/d/embed?mid=14cVJVjqk9Q9nk2kvN1JKlxCBxUuCCEc&ll=14.830408022327509%2C120.87133945328205&z=20"class="card-img-top map"></iframe>
									</div>
							 	</div>


  			</div>
  		</div>
			<div id="contact_form" class="container mb-5" >
				<form action="#" method="POST" id="cForm">
					<h5>Leave a Reply</h5>
					<small>Your email address will not be published. All fields are required.</small>
					<fieldset class="mt-3">
						<div class="row">
							<div class="col-md-6 mb-2">
								<input type="text" class="form-control" id="clientName" 
									maxlength="40" title="Client Name" placeholder="Your full name"
									utocomplete="off" required  
								/>
							</div>
							<div class="col-md-6 mb-2">
								<input type="email" class="form-control" id="clientEmail" 
									maxlength="40" title="Email Address" placeholder="Your email address" 
									autocomplete="off" required
								/>
							</div>
						</div>
						<input type="text" class="form-control mb-2" id="clientSubject" 
							maxlength="60" title="Subject" placeholder="Subject" 
							autocomplete="off" required
						/>
						<textarea class="form-control" style="min-height: 30vh;"
							title="Message" cols="30" rows="5" maxlength="100" id="clientMessage"    
	            placeholder="Message" spellcheck="true" required></textarea>
					</fieldset>
					<button type="button" class="btn float-end mt-2 send_msg w-100" id="send_msg_email">Send Message</button>
				</form>
			</div>
		</section>

			<script type="text/javascript">
		function isEmpty(field) {
			return field === "";
		}
		$(document).ready(function() {
			/**
			 * [for testing-only NOTE: this is not functional for now - jerome avecilla - continue] 
			 * @param  {Function} e){				e.preventDefault();				let cname         [description]
			 * @return {[bool]}                                      [false]
			 */
			$('#send_msg_email').on('click', function(e){
				e.preventDefault();
				let cname = $('#clientName').val();
				let cemail = $('#clientEmail').val();
				let csubj = $('#clientSubject').val();
				let cmsg = $('#clientMessage').val();
				if(isEmpty(cname) || isEmpty(cemail) || isEmpty(csubj) || isEmpty(cmsg)) {
					Swal.fire({
						title: "",
						text: "All fields are required",
						icon: "info"
					})
				} else {
					Swal.fire({
					  title: '',
					  html: '<h4>Kindly verify that the credentials you have entered are accurate.</h4>',
					  icon: "info",
					  showCancelButton: true,
					  confirmButtonText: 'Yes, submit',
					}).then((result) => {
					  if (result.isConfirmed) {
					    Swal.fire({
					      title: "Send Successfully",
								text: "Thankyou for submiting your email!",
								icon: "success"
					    }).then((res) => {
					    	$('#cForm')[0].reset();
					    })
					  } else {
					  	return false;
					  }
					})
				}
			})
		});
	</script>

