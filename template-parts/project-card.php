<?php
// Retrieves the custom fields used in the project card
$technologies = get_field('technologies');
$project_summary = get_field('resume_projet');
$card_title = get_field('titre_carte');
// Retrieves the taxonomies associated with the project
$site_types = get_the_terms(get_the_ID(), 'type_site');
$origins = get_the_terms(get_the_ID(), 'origine');
?>

<article class="project-card">
    <div class="project-frame">
        <?php if ($card_title) : ?>
            <p class="project-label"><?php echo esc_html($card_title); ?></p>
        <?php endif; ?>

        <?php if (has_post_thumbnail()) : ?>
            <div class="project-image">
                <?php the_post_thumbnail('large'); ?>
                <button class="project-discover" type="button">Découvrir le projet</button>
            </div>
        <?php endif; ?>
    </div>

    <div class="project-info">
        <div class="project-labels">
            <?php if ($site_types && !is_wp_error($site_types)) : ?>
                <p class="project-type"><?php echo esc_html($site_types[0]->name); ?></p>
            <?php endif; ?>

            <?php if ($origins && !is_wp_error($origins)) : ?>
                <p class="project-origin"><?php echo esc_html($origins[0]->name); ?></p>
            <?php endif; ?>
        </div>

        <!-- Project title linking to the single project page. -->
        <h3 class="project-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>

        <?php if ($project_summary) : ?>
            <p class="project-summary"><?php echo esc_html($project_summary); ?></p>
        <?php endif; ?>

        <!-- Displays the technologies field only when a value is available. -->
        <?php if ($technologies) : ?>
            <div class="project-technologies_preview">
                <?php
                $technology_list = explode(',', $technologies);

                foreach ($technology_list as $technology) :
                    ?>
                    <span class="project-technology"><?php echo esc_html(trim($technology)); ?></span>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <?php get_template_part('template-parts/project-modal'); ?>
</article>