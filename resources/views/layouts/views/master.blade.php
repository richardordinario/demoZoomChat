
@include('layouts.views.header')

@if(Auth::guard('admin')->check())
@include('admin.layout.views.leftnav')
@else
@include('layouts.views.leftnav')
@endif

<div class="wrapper">
    <div class="content-wrapper">
        <div class="content">
            <div class="container pt-5">
                @yield('content')
            </div>
        </div>
    </div>
</div>

@include('layouts.views.footer')




