@extends('layouts.blog')
@section('content')
    <main class="site-main">
        @if($articles->total()>0)
            @foreach($articles as $article)
                <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--2dp article" style="display: block;">
                    <article id="post-155"
                             class="post-155 post type-post status-publish format-standard has-post-thumbnail hentry category-uncategorized">
                        <div class="mdl-card__media"
                             style="background-image: url('{{empty($article['thumb'])?asset('blog/asset/img/bg.jpg'):config('blog.img_prefix').$article['thumb']}}');height:400px; ">
                            <header>
                                <h3>
                                    <a style="" href="{{route('article.show',['id'=>$article['id']])}}"
                                       rel="bookmark">{{$article['title']}}</a>
                                </h3>
                            </header><!-- .entry-header -->
                        </div>
                        <div class="entry-content mdl-color-text--grey-600 mdl-card__supporting-text">
                            {!! $article['describe'] !!}
                        </div><!-- .entry-content -->
                        <footer class="entry-footer meta mdl-card__actions mdl-card--border">
                            <div class="avatar-img">
                                <img alt="" src="{{asset('blog/asset/img/user_head.png')}}"
                                     srcset="{{asset('blog/asset/img/user_head.png')}}" class="avatar avatar-32 photo"
                                     height="32" width="32"></div>
                            <div class="entry-meta">
                                <strong class="byline"> <span class="author vcard"><a class="url fn n"
                                                                                      href="javascript:;">{{$article->user->name}}</a></span></strong>
                                <span class="posted-on"><a href="javascript:;" rel="bookmark"><time
                                                class="entry-date published"
                                                datetime="">{{$article->created_at->diffForHumans()}}</time></a></span>
                            </div><!-- .entry-meta -->
                        </footer><!-- .entry-footer -->
                    </article><!-- #post-## -->
                </div>
            @endforeach
            {!! $pre->render() !!}
        @else
            <div class="mdl-empty">
                <i class="material-icons md-70">clear_all</i>
                <p>无数据</p>
            </div>
        @endif
    </main>
@endsection