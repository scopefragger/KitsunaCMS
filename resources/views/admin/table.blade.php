@extends('admin.layout')
@section('content')

    @include('admin._buttonCreate')

    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">{{$tax or ''}}'s</h4>
            </div>
            <div class="content">
                <div class="content table-responsive table-full-width">
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
            </div>
        </div>
    </div>
@endsection




