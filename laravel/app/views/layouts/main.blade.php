<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1200">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/css/calendar.css">
    <link rel="stylesheet" href="/css/style.css">
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,700,300,400|Lobster+Two:400,700|Patua+One' rel='stylesheet' type='text/css'>
    <script src="/js/jquery.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/js/jquery-ui.multidatespicker.js"></script>
    <script src="/js/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="/js/fancybox/jquery.fancybox.js?v=2.1.5"></script>
    <link rel="stylesheet" type="text/css" href="/js/fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />
    <script>
        window.FileAPI = {
            debug: false,
            cors: false,
            media: false,
            staticPath: '/js/fileapi/FileAPI/'
        };
    </script>
    <script src="/js/fileapi/FileAPI/FileAPI.min.js"></script>
    <script src="/js/fileapi/jquery.fileapi.min.js"></script>
    <script>
        $(document).ready(function(){
            $('a.fancybox').fancybox();

            $('form.ajax').submit(function(e){
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '/user',
                    data: $(this).serialize()
                }).done(function(response){
                    if(response.errors) {
                        $('div.validation').empty();
                        $.each(response.message, function(){
                            $('div.validation').show().append('<p>'+this+'</p>');
                        });
                        return false;
                    }
                    window.location.reload();
                });
            });
        });
    </script>
</head>
<body>
<div class="header container">
    <div class="login">
        <img src="/images/lock.png" width="15">
        @if($generalUser)
            <a href="/user/{{ $generalUser->id }}">Your Admin Area</a> | <a href="/logout">Logout</a>
        @else
            <a href="/login">customer login</a>
        @endif
    </div>
    
    <div class="facebook">
		<a href="https://www.facebook.com/hiremycamper?ref=ts&fref=ts" target="_blank">
			<img src="/images/likeus.png" style="width:100px;">
		</a>
    </div>

    <div class="logo">
        <a href="/"><img src="/images/logo.png" width="148"></a>
    </div><!-- end header -->

    <div class="headerText">
        <img src="/images/phone.png" width="33">(07) 3203 1275
        <img src="/images/email.png" width="33" style="margin-left:40px">dan@hiremycampertrailer.com.au
    </div>
    <div style="clear: both;"></div>
</div><!-- end header -->

<div class="nav">
    <div class="container">
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/about">About us</a></li>
            <li><a href="/rates">Our Rates</a></li>
            <li><a href="/products">Our Campers</a></li>
            <li><a href="/setup">Setup Videos</a></li>
            <li><a href="/contact">Contact us</a></li>
        </ul>
    </div>
</div>

@yield('slideshow')

<div class="location">
    <div class="container">
        <h2>ALL CAMPERS ARE LOCATED IN THE BRISBANE METRO AREA - <a href="/contact">SEE OUR LOCATION</a></h2>
    </div>
</div>

<div class="content">
    <div class="container">
        @if($errors->has())
        <div class="errors">
            @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
            @endforeach
        </div><!-- end errors -->
        @endif
        @if(Session::has('error'))
            <div class="errors">
                {{ Session::get('error') }}
            </div>
        @endif
        @if(Session::has('success'))
        <div class="success">
            {{ Session::get('success') }}
        </div>
        @endif
    </div>

@yield('content')
</div>

<div class="footer">
    <div class="container">
        <p>&copy; Hire My Camper Trailer 2014 - <a href="/terms-conditions.pdf">Terms and conditions</a></p>
    </div>
</div>

<script>
    window.FileAPI = {
        debug: true,
        cors: false,
        media: false,
        staticPath: '/js/fileapi/FileAPI/'
    };
</script>
<script src="/js/fileapi/FileAPI/FileAPI.min.js"></script>
<script src="/js/fileapi/jquery.fileapi.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
    // This identifies your website in the createToken call below
    Stripe.setPublishableKey("<?php echo $_ENV['STRIPE_PUBLIC']; ?>");
    // ...
</script>
<script>
    $('#uploader').fileapi({
        url: '/upload',
        autoUpload: true,
        multiple: true,
        accept: 'image/*',
        onFileComplete: function(err, xhr) {
            $('form').append("<input type='hidden' name='files[]' value="+xhr.result.name+">");
        },
        elements: {
            progress: '.js-progress',
            active: { show: '.js-upload', hide: '.js-browse' },
            size: '.js-size',
            list: '.js-files',
            size: '.js-size',
            ctrl: { upload: '.js-send', reset: '.js-reset' },
            empty: { hide: '.js-upload' },
            file: {
                tpl: '.js-file-tpl',
                preview: {
                    el: '.file-preview',
                    width: 140,
                    height: 140
                },
                progress: '.progress .progress-bar'

            }
        }
    });
    CKEDITOR.replace( 'editor', {
        width: '70%',
        height: 300
    });
    CKEDITOR.replace( 'excerpt', {
        width: '70%',
        height: 300
    });
</script>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-56714869-1', 'auto');
    ga('send', 'pageview');

</script>

</body>
</html>
