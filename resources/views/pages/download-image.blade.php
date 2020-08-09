@extends('layouts.mester')

<!-- @section('title')
Trang chủ
@endsection -->

@section('content')
<style>
    #addText {
        display: none;
    }

    body {
        margin: 0px;
        font-family: "Open Sans", sans-serif;
    }

    #context-menu {
        position: fixed;
        z-index: 10000;
        width: 150px;
        background: #1b1a1a;
        border-radius: 5px;
        transform: scale(0);
        transform-origin: top left;
    }

    #context-menu.active {
        transform: scale(1);
        transition: transform 300ms ease-in-out;
    }

    #context-menu .item {
        padding: 8px 10px;
        font-size: 15px;
        color: #eee;
    }

    #context-menu .item:hover {
        background: #555;
    }

    #context-menu .item i {
        display: inline-block;
        margin-right: 5px;
    }

    #context-menu hr {
        margin: 2px 0px;
        border-color: #555;
    }

    .cursor-pointer {
        cursor: pointer;
    }
</style>
<!-- <div class="w-100" style="margin: auto; padding: 100px;">
    <div class="w-100" style="height: 300px;">
        <div id="htmltoimage" style="background-image: url('img/about-bg.jpg');">
            <div class="imgbg h-100">
                <div id="addText" style="margin-left: 5px; color:yellow">Bình Nguyễn</div>
            </div>
        </div>
    </div>
</div> -->

<div class="w-100" style="margin: auto; padding: 100px;">
    <div class="w-100" style="height: 300px;">
        <div id="htmltoimage" style="background-image: url('img/about-bg.jpg');">
            <div class="imgbg h-100">
                <div id="addText" style="margin-left: 5px; color:yellow">Bình Nguyễn</div>
            </div>
        </div>
    </div>
</div>




<div id="context-menu">
    <div class="item">
        <i class="fa fa-cut"></i> Cut
    </div>
    <div class="item">
        <i class="fa fa-clone"></i> Copy
    </div>
    <div class="item">
        <i class="fa fa-paste"></i> Paste
    </div>
    <div class="item">
        <i class="fa fa-trash"></i> Delete
    </div>
    <hr>
    <div class="item cursor-pointer" onclick="downloadimage()">
        <i class="fa fa-download"></i> Download
    </div>
    <div class="item">
        <i class="fa fa-times"></i> Exit
    </div>
</div>


<!-- </div> -->
@endsection

<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    function downloadimage() {
        document.getElementById("addText").style.display = "block";
        var container = document.getElementById("htmltoimage");;
        html2canvas(container, {
            allowTaint: true
        }).then(function(canvas) {
            var link = document.createElement("a");
            document.body.appendChild(link);
            link.download = "html_image.jpg";
            link.href = canvas.toDataURL();
            link.target = '_blank';
            link.click();
        });
        document.getElementById("addText").style.display = "none";
    }

    window.addEventListener("contextmenu", function(event) {
        event.preventDefault();
        var contextElement = document.getElementById("context-menu");
        contextElement.style.top = event.offsetY+100 + "px";
        contextElement.style.left = event.offsetX+100 + "px";
        contextElement.classList.add("active");
    });
    window.addEventListener("click", function() {
        document.getElementById("context-menu").classList.remove("active");
    });
</script>