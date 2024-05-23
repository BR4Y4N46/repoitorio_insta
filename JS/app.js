document.addEventListener('DOMContentLoaded', function() {
    updateLikeCount();

    document.querySelector('.fa-heart').addEventListener('click', function() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var response = JSON.parse(this.responseText);
                console.log(response.message); // Mostrar mensaje en la consola
                updateLikeCount(); // Actualizar el conteo de likes después de insertar un nuevo like
            }
        };
        xhttp.open("POST", "/ing/php/app.php", true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.send();
    });

    function updateLikeCount() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var response = JSON.parse(this.responseText);
                document.querySelector('.conteo').textContent = response.conteo;
            }
        };
        xhttp.open("GET", "/ing/php/app.php", true);
        xhttp.send();
    }
});