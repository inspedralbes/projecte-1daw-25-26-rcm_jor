<?php include_once "header.php";
$mysqli = include_once "connexio.php";
$id = $_POST["id"];
$descripcio = $_POST["descripcio"];
$departament = $_POST["departament"];
$prioritat = $_POST["prioritat"];

?>
<div class="row">
    <div class="col-6">
        <form action="" method="POST" class="form-group">
            <div class="card">
                <div class="card-body"></div>
            </div>
        </form>
    </div>
    <div class="col-6"></div>
</div>

<?php include_once "footer.php";
?>