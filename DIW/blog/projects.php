<?php
    include_once('./layout/header.php');
    include_once('./layout/separator.php');
    include_once('./layout/smedia-float.php');
    require_once('./database/connection.php');
?>

<main id="main-projects">
    
    <section class="container projects">

    <?php
        if($conn) {

            $query = "SELECT * FROM proyectos LIMIT 3";

            if($result = $conn->query($query)) {
                while($row = $result->fetch_assoc()){ ?>

                    <div class="project">
                        <img src="<?php echo $row['portada']; ?>" alt="ss">
                        <span class="info-project"><?php echo $row['nombre']; ?></span>
                    </div>

                <?php
                }
            }

            $conn->close();
        }
    ?>

    </section>

</main>
<!-- main content -->

<?php 
    include_once('./layout/clip.php');
    include_once('./layout/footer.php');
?>