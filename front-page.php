<?php get_header(); ?>


<!-- Hero -->
<section class="hero-section">

    <h1>Développeuse <span>WordPress</span></h1>

    <p>Je conçois des sites WordPress modernes, administrables et adaptés aux besoins des utilisateurs.</p>

    <a href="#projects">Découvrir mes projets</a>

</section>


<!-- About -->
<section id="about" class="section about-section">

    <h2>À propos</h2>

    <div class="about-content">
        <p>Développeuse WordPress, je conçois et développe des sites web en accordant une attention particulière à leur structure, leur ergonomie et leur facilité d’utilisation. Au cours de ma formation et de mes expériences professionnelles, j’ai travaillé sur différents projets mêlant développement WordPress, intégration, personnalisation de thèmes et gestion de contenus. J’utilise notamment HTML, CSS, PHP et JavaScript, ainsi que l’écosystème WordPress. Mon parcours professionnel m’a également permis de développer des compétences en organisation, gestion de projet et compréhension des besoins utilisateurs, que j’intègre aujourd’hui dans ma façon de concevoir des solutions web.</p>
    </div>


</section>


<!-- Skills -->
<section id="skills" class="section skills-section">

    <h2>Mes compétences</h2>

    <div class="skills-list">

        <div class="skill-item">
            <h3>WordPress</h3>
            <p>Développement de thèmes, administration, personnalisation.</p>
        </div>

        <div class="skill-item">
            <h3>Front-end</h3>
            <p>HTML, CSS et JavaScript.</p>
        </div>

        <div class="skill-item">
            <h3>Back-end</h3>
            <p>PHP et bases de données MySQL.</p>
        </div>

        <div class="skill-item">
            <h3>E-commerce</h3>
            <p>WooCommerce, PrestaShop, intégration et gestion de catalogues produits.</p>
        </div>

        <div class="skill-item">
            <h3>Outils & environnement</h3>
            <p>Git, GitHub, VS Code et XAMPP.</p>
        </div>
    </div>

</section>


<!-- Projects -->
<section id="projects" class="section projects-section">

    <h2>Mes projets</h2>

    <div class="projects-list">

        <?php

        //Retrieves all published projects from the "projet" Custom Post Type.
        $projects = new WP_Query(
            array(
                'post_type'      => 'projet',
                'posts_per_page' => -1, //all project
                'post_status'    => 'publish'
            )
        );

        // Displays each project using the reusable project card template.
        if ($projects->have_posts()) :

            while ($projects->have_posts()) :
                $projects->the_post();

                get_template_part('template-parts/project-card');

            endwhile;

            //Restores the global post data after the custom query.
            wp_reset_postdata();

        else :
            ?>

            <p>Aucun projet disponible pour le moment.</p>

<?php endif; ?>

    </div>

</section>

<!-- Education -->
<section id="education" class="section education-section">

    <h2>Formation</h2>

    <div class="education-content">

        <div class="education-item">

            <p class="education-date">2025 - 2026</p>

            <div>
                <h3>Développeuse WordPress</h3>
                <p>OpenClassrooms - Formation professionnelle en développement WordPress (formation en cours).</p>
            </div>

        </div>

        <div class="education-item">

            <p class="education-date">2023 - 2024</p>

            <div>
                <h3>Prépa Mastère Cybersécurité & Data</h3>
                <p>IPSSI - Formation professionnelle en développement Web, sécurité et data.</p>
            </div>

        </div>

    </div>

</section>


<!-- Contact -->
<section id="contact" class="section contact-section">

    <h2>Contact</h2>

    <div class="contact-content">

        <p>Vous souhaitez échanger autour d'un projet ou d'une opportunité professionnelle ? N'hésitez pas à me contacter.</p>

        <div class="contact-links">

            <a href="mailto:melisande.lefils@gmail.com">
                E-mail ↗
            </a>

            <a href="https://www.linkedin.com/in/mélisande-lefils-80b48b182"
               target="_blank"
               rel="noopener noreferrer">
                LinkedIn ↗
            </a>

            <a href="https://github.com/Meli-Projects"
               target="_blank"
               rel="noopener noreferrer">
                GitHub ↗
            </a>

        </div>

    </div>

</section>


<?php get_footer(); ?>