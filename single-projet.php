<?php get_header(); ?>

<section class="single-project">

    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

            <?php
            $context = get_field('contexte');
            $technologies = get_field('technologies');
            $site_link = get_field('lien_site');
            $code_link = get_field('lien_code');
            ?>

            <div class="project-header">

                <h1><?php the_title(); ?></h1>

                <?php if ($site_link || $code_link) : ?>

                    <div class="project-links">

                        <?php if ($site_link) : ?>
                            <a href="<?php echo esc_url($site_link); ?>"target="_blank" rel="noopener noreferrer">Voir le site ↗</a>
                        <?php endif; ?>

                        <?php if ($code_link) : ?>
                            <a href="<?php echo esc_url($code_link); ?>"target="_blank" rel="noopener noreferrer">Voir le code ↗</a>
                        <?php endif; ?>

                    </div>

                <?php endif; ?>

            </div>


            <?php if (has_post_thumbnail()) : ?>

                <div class="project-main-image">
                    <?php the_post_thumbnail('large'); ?>
                </div>

            <?php endif; ?>


            <div class="project-details">

                <?php if ($context) : ?>

                    <div class="project-context">

                        <h2>Contexte</h2>

                        <p><?php echo esc_html($context); ?></p>

                    </div>

                <?php endif; ?>


                <?php if ($technologies) : ?>

                    <div class="project-technologies">

                        <h2>Technologies</h2>

                        <p><?php echo esc_html($technologies); ?></p>

                    </div>

                <?php endif; ?>

            </div>


            <div class="project-content">

                <h2>Description</h2>

                <?php the_content(); ?>

            </div>

        <?php endwhile; ?>

    <?php endif; ?>

</section>

<?php get_footer(); ?>