<!DOCTYPE html>
<html>
    <head>
        <title>Intégration Creative Coding {{ $data->title }}</title>
    </head>
    <style>
    html, body {
        height: 100%;
    }
    body{
  margin: 0;
  display: flex;

  /* This centers our sketch horizontally. */
  justify-content: center;

  /* This centers our sketch vertically. */
  align-items: center;
    
    }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.5.16/p5.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.5.16/addons/p5.sound.js"></script>
    <script>
        {!! $data->script !!}
    </script>
    <body>
    </body>
</html>