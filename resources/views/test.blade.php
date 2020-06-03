<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 
 @include('layouts/head')
 
    <body>



@include('layouts/nav')

    <main>
       <hr>
        <div >

          <div class="container text-center mb-2 pb-4">
            <div class="row">
              <div class="col pt-2">

                <a href="{{route('groups.all')}}" title="">
                  <img class="svgIcon" src="{{asset('storage/svg/group.svg')}}" alt="NOTLOADED">
                  <span>ADMINISTRAR GRUPOS</span>
                </a>
              </div>
              <div class="col pt-2">
                <a href="{{route('users.all')}}" title="">
                  <img class="svgIcon" src="{{asset('storage/svg/work.svg')}}" alt="NOTLOADED">
                  <span>ADMINISTRAR USUARIOS</span>
                </a>
              </div>
              <div class="col pt-2">
                <a href="{{route('notifications.all')}}" title="">
                  <img class="svgIcon" src="{{asset('storage/svg/message.svg')}}" alt="NOTLOADED">
                  <span>NOTIFICACIONES PROGRAMADAS</span>
                </a>
              </div>
            </div>
          </div>


           
          

        </div>
        
    </main>
</div>

@include('layouts/footer')
    </body>
</html>
