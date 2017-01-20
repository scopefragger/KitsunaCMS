<div class="col-md-12">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            @if(!empty($fields))
                @foreach($fields as $tab)
                    {{$loop->first}}
                    <li class="@if($loop->iteration==1) active @endif"><a href="#{{$tab['label']}}"
                                                                          data-toggle="tab"
                                                                          aria-expanded="false">{{$tab['label']}}</a>
                    </li>
                @endforeach
            @endif
        </ul>
        <div class="tab-content">
            @if(!empty($fields))
                @foreach($fields as $tab)
                    <div class="tab-pane active" id="{{$tab['label']}}">
                        <table class="table table-striped">
                            <tbody>
                            @foreach($tab as $key => $val)
                                @if(!is_array($val))
                                    <tr>
                                        <td>{{$key or ''}}</td>
                                        <td>{{$val or ''}}</td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>