<?php
// Retrieves the custom fields used in the project card.
$technologies = get_field('technologies');
$project_type = get_field('type_projet');
$project_summary = get_field('resume_projet');
$project_origin = get_field('origine_projet');
?>                
              
<article class="project-card">

    <div class="project-frame">

            <?php if ($project_type) : ?>
                <p class="project-label">
                    <?php echo esc_html($project_type); ?>
                </p>
            <?php endif; ?>

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

        <div class="project-labels">

            <?php if ($project_type) : ?>
                <p class="project-type">
                    <?php echo esc_html($project_type); ?>
                </p>
            <?php endif; ?>

            <?php if ($project_origin) : ?>
                <p class="project-origin">
                    <?php echo esc_html($project_origin); ?>
                </p>
            <?php endif; ?>

        </div>

        <!-- Project title linking to the single project page. -->
        <h3 class="project-title">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h3>

        <?php if ($project_summary) : ?>

            <p class="project-summary">
                <?php echo esc_html($project_summary); ?>
            </p>

        <?php endif; ?>

        <!-- Displays the technologies field only when a value is available. -->
        <?php if ($technologies) : ?>

            <div class="project-technologies_preview">

                <?php
                $technology_list = explode(',', $technologies);

                foreach ($technology_list as $technology) :
                ?>

                    <span class="project-technology">
                        <?php echo esc_html(trim($technology)); ?>
                    </span>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </div>
<?php get_template_part('template-parts/project-modal'); ?>
</article>