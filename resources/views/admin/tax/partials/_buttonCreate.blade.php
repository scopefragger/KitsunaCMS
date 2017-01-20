<div class="col-md-12">
    <div class="box box-default">
        <div class="box-body">
            <a href="/admin/make/{{$tax or ''}}/" class="btn btn-success">
                <i class="fa fa-edit"></i> <br> Make {{$tax}}
            </a>
            <a href="/admin/cache/{{$tax or ''}}/" class="btn  btn-warning ">
                <i class="fa fa-edit"></i> <br> Clear Cache
            </a>
            <a href="/admin/info/{{$tax or ''}}/" class="btn  btn-danger ">
                <i class="fa fa-edit"></i> <br> Info
            </a>
            <a href="/admin/index/{{$tax or ''}}/" class="btn  btn-success ">
                <i class="fa fa-edit"></i> <br> View All
            </a>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>