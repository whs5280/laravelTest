<!doctype html>
<html>
    <head>
        <title>留言板</title>
        <link href="{{ URL::asset('css/bootstrap.css') }}" type="text/css" rel="stylesheet"/>
    </head>
    <body>
        <div class="container">
            <form method="get">
            <div class="m-3">
                <button type="submit" class="btn btn-outline-dark" name="add" value="add">批量添加</button>
                <button type="submit" class="btn btn-outline-info" name="import" value="xls">导入</button>
                <button type="submit" class="btn btn-outline-success" name="export" value="xls">导出</button>
            </div>
            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Title</th>
                            <th scope="col">Content</th>
                            <th scope="col">Author</th>
                            <th scope="col">Time</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($infos as $info)
                        <tr>
                            <td>{{ $info->id }}</td>
                            <td><a style="text-decoration: none;" href="{{url('info/detail/'.$info->id)}}">{{ $info->title }}</a></td>
                            <td>{{ $info->content }}</td>
                            <td>{{ $info->author }}</td>
                            <td>{{ $info->time }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            </form>
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    Total <strong>{{ $infos->total() }}</strong>
                </div>
                <div class="col-sm-12 col-md-7">
                    {{ $infos->links() }}
                </div>
            </div>
        </div>
    </body>
</html>
