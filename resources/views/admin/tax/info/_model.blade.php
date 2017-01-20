<div class="col-md-6">
    <div class="box box-default">
        <div class="box-header with-border">
            <i class="fa fa-warning"></i>
            <h3 class="box-title">Model Information</h3>
        </div>
        <div class="box-body">
            <table class="table table-striped">
                <tbody>
                @if(!empty($data))
                    @foreach($data as $row)
                        <tr>
                            <td>{{$row[0]}}</td>
                            <td>{{$row[1]}}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>

        </div>
    </div>
</div>