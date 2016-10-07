@extends('layouts.blog')
@section('content')
    <main class="site-main mdl-grid mdlwp-900">
        @foreach($articles as $article)
            <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--2dp article" style="display: block;">
                <article id="post-155" class="post-155 post type-post status-publish format-standard has-post-thumbnail hentry category-uncategorized">
                    <div class="mdl-card__media" style="background-image: url('https://www.freejishu.com/wp-content/uploads/2016/08/110818_看图王.jpg');height:400px; ">
                        <header>
                            <h3>
                                <a style="" href="{{route('article.show',['id'=>$article['id']])}}" rel="bookmark">{{$article['title']}}</a>
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
@endsection