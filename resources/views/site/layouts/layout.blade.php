<!DOCTYPE html>

<html lang="{{config('app.locale')}}">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>.:: {{$title or ''}} ::.</title>

    <link rel="icon" href="{{asset(config('setting.site_img'))}}/logo.png">

    <!-- Bootstrap -->

    <link href="{{asset('assets/site/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">

    <link href="{{asset('assets/site/css/font-awesome.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/site/css/YouTubePopUp.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('assets/site/css/owl.carousel.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/site/css/slicknav.min.css')}}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <link href="{{asset('assets/site/css/busy_loading.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/site/css/sweetalert2.css')}}" rel="stylesheet">

    <link href="{{asset('assets/site/css/style.css')}}" rel="stylesheet">

    <link href="{{asset('assets/site/css/responsive.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/site/js/custom-scrollbar/jquery.mCustomScrollbar.css')}}">

    <style>
        .swal2-confirm.btn.btn-success{margin-right: 5px!important;}
    </style>



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118589267-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-118589267-1');
</script>

</head>

<body>

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
  attribution="setup_tool"
  page_id="1894653503898704"
  theme_color="#0084ff">
</div>

@include('site.layouts.common.header')


@include('site.layouts.common.cart')


@yield('content')



@include('site.layouts.common.footer')

<script>var baseUrl = '{{url('/')}}';</script>

<script src="{{asset('assets/site/js/jquery.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/site/js/bootstrap.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

<script src="{{asset('assets/site/js/owl.carousel.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/site/js/YouTubePopUp.jquery.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/site/js/jquery.slicknav.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/site/js/busy_loading.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/site/js/sweetalert2.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/site/js/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>

<script src="{{asset('assets/site/js/custom.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/site/js/header.js')}}" type="text/javascript"></script>

@stack('scripts')

<?php $messages= ['success','danger','warning'];
 foreach($messages as $msg){
    if(session($msg)){
    ?>
    <script type="text/javascript">
        swal({title: '{{ucfirst($msg)}} !', text:'{{session($msg)}}', type: '{{$msg}}', showCancelButton: false, showConfirmButton: false, timer: 5000});
    </script>
<?php } }?>

    
    <script>
        (function($){
            $(window).on("load",function(){
                
                $("#right-side-cart-menu").mCustomScrollbar({
                    autoHideScrollbar:true,
                    theme:"rounded"
                });
                
            });
        })(jQuery);
    </script>

</body>

</html>