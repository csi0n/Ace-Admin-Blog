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
                <a class="mdl-navigation__link" href="">Link</a>
                <a class="mdl-navigation__link" href="">Link</a>
                <a class="mdl-navigation__link" href="">Link</a>
                <a class="mdl-navigation__link" href="">Link</a>
            </nav>
        </div>
    </header>
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Title</span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="">Link</a>
            <a class="mdl-navigation__link" href="">Link</a>
            <a class="mdl-navigation__link" href="">Link</a>
            <a class="mdl-navigation__link" href="">Link</a>
        </nav>
    </div><div class="mdl-layout__content ">
        <main class="site-main mdl-grid mdlwp-900">
                @foreach($articles as $article)
                    <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--2dp article" style="display: block;">
                        <article id="post-155" class="post-155 post type-post status-publish format-standard has-post-thumbnail hentry category-uncategorized">
                            <div class="mdl-card__media" style="background-image: url('https://www.freejishu.com/wp-content/uploads/2016/08/110818_看图王.jpg');height:400px; ">
                                <header>
                                    <h3>
                                        <a style="" href="{{route('article',['id'=>$article['id']])}}" rel="bookmark">{{$article['title']}}</a>
                                    </h3>			</header><!-- .entry-header -->
                            </div>
                            <div class="entry-content mdl-color-text--grey-600 mdl-card__supporting-text">
                                {{$article['content']}}
                            </div><!-- .entry-content -->

                            <footer class="entry-footer meta mdl-card__actions mdl-card--border">

                                <div class="avatar-img">
                                    <img alt="" src="https://secure.gravatar.com/avatar/998a4820101c5491c986a7faf10457c8?s=32&amp;d=mm&amp;r=g" srcset="https://secure.gravatar.com/avatar/998a4820101c5491c986a7faf10457c8?s=64&amp;d=mm&amp;r=g 2x" class="avatar avatar-32 photo" height="32" width="32">			</div>

                                <div class="entry-meta">
                                    <strong class="byline"> <span class="author vcard"><a class="url fn n" href="javascript:;">{{$article->user->name}}</a></span></strong> <span class="posted-on"><a href="javascript:;" rel="bookmark"><time class="entry-date published" datetime=""></time></a></span>			</div><!-- .entry-meta -->

                            </footer><!-- .entry-footer -->
                        </article><!-- #post-## -->
                    </div>
                @endforeach
                        <nav class="center mdl-color-text--grey-50 mdl-cell mdl-cell--12-col" role="navigation">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true" class="material-icons">chevron_left</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true" class="material-icons">chevron_right</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                        </nav>


        </main>
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