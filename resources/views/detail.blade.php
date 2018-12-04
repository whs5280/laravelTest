<!doctype html>
<html>
    <head>
        <title>信息</title>
        <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h2>留言详情</h2>
            <p>标题：{{$info->title}}</p>
            <p>内容：{{$info->content}}</p>
            <p>投稿人：{{$info->author}}</p>
            <p>时间：{{$info->time}}</p>
        </div>
    </body>
</html>
