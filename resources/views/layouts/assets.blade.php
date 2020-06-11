@push('autocompleteAssets')
    <link href="{{ asset('css/tagify.css') }}" rel="stylesheet">
	<script src="{{asset('js/auto-complete.min.js')}}"></script>
	<link rel="stylesheet" href="{{asset('css/auto-complete.css')}}">
	<script src="{{asset('js/tagify.js')}}"></script>      
	<script>let basePath = '{{url('/')}}' ;</script>
@endpush

{{--

@push('summernoteAssets')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
@endpush

	--}}

