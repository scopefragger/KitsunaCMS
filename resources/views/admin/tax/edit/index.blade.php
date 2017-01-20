@extends('admin.layouts.master')
@section('content')
    @include('admin.tax.partials._buttonEdit')
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <i class="fa fa-warning"></i>

                <h3 class="box-title">Update {{$tax or ''}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <form action="/admin/edit/{{$tax}}/">
                    <div class="row">
                        @include('admin._form')
                    </div>
                    <div class="row">
                        <div class="text-center">
                            <button type="submit" class="btn btn-info btn-fill btn-wd">Create {{$tax}}</button>
                        </div>
                    </div>
                </form>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

    @include('admin.tax.partials._hasMany')
    @include('admin.tax.partials._modules')
@endsection



