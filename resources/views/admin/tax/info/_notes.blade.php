<div class="col-md-6">
    <div class="box box-default">
        <div class="box-header with-border">
            <i class="fa fa-warning"></i>
            <h3 class="box-title">Relations</h3>
        </div>
        <div class="box-body">
            <table class="table table-striped">
                <tbody>
                @if(!empty($relation))
                    @foreach($relation as $key => $row)
                        <tr>
                            <td>{{$key}}</td>
                            <td>@if(!empty($row)) @foreach($row as $keyword) {{$keyword['item']}} @endforeach @endif</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>