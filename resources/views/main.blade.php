<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>E3</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="css/app.css" rel="stylesheet">

</head>
<body>

<!-- Top Mobile Block -->
<div class="col-md-6 e3-hero-box-small visible-xs visible-sm">
    <img src="Logos.jpg" class="row logos">
    <h2 class="e3-hero-text">
        e3creative<br>invites you<br>to Ascot.
    </h2>
</div>

<!-- Left Hand Block -->
<div class="col-md-3 e3-sidebar" style="padding: 0;">
    <a href="/"><img src="Logos.jpg" class="row logos hidden-xs hidden-sm"></a>
    <div class="col-sm-12 e3-text">
        <p class="col-xs-12"><b>21st January 2017, hosted by e3creative directors Jake Welsh, Gary Neville & Ged
                Tivey.</b></p>
        <p class="e3-inner col-xs-12"> The event will hold a great days racing, buffet, drinks and entertainment, with a
            great
            chance to meet e3’s
            wider directors and client roster. We would be delighted if you can attend the day, should you wish to
            attent please insert your details into the form below. Further information surrounding dress code and
            information on the day
            will be sent closer to the event.</p>
    </div>
    <hr>
    @yield('content')
</div>

<!-- Right Hand Block -->
<div class="col-md-6 e3-hero-box hidden-xs hidden-sm">
    <h2 class="e3-hero-text">
        e3creative<br>invites you<br>to Ascot.
    </h2>
</div>

<!-- scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js"></script>

<script>
    $(document).ready(function () {
        var validator = $("form").validate();
    });
</script>
</body>
</html>
