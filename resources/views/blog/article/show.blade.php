@extends('layouts.blog')
@section('content')
    <main id="main" class="site-main mdl-grid mdlwp-900" role="main">
        <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--2dp" style="display: block;">
            <article id="post-155" class="post-155 post type-post status-publish format-standard has-post-thumbnail hentry category-uncategorized">
                <div class="mdl-card__media" style="background-image: url('https://www.freejishu.com/wp-content/uploads/2016/08/110818_看图王.jpg');height:400px; ">
                    <header>
                        <h3><a>{{$article->title}}</a></h3></header><!-- .entry-header -->
                </div>
                <div class="mdl-color-text--grey-700 mdl-card__supporting-text meta">
                    <div class="avatar-img">
                        <img alt="" src="https://secure.gravatar.com/avatar/998a4820101c5491c986a7faf10457c8?s=32&amp;d=mm&amp;r=g" srcset="https://secure.gravatar.com/avatar/998a4820101c5491c986a7faf10457c8?s=64&amp;d=mm&amp;r=g 2x" class="avatar avatar-32 photo" height="32" width="32">			</div>
                    <div class="entry-meta">
                        <strong class="byline"> <span class="author vcard"><a class="url fn n" href="https://www.freejishu.com/archives/author/freejishu">{{$article->user->name}}</a></span></strong> <span class="posted-on"><a href="https://www.freejishu.com/archives/155" rel="bookmark"><time class="entry-date published" datetime="2016-08-29T13:11:39+00:00">{{$article->created_at->diffForHumans()}}</time></a></span>				</div><!-- .entry-meta -->
                </div>
                <div class="entry-content mdl-color-text--grey-600 mdl-card__supporting-text">
                   {{$article->content}}
                </div><!-- .entry-content -->

            </article><!-- #post-## -->
        </div><!-- .mdl-cell -->
        <div class="mdl-card__supporting-text mdl-cell mdl-cell--12-col mdl-card">
        <div>
            @if(!empty($article->tags))
                @foreach($article->tags as $tag)
                    <!-- Contact Chip -->
                        <span class="mdl-chip mdl-chip--contact">
                        <span class="mdl-chip__contact mdl-color--teal mdl-color-text--white">{{mb_strtoupper(mb_substr($tag->name,0,1))}}</span>
                        <span class="mdl-chip__text">{{$tag->name}}</span>
                        </span>
                @endforeach
            @endif
        </div>
            </div>
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