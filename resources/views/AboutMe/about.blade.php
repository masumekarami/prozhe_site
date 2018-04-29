<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AboutMe</title>
    <!--css-->
    <link rel="stylesheet" href="{{asset('css/aboutf.css')}}">

    <!--bootstrap-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('../../../css/bootstrap.css') }}">
    <script src="{{url('../../../js/bootstrap.js')}}"></script>

    {{--<script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>--}}
    {{--<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap-grid.css">--}}
    {{--<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap-reboot.css">--}}
    {{--<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>--}}

</head>

<body>
<div class="container-fluid">

    <div id="asideLeft" class="asideLeft">
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Clients</a>
            <a href="#">Contact</a>
        </div>
        <div id="main">
                <span style="font-size:30px;cursor:pointer;font-weight: bold;height: 150px;color: #977750;"
                      onclick="openNav()"> &#8285;</span>
        </div>
        <div>
            <img id="LogoGallery" src="img/LogoColor/AboutMeLogo.png"/>
        </div>
        <h2>AboutMe</h2>
    </div>
    <div id="asideRight" class="asideRight">
        @foreach($about as $abouts)
            <video class="MyVideo" controls>
                <source src="{{$upload}}/{{$abouts->video_url}}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <br/>
            <div class="parentFab">
                <input type="checkbox" id="share">
                <label title="Share" for="share" id="share"></label>

                @foreach($post as $posts)
                    @if(!empty($posts->facebook))
                        <a title="facebook" id="facebook" href="{{$posts->facebook}}"></a>
                    @elseif(!empty($posts->twitter))
                        <a title="twitter" id="twitter" href="{{$posts->twitter}}"></a>
                    @elseif(!empty($posts->google_plus))
                        <a title="Google +" id="googleplus" href="{{$posts->google_plus}}"></a>
                    @elseif(!empty($posts->instagram))
                        <a title="instagram" id="instagram" href="{{$posts->instagram}}"></a>
                    @elseif(!empty($posts->telegram))
                        <a title="telegram" id="telegram" href="{{$posts->telegram}}"></a>
                    @elseif(!empty($posts->pinterest))
                        <a title="pinterest" id="pinterest" href="{{$posts->pinterest}}"></a>
                    @elseif(!empty($posts->email))
                        <a title="vero" id="vero" href="{{$posts->email}}"></a>
                    @elseif(!empty($posts->skype))
                        <a title="viber" id="viber" href="{{$posts->skype}}"></a>
                    @elseif(!empty($posts->whatsapp))
                        <a title="what's app" id="whatsapp" href="{{$posts->whatsapp}}"></a>
                    @elseif(!empty($posts->linkedin))
                        <a title="linkdin" id="linkdin" href="{{$posts->linkedin}}"></a>

                    @endif

                @endforeach
            </div>
    </div>
    <div id="content" class="content">
        <p>
            {{$abouts->biog}}
        </p>
        <input class="closebtnEndX" type="button" onclick="windowClose();">
    </div>
    @endforeach
</div>
</body>
</html>
<script language="javascript" type="text/javascript">
    function windowClose() {
        window.open('', '_parent', '');
        window.close();
    }
</script>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "10%";
        document.getElementById("main").style.marginLeft = "250px";
        document.getElementById("asideLeft").style.marginLeft = "10%";
        document.getElementById("content").style.marginLeft = "10%";
        document.getElementById("asideRight").style.width = "26%";


    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
        document.getElementById("asideLeft").style.marginLeft = "0";
        document.getElementById("content").style.marginLeft = "0";
        document.getElementById("asideRight").style.width = "35%";
    }
</script>
