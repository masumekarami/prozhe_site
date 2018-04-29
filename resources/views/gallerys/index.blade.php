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
        <div id="asideRight"  class="asideRight">

            <div class="VIDEO">

            </div>
        </div>
        {{--<div style="height: 200px;width: 300px" id="asideRight">--}}

        {{--</div>--}}

        <div id="content" class="content">
            <ul id="SearchHide">
                <div id="LoadPlaceAjax">
                    @foreach($gallery as $gallerys)

                        @if(!empty($gallerys->image_url))
                            <a class="galleryy" data-id="{{ $gallerys->id }}" href="">
                                <li class="li1">
                                    <i class="featured-place-group "></i>
                                    <div class="image">
                                        <img src="{{$upload}}/{{$gallerys->image_url}}"/>
                                    </div>
                                </li></a>
                        @elseif(!empty($gallerys->prev_url))
                            <a class="galleryy" data-id="{{ $gallerys->id }}" href="">
                                <li class="li4">
                                    <i class="featured-place-group "></i>
                                    <div class="image">
                                        <img src="{{$upload}}/{{$gallerys->prev_url}}"/>

                                        {{--<p>{{$gallerys->title}}</p>--}}
                                        {{--<video controls>--}}
                                        {{--<source src="{{$upload}}/{{$gallerys->prev_url}}" type="video/mp4">--}}
                                        {{--<source src="{{$upload}}/{{$gallerys->video_url}}" type="video/ogg">--}}
                                        {{--</video>--}}
                                    </div>
                                </li>
                            </a>
                    @endif
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
        $(document).on('click', '.galleryy', function (e) {
            e.preventDefault();
            var $this = $(this);
            $.ajax({
                type: "GET",
                url: "/gallerys/" + $this.closest('a').data('id'),
                success: function (result)   // A function to be called if request succeeds
                {
                    console.log(result);
                    if(result.image_url != '')
                    {
                        var path = '{{$upload}}/'+ result.image_url;
                        $('<img  />').attr('src', path)
                        $('#asideRight').html('<img class="VIDEO" type="hidden" src="'+path+'" >');
                    }
                    else if(result.video_url != '')
                    {
                        var path = '{{$upload}}/'+ result.video_url;
                        $('<video></video>').attr('src', path)
                        $('#asideRight').html(' <video class="VIDEO" controls>'+'<source type="video/mp4" src="'+path+'" >'+'</video>');

                    }

                }
            });
        });
    </script>

@stop