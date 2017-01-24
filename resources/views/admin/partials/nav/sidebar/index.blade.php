<ul class="sidebar-menu">
    @foreach($builder_nav as $key => $builder)
        @if(empty($builder['children']))
            <li class="">
                <a href="/admin/index/{{$builder or ''}}">
                    <i class="ti-pie-chart"></i>
                    <p>{{$builder or ''}}</p>
                </a>
            </li>
        @else
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>{{$key or ''}}</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @if(!empty($builder['children']))
                        @foreach($builder['children'] as $child)
                            <li><a href="/admin/index/{{$child or ''}}"><i class="fa fa-circle-o"></i>{{$child or ''}}
                                </a></li>
                        @endforeach
                    @endif
                </ul>
            </li>
        @endif
    @endforeach
</ul>