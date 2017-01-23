<div class="col-md-12">
    <div class="box box-default">
        <div class="box-body">
            <a href="/admin/make/{{$tax or ''}}/" class="btn btn-success">
                <i class="fa fa-edit"></i> <br> {{trans('admin.cms_make')}} {{$tax}}
            </a>
            <a href="/admin/cache/{{$tax or ''}}/" class="btn  btn-warning ">
                <i class="fa fa-edit"></i> <br> {{trans('admin.cms_clear_cache')}}
            </a>
            <a href="/admin/info/{{$tax or ''}}/" class="btn  btn-danger ">
                <i class="fa fa-edit"></i> <br> {{trans('admin.cms_info')}}
            </a>
            <a href="/admin/index/{{$tax or ''}}/" class="btn  btn-success ">
                <i class="fa fa-edit"></i> <br> {{trans('admin.cms_view_all')}}
            </a>
        </div>
    </div>
</div>