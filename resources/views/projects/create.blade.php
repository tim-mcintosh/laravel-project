<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<h1>Create a new project</h1>

<form method="POST" action="/projects">
    {{csrf_field()}}
    <div>
        <input type="text" name="title" placeholder="Project title">
    </div>
    <div>
        <textarea name="description" cols="30" rows="10" placeholder="Project description"></textarea>
    </div>
    <div>
        <button type="submit">Create Project</button>
    </div>

</form>
</html>
