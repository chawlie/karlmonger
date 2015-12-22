<?php
/**
 * Title: Shortcodes
 * Documentation: http://codex.wordpress.org/Shortcode_API
 */

// Remove unwanted <br /> and <p> tags from shortcodes
// to prevent unwanted breaks/clearing in nested shortcodes.
remove_filter('the_content', 'wpautop');
add_filter('the_content', 'wpautop', 12);

/**
 * Enable [content-section] shortcode.
 * Allow site admin to add indexable sections to posts and pages.
 *
 * @param  array  $atts
 * @param  string $content
 * @return string
 */
function shortcode_content_section($atts, $content = NULL) {
    $a = shortcode_atts(array(
        'title' => '' // Accepted values: an alphanumeric string
    ), $atts);

    $content_section_title = esc_attr($a['title']);
    $content_section_id    = strtolower($content_section_title);
    $content_section_id    = preg_replace("/[^a-z0-9_\s-]/", "", $content_section_id);
    $content_section_id    = preg_replace("/[\s-]+/", " ", $content_section_id);
    $content_section_id    = preg_replace("/[\s_]/", "-", $content_section_id);

    return '<div id="' . $content_section_id . '" class="content-section" data-section-title="' . $content_section_title . '">' . do_shortcode($content) . '</div>';
}
add_shortcode('content-section', 'shortcode_content_section');

/**
 * Enable [lead] shortcode.
 * Allow site admin to add an enlarged lead paragraph
 * at the top of a section of content.
 *
 * @param  string $content
 * @return string
 */
function shortcode_lead($atts, $content = NULL) {
    return '<p class="lead">' . do_shortcode($content) . '</p>';
}
add_shortcode('lead', 'shortcode_lead');

/**
 * Enable [row] shortcode.
 * Allow site admin to add rows of content to posts and pages.
 * NOTE: Use [row] to wrap [columns] to clear column floats
 *
 * @param  string $content
 * @return string
 */
function shortcode_row($atts, $content = NULL) {
    return '<div class="row">' . do_shortcode($content) . '</div>';
}
add_shortcode('row', 'shortcode_row');

/**
 * Enable [columns] shortcode.
 * Allow site admin to add columnated content to posts and pages.
 * NOTE: [columns] must be wrapped in [row] shortcode to clear column floats
 *
 * @param  array  $atts
 * @param  string $content
 * @return string
 */
function shortcode_columns($atts, $content = NULL) {
    $a = shortcode_atts(array(
        'number' => '12', // Accepted values: Integers 1 through 12
        'end'    => '',   // Accepted values: yes, no
    ), $atts);

    $columns_number = esc_attr($a['number']);
    $columns_end    = strtolower(esc_attr($a['end']));

    if ($columns_end == 'yes') {
        $columns_end = 'end';
    } else {
        $columns_end = '';
    }

    return '<div class="columns medium-' . $columns_number . ' ' . $columns_end . '">' . do_shortcode($content) . '</div>';
}
add_shortcode('columns', 'shortcode_columns');

/**
 * Enable [button] shortcode.
 * Allow site admin to add button links to posts and pages.
 *
 * @param  array  $atts
 * @param  string $content
 * @return string
 */
function shortcode_button($atts, $content = NULL) {
    $a = shortcode_atts(array(
        'url'      => '', // Accepted values: a url string
        'type'     => '', // Accepted values: default, secondary, success, alert
        'size'     => '', // Accepted values: default, tiny, small, large
        'corners'  => '', // Accepted values: default, radius, round
        'disabled' => '', // Accepted values: default, yes, no
        'expand'   => ''  // Accepted values: default, yes, no
    ), $atts);

    $button_url      = strtolower(esc_attr($a['url']));
    $button_type     = strtolower(esc_attr($a['type']));
    $button_size     = strtolower(esc_attr($a['size']));
    $button_corners  = strtolower(esc_attr($a['corners']));
    $button_disabled = strtolower(esc_attr($a['disabled']));
    $button_expand   = strtolower(esc_attr($a['expand']));

    if ($button_type == 'default') {
        $button_type = '';
    }

    if ($button_size == 'default') {
        $button_size = '';
    }

    if ($button_corners == 'default') {
        $button_corners = '';
    }

    if ($button_disabled == 'yes') {
        $button_disabled = 'disabled';
    } else {
        $button_disabled = '';
    }

    if ($button_expand == 'yes') {
        $button_expand = 'expand';
    } else {
        $button_expand = '';
    }

    return '<a href="' . $button_url . '" class="button ' . $button_type . ' ' . $button_size . ' ' . $button_corners . ' ' . $button_disabled . ' ' . $button_expand . ' ">' . do_shortcode($content) . '</a>';
}
add_shortcode('button', 'shortcode_button');

/**
 * Enable [alert] shortcode.
 * Allow site admin to add alert boxes to posts and pages.
 *
 * @param  array  $atts
 * @param  string $content
 * @return string
 */
function shortcode_alert($atts, $content = NULL) {
    $a = shortcode_atts(array(
        'type'     => '', // Accepted values: default, secondary, success, warning, info, alert
        'corners'  => ''  // Accepted values: default, radius, round
    ), $atts);

    $alert_type     = strtolower(esc_attr($a['type']));
    $alert_corners  = strtolower(esc_attr($a['corners']));

    if ($alert_type == 'default') {
        $alert_type = '';
    }

    if ($alert_corners == 'default') {
        $alert_corners = '';
    }

    return '<div data-alert class="alert-box ' . $alert_type . ' ' . $alert_corners . '">' . do_shortcode($content) . '<a href="#" class="close">&times;</a></div>';
}
add_shortcode('alert', 'shortcode_alert');

/**
 * Enable [label] shortcode.
 * Allow site admin to add inline labels to posts and pages.
 *
 * @param  array  $atts
 * @param  string $content
 * @return string
 */
function shortcode_label($atts, $content = NULL) {
    $a = shortcode_atts(array(
        'type'     => '', // Accepted values: default, secondary, success, warning, alert
        'corners'  => ''  // Accepted values: default, radius, round
    ), $atts);

    $label_type     = strtolower(esc_attr($a['type']));
    $label_corners  = strtolower(esc_attr($a['corners']));

    if ($label_type == 'default') {
        $label_type = '';
    }

    if ($label_corners == 'default') {
        $label_corners = '';
    }

    return '<span class="label ' . $label_type . ' ' . $label_corners . '">' . do_shortcode($content) . '</span>';
}
add_shortcode('label', 'shortcode_label');

/**
 * Enable [panel] shortcode.
 * Allow site admin to add content panels to posts and pages.
 *
 * @param  array  $atts
 * @param  string $content
 * @return string
 */
function shortcode_panel($atts, $content = NULL) {
    $a = shortcode_atts(array(
        'type'     => '', // Accepted values: default, callout
        'corners'  => ''  // Accepted values: default, radius
    ), $atts);

    $panel_type     = strtolower(esc_attr($a['type']));
    $panel_corners  = strtolower(esc_attr($a['corners']));

    if ($panel_type == 'default') {
        $panel_type = '';
    }

    if ($panel_corners == 'default') {
        $panel_corners = '';
    }

    return '<div class="panel ' . $panel_type . ' ' . $panel_corners . '">' . do_shortcode($content) . '</div>';
}
add_shortcode('panel', 'shortcode_panel');

/**
 * Enable [tooltip] shortcode.
 * Allow site admin to add tooltips to strings of content on posts and pages.
 *
 * @param  array  $atts
 * @param  string $content
 * @return string
 */
function shortcode_tooltip($atts, $content = NULL) {
    $a = shortcode_atts(array(
        'text'     => '',      // Accepted values: an alphanumeric string
        'width'    => '210',   // Accepted values: numerals only
        'corners'  => '',      // Accepted values: default, radius
        'position' => 'bottom' // Accepted values: default, top, right, bottom, left
    ), $atts);

    $tooltip_text     = addslashes(esc_attr($a['text']));
    $tooltip_width    = addslashes(esc_attr($a['width']));
    $tooltip_corners  = strtolower(esc_attr($a['corners']));
    $tooltip_position = strtolower(esc_attr($a['position']));

    if ($tooltip_corners == 'default') {
        $tooltip_corners = '';
    }

    if ($tooltip_position == 'default') {
        $tooltip_position = '';
    }

    return '<span data-tooltip="' . $tooltip_position . '" class="has-tip tip-' . $tooltip_position . ' ' . $tooltip_corners . '" data-width="' . $tooltip_width . '" title="' . $tooltip_text . '">' . do_shortcode($content) . '</span>';
}
add_shortcode('tooltip', 'shortcode_tooltip');

/**
 * Enable [icon] shortcode.
 * Allow site admin to add icons from from Font Awesome.
 * Visit http://fortawesome.github.io/Font-Awesome/ for more info.
 *
 * @param  array  $atts
 * @param  string $content
 * @return string
 */
function shortcode_icon($atts, $content = NULL) {
    $a = shortcode_atts(array(
        'class' => '' // Accepted values: see http://fortawesome.github.io/Font-Awesome/
    ), $atts);

    return '<i class="fa ' . esc_attr($a['class']) . '"></i>';
}
add_shortcode('icon', 'shortcode_icon');

/**
 * Enable [accordion] shortcode.
 * Allow site admin to add accordions to posts and pages.
 * NOTE: Use [accordion] to wrap [accordion-panel] groups.
 *
 * @param  string $content
 * @return string
 */
function shortcode_accordion($atts, $content = NULL) {
    return '<dl class="accordion" data-accordion>' . do_shortcode($content) . '</dl>';
}
add_shortcode('accordion', 'shortcode_accordion');


/**
 * Enable [accordion-panel] shortcode.
 * Allow site admin to add accordions to posts and pages.
 * NOTE: [accordion-panel] must be used within [accordion].
 *
 * @param  array  $atts
 * @param  string $content
 * @return string
 */
function shortcode_accordion_panel($atts, $content = NULL) {
    $a = shortcode_atts(array(
        'id'    => '', // Accepted values: An alphanumeric string
        'title' => ''  // Accepted values: An alphanumeric string
    ), $atts);

    $accordion_id    = strtolower(esc_attr($a['id']));
    $accordion_title = addslashes(esc_attr($a['title']));

    if(empty($accordion_id)) {
        $accordion_id = $accordion_title . '-' . rand(100000, 999999);
    }

    $accordion_id = strtolower($accordion_id);
    $accordion_id = preg_replace("/[^a-z0-9_\s-]/", "", $accordion_id);
    $accordion_id = preg_replace("/[\s-]+/", " ", $accordion_id);
    $accordion_id = preg_replace("/[\s_]/", "-", $accordion_id);

    $output  = '<dd>';
    $output .= '<a href="#' . $accordion_id . '">' . $accordion_title .'</a>';
    $output .= '<div id="' . $accordion_id . '" class="content">';
    $output .= do_shortcode($content);
    $output .= '</div>';
    $output .= '</dd>';

    return $output;
}
add_shortcode('accordion-panel', 'shortcode_accordion_panel');

/**
 * An empty string variable to be used by the.
 * [tabs] and [tab] shortcodes.
 *
 * @var string
 */
$tabs_panels = '';

/**
 * Enable [tabs] shortcode.
 * Allow site admin to add tabs to posts and pages.
 * NOTE: Use [tabs] to wrap [tab] groups.
 *
 * @param  string $content
 * @return string
 */
function tabs($atts, $content = NULL) {
    global $tabs_panels;

    $tabs_panels = '';

    $output  = '<dl class="tabs" data-tab="">';
    $output .= '' . do_shortcode($content) . '</dl>';
    $output .= '<div class="tabs-content">' . $tabs_panels . '</div>';

    return $output;
}

/**
 * Enable [tab] shortcode.
 * Allow site admin to add tabs to posts and pages.
 * NOTE: [tab] must be used within [tabs].
 *
 * @param  array  $atts
 * @param  string $content
 * @return string
 */
function tab($atts, $content = NULL) {
    global $tabs_panels;

    $a = shortcode_atts(array(
        'id'     => '',  // Accepted values: an alphanumeric string
        'title'  => '',  // Accepted values: an alphanumeric string
        'active' => 'no' // Accepted values: yes, no
    ), $atts);

    $tab_id     = strtolower(esc_attr($a['id']));
    $tab_title  = addslashes(esc_attr($a['title']));
    $tab_active = strtolower(esc_attr($a['active']));

    if ($tab_active == 'yes') {
        $tab_active = 'active';
    } else {
        $tab_active = '';
    }

    if(empty($tab_id)) {
        $tab_id = $tab_title . '-' . rand(100000, 999999);
    }

    $tab_id = strtolower($tab_id);
    $tab_id = preg_replace("/[^a-z0-9_\s-]/", "", $tab_id);
    $tab_id = preg_replace("/[\s-]+/", " ", $tab_id);
    $tab_id = preg_replace("/[\s_]/", "-", $tab_id);

    $output = '
        <dd class="' . $tab_active . '">
            <a href="#' . $tab_id . '">' . $tab_title . '</a>
        </dd>
    ';

    $tabs_panels .= '<div class="content ' . $tab_active . '" id="' . $tab_id . '">' . $content . '</div>';

    return $output;
}
add_shortcode('tabs', 'tabs');
add_shortcode('tab', 'tab');

/**
 * Customize the output for Wordpress's default [gallery] shortcode.
 *
 * @param  array  $attr
 * @param  string $output
 * @return string
 */
function my_post_gallery($output, $attr) {
    global $post;

    if (isset($attr['orderby'])) {
        $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
        if (!$attr['orderby'])
            unset($attr['orderby']);
    }

    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'itemtag'    => 'dl',
        'icontag'    => 'dt',
        'captiontag' => 'dd',
        'columns'    => 3,
        'size'       => 'thumbnail',
        'include'    => '',
        'exclude'    => '',
        'format'     => 'grid'
    ), $attr));

    $id = intval($id);
    if ('RAND' == $order) $orderby = 'none';

    if (!empty($include)) {
        $include      = preg_replace('/[^0-9,]+/', '', $include);
        $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
        $attachments  = array();

        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    }

    if (empty($attachments)) return '';

    // Set gallery output based on format attr
    if ($attr['format'] == 'grid') {
        $gallery_rel = 'gallery_' . rand(100000, 999999);
        $output      = '<div class="gallery row">' . PHP_EOL;

        // Loop through each attachment
        foreach ($attachments as $id => $attachment) {
            $img     = wp_get_attachment_image_src($id, 'post-thumb-detail');
            $link    = wp_get_attachment_image_src($id, 'large');
            $output .= '<div class="columns small-6 medium-4 large-3">' . PHP_EOL;
            $output .= '<div class="gallery-item">' . PHP_EOL;
            $output .= '<a href="' . $link[0] . '" class="fancybox" rel="' . $gallery_rel . '"><img src="' . $img[0] . '" width="' . $img[1] . '" height="' . $img[2] . '" alt="" /></a>' . PHP_EOL;
            $output .= '</div>' . PHP_EOL;
            $output .= '</div>' . PHP_EOL;
        }

        $output .= '</div>';

    } elseif ($attr['format'] == 'slideshow') {
        $output = '<div class="gallery slideshow">' . PHP_EOL;

        // Loop through each attachment
        foreach ($attachments as $id => $attachment) {
            $img     = wp_get_attachment_image_src($id, 'post-thumb-detail');
            $link    = wp_get_attachment_image_src($id, 'large');
            $output .= '<div class="gallery-item">' . PHP_EOL;
            $output .= '<img src="' . $img[0] . '" width="' . $img[1] . '" height="' . $img[2] . '" alt="" />' . PHP_EOL;
            $output .= '</div>' . PHP_EOL;
        }

        $output .= '</div>' . PHP_EOL;

    } elseif ($attr['format'] == 'carousel') {
        $gallery_rel = 'gallery_' . rand(100000, 999999);
        $output      = '<div class="gallery carousel">' . PHP_EOL;

        // Loop through each attachment
        foreach ($attachments as $id => $attachment) {
            $img     = wp_get_attachment_image_src($id, 'post-thumb-detail');
            $link    = wp_get_attachment_image_src($id, 'large');
            $output .= '<div class="gallery-item">' . PHP_EOL;
            $output .= '<a href="' . $link[0] . '" class="fancybox" rel="' . $gallery_rel . '"><img src="' . $img[0] . '" width="' . $img[1] . '" height="' . $img[2] . '" alt="" /></a>' . PHP_EOL;
            $output .= '</div>' . PHP_EOL;
        }

        $output .= '</div>' . PHP_EOL;
    }

    return $output;
}
add_filter('post_gallery', 'my_post_gallery', 10, 2);
?>
