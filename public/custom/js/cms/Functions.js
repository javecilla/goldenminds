function preventBack() {
	window.history.forward(); 
}
setTimeout("preventBack()", 0);
window.onunload = function(){null}; 

//enable tool tips
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

//show hidden div form when its toggle
function toggleAddForm(management) {
	$('#form_container').toggle();
	$('.toggleFormBtn').toggle();
}

// search for data
function searchData(management) {
	let searchQuery = $('.search').val();
	window.location.href = management + '?search=' + encodeURIComponent(searchQuery);
}

//close modal
function closeModal(modalName) {
	$(modalName).modal('hide');
}

//check field if empty
function isEmpty(field) {
	return field === '';
}

//remove photo
function removePhoto(management) {
	$('.image-upload-wrap').show();
	$('.file-upload-image').attr('src', '');
	$('.file-upload-content').hide();
	$('.file-upload-input').val('');
	$('.announce_img').attr('src', '');
	$('#remove_photo').hide();
	$('#imgname').text('');
	//alert("test");
}

//onchange photo
function readURL(input) {
	if (input.files && input.files[0]) {
	  var reader = new FileReader();
	  reader.onload = function(e) {
	    //add form
	    $('.image-upload-wrap').hide();
	    $('.file-upload-image').attr('src', e.target.result);
	    $('.file-upload-content').show();
	    $('.image-title').html(input.files[0].name);
	    //update modal form
	    $('.news_img').attr('src', e.target.result);
	    $('.announce_img').attr('src', e.target.result);    
	    $('#remove_photo').show();
	    $('#imgname').text(input.files[0].name);
	  };
	  reader.readAsDataURL(input.files[0]);
	} 
}

var fileUpload = $(".file-upload"); //defined div as global variable
// Prevent default image drag behavior
fileUpload.on("drag dragstart dragend dragover dragenter dragleave drop", function(e) {
  e.preventDefault();
  e.stopPropagation();
})
.on("dragover dragenter", function() {
  fileUpload.addClass("is-dragover");
})
.on("dragleave dragend drop", function() {
  fileUpload.removeClass("is-dragover");
})
.on("drop", function(e) {
  e.preventDefault(); 
  var file = e.originalEvent.dataTransfer.files[0];
  handleFileUpload(file);
});

// Additional code for triggering file input when clicking on the drag area
$(".drag-text").on("click", function() {
  $("#gallery_photo").click();
});

//function for radio value
function handleRadioClick(yesClass, noClass, target) {
	$(yesClass).on('click', function() {
		$(target).val(1); // Set value to 1 (yes)
		$(this).siblings(noClass).prop('checked', false);
	});

	$(noClass).on('click', function() {
		$(target).val(0); // Set value to 0 (no)
		$(this).siblings(yesClass).prop('checked', false);
	});
}