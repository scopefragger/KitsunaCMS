<div class="col-md-12">
    <div class="box box-default">
        <div class="box-body">
            <a href="/admin/index/{{$tax or ''}}/" class="btn btn-danger">
                <i class="fa fa-edit"></i> <br> Back
            </a>
            @if($data->modules == "true")
                <a href="/admin/make/modules?back=true" class="btn btn-success ">
                    <i class="fa fa-edit"></i> <br> New Module
                </a>
            @endif
            <a href="/admin/duplicate/{{$tax or ''}}/" class="btn btn-warning">
                <i class="fa fa-edit"></i> <br> Duplicate
            </a>
            <a href="/admin/delete/{{$tax or ''}}/" class="btn btn-danger">
                <i class="fa fa-edit"></i> <br> Delete
            </a>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>


<div class="col-lg-2 col-sm-3">
    <div class="card">
        <div class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="icon-big icon-warning text-center">
                        <a href="/admin/duplicate/{{$tax or ''}}?id={{$data->id}}"> <i class="ti-layers"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-2 col-sm-3">
    <div class="card">
        <div class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="icon-big icon-warning text-center">
                        <a href="/admin/delete/{{$tax or ''}}?id={{$data->id}}"> <i class="ti-trash"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
