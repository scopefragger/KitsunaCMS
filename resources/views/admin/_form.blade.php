@foreach($builder_fields[$tax] as $key => $builder)
    @if(!empty($builder['hidden']) && $builder['hidden'] == 'true' )

        {{--{{$tax}} Input Hidden--}}

    @else
        <div class="col-md-6">
            <div class="form-group">
                <label>{{$builder['label']}}</label>
                @if($builder['type'] == 'string')
                    <input type="text" name="{{$key}}" class="form-control border-input"
                           placeholder="{{$builder['placeholder']}}" value="{{$data->$key or ''}}">
                @elseif($builder['type'] == 'integer')
                    <input type="number" step="1" name="{{$key}}" class="form-control border-input"
                           placeholder="{{$builder['placeholder']}}" value="{{$data->$key or ''}}">
                @else
                    <input type="text" name="{{$key}}" class="form-control border-input"
                           placeholder="{{$builder['placeholder']}}" value="{{$data->$key or ''}}">
                @endif
            </div>
        </div>
    @endif
@endforeach