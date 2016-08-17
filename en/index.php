<?php
session_start();
require_once('../includes/Database.php');

$db = new Database();
$conn = $db->connectToDatabase();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dive Into Fame</title>

    <link rel="apple-touch-icon" sizes="57x57" href="../img/icons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../img/icons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../img/icons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../img/icons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../img/icons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../img/icons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../img/icons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../img/icons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../img/icons/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="../img/icons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="../img/icons/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="../img/icons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="../img/icons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="../img/icons/manifest.json">
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="msapplication-TileImage" content="../img/icons/mstile-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
    <link href="../style/materialize.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../style/mainStyle.css">
    <script src="../js/jQuery.js"></script>
    <script src="../js/materialize.min.js"></script>
</head>
<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/hr_HR/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<?php require_once('../fragments/header-en.php') ?>
<main>
    <section id="section-left">
        <div id="section-wrapper-left">
            <div class="instagram-box">
                <blockquote class="instagram-media" data-instgrm-captioned data-instgrm-version="4" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:658px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:8px;"> <div style=" background:#F8F8F8; line-height:0; margin-top:40px; padding:50% 0; text-align:center; width:100%;"> <div style=" background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAMAAAApWqozAAAAGFBMVEUiIiI9PT0eHh4gIB4hIBkcHBwcHBwcHBydr+JQAAAACHRSTlMABA4YHyQsM5jtaMwAAADfSURBVDjL7ZVBEgMhCAQBAf//42xcNbpAqakcM0ftUmFAAIBE81IqBJdS3lS6zs3bIpB9WED3YYXFPmHRfT8sgyrCP1x8uEUxLMzNWElFOYCV6mHWWwMzdPEKHlhLw7NWJqkHc4uIZphavDzA2JPzUDsBZziNae2S6owH8xPmX8G7zzgKEOPUoYHvGz1TBCxMkd3kwNVbU0gKHkx+iZILf77IofhrY1nYFnB/lQPb79drWOyJVa/DAvg9B/rLB4cC+Nqgdz/TvBbBnr6GBReqn/nRmDgaQEej7WhonozjF+Y2I/fZou/qAAAAAElFTkSuQmCC); display:block; height:44px; margin:0 auto -44px; position:relative; top:-22px; width:44px;"></div></div> <p style=" margin:8px 0 0 0; padding:0 4px;"> <a href="https://instagram.com/p/6NDZtMuKt8/" style=" color:#000; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none; word-wrap:break-word;" target="_top">#wearethemakersofourowndestiny #diveintofame #havealeapoffait #keepbreathing #keeploving #keepcreating</a></p> <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">A photo posted by @diveintofame on <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;" datetime="2015-08-10T13:07:44+00:00">Aug 10, 2015 at 6:07am PDT</time></p></div></blockquote>
                <script async defer src="//platform.instagram.com/en_US/embeds.js"></script>
            </div>
            <div class="instagram-tags-box">
                <h5 class="black-bottom">Instagram tags #diveintofame</h5>
                <iframe src="http://snapwidget.com/sl/?h=ZGl2ZWludG9mYW1lfGlufDQwMHwzfDN8fG5vfDV8bm9uZXxvblN0YXJ0fHllc3xubw==&ve=130815" title="Instagram Widget" class="snapwidget-widget" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:405px; height:405px"></iframe>
            </div>
            <div style="clear: both;"></div>
        </div>
        <div style="clear: both;"></div>
    </section>
    <section id="section-right">
        <div id="section-wrapper-right">
            <div class="news-feed-box">
                <h5>News feed:</h5>
                <p>
                    12.08.2015. 21:09<br>
                    Stay tuned to find out more details about DiveIntoFame
                </p>
            </div>
            <div class="twitter-box">
                <h5 class="white-bottom">Follow us on Twitter:</h5>
                <a class="twitter-timeline" href="https://twitter.com/diveintofame" data-widget-id="631527703276068864">Tweets by @diveintofame</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </div>
            <div class="facebook-box">
                <h5 class="white-bottom">Like Us on Facebook:</h5>
                <div class="fb-like" data-href="https://developers.facebook.com/diveintofame" data-width="400" data-layout="standard" data-action="like" data-show-faces="true" data-share="true" data-colorscheme="dark"></div>
            </div>
        </div>
        <div style="clear: both;"></div>
    </section>
    <div style="clear: both;"></div>
</main>
</body>
<script src="../js/script.js"></script>
<script src="../js/ajaxScripts.js"></script>
</html>
<?php
$db->closeConnection($conn);
?>