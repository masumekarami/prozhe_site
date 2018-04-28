<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Article</title>
    <!--css-->
    <!--<link rel="stylesheet" href="Gallery.css">-->
    <link rel="stylesheet" href="{{asset('css/articlef.css')}}">
    <!--bootstrap-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('../../../css/bootstrap.css') }}">
    <script src="{{ url('../../../js/JQ/jquery.min.js') }}"></script>
    <script src="{{url('../../../js/bootstrap.js')}}"></script>
    <script src="{{ url('../../../js/all.js') }}"></script>


    {{--<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">--}}
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
                <span style="font-size:30px;cursor:pointer;font-weight: bold;height: 150px;color: #0c5460;"
                      onclick="openNav()"> &#8285;</span>
        </div>
        <div>
            <img id="LogoGallery" src="img/LogoColor/ArticleLogo.png"/>
        </div>
        <h2>Article</h2>
    </div>
    <div id="asideRight" class="asideRight">
        <div>
            <h4>Articles's Description</h4>
            <div id="p">
                <p id="BlockThree">
                </p>
            </div>
        </div>
    </div>
    <div id="content" class="content">
        @foreach($article as $articles)
        <div class="article">
            <a id="a" data-id="{{ $articles->id }}" href=""><i class="far fa-file-alt"></i>{{ $articles->title }}</a><br/>
            @endforeach
        </div>
        <input class="closebtnEnd" type="button" onclick="windowClose();">
    </div>

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

<script>
    $(document).on('click', '#a', function (e) {
        e.preventDefault();
        var $this = $(this);
        $.ajax({
            type: "POST",
            url: "/articles/index",
            data: {ArticelId : $this.closest('a').data('id'), "_token": "{{csrf_token()}}"},
            success: function (result) {
                console.log(result);
                $('#BlockThree').html(result);

            }
        });
    });
</script>