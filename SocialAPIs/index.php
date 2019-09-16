<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Social Networks API</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">
    
    <style>
        body{
            background: url(sunset.jpg) center center fixed;
            background-size: cover;
            text-align: center;
            font-family: Arvo, serif;
        }
        
        .jumbotron{
            background-color: transparent;
        }
        
        .jumbotron h1{
            letter-spacing: 2.5px;
        }
        
        .form-horizontal{
            margin-top: 50px;
        }
        
        .row{
            margin-top: 30px;
        }
        .col-sm-2{
            margin-bottom: 10px;
        }
    </style>
  </head>
  <body>
    <!--facebook code-->
    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v4.0"></script>
    <div class="jumbotron">
        <div class="container-fluid">
            <h1>Join us and make Websites</h1>
            <p>We build high quality and responsive websites.</p>
        </div>
        
        <form class="form-horizontal">
            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-8">
                    <input type="email" id="email" placeholder="Your Email" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-offset-3 col-xs-6">
                    <input type="submit" id="submit" value="Subscribe" class="btn btn-info btn-lg">
                </div>
            </div>
        </form>
        
        <div class="row">
            <!--twitter-->
            <div class="col-sm-offset-3 col-sm-2">
                <a class="twitter-share-button"
      href="https://twitter.com/intent/tweet">
    Tweet</a>    
            </div>
            <!--facebook-->
            <div class="col-sm-2">
                <div class="fb-like" data-href="http://mike.offyoucode.co.uk/SocialAPIs" data-width="" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
            </div>
        </div>
        <!--twitter timeline-->
        <div>
            <a class="twitter-timeline" data-width="550" data-height="600" href="https://twitter.com/NaturePhots?ref_src=twsrc%5Etfw">Tweets by NaturePhots</a> 
        </div>
    </div>
    
    <!--twitter-->
    <script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0], 
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);

  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };

  return t;
}(document, "script", "twitter-wjs"));</script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>