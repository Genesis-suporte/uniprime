<?php
//function display_breadcrumbs() {
  // Get the post information and the query
  global $post, $wp_query;
  // Define a separator character.
  $separator = ' <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-separator"><path d="M9.1665 7.5L11.6665 10L9.1665 12.5" stroke="#6C6C6C" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/></svg> ';
  // What is the title & URL of the Home Page that you want to display?
  $home_title = 'Home';
  $home_url = get_home_url();
  $creadcrumb_content = '';
  // You probably don't want to display this on your home page.
  if (!is_front_page()) {
    /*
    
  
    
      <?php echo esc_html($label); ?>
    </div>*/
    // Start the div and the unordered list
    $creadcrumb_content .= "<section class='breadcrumbs mw-100'>\n";
    $creadcrumb_content .= "<div class='container'>\n";
    $creadcrumb_content .= "<div class='content-breadcrumbs'>\n<ul>\n";
    // Add the home page and a separator
    $creadcrumb_content .= "<li><a href='$home_url'>$home_title</a></li>\n";
    $creadcrumb_content .= "<li class='separator'>$separator</li>\n";

    // Check to see if the post has parents
    if ($post->post_parent) {
      // Get the ancestors
      $ancArray = array_reverse(get_post_ancestors($post->ID));
      // Set the parents to null, if necessary
      $parents = (!isset($parents)) ? null : $parents;
      // Loop through the ancestors
      foreach ($ancArray as $ancestor) {
        $anc_permalink = get_permalink($ancestor);
        $anc_title = get_the_title($ancestor);
        // This uses a custom field called "short_title" created
        // with the Advanced Custom Fields plugin!
        $anc_short = get_field('short_title', $ancestor);
        $anc_title = ($anc_short) ? $anc_short : $anc_title;
        $parents .= "<li><a href='$anc_permalink'>$anc_title</a></li>\n";
        $parents .= "<li class='separator'>$separator</li>\n";
      }
      // Display the partial list we've created.
      $creadcrumb_content .= "$parents";

      // Get information for the current page
      $short_title = get_field('short_title');
      $curr_title = ($short_title) ? $short_title : get_the_title();
      // Display it
      $creadcrumb_content .= "<li><b>$curr_title</b></li>\n";

    } else {
      // If there are no parents, then just display the current page
      $short_title = get_field('short_title');
      $curr_title = ($short_title) ? $short_title : get_the_title();
      $creadcrumb_content .= "<li><b>$curr_title</b></li>\n";
    }
  }
  $creadcrumb_content .= "</ul>\n</div>\n</div>\n</section>\n";
  echo $creadcrumb_content;
//}