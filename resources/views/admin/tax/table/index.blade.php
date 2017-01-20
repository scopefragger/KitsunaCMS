@extends('admin.layouts.master')
@section('content')

    @include('admin.tax.partials._buttonCreate')
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <i class="fa fa-warning"></i>
                <h3 class="box-title">{{$tax or ''}}'s</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                    @foreach($builder_fields[$tax] as $builder)
                        @if(!empty($builder['table']) && $builder['table'] == 'true')
                            <th>{{$builder['label']}}</th>
                        @endif
                    @endforeach
                    </thead>
                    <tbody>
                    @if(!empty($data))
                        @foreach($data as $row)
                            <tr>
                                @foreach($builder_fields[$tax] as $key => $builder)
                                    @if(!empty($builder['table']) && $builder['table'] == 'true')
                                        <td>{{$row->$key}}</td>
                                    @endif
                                @endforeach
                                <td style="font-size: 20px; text-align: right;">
                                    <a href="/admin/edit/{{$tax}}/?id={{$row->id}}"><i class="ti-settings"></i></a>
                                    <a href="/admin/duplicate/{{$tax}}/?id={{$row->id}}"><i
                                                class="ti-layers"></i></a>
                                    <a href="/admin/delete/{{$tax}}/?id={{$row->id}}"><i class="ti-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
@endsection


