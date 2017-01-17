@extends('admin.layout')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Create New {{$tax or ''}}</h4>
            </div>
            <div class="content">
                <form action="/admin/create/{{$tax}}/">
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
        </div>
    </div>
@endsection

