<?php
    include_once('./layout/header.php');
    include_once('./layout/smedia-float.php');
    require_once('./database/connection.php');
?>

    <?php
        if($conn) {
            if(isset($_GET['art']) && $_GET['art'] != null) {

                if(is_numeric($_GET['art'])){
                    echo $_GET['art'];

                    $id = intval($_GET['art']);
                    // Create query
                    $query = "SELECT titulo FROM articulos WHERE id = ? LIMIT 1";
                    // Create Statement
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("i", $id);
                    // Execute Statement
                    $stmt->execute();
                    // Save results
                    $result = $stmt->get_result();

                    if($result->num_rows > 0) {

                        while($row = $result->fetch_assoc()) { ?>

                            <section class="separator container">
                                <h2><?php echo $row['titulo']; ?></h2>
                            </section>
                            <!-- header-separator -->

                        <?php }

                    } else {
                        header('Location: http://localhost/blog/blog.php');
                    }
                    
                    // Close Statement
                    $stmt->close();
            
                } else {
                    header('Location: http://localhost/blog/blog.php');
                }              
            }
        } 
    ?>

    <main class="container">
        <div class="article-blog">
        <?php

            if($conn) {
   
                $query = "SELECT id, autor, fecha, contenido FROM articulos WHERE id = ?";

                // Create Statement
                $stmt = $conn->prepare($query);
                $stmt->bind_param("i", $id);
                // Execute Statement
                $stmt->execute();
                // Save results
                $result = $stmt->get_result();

                if($result->num_rows > 0) {

                    while($row = $result->fetch_assoc()) { ?>

                    <section id="single-article">

                        <?php echo $row['contenido']; ?>

                    <?php 
                    }
                } else {
                    header('Location: http://localhost/blog/blog.php');
                }                               
            } 
        ?>
                        <div class="single-article-buttons">
                            <a href="blog.php" class="btn btn-return a-first"><i class="fas fa-angle-double-left"></i> Volver atrás</a>
                            <a href="#" class="btn btn-article a-second"><i class="fas fa-share-alt"></i> Compartir</a>
                            <a href="#" class="btn btn-article a-third"><i class="fas fa-comment"></i> Comentar</a>
                        </div>
                        <div class="clear-fix"></div>
                    </section>



            <div id="most-relateds">
                <h3>Artículos más vistos</h3>
                <div class="articles">

                    <?php 
                        include_once('./layout/most-visited.php'); 
                        // Close DB Connection
                        $conn->close();
                    ?>

                </div>
            </div>

        </div>
    </main>

<?php 
    include_once('./layout/clip.php');
    include_once('./layout/footer.php');
?>
