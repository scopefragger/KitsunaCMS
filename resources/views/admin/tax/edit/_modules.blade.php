@if(!empty($data->modules) && $data->modules == 'true')
    <div class="card">
        <div class="header">
            <h4 class="title">{{$tax}} {{trans('admin.cms_module')}}</h4>
        </div>
        <div class="content">
            <form action="/admin/edit/{{$tax}}/">
                <div class="row">
                    <table class="table table-striped">
                        <thead>
                        <th>{{trans('admin.cms_related')}}</th>
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