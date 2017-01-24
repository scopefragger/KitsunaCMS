<div class="col-md-12">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            {{-- Loop though each tab --}}
            @if(!empty($builder_tabs))
                @foreach($builder_tabs[$tax] as $tab => $val)
                    <li class="@if($loop->iteration == '1') active @endif">
                        <a href="#{{$tab}}" data-toggle="tab" aria-expanded="false">{{$tab}}</a>
                    </li>
                @endforeach
            @endif
            {{-- End looping though ech tab --}}
        </ul>
        <div class="tab-content">
            {{-- Loop Though each Tab --}}
            @if(!empty($builder_tabs))
                @foreach($builder_tabs[$tax] as $tab => $val)
                    <div class="tab-pane active" id="{{$tab}}">
                        {{-- Loops Each builder Field for the current Model --}}
                        @foreach($builder_fields[$tax] as $key => $builder)
                            @if(!empty($builder['hidden']) && $builder['hidden'] == 'true' )
                                {{-- Handels the fact that not all inputs need to be made visable--}}
                            @else
                                {{-- Check that each item has the current Tab Parent --}}
                                @if(!empty($builder['parent']) && $builder['parent'] == $tab)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{$builder['label']}}</label>
                                            @if($builder['type'] == 'string')
                                                <input type="text" name="{{$key}}" class="form-control border-input"
                                                       placeholder="{{$builder['placeholder']}}"
                                                       value="{{$data->$key or ''}}">
                                            @elseif($builder['type'] == 'integer')
                                                <input type="number" step="1" name="{{$key}}"
                                                       class="form-control border-input"
                                                       placeholder="{{$builder['placeholder']}}"
                                                       value="{{$data->$key or ''}}">
                                            @else
                                                <input type="text" name="{{$key}}" class="form-control border-input"
                                                       placeholder="{{$builder['placeholder']}}"
                                                       value="{{$data->$key or ''}}">
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                        {{-- End of the loop within the current Model --}}
                    </div>
                @endforeach
            @endif
            {{-- End of Tab Loop --}}
        </div>
    </div>
</div>