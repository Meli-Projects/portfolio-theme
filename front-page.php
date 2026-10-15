<?php get_header(); ?>

<!-- Hero -->
<section class="hero-section">
    <div class="hero-content">
        <h1 class="hero-title" aria-label="Développeuse WordPress">
            <span class="hero-title_text" aria-hidden="true">Développeuse</span>
            <span class="hero-title_accent" aria-hidden="true">WordPress</span>
            <span class="hero-title_cursor" aria-hidden="true"></span>
        </h1>
        <p>Je conçois des sites WordPress modernes, administrables et adaptés aux besoins des utilisateurs.</p>
    </div>

    <div class="hero-visual">
        <a class="hero-visual_frame" href="#projects" aria-label="Découvrir mes projets">
            <p class="hero-visual_label">Développement web</p>
            <div class="hero-visual_symbol">&lt;/&gt;</div>

            <div class="hero-visual_tags">
                <span>WordPress</span>
                <span>PHP</span>
                <span>JavaScript</span>
            </div>

            <span class="hero-visual_action">Découvrir mes projets →</span>
        </a>
    </div>
</section>

<!-- About -->
<section id="about" class="about-section">
    <div class="section about-container">
        <div class="about-heading reveal">
            <p class="section-label">Profil</p>
            <h2>À propos</h2>
        </div>

        <div class="about-content reveal">
            <p>Développeuse WordPress, je conçois et développe des sites web en accordant une attention particulière à leur structure, leur ergonomie et leur facilité d’utilisation.</p>

            <p>Au cours de ma formation et de mes expériences professionnelles, j’ai travaillé sur différents projets mêlant développement WordPress, intégration, personnalisation de thèmes et gestion de contenus. J’utilise notamment HTML, CSS, PHP et JavaScript, ainsi que l’écosystème WordPress.</p>

            <p>Mon parcours professionnel m’a également permis de développer des compétences en organisation, gestion de projet et compréhension des besoins utilisateurs, que j’intègre aujourd’hui dans ma façon de concevoir des sites web.</p>
        </div>
    </div>
</section>

<!-- Skills -->
<section id="skills" class="section skills-section">
    <div class="skills_header reveal">
        <p class="section-label">Expertise</p>
        <h2>Mes compétences</h2>
        <p class="skills_intro">Des outils techniques au service de projets WordPress, web et e-commerce.</p>
    </div>

    <div class="skills-list">
        <div class="skill-item reveal">
            <h3>WordPress</h3>
            <p>Développement de thèmes personnalisés, administration et gestion de contenus.</p>

            <div class="skill_tags">
                <span>WordPress</span>
                <span>PHP</span>
                <span>SCF</span>
            </div>
        </div>

        <div class="skill-item reveal">
            <h3>Front-end</h3>
            <p>Intégration d'interfaces responsives avec HTML, CSS et JavaScript.</p>

            <div class="skill_tags">
                <span>HTML</span>
                <span>CSS</span>
                <span>JavaScript</span>
            </div>
        </div>

        <div class="skill-item reveal">
            <h3>Back-end</h3>
            <p>Développement PHP et manipulation de bases de données MySQL.</p>

            <div class="skill_tags">
                <span>PHP</span>
                <span>MySQL</span>
            </div>
        </div>

        <div class="skill-item reveal">
            <h3>E-commerce</h3>
            <p>Intégration et gestion de boutiques et catalogues avec WooCommerce et PrestaShop.</p>

            <div class="skill_tags">
                <span>WooCommerce</span>
                <span>PrestaShop</span>
            </div>
        </div>

        <div class="skill-item reveal">
            <h3>Outils & environnement</h3>
            <p>Versionnement, développement local et gestion du code avec les principaux outils de mon environnement de travail.</p>

            <div class="skill_tags">
                <span>Git</span>
                <span>GitHub</span>
                <span>VS Code</span>
                <span>XAMPP</span>
            </div>
        </div>
    </div>
</section>

<!-- Projects -->
<section id="projects" class="section projects-section reveal">
    <p class="section-label">Réalisations</p>
    <h2>Mes projets</h2>

    <div class="projects-filters">

        <!-- Site type filter -->
        <div class="custom-select" id="type-site" data-placeholder="TYPE DE SITE" data-value="">
            <div class="select">
                <span class="select-text">TYPE DE SITE</span>
            </div>

            <ul class="options-list">
                <li class="reset-option" data-value="">Tous</li>

                <?php
                $site_types = get_terms([
                    'taxonomy'   => 'type_site',
                    'hide_empty' => true,
                ]);

                if (!empty($site_types) && !is_wp_error($site_types)) :
                    foreach ($site_types as $site_type) :
                ?>
                    <li data-value="<?php echo esc_attr($site_type->slug); ?>">
                        <?php echo esc_html($site_type->name); ?>
                    </li>
                <?php
                    endforeach;
                endif;
                ?>
            </ul>
        </div>

        <!-- Origin filter -->
        <div class="custom-select" id="origine" data-placeholder="ORIGINE DU PROJET" data-value="">
            <div class="select">
                <span class="select-text">ORIGINE DU PROJET</span>
            </div>

            <ul class="options-list">
                <li class="reset-option" data-value="">Tous</li>

                <?php
                $origins = get_terms([
                    'taxonomy'   => 'origine',
                    'hide_empty' => true,
                ]);

                if (!empty($origins) && !is_wp_error($origins)) :
                    foreach ($origins as $origin) :
                ?>
                    <li data-value="<?php echo esc_attr($origin->slug); ?>">
                        <?php echo esc_html($origin->name); ?>
                    </li>
                <?php
                    endforeach;
                endif;
                ?>
            </ul>
        </div>
    </div>

    <div class="projects-list">
        <?php
        // Retrieves the first six published projects from the "projet" Custom Post Type
        $projects = new WP_Query(
            array(
                'post_type'      => 'projet',
                'posts_per_page' => 6,
                'post_status'    => 'publish',
            )
        );

        // Displays each project using the reusable project card template
        if ($projects->have_posts()) :
            while ($projects->have_posts()) :
                $projects->the_post();

                get_template_part('template-parts/project-card');
            endwhile;

            // Restores the global post data after the custom query
            wp_reset_postdata();
        else :
            ?>
            <p>Aucun projet disponible pour le moment.</p>
        <?php endif; ?>
    </div>

    <?php if ($projects->max_num_pages > 1):?>
        <button
            class="load-more-projects"
            type="button"
            data-page="1"
            data-max-pages="<?php echo esc_attr($projects->max_num_pages);?>"
        >    
            Charger plus
        </button>
    <?php endif; ?>
</section>

<!-- Education -->
<section id="education" class="section education-section">
    <div class="education_header reveal">
        <p class="section-label">Parcours</p>
        <h2>Formation</h2>
    </div>

    <div class="education-content reveal">
        <div class="education-item">
            <p class="education-date">2025 - 2026</p>
            <h3>Développeuse WordPress</h3>
            <p>OpenClassrooms - Formation professionnelle en développement WordPress (formation en cours).</p>
        </div>

        <div class="education-item">
            <p class="education-date">2023 - 2024</p>
            <h3>Prépa Mastère Cybersécurité & Data</h3>
            <p>IPSSI - Formation professionnelle en développement Web, sécurité et data.</p>
        </div>
    </div>
</section>

<!-- Contact -->
<section id="contact" class="contact-section">
    <div class="section contact-container">
        <div class="contact_header reveal">
            <p class="section-label">Contact</p>
            <h2>Envie d'échanger ?</h2>
        </div>

        <div class="contact_content reveal">
            <p>Une question sur un projet, un retour sur mon travail ou simplement envie de discuter web et WordPress ? Vous pouvez me retrouver par e-mail, LinkedIn ou GitHub.</p>

            <div class="contact_links">
                <a class="contact-link_primary" href="mailto:melisande.lefils@gmail.com">E-mail ↗</a>
                <a href="https://www.linkedin.com/in/mélisande-lefils-80b48b182" target="_blank" rel="noopener noreferrer">LinkedIn ↗</a>
                <a href="https://github.com/Meli-Projects" target="_blank" rel="noopener noreferrer">GitHub ↗</a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>