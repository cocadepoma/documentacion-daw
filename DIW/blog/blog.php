<?php
    include_once('./layout/header.php');
    include_once('./layout/separator.php');
    include_once('./layout/smedia-float.php');
    require_once('./database/connection.php');
?>

<main id="blog-container" class="container">

    <section id="articles">

        <?php
            if($conn) {

                $query = "SELECT * FROM articulos ORDER BY fecha DESC";

                if($result = $conn->query($query)) {
                    while($row = $result->fetch_assoc()) { ?>
                        <article class="blog-post">
                            <h3><?php echo $row['titulo'];?></h3>
                            <div class="autor-date">
                                <p><?php echo $row['preview']; ?></p>

                                <p class="p-date">
                                    <?php echo date('H:i a d-m-Y', strtotime($row['fecha']));?> 

                                    publicado por: <span class="bold"><?php echo $row['autor']; ?></span>
                                </p>
                            </div>
                            <div class="image-article">
                                <img src="<?php echo $row['portada']; ?>" alt="imagen noticia">
                            </div>
                            <div class="article-buttons">
                                <a class="btn btn-article" href="articulo.php?art=<?php echo $row['id']; ?>">Ver entrada</a>
                                <div class="clear-fix"></div>
                            </div>
                        </article>          
                    <?php }
                }
                
            } ?>


    </section>
    <!-- article end-->

    <aside>
        <h3>Artículos más vistos</h3>

        <?php 
            include_once('./layout/most-visited.php'); 
            $conn->close();
        ?>

    </aside>
    <!-- aside end-->
</main>
<!-- main container end-->

<?php 
    include_once('./layout/clip.php');
    include_once('./layout/footer.php');
?>
