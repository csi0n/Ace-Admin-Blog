<!DOCTYPE html>
<!-- saved from url=(0022)http://mdlwp.com/demo/ -->
<html lang="en-US"  class="mdl-js">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog</title>
    <!-- This site is optimized with the Yoast SEO plugin v3.1.2 - https://yoast.com/wordpress/plugins/seo/ -->
    <meta name="description" content="description">
    <meta name="robots" content="noindex,follow,noodp">
    <link rel="stylesheet"  href="{{asset('blog/asset/material-design-lite/material.min.css')}}" type="text/css" media="all">
    <script type="text/javascript" src="{{asset('blog/asset/material-design-lite/material.min.js')}}"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('blog/asset/style.css')}}" type="text/css" media="all">
    <!-- Material Design fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Bootstrap Material Design -->
    <link rel="stylesheet" href="https://cdn.rawgit.com/FezVrasta/bootstrap-material-design/dist/dist/bootstrap-material-design.min.css">
</head>
<body>
<div class="demo-layout-waterfall mdl-layout mdl-js-layout">
    <header class="mdl-layout__header mdl-layout__header--waterfall">
        <!-- Top row, always visible -->
        <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title"></span>
            <div class="mdl-layout-spacer"></div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                  mdl-textfield--floating-label mdl-textfield--align-right">
                <label class="mdl-button mdl-js-button mdl-button--icon"
                       for="waterfall-exp">
                    <i class="material-icons">search</i>
                </label>
                <div class="mdl-textfield__expandable-holder">
                    <input class="mdl-textfield__input" type="text" name="sample"
                           id="waterfall-exp">
                </div>
            </div>
        </div>
        <!-- Bottom row, not visible on scroll -->
        <div class="mdl-layout__header-row">
            <div class="mdl-layout-spacer"></div>
            <!-- Navigation -->
            <nav class="mdl-navigation">
                @if(!empty($blog_menus))
                    @foreach($blog_menus as $menu)
                        <a class="mdl-navigation__link" href="{{$menu['url']}}">{{$menu['name']}}</a>
                    @endforeach
                @endif
            </nav>
        </div>
    </header>
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Title</span>
        <nav class="mdl-navigation">
            @if(!empty($blog_menus))
                @foreach($blog_menus as $menu)
                    <a class="mdl-navigation__link" href="{{$menu['url']}}">{{$menu['name']}}</a>
                @endforeach
            @endif
        </nav>
    </div>
    <div class="mdl-layout__content ">
        @yield('content')
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
<script src="https://cdn.rawgit.com/HubSpot/tether/v1.3.4/dist/js/tether.min.js"></script>
<script src="https://cdn.rawgit.com/FezVrasta/bootstrap-material-design/dist/dist/bootstrap-material-design.iife.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="https://maxcdn.bootstrapcdn.com/js/ie10-viewport-bug-workaround.js"></script>
<script>
    $('body').bootstrapMaterialDesign();
</script>
</body>
</html>