@include('partials.headcontent')
 
<body>
 
@include('partials.navbar')

@include('partials.flash')
 
<div class="container mb-5">
    @yield('content')
</div>
 
@include('partials.footercontent')