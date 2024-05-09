
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gallery</title>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="gallery" >
            <select name="sortby" id="sortby">
                <option value="name" selected >По названию</option>
                <option value="datetime">По дате и времени загрузки</option>
            </select>
            <a href="#" class="sort-btn">Сортировать</a>

            <a href="/upload">Загрузить изображения</a>
            <div class="popup-fade">
                    <div class="popup">
                        <a class="popup-close" href="#">Закрыть</a>
                        <img class="full-image" src="" alt="Орининальный размер изображения">
                    </div>		
                </div>
            <div class="content" style="display: flex; flex-wrap: wrap; justify-content: space-around;">
                @include('galleryItems', ['images' => $images]);
                
            </div>
        </div>
        <script>    
            function display_full(i) {
                var url = $(i).attr('src');
                console.log($(i));
                $('.full-image').attr('src', url);
                $('.popup-fade').fadeIn();
                return false;
            }
        </script>
    </body>
</html>