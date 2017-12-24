<!DOCTYPE html>
<html>
    <head>
        <title>Intégration Creative Coding {{ $data->title }}</title>
    </head>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.5.16/p5.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.5.16/addons/p5.sound.js"></script>
    <script>
        {!! $data->script !!}
    </script>
</html>