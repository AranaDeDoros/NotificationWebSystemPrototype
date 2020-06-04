	<script>
		$(document).ready(function() {
           $('#txtMessage').summernote({
				toolbar: [
				  ['style', ['style']],
				  ['font', ['bold', 'underline', 'clear']],
				  ['fontname', ['fontname']],
				  ['color', ['color']],
				  ['para', ['ul', 'ol', 'paragraph']],
				  ['table', ['table']],
				  ['insert', ['link', 'picture', 'video']],
				  ['view', ['fullscreen', 'codeview', 'help']],
				],
				popover: {
				   air: []
				}         
			});
        });
	</script>