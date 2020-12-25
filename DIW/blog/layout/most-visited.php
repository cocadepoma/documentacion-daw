<?php
    if($conn){

        $query = "SELECT id, titulo, portada, preview FROM articulos LIMIT 3";

        if($result = $conn->query($query)) {
            while($row = $result->fetch_assoc()){ ?>

                <article>
                    <a href="articulo.php?art=<?php echo $row['id']; ?>">
                        <h4><?php echo $row['titulo']; ?></h4>
                        <img src="<?php echo $row['portada']; ?>" alt="image-post">
                        <p><?php echo $row['preview']; ?></p>
                    </a>
                </article>
                
            <?php } 
        }
    }
?>