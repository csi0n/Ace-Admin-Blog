@extends('layouts.blog')
@section('content')
    <main id="main" class="site-main" role="main">
        <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--2dp" style="display: block;">
            <article id="post-155" class="post-155 post type-post status-publish format-standard has-post-thumbnail hentry category-uncategorized">
                <div class="mdl-card__media" style="background-image: url('{{empty($article['thumb'])?asset('blog/asset/img/bg.jpg'):config('blog.img_prefix').$article['thumb']}}');height:400px; ">
                    <header>
                        <h3><a>{{$article->title}}</a></h3></header><!-- .entry-header -->
                </div>
                <div class="mdl-color-text--grey-700 mdl-card__supporting-text meta">
                    <div class="avatar-img">
                        <img alt="" src="{{asset('blog/asset/img/user_head.png')}}" srcset="{{asset('blog/asset/img/user_head.png')}}" class="avatar avatar-32 photo" height="32" width="32">			</div>
                    <div class="entry-meta">
                        <strong class="byline"> <span class="author vcard"><a class="url fn n" href="javascript:;">{{$article->user->name}}</a></span></strong> <span class="posted-on"><a href="javascript:;" rel="bookmark"><time class="entry-date published" datetime="{{$article->created_at->diffForHumans()}}">{{$article->created_at->diffForHumans()}}</time></a></span>				</div><!-- .entry-meta -->
                </div>
                <div class="entry-content mdl-color-text--grey-600 mdl-card__supporting-text">
                    <article class="markdown-body">
                        {!! $article->content !!}
                    </article>

                </div><!-- .entry-content -->

            </article><!-- #post-## -->
        </div><!-- .mdl-cell -->
            @if(!$article->tags->isEmpty())
            <div class="mdl-card__supporting-text mdl-cell mdl-cell--12-col mdl-card">
                <div>
                @foreach($article->tags as $tag)
                    <!-- Contact Chip -->
                        <span class="mdl-chip mdl-chip--contact">
                        <span class="mdl-chip__contact mdl-color--teal mdl-color-text--white">{{mb_strtoupper(mb_substr($tag->name,0,1))}}</span>
                        <span class="mdl-chip__text">{{$tag->name}}</span>
                        </span>
                @endforeach
                </div>
            </div>
            @endif

        <div class="mdl-card__supporting-text mdl-cell mdl-cell--12-col mdl-card">
            <h3><span>{{$article->title}}</span></h3>
            <!-- 多说评论框 start -->
            <div class="ds-thread" data-thread-key="{{$article->id}}" data-title="{{$article->title}}" data-url="{{route('article.show',['id'=>$article->id])}}}}"></div>
            <!-- 多说评论框 end -->
            <!-- 多说公共JS代码 start (一个网页只需插入一次) -->
            <script type="text/javascript">
                var duoshuoQuery = {short_name:"{{config('duoshuo.short_name')}}"};
                (function() {
                    var ds = document.createElement('script');
                    ds.type = 'text/javascript';ds.async = true;
                    ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
                    ds.charset = 'UTF-8';
                    (document.getElementsByTagName('head')[0]
                    || document.getElementsByTagName('body')[0]).appendChild(ds);
                })();
            </script>
            <!-- 多说公共JS代码 end -->
        </div><!-- #comments -->
    </main>
@endsection