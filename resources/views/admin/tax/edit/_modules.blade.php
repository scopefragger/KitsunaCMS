@if(!empty($data->modules) && $data->modules == 'true')
    <div class="card">
        <div class="header">
            <h4 class="title">{{$tax}} Modual</h4>
        </div>
        <div class="content">
            <form action="/admin/edit/{{$tax}}/">
                <div class="row">
                    <table class="table table-striped">
                        <thead>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        <tr>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
@endif