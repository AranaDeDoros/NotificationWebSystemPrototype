@extends('layouts.general')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@yield('type')</div>

                <div class="card-body">
                    <div class="row">
                        <div class="container mt-2 mb-2">
                            @yield('message')
                        </div>                        
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
