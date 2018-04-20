@extends('layout')
@section('css')
    <link rel="stylesheet" href="{{asset('css/Gallery.css')}}">
@stop

@section('content')
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
                <span style="font-size:30px;cursor:pointer;color: #79c6be;font-weight: bold;height: 150px"
                      onclick="openNav()"> &#8285;</span>
            </div>
            <div>
                <img id="LogoGallery" src="img/LogoColor/GalleryLogo.png"/>
            </div>
            <h2>Gallery</h2>
        </div>
        <div id="asideRight" class="asideRight">
            {{--<video controls>--}}
                {{--<source src="VideoGallery/mov_bbb.mp4" type="video/mp4">--}}
                {{--<source src="VideoGallery/mov_bbb.ogg" type="video/ogg">--}}
                {{--Your browser does not support HTML5 video.--}}
            {{--</video>--}}
        </div>
        <div id="content" class="content">
            <ul id="SearchHide">
                <div stateid="5" id="StateId" style="display: none;"></div>
                <div cityid="88" id="CityId" style="display: none;"></div>
                <div id="LoadPlaceAjax">
                    @foreach($gallery as $gallerys)
                        <a id="ga" data-id="{{ $gallerys->id }}" href="">
                            <li class="li1">
                        <i class="featured-place-group ">
                                @if($gallerys->type==1)
                                    <div class="image">
                                        <img src="img/testjpg/{{$gallerys->image_url}}"/>
                                    </div>
                        </i>
                    </li></a>

                    <li class="li3">
                        <i class="featured-place-group ">
                            @elseif($gallerys->type==2)
                                <div class="image">
                                    <video controls>
                                        <source src="VideoGallery/{{$gallerys->video_url}}" type="video/mp4">
                                        <source src="VideoGallery/{{$gallerys->video_url}}" type="video/ogg">
                                    </video>
                                </div>
                            @endif
                        </i>
                    </li>
                @endforeach

                    <!--.......................................................-->

                </div>

            </ul>

            <input class="closebtnEnd" type="button" onclick="windowClose();">
        </div>

    </div>

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
        $(document).on('click', '#ga', function (e) {
            e.preventDefault();
            var $this = $(this);
            $.ajax({
                type: "POST",
                url: "/gallerys/index",
                data: {GalleryId : $this.closest('a').data('id'), "_token": "{{csrf_token()}}"},
                success: function (result) {
                    console.log(result);
                    $('#asideRight').html(result);

                }
            });
        });
    </script>
@stop