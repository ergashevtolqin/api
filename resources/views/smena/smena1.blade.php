<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<div class="container-md" style=" display: flex;
									flex-direction: column;
									align-items: center;
									justify-content: center;
									height: 100vh;">
    <a href="{{route('smena',['id'=>$id])}}" type="button" class="btn btn-primary btn-lg">Smena ochish/yopish</a>
    <a href="{{route('product',['id'=>$id])}}" type="button" class="btn btn-primary btn-lg" style="margin-top: 20px;padding: 6px 86px;">Kassa</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script>

</script>

</body>


</html>

