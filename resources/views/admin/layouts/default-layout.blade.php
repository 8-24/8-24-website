<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- SEO -->
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="John Doe">
    <!-- Networks -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="img/fav.png" width="27px" height="10px"/>
    <title>Admin 8-24 agence</title>

    <!-- Styles -->
    <link href="{{ asset('css/skel.css') }}" rel="stylesheet">
    <!--<link href="{{ asset('css/console.css') }}" rel="stylesheet">-->
    <link href="{{ asset('css/dahsboard-style.css') }}" rel="stylesheet">
</head>
<body>
<header class="app-header navbar">
    <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/admin/">
        <img src="{{ asset('/img/logo.svg') }}" alt="" style="width: 60%; height: auto;margin: 5%;">
    </a>
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item d-md-down-none">
            <a class="nav-link" href="#"><i class="icon-list"></i></a>
        </li>
        <li class="nav-item d-md-down-none">
            <a class="nav-link" href="#"><i class="icon-location-pin"></i></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img src="img/avatars/6.jpg" class="img-avatar" alt="">
            </a>
        </li>
    </ul>
    <button class="navbar-toggler aside-menu-toggler" type="button">
        <span class="navbar-toggler-icon"></span>
    </button>

</header>
    <div class="app-body">
        <div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html"><i class="icon-speedometer"></i> Dashboard <span class="badge badge-primary">NEW</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-puzzle"></i> /</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/home"><i class="icon-puzzle"></i>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/works"><i class="icon-puzzle"></i>Works</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/blog"><i class="icon-puzzle"></i>Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/labs/categories"><i class="icon-puzzle"></i>Labs catégories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/labs/posts"><i class="icon-puzzle"></i>Labs posts</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/processing-frame"><i class="icon-puzzle"></i>Labs Processing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/contact"><i class="icon-puzzle"></i>Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/home"><i class="icon-puzzle"></i>SEO</a>
                    </li>
                </ul>
            </nav>
        </div>


        <!-- Main content -->
        <main class="main">
            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="row">
                        @yield('content')
                    </div>
                    <!--/.row-->
                </div>

            </div>
            <!-- /.conainer-fluid -->
        </main>


<!--</div>-->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script>
    $('#lfm').filemanager('image');


    var editor_config = {
        path_absolute : "/",
        selector: "textarea.my-editor",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no"
            });
        }
    };

    tinymce.init(editor_config);
</script>



</body>
</html>
