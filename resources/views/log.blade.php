<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://pagecdn.io/lib/ace/1.4.6/ace.js" integrity="sha256-CVkji/u32aj2TeC+D13f7scFSIfphw2pmu4LaKWMSY8=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="row" style="margin: 0px;">
        <div class="col-md-3">
            <hr>
            <button id="clearLog" class="btn btn-warning" style="width: 100%;">Limpiar Log</button>
            <hr>
            <button id="keepfollow" class="btn btn-success" style="width: 100%;">Leer Ultimos log</button>
        </div>
        <div class="col-md-9">
            <div>
            <div id="acelog" style="height: 100vh;"><?php echo htmlspecialchars(file_get_contents(base_path().'/storage/logs/laravel.log')); ?></div>
            </div>
        </div>
    </div>
    <script>
        speaker("Ingresando");
        var editor = ace.edit("acelog");
        editor.setTheme("ace/theme/chrome");
        editor.getSession().setMode("ace/mode/pascal");
        editor.setOption("wrap", true)
        function speaker(text) {
            var audio = new Audio('https://texttospeech.responsivevoice.org/v1/text:synthesize?text=' + text + '&lang=es-419&engine=g1&name=&pitch=0.5&rate=0.5&volume=1&key=uu8DEkxz&gender=female');
            audio.play();
        }
        function gotolast() {
            var editor = ace.edit("acelog");
            editor.focus(); // To focus the ace editor
            editor.scrollToLine(9999, true, true, function () {});
            editor.gotoPageDown();
            //speaker("Actualmente hay "+chars+" carácteres")
        }
        function cchars() {
            var chars = editor.session.getValue().length;
            return chars;
        }
        function replAce() {
            var editor = ace.edit("acelog");
            $.ajax({
                url: "printlog",
                //url: "http://localhost/GLF-2020s2-Trabajo-Integral/public/printlog",
                context: document.body
            }).done(function (data) {
                editor.setValue(data);
            });
        }
        $(document).ready(function () {
            gotolast();
            var cc = cchars();
            $("#clearLog").click(function () {
                $.ajax({                    
                    url: "clearlog",
                    //url: "http://localhost/GLF-2020s2-Trabajo-Integral/public/clearlog",
                    context: document.body
                }).done(function () {
                    replAce();
                });
            });
            var follow = true;
            setInterval(function () {
                $("#acelog").click(function(){
                    follow = false;
                    $("#keepfollow").removeClass("btn-success");
                    $("#keepfollow").addClass("btn-secondary");
                });
                $("#keepfollow").click(function(){
                    $("#keepfollow").removeClass("btn-secondary");
                    $("#keepfollow").addClass("btn-success");
                    follow = true;
                });
                if (follow) {
                    replAce();
                }
                if (cc != cchars()) {
                    cc = cchars();
                    if (cchars() == 0) {
                        speaker("Limpiado");
                    } else {
                        speaker("Log Actualizado");
                    }
                    if (follow) {
                        gotolast();
                    }
                }
            }
            , 1000);
        });
    </script>
</body>
</html>
