@extends('layouts/general')

@section('title', 'Home')

@section('content')
        <div >
          <div class="container text-center mb-2 pb-4">
            <div class="row">
              <div class="col pt-2">

                <a href="{{route('groups.all')}}" title="">
                  <img class="svgIcon" src="{{asset('svg/group.svg')}}" alt="NOTLOADED">
                  <span class="pt-1">>ADMINISTRAR GRUPOS</span>
                </a>
              </div>
              <div class="col pt-2">
                <a href="{{route('users.all')}}" title="">
                  <img class="svgIcon" src="{{asset('svg/work.svg')}}" alt="NOTLOADED">
                  <span class="pt-1">>ADMINISTRAR USUARIOS</span>
                </a>
              </div>
              <div class="col pt-2">
                <a href="{{route('notifications.all')}}" title="">
                  <img class="svgIcon" src="{{asset('svg/message.svg')}}" alt="NOTLOADED">
                  <span class="pt-1">>NOTIFICACIONES PROGRAMADAS</span>
                </a>
              </div>
            </div>
        </div>

@endsection
           
          


