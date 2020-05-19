<h1>Videos</h1>

<style>

    ul li {
        list-style: none;
    }

    .video {
        background: #005299;
        margin: 10px;
        width: 480px;
        height: 320px;
    }

    .miniatura {
        background: #0091ea;
        color: #fff;
        margin: 10px;
        width: 105px;
        height: 100px;
        float: left
    }

</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>

    $(document).ready(function () {
        $('#lista li a').click(function () {
            var id = $(this).attr('id');

            if (id == "v1") {
                $("#video").html('<embed id="embed" width="480" height="320" src="https://www.youtube.com/embed/5gDjYPSlnAE">');
            }
            if (id == "v2") {
                $("#video").html('<embed id="embed" width="480" height="320" src="https://www.youtube.com/embed/HLbLg2FVQ68">');
            }
            if (id == "v3") {
                $("#video").html('<embed id="embed" width="480" height="320" src="https://www.youtube.com/embed/-KTIswXkBPw">');
            }
            if (id == "v4") {
                $("#video").html('<embed id="embed" width="480" height="320" src="https://www.youtube.com/embed/MLi6OWFWYmc">');
            }
        });
    });

</script>

<ul id='lista'>
    <li class="video">
        <div id="video">
            <embed width="480" height="320" src="https://www.youtube.com/embed/SNKE_B__51E">
        </div>
    </li>
    <li class="miniatura"><a id="v1" href="#">VIDEO 1</a></li>
    <li class="miniatura"><a id="v2" href="#">VIDEO 2</a></li>
    <li class="miniatura"><a id="v3" href="#">VIDEO 3</a></li>
    <li class="miniatura"><a id="v4" href="#">VIDEO 4</a></li>
</ul>


