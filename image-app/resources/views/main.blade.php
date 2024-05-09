
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload images</title>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="content" style="margin: 0 auto; padding: 15% 35%;">
        <form action="/upload" method="POST" enctype="multipart/form-data" >
            @csrf
                <!-- <input type="hidden" name="MAX_FILE_SIZE" value="500000"> -->
                <input type="file" name="sendFile[]" id="images" accept="image/*" multiple>
                <button type="submit">Загрузить</button>
        </form>
        <a href="/gallery">Просмотреть галлерею</a>
    </div>
    <!-- <script src="/js/custom.js"></script> -->
</body>
</html>