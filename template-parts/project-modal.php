<?php
// Retrieves the custom fields used in the project modal.
$context = get_field('contexte');
$technologies = get_field('technologies');
$site_link = get_field('lien_site');
$code_link = get_field('lien_code');
$project_type = get_field('type_projet');
?>

<dialog class="project-modal" closedby="any">
    <div class="project-modal_header">
        <p>Le projet en détail</p>
        <button class="project-modal_close" type="button" aria-label="Fermer">×</button>
    </div>

    <div class="project-modal_content">
        <!-- Displays the current project type. -->
        <?php if ($project_type) : ?>
            <p class="project-modal_type"><?php echo esc_html($project_type); ?></p>
        <?php endif; ?>

        <!-- Displays the current project title. -->
        <h2><?php the_title(); ?></h2>

        <!-- Displays the featured image when available. -->
        <?php if (has_post_thumbnail()) : ?>
            <div class="project-modal_image">
                <?php the_post_thumbnail('large'); ?>
            </div>
        <?php endif; ?>

        <!-- Displays the project context only when the custom field is filled. -->
        <?php if ($context) : ?>
            <div class="project-modal_section">
                <h3>Contexte</h3>
                <p><?php echo esc_html($context); ?></p>
            </div>
        <?php endif; ?>

        <!-- Displays the technologies used for the project when available. -->
        <?php if ($technologies) : ?>
            <div class="project-modal_section">
                <h3>Technologies</h3>
                <p><?php echo esc_html($technologies); ?></p>
            </div>
        <?php endif; ?>

        <!-- Displays the main project description from the WordPress editor. -->
        <div class="project-modal_section">
            <h3>Description</h3>
            <?php the_content(); ?>
        </div>

        <!-- Displays the project links section if at least one link is available. -->
        <?php if ($site_link || $code_link) : ?>
            <div class="project-modal_links">
                <?php if ($site_link) : ?>
                    <a href="<?php echo esc_url($site_link); ?>" target="_blank" rel="noopener noreferrer">Voir le site ↗</a>
                <?php endif; ?>

                <?php if ($code_link) : ?>
                    <a href="<?php echo esc_url($code_link); ?>" target="_blank" rel="noopener noreferrer">Voir le code ↗</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</dialog>