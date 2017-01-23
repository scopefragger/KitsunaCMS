<div class="col-md-12">
    <div class="box box-default">
        <div class="box-body">
            <a href="/admin/index/{{$tax or ''}}/" class="btn btn-danger">
                <i class="fa fa-edit"></i> <br> {{trans('admin.cms_back')}}
            </a>
            @if($data->modules == "true")
                <a href="/admin/make/modules?back=true" class="btn btn-success ">
                    <i class="fa fa-edit"></i> <br> {{trans('admin.cms_new')}} {{trans('admin.cms_module')}}
                </a>
            @endif
            <a href="/admin/duplicate/{{$tax or ''}}/" class="btn btn-warning">
                <i class="fa fa-edit"></i> <br> {{trans('admin.cms_duplicate')}}
            </a>
            <a href="/admin/delete/{{$tax or ''}}/" class="btn btn-danger">
                <i class="fa fa-edit"></i> <br> {{trans('admin.cms_delete')}}
            </a>
        </div>
    </div>
</div>