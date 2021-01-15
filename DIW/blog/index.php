<?php
include_once('./layout/header.php');
include_once('./layout/separator.php');
include_once('./layout/smedia-float.php');
require_once('./database/connection.php');

?>

<main>
    <div id="index">
        <section class="container about-me">
            <div class="about-img">
                <img src="img/img-1.jpg" alt="frs">
            </div>
            <p>My name is Fran and I was born in 1988 in Vila-real, a village from Spain.</p>
            <p>After a few years working as an electromechanical in the ceramic industry, I had discovered web developing. In 2019 I made an important step into my life, I quitted my job and then I started to learn more about developing at full time.
                I have been doing a few courses by myself and also a lot of steps learning new technologies that were unknown for me. At this moment I'm studying developing of web applications at Didáctica Ágil Centros Academy, and my next steps are
                deep learning about Angular and Ionic.</p>
        </section>

        <section class="separator container">
            <h2>Projects</h2>
        </section>

        <section class="container projects">

            <?php
            if ($conn) {

                $query = "SELECT * FROM proyectos LIMIT 3";

                if ($result = $conn->query($query)) {
                    while ($row = $result->fetch_assoc()) { ?>

                        <a href="<?php echo $row['url']; ?>" target="_blank" class="project">

                            <img src="<?php echo $row['portada']; ?>" alt="<?php echo 'img-' . $row['nombre']; ?>">
                            <span class="info-project"><?php echo $row['nombre']; ?></span>
                        </a>

            <?php
                    }
                }
            }

            ?>

        </section>

        <section class="separator container">
            <h2>most related posts</h2>
        </section>

        <section id="most-relateds" class="container">

            <div class="articles">
                <?php
                include_once('./layout/most-visited.php');
                $conn->close();
                ?>

            </div>

        </section>
    </div>

</main>
<!-- End Main Content -->

<?php
include_once('./layout/clip.php');
include_once('./layout/footer.php');
?>