@if(!empty($builder_relations[$tax]))
    @foreach($builder_relations[$tax] as $row)
        @foreach($row as $hasMany)
            @if(!empty($hasMany['item']))
                <div class="card">
                    <div class="header">
                        <h4 class="title">{{trans('admin.cms_related')}} {{ucfirst($hasMany['item'])}}'s</h4>
                    </div>
                    <div class="content">
                        <form action="/admin/edit/{{$tax}}/">
                            <div class="row">
                                <table class="table table-striped">
                                    <thead>
                                    @foreach($builder_fields[$hasMany['item']] as $builder)
                                        @if(!empty($builder['table']) && $builder['table'] == 'true')
                                            <th>{{$builder['label']}}</th>
                                        @endif
                                    @endforeach
                                    <th>{{trans('admin.cms_action')}}</th>
                                    </thead>
                                    <tbody>
                                    @foreach($data->getMany($hasMany['item']) as $row)
                                        <tr>
                                            @foreach($builder_fields[$hasMany['item']] as $key => $builder)
                                                @if(!empty($builder['table']) && $builder['table'] == 'true')
                                                    <td>{{$row->$key}}</td>
                                                @endif
                                            @endforeach
                                            <td style="font-size: 20px; text-align: right;">
                                                <a href="/admin/edit/{{$tax}}/?id={{$row->id}}"><i
                                                            class="ti-settings"></i></a>
                                                <a href="/admin/duplicate/{{$tax}}/?id={{$row->id}}"><i
                                                            class="ti-layers"></i></a>
                                                <a href="/admin/delete/{{$tax}}/?id={{$row->id}}"><i
                                                            class="ti-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        @endforeach
    @endforeach
@endif