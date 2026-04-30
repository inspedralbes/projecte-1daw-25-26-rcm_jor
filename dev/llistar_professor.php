<?php include_once "header.php";
$mysqli = include_once "connexio.php";

$return = $mysqli->query("SELECT 
    idIncidencia,
    nom,
    descripcio,
    prioritat
FROM INCIDENCIA ORDER BY prioritat");

$incidencias = $return->fetch_all(MYSQLI_ASSOC);
?>

<header>
    <div class="container-fluid bg-dark text-white p-2 mb-2 shadow-lg text-center">
        <div class="row">
            <div class="col-2">
                <img class="img-fluid" style="width: 80px;"
                    src="https://lh3.googleusercontent.com/sitesv/AA5AbUD5FqRdWpu9LzNLp_qxjenHkBb6gIg0-WuDgrrFLCrLVt_kXMiNXY4nKx5ywk84vV9-BG4sJHTBs-CO_O6iXxKC_iLlvajPxyL4zTj2ksM0_l2Gic3hq8s9dSyieFwas4xa8wiScF50XWwqiSkooYCLNiB5v3NLDe7BdpuxfZF7iPLTi37zAXGPfGPZ3FqWg4D2PCoWMx4ttPCM00t_eMzYMedPuTe2SelT=w1280"
                    alt="">
            </div>
            <div class="col-8">
                <div class="fs-1">Llistat de les teves incidencies</div>
            </div>
            <div class="col-2">
                <div class="fs-6 pt-3">GRUP4: Ramses i Jordi</div>
            </div>
        </div>
    </div>
</header>

<div class="row">
    <div class="col-12">
        <a href="" class="btn btn-info my-2">Afegir altre incidencia</a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-10 my-2">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th>NOM</th>
                    <th scope="col" colspan="2">Descripció</th>
                    <th scope="col"></th>
                    <th scope="col">Prioritat</th>
                    <th scope="col">Asignar</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($incidencias as $incidencia) { 
                    $clase = "";

                    if($incidencia["prioritat"] == "Alta"){
                        $clase = "table-danger";
                    }elseif($incidencia["prioritat"] == "Mitja"){
                        $clase = "table-warning";
                    }elseif($incidencia["prioritat"] == "Baixa"){
                        $clase = "table-info";
                    }
                    
                    ?>
                    
                    <tr class="<?php echo $clase?>">
                        <th scope="row">
                            <?php echo $incidencia["idIncidencia"]; ?>
                        </th>

                        <th>
                            <?php echo $incidencia["nom"]; ?>
                        </th>

                        <td colspan="2">
                            <?php echo $incidencia["descripcio"]; ?>
                        </td>

                        <td></td>

                        <td>
                            <?php echo $incidencia["prioritat"]?>
                        </td>

                        <td>
                            <button class="btn btn-danger btn-sm">Asignar</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>
    </div>
</div>

<?php include_once "footer.php"; ?>