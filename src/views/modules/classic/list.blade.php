
<style>
    table.modules {
        width: 500px;
        border-collapse: collapse;
        border-spacing: 0px;
    }
    table.modules thead {
        background: #dfdfdf;
    }
    table.modules tbody {
        background: #efefef;
    }
    table.modules td, table.modules th {
        padding: 5px;
        border: 1px solid #333;
    }
    .update-message {
        width: 500px;
        border-radius: 3px;
        padding: 5px;
        background: #2e6da4;
        color: #fff;
    }
</style>

@if(Session::has('minhnhut.caffeinated.updateStatus'))
    <p class="update-message">{{ Session::get('minhnhut.caffeinated.updateStatus') }}</p>
@endif
<table class="modules">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Description </th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($modules as $item)
            <tr>
                <td>{{$item['#']}}</td>
                <td>{{$item['name']}}</td>
                <td>{{$item['slug']}}</td>
                <td>{{$item['description']}}</td>
                <td>
                    @if (!$item['status'])
                        <a href="{{route('minhnhut.caffeinatedModulesGui.activate', ['slug' => $item['slug']])}}">Activate</a>
                    @else
                        <a href="{{route('minhnhut.caffeinatedModulesGui.deactivate', ['slug' => $item['slug']])}}">Deactivate</a>
                    @endif
                </td>

            </tr>
        @endforeach
    </tbody>
</table>