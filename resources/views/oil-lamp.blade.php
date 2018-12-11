<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--    <link rel="icon" href="../../../../favicon.ico">-->

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <!--    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <!--    <link href="starter-template.css" rel="stylesheet">-->
</head>

<body>

<main role="main" class="container-fluid">

    <h3 align="center" class="display-4">
        <img style="margin-left: 10px;"
             src="{!! asset('https://upload.wikimedia.org/wikipedia/commons/thumb/4/45/Dialog_Axiata_logo.svg/1200px-Dialog_Axiata_logo.svg.png') !!}"
             width="100">
        <br>
        Car Park
    </h3>
    <section>
        <div class="row">
            <div class="col" id="1">
                <img src="{{ asset('img/on.gif') }}" alt="">
            </div>
            <div class="col" id="2">
                <img src="{{ asset('img/on.gif') }}" alt="">
            </div>
            <div class="col" id="3">
                <img src="{{ asset('img/on.gif') }}" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col" id="4"></div>
            <div class="col" id="5"></div>
            <div class="col" id="6"></div>
        </div>
    </section>

</main><!-- /.container -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>--}}
{{--<script>--}}
{{--var x = document.getElementById("demo");--}}

{{--function getLocation() {--}}
{{--if (navigator.geolocation) {--}}
{{--alert('asdasd');--}}
{{--navigator.geolocation.getCurrentPosition(showPosition);--}}
{{--} else {--}}
{{--x.innerHTML = "Geolocation is not supported by this browser.";--}}
{{--}--}}
{{--}--}}

{{--function showPosition(position) {--}}
{{--x.innerHTML = "Latitude: " + position.coords.latitude +--}}
{{--"<br>Longitude: " + position.coords.longitude;--}}
{{--}--}}
{{--</script>--}}

<script>
    $(document).ready(function () {

        setInterval(function () {
            $.get("{{url('/lamp-info')}}", function (data) {
                // alert(window.location.host);
                // let component = "";
                // $.each(data, function (i, t) {
                //     component += '<li class="list-group-item d-flex justify-content-between align-items-center">'
                //         + i
                //         + '<span class="badge" style="font-size: large">' + t + '</span>'
                //         + '</li>';
                //
                //     console.log(i + ':' + t);
                //
                // });
                // $('#component').html(component);
            })
        }, 3000)
    })
</script>
</body>
</html>
