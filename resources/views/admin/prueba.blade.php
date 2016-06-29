<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PREUBA</title>
    <script type="text/javascript" language="javascript">
        var xhr;
        function buscarcomentario() {
            /*
            try {
                xhr = new ActiveXObject("Microsoft.XMLHttp");
                alert("Su navegador soporta AJAX IE");
            } catch(ex) {
                alert("Su navegador no soporta este objeto");
            }*/
            if(window.ActiveXObject) {
                xhr = new ActiveXObject("Microsoft.XMLHttp");
                alert("Su navegador soporta AJAX IE");
            } else if ((window.XMLHttpRequest) || (typeof XMLHttpRequest)) {
                alert("Bienvenido ya soporta AJAX");
            } else {
                aler("Su navegador no tiene soporte para AJAX");
                return null;
            }
        }
    </script>
</head>
<body>
    <a href="#0" onclick="buscarcomentario()">Conocer soporte AJAX</a>
</body>
</html>