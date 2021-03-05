<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demo App</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style type="text/css">
      *{margin: 0;padding: 0;}
      body{margin: 0;padding: 0;width: 100%;}
      .notifications {
        width: 100%;
        border: 2px solid #1defed;
      }
    </style>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   
    <div class="container">
      <div class="row">
        <div class="col-md-12 notifications">
          <ul id="notification_list"></ul>
        </div>
      </div>
    </div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
     <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
     <script type="text/javascript" src="{{ asset('/js/data.js') }}"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher(confData.key, {
      cluster: confData.cluster
    });
    
    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      $('#notification_list').append('<li>' + data.message +'</li>');
      console.log('response-msg: '+ data.message);
    });
  </script>    


  </body>
</html>
