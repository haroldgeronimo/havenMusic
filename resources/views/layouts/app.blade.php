<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Components - Ready Bootstrap Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>
<body>
    <div class="wrapper">
    @include('inc.header')
    @include('inc.sidebar')
    
    <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                @yield('content')
        
          
                </div>
              
            </div>
            @include('inc.footer')
         
    </div>

    @include('inc.modal')
    </div>
</body>



<script src="js/app.js"></script>

    
    <script>       
            $( function() {
                $( "#slider" ).slider({
                    range: "min",
                    max: 100,
                    value: 40,
                });
                $( "#slider-range" ).slider({
                    range: true,
                    min: 0,
                    max: 500,
                    values: [ 75, 300 ]
                });
            } );

    </script>
    
</html>