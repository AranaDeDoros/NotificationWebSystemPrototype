	<script>
		$(document).ready(function() {
           $('#txtMessage').summernote({
           		codeviewFilter: false,
				codeviewIframeFilter: true,
				placeholder: "text to be appended to the e-mail",
				disableDragAndDrop: true,
				pasteHTML : "{{$notification->customMessage}}",
				toolbar: [
				  ['style', ['style']],
				  ['font', ['bold', 'underline', 'clear']],
				  ['fontname', ['fontname']],
				  ['color', ['color']],
				  ['para', ['ul', 'ol', 'paragraph']],
				  ['table', ['table']],
				  ['insert', ['link', 'picture'/*, 'video'*/]],
				  ['view', ['fullscreen', 'codeview', 'help']],
				],
				popover: {
				   air: []
				}         
			});
        });

        
        
	</script>