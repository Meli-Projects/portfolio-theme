<?php
// Retrieves the custom fields used in the project card.
$technologies = get_field('technologies');
$context = get_field('contexte');
?>                
              
<article class="project-card">

    <div class="project-frame">

        <p class="project-label">Projet WordPress</p>

            <?php if (has_post_thumbnail()) : ?>
                <div class="project-image">

                    <?php the_post_thumbnail('large'); ?>

                    <button class="project-discover" type="button">
                        Découvrir le projet
                    </button>

                </div>

            <?php endif; ?>

    </div>

    <div class="project-info">
        <!-- Project title linking to the single project page. -->
        <h3 class="project-title">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h3>

        <!-- Displays the technologies field only when a value is available. -->
        <?php if ($technologies) : ?>
            <p class="project-technologies-preview">
                <?php echo esc_html($technologies); ?>
            </p>
        <?php endif; ?>

        <!-- Displays a shortened preview of the project context. -->
        <?php if ($context) : ?>
            <p class="project-summary">
                <?php echo esc_html(wp_trim_words($context, 22, '…')); ?>  <!-- Affiche seulement les 22 premiers mots du contexte puis ajoute … -->
            </p>
        <?php endif; ?>

        <!-- Link to the full project page. -->
        <a class="project-link" href="<?php the_permalink(); ?>">
            Voir le projet →
        </a>

    </div>
<?php get_template_part('template-parts/project-modal'); ?>
</article>