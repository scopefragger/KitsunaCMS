<ul class="sidebar-menu">
    @foreach($builder_nav as $builder)
        <li class="">
            <a href="/admin/index/{{$builder}}">
                <i class="ti-pie-chart"></i>
                <p>{{$builder}}</p>
            </a>
        </li>
    @endforeach
</ul>