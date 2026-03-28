<?php
/**
 * SEO Optimization for Project CPT
 */

function alize_project_seo_tags() {
    if ( ! is_singular( 'project' ) ) {
        return;
    }

    global $post;
    
    // Get custom SEO fields if they exist from ACF
    $custom_title = get_field('project_seo_title');
    $custom_desc = get_field('project_seo_desc');

    $title = $custom_title ? $custom_title : get_the_title() . ' - ' . get_bloginfo('name');
    $description = $custom_desc ? $custom_desc : wp_trim_words(get_field('project_short_desc'), 25, '...');
    $url = get_permalink();
    $image = get_the_post_thumbnail_url($post->ID, 'large');
    
    if (!$image) {
        $image = get_template_directory_uri() . '/assets/images/default-hero.jpg';
    }

    // Open Graph Tags
    echo "\n<!-- Project Open Graph Tags -->\n";
    echo '<meta property="og:title" content="' . esc_attr($title) . '" />' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($description) . '" />' . "\n";
    echo '<meta property="og:url" content="' . esc_url($url) . '" />' . "\n";
    echo '<meta property="og:type" content="website" />' . "\n";
    echo '<meta property="og:image" content="' . esc_url($image) . '" />' . "\n";

    // JSON-LD Schema (RealEstateAgent or Product)
    // We use a general Property schema or RealEstateListing
    $schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'RealEstateListing',
        'name' => $title,
        'description' => $description,
        'image' => array($image),
        'url' => $url,
        'datePosted' => get_the_date('c'),
    );

    $price = get_field('project_price');
    if ($price) {
        $schema['offers'] = array(
            '@type' => 'Offer',
            'price' => preg_replace('/[^0-9]/', '', $price), // basic extraction
            'priceCurrency' => 'VND' // default or dynamic based on project
        );
    }

    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_UNICODE) . '</script>' . "\n";
    echo "<!-- End Project SEO -->\n";
}
add_action( 'wp_head', 'alize_project_seo_tags', 1 );
