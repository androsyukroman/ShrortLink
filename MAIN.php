<!DOCTYPE html>
    <head>
        <meta charset = "UTF-8">
        <title>Сокращение ссылок</title>
        <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
        <style>
            .enter
            {
                width: 250px;
                float: right;
                margin: 25px;
                padding: 5px;
            }
            .link{
                width: 500px;
                float: left;
                margin: 25px;
                padding: 10px;
                font-size: 20px;
            }
            .button
            {
                float: left;
                margin: 25px;
                padding: 10px;
                font-size: 20px;  
            }
            .login, .password, .submit
            {
                width: 200px;
                float: right;
                margin: 10px;
                padding: 10px;
                font-size: 20px;
            }

        </style>
    </head>

    <body>
        <div class = "enter">
            <form action = "Enter.php" method = "POST">
                <input type = "text" name = "login" class = "login" required placeholder = "Введите логин">
                <input type = "password" required placeholder = "Введите пароль" name = "password" class = "password">
                <input type = "submit" class = "submit" value = "Войти">
            </form>
        </div>
        
            <input type = "url" name = "link" class = "link" required placeholder = "Введите ссылку" autocomplete = "off" name="url">
            <button class = "button">Сократить</button>
        
        <script>
            $(document).ready(function(){
                $('button').on('click', function() {
                    var base = $('input.link').val();
                    $.ajax({
                    method: "POST",
                    url: "base.php",
                    data: {base: base}
                    })
                    .done(function(data) {
                        alert(data);
                    });

                    $('input.link').val('');
                })
            });
        </script>
    </body>
</html>