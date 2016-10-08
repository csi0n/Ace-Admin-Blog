<ul class="nav nav-list">
    @if($menus)
            @foreach($menus as $v)
                @permission($v['slug'])
                @if($v['child'])
                <li class="{{active_class(if_uri_pattern(explode(',',$v['url'])),'active')}}">
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-desktop"></i>
                        <span class="menu-text"> {{$v['name']}} </span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu">
                       @foreach($v['child'] as $val)
                           @permission($val['slug'])
                            <li class="{{active_class(if_uri_pattern($val['url'].'*'),'open')}}">
                                <a href="{{url($val['url'])}}">
                                    <i class="icon-double-angle-right"></i>
                                    {{$val['name']}}
                                </a>
                            </li>
                           @endpermission
                        @endforeach
                    </ul>
                </li>
                @else
                        <li class="{{active_class(if_uri_pattern([$v['url']]))}}">
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-desktop"></i>
                                <span class="menu-text"> {{$v['name']}} </span>
                            </a>
                        </li>
                @endif
                @endpermission
        @endforeach
    @endif
</ul><!-- /.nav-list -->