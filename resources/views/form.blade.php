<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div>
        <div>
            <a href="/api/authors">get method to Api/Authors </a>
        </div>
    </div>

    <hr>
    <div>Post form to api/authors URI</div>

    <form action="api/authors" method="post">
        {{-- @csrf --}}
        <input type="text" name="name" placeholder="name">
        <input type="text" name="email" placeholder="email">
        <input type="text" name="location" placeholder="location">

        <button type="submit">Submit a Post request</button>


    </form>
</body>

</html>
