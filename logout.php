<html>
    <body>
        myFunction();
    </body>

</html>

<script>
function myFunction() {
  alert("Ai fost delogat.");
}
</script>

<?php
session_start();
session_destroy();
header('Location: index.html');
?>