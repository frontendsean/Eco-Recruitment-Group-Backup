<?php

// Visual Composer related functions to implement it with WorkScout

$icons = workscout_icons_list();


/*
 * [box_job_categories] Dispays nicely styled grid of job categories with icons
 *
 */


add_action( 'init', 'ws_box_job_categories_integrateWithVC' );
function ws_box_job_categories_integrateWithVC() {
  $box_jobs_categories = array('None' => ' ');

  $job_listing_categories = get_terms( 'job_listing_category', 'orderby=count&hide_empty=0' );
  if ( is_array( $job_listing_categories ) && ! empty( $job_listing_categories ) ) {
    foreach ( $job_listing_categories as $job_listing_category ) {
        $box_jobs_categories[ $job_listing_category->name ] =  esc_attr($job_listing_category->term_id) ;
    }
  }
  vc_map( array(
    "name" => esc_html__("Job categories grid","workscout"),
    "base" => "box_job_categories",
    'icon' => 'workscout_icon',
    'description' => esc_html__( 'Dispays nicely styled grid of job categories with icons', 'workscout' ),
    "category" => esc_html__('WorkScout',"workscout"),
    "params" => array(
      array(
        "type" => "dropdown",
        "class" => "",
        "heading" => esc_html__("Empty categories..", 'workscout'),
        "param_name" => "hide_empty",
        "value" => array(
         'Hide' => '1',     
         'Show' => '0',
        ),
        'save_always' => true,
        "description" => "Hides categories that doesn't have any jobs"
      ),

      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Order by', 'workscout' ),
        'param_name' => 'orderby',
        'value' => array(
          esc_html__( 'Name', 'workscout' ) => 'naem',
          esc_html__( 'ID', 'workscout' ) => 'ID',
          esc_html__( 'Count', 'workscout' ) => 'count',
          esc_html__( 'Slug', 'workscout' ) => 'slug',
          esc_html__( 'None', 'workscout' ) => 'none',
          ),
        ),

      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Order', 'workscout' ),
        'param_name' => 'order',
        'value' => array(
          esc_html__( 'Descending', 'workscout' ) => 'DESC',
          esc_html__( 'Ascending', 'workscout' ) => 'ASC'
          ),
      ),

       array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Total items', 'workscout' ),
        'param_name' => 'number',
        'value' => 10, // default value
        'description' => esc_html__( 'Set max limit for items in grid or enter -1 to display all (limited to 1000).', 'workscout' ),
      ),

      array(
        'type' => 'checkbox',
        'heading' => esc_html__( '"Browse categories" button', 'workscout' ),
        'param_name' => 'browse_link',
        'description' => esc_html__( 'If checked the button will be added to the end of the grid.', 'workscout' ),
        'value' => array( esc_html__( 'Yes', 'workscout' ) => 'yes' )
      ),

      array(
        'type' => 'autocomplete',
        'heading' => esc_html__( 'Include only', 'workscout' ),
        'param_name' => 'include',
        'description' => esc_html__( 'Add job categories.', 'workscout' ),
        'settings' => array(
            'multiple' => true,
            'sortable' => true,
          ),
        ),      
      array(
        'type' => 'autocomplete',
        'heading' => esc_html__( 'Exclude only', 'workscout' ),
        'param_name' => 'exclude',
        'description' => esc_html__( 'Add job categories.', 'workscout' ),
        'settings' => array(
            'multiple' => true,
            'sortable' => true,
          ),
        ),

      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Child of', 'workscout' ),
        'param_name' => 'child_of',
        'value' => $box_jobs_categories,
      ),
    )
  ));
}

add_filter( 'vc_autocomplete_box_job_categories_include_callback',
  'vc_include_job_categories_search', 10, 1 ); // Get suggestion(find). Must return an array

 add_filter( 'vc_autocomplete_box_job_categories_include_render',
  'vc_include_job_categories_render', 10, 1 ); // Render exact product. Must return an array (label,value)

add_filter( 'vc_autocomplete_box_job_categories_exclude_callback',
  'vc_include_job_categories_search', 10, 1 ); // Get suggestion(find). Must return an array

 add_filter( 'vc_autocomplete_box_job_categories_exclude_render',
  'vc_include_job_categories_render', 10, 1 ); // Render exact product. Must return an array (label,value)




add_action( 'init', 'ws_box_resume_categories_integrateWithVC' );
function ws_box_resume_categories_integrateWithVC() {
  $box_resumes_categories = array('None' => ' ');

  $resume_categories = get_terms( 'resume_category', 'orderby=count&hide_empty=0' );
  if ( is_array( $resume_categories ) && ! empty( $resume_categories ) ) {
    foreach ( $resume_categories as $resume_category ) {
        $box_resumes_categories[ $resume_category->name ] =  esc_attr($resume_category->term_id) ;
    }
  }
  vc_map( array(
    "name" => esc_html__("Resumes categories grid","workscout"),
    "base" => "box_resume_categories",
    'icon' => 'workscout_icon',
    'description' => esc_html__( 'Dispays nicely styled grid of resume categories with icons', 'workscout' ),
    "category" => esc_html__('WorkScout',"workscout"),
    "params" => array(
      array(
        "type" => "dropdown",
        "class" => "",
        "heading" => esc_html__("Empty categories..", 'workscout'),
        "param_name" => "hide_empty",
        "value" => array(
         'Hide' => '1',     
         'Show' => '0',
        ),
        'save_always' => true,
        "description" => "Hides categories that doesn't have any resumes"
      ),

      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Order by', 'workscout' ),
        'param_name' => 'orderby',
        'value' => array(
          esc_html__( 'Name', 'workscout' ) => 'naem',
          esc_html__( 'ID', 'workscout' ) => 'ID',
          esc_html__( 'Count', 'workscout' ) => 'count',
          esc_html__( 'Slug', 'workscout' ) => 'slug',
          esc_html__( 'None', 'workscout' ) => 'none',
          ),
        ),

      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Order', 'workscout' ),
        'param_name' => 'order',
        'value' => array(
          esc_html__( 'Descending', 'workscout' ) => 'DESC',
          esc_html__( 'Ascending', 'workscout' ) => 'ASC'
          ),
      ),

       array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Total items', 'workscout' ),
        'param_name' => 'number',
        'value' => 10, // default value
        'description' => esc_html__( 'Set max limit for items in grid or enter -1 to display all (limited to 1000).', 'workscout' ),
      ),

      array(
        'type' => 'href',
        'heading' => esc_html__( '"Browse categories" button', 'workscout' ),
        'param_name' => 'browse_link',
        'description' => esc_html__( 'The button will be added to the end of the grid.', 'workscout' ),
        
      ),

      array(
        'type' => 'autocomplete',
        'heading' => esc_html__( 'Include only', 'workscout' ),
        'param_name' => 'include',
        'description' => esc_html__( 'Add resume categories.', 'workscout' ),
        'settings' => array(
            'multiple' => true,
            'sortable' => true,
          ),
        ),      
      array(
        'type' => 'autocomplete',
        'heading' => esc_html__( 'Exclude only', 'workscout' ),
        'param_name' => 'exclude',
        'description' => esc_html__( 'Add resume categories.', 'workscout' ),
        'settings' => array(
            'multiple' => true,
            'sortable' => true,
          ),
        ),

      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Child of', 'workscout' ),
        'param_name' => 'child_of',
        'value' => $box_resumes_categories,
      ),
    )
  ));
}

add_filter( 'vc_autocomplete_box_resume_categories_include_callback',
  'vc_include_resume_categories_search', 10, 1 ); // Get suggestion(find). Must return an array

 add_filter( 'vc_autocomplete_box_resume_categories_include_render',
  'vc_include_resume_categories_render', 10, 1 ); // Render exact product. Must return an array (label,value)

add_filter( 'vc_autocomplete_box_resume_categories_exclude_callback',
  'vc_include_resume_categories_search', 10, 1 ); // Get suggestion(find). Must return an array

 add_filter( 'vc_autocomplete_box_resume_categories_exclude_render',
  'vc_include_resume_categories_render', 10, 1 ); // Render exact product. Must return an array (label,value)



/*
 * Headline for Visual Composer
 *
 */
add_action( 'init', 'pp_headline_integrateWithVC' );
function pp_headline_integrateWithVC() {
  vc_map( array(
    "name" => esc_html__("Headline","workscout"),
    "base" => "headline",
    'icon' => 'workscout_icon',
    'description' => esc_html__( 'Header', 'workscout' ),
//    'admin_enqueue_js' => array(get_template_directory_uri().'/vc_templates/js/vc_image_caption_box.js'),
    "category" => esc_html__('WorkScout',"workscout"),
    "params" => array(
      array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Title', 'workscout' ),
        'param_name' => 'content',
        'description' => esc_html__( 'Enter text which will be used as title', 'workscout' )
        ),
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Type', 'workscout' ),
        'param_name' => 'type',
        'description' => esc_html__( 'Choose header weight', 'workscout' ),
        'value' => array(
          'H1' => 'h1',
          'H2' => 'h2',
          'H3' => 'h3',
          'H4' => 'h4',
          'H5' => 'h5',
          ),
        'std' => 'h3',
        ),
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Top margin', 'workscout' ),
        'param_name' => 'margintop',
        'value' => array(
          '0' => '0',
          '10' => '10',
          '15' => '15',
          '20' => '20',
          '25' => '25',
          '30' => '30',
          '35' => '35',
          '40' => '40',
          '45' => '45',
          '50' => '50',
          ),
        'std' => '15',
        'description' => esc_html__( 'Choose top margin (in px)', 'workscout' )
        ),
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Bottom margin', 'workscout' ),
        'param_name' => 'marginbottom',
        'value' => array(
          '0' => '0',
          '10' => '10',
          '15' => '15',
          '20' => '20',
          '25' => '25',
          '30' => '30',
          '35' => '35',
          '40' => '40',
          '45' => '45',
          '50' => '50',
          ),
        'std' => '35',
        'description' => esc_html__( 'Choose bottom margin (in px)', 'workscout' )
        ),
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Clearfix after?', 'workscout' ),
        'param_name' => 'clearfix',
        'description' => esc_html__( 'Add clearfix after headline, you might want to disable it for some elements, like the recent products carousel.', 'workscout' ),
        'value' => array(
          esc_html__( 'Yes, please', 'workscout' ) => '1',
          esc_html__( 'No, thank you', 'workscout' ) => 'no',
          ),
        'std' => '1',
        ),
      ),
  ));
}



/*
 * Iconbox for Visual Composer
 *
 */
add_action( 'init', 'pp_iconbox_integrateWithVC' );
function pp_iconbox_integrateWithVC() {
  vc_map( array(
    "name" => esc_html__("Iconbox","workscout"),
    "base" => "iconbox",
    'icon' => 'workscout_icon',
    'description' => esc_html__( 'Iconbox', 'workscout' ),
    "category" => esc_html__('WorkScout',"workscout"),
    "params" => array(
        array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Title', 'workscout' ),
          'param_name' => 'title',
          'description' => esc_html__( 'Enter text which will be used as title', 'workscout' )
          ),      

        array(
          'type' => 'textarea_html',
          'heading' => esc_html__( 'Content', 'workscout' ),
          'param_name' => 'content',
          'description' => esc_html__( 'Enter message content.', 'workscout' )
        ),
        array(
          'type' => 'vc_link',
          'heading' => esc_html__( 'URL', 'workscout' ),
          'param_name' => 'url',
          'description' => esc_html__( 'Iconbox link', 'workscout' ),
        ),      
        array(
          'type' => 'iconpicker',
          'heading' => esc_html__( 'Icon', 'workscout' ),
          'param_name' => 'icon',
            'settings' => array(
              'type' => 'iconsmind',
              'emptyIcon' => false,
              'iconsPerPage' => 50
              ),
          'description' => esc_html__( 'Icon', 'workscout' ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Type', 'workscout' ),
          'param_name' => 'type',
          'description' => esc_html__( 'Choose style', 'workscout' ),
          'value' => array(
            'Rounded' => 'rounded',
            'Standard' => 'standard',
            ),
          'std' => 'standard',
        ),

        array(
          'type' => 'from_vs_indicatior',
          'heading' => esc_html__( 'From Visual Composer', 'workscout' ),
          'param_name' => 'from_vs',
          'value' => 'yes',
          'save_always' => true,
        )
    ),
  ));
}

/*
 * [spotlight_jobs] 
 *
 */
add_action( 'init', 'ws_spotlight_jobs_integrateWithVC' );
function ws_spotlight_jobs_integrateWithVC() {
  vc_map( array(
    "name" => esc_html__("Featured jobs carousel","workscout"),
    "base" => "spotlight_jobs",
    'icon' => 'workscout_icon',
    'description' => esc_html__( 'Shows carousel with selected jobs', 'workscout' ),
    "category" => esc_html__('WorkScout',"workscout"),
    "params" => array(
      array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Total items', 'workscout' ),
          'param_name' => 'per_page',
          'value' => 3, // default value
          'description' => esc_html__( 'Set max limit for items in grid or enter -1 to display all (limited to 1000).', 'workscout' ),
      ),
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Order by', 'workscout' ),
        'param_name' => 'orderby',
        'value' => array(
          esc_html__( 'Featured', 'workscout' ) => 'featured',
          esc_html__( 'Date', 'workscout' ) => 'date',
          esc_html__( 'ID', 'workscout' ) => 'ID',
          esc_html__( 'Author', 'workscout' ) => 'author',
          esc_html__( 'Title', 'workscout' ) => 'title',
          esc_html__( 'Modified', 'workscout' ) => 'modified',
          esc_html__( 'Random', 'workscout' ) => 'rand',
          ),
        ),
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Order', 'workscout' ),
        'param_name' => 'order',
        'value' => array(
          esc_html__( 'Descending', 'workscout' ) => 'DESC',
          esc_html__( 'Ascending', 'workscout' ) => 'ASC'
          ),
      ),
      array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Title', 'workscout' ),
        'param_name' => 'title',
        'description' => esc_html__( 'Enter text which will be used as title', 'workscout' )
      ),
      array(
        'type' => 'autocomplete',
        'heading' => esc_html__( 'From Categories only', 'workscout' ),
        'param_name' => 'categories',
        'description' => esc_html__( 'Add job categories.', 'workscout' ),
        'settings' => array(
            'multiple' => true,
            'sortable' => true,
          ),
      ),        
      array(
        'type' => 'autocomplete',
        'heading' => esc_html__( 'From job types only', 'workscout' ),
        'param_name' => 'job_types',
        'description' => esc_html__( 'Add job types.', 'workscout' ),
        'settings' => array(
            'multiple' => true,
            'sortable' => true,
          ),
      ),   

       array(
        'type' => 'autocomplete',
        'heading' => esc_html__( 'Show only this jobs', 'workscout' ),
        'param_name' => 'job_ids',
        'description' => esc_html__( 'Select jobs.', 'workscout' ),
        'settings' => array(
            'multiple' => true,
            'sortable' => true,
          ),
      ),
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Filled', 'workscout' ),
        'param_name' => 'filled',
        'value' => array(
          esc_html__( 'Show all', 'workscout' ) => 'null',
          esc_html__( 'Show only filled', 'workscout' ) => 'true',
          esc_html__( 'Hide filled', 'workscout' ) => 'false'
          ),
        'save_always' => true,
      ),       
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Visible Elements', 'workscout' ),
        'param_name' => 'visible',
        'description' => esc_html__( 'How many elements are visible at once for each screen size (desktop, netbook, tablet, mobile phone).', 'workscout' ),
        'value' => array(
          esc_html__( '1,1,1,1', 'workscout' ) => '1,1,1,1',
          esc_html__( '2,1,1,1', 'workscout' ) => '2,1,1,1',
          esc_html__( '2,2,1,1', 'workscout' ) => '2,2,1,1',
          esc_html__( '3,2,1,1', 'workscout' ) => '3,2,1,1',
          esc_html__( '3,3,1,1', 'workscout' ) => '3,3,2,1',
          esc_html__( '4,3,2,2', 'workscout' ) => '4,3,2,2',
          ),
        'save_always' => true,
      ), 
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Auto play', 'workscout' ),
        'param_name' => 'autoplay',
        'value' => array(
          esc_html__( 'Off', 'workscout' ) => 'off',
          esc_html__( 'On', 'workscout' ) => 'on'
          ),
      ),    
      array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Delay', 'workscout' ),
        'param_name' => 'delay',
        'description' => esc_html__( 'Autoplay delay value', 'workscout' ),
        'value' => 5000
      ), 
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Featured', 'workscout' ),
        'param_name' => 'featured',
        'value' => array(
          esc_html__( 'Show all', 'workscout' ) => 'false',
          esc_html__( 'Show only featured', 'workscout' ) => 'true',
          ),
        'save_always' => true,
      ),
    ),
  ));
}
add_filter( 'vc_autocomplete_spotlight_jobs_categories_callback',
  'vc_include_job_categories_search', 10, 1 ); // Get suggestion(find). Must return an array

 add_filter( 'vc_autocomplete_spotlight_jobs_categories_render',
  'vc_include_job_categories_render', 10, 1 ); // Render exact product. Must return an array (label,value)

add_filter( 'vc_autocomplete_spotlight_jobs_job_ids_callback',
  'vc_include_job_job_ids_search', 10, 1 ); // Get suggestion(find). Must return an array

 add_filter( 'vc_autocomplete_spotlight_jobs_job_ids_render',
  'vc_include_job_job_ids_render', 10, 1 ); // Render exact product. Must return an array (label,value)

add_filter( 'vc_autocomplete_spotlight_jobs_job_types_callback',
  'vc_include_job_types_search', 10, 1 ); // Get suggestion(find). Must return an array

 add_filter( 'vc_autocomplete_spotlight_jobs_job_types_render',
  'vc_include_job_types_render', 10, 1 ); // Render exact product. Must return an array (label,value)


/*
 * [spotlight_jobs] 
 *
 */
add_action( 'init', 'ws_spotlight_resumes_integrateWithVC' );
function ws_spotlight_resumes_integrateWithVC() {
  vc_map( array(
    "name" => esc_html__("Featured Resumes carousel","workscout"),
    "base" => "spotlight_resumes",
    'icon' => 'workscout_icon',
    'description' => esc_html__( 'Shows carousel with selected resumes', 'workscout' ),
    "category" => esc_html__('WorkScout',"workscout"),
    "params" => array(
      array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Total items', 'workscout' ),
          'param_name' => 'per_page',
          'value' => 3, // default value
          'description' => esc_html__( 'Set max limit for items in grid or enter -1 to display all (limited to 1000).', 'workscout' ),
      ),
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Order by', 'workscout' ),
        'param_name' => 'orderby',
        'value' => array(
          esc_html__( 'Featured', 'workscout' ) => 'featured',
          esc_html__( 'Date', 'workscout' ) => 'date',
          esc_html__( 'ID', 'workscout' ) => 'ID',
          esc_html__( 'Author', 'workscout' ) => 'author',
          esc_html__( 'Title', 'workscout' ) => 'title',
          esc_html__( 'Modified', 'workscout' ) => 'modified',
          esc_html__( 'Random', 'workscout' ) => 'rand',
          ),
        ),
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Order', 'workscout' ),
        'param_name' => 'order',
        'value' => array(
          esc_html__( 'Descending', 'workscout' ) => 'DESC',
          esc_html__( 'Ascending', 'workscout' ) => 'ASC'
          ),
      ),
      array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Title', 'workscout' ),
        'param_name' => 'title',
        'description' => esc_html__( 'Enter text which will be used as title', 'workscout' )
      ),
      array(
        'type' => 'autocomplete',
        'heading' => esc_html__( 'From Categories only', 'workscout' ),
        'param_name' => 'categories',
        'description' => esc_html__( 'Add resumes categories.', 'workscout' ),
        'settings' => array(
            'multiple' => true,
            'sortable' => true,
          ),
      ),        


       array(
        'type' => 'autocomplete',
        'heading' => esc_html__( 'Show only this resumes', 'workscout' ),
        'param_name' => 'resume_ids',
        'description' => esc_html__( 'Select resumes.', 'workscout' ),
        'settings' => array(
            'multiple' => true,
            'sortable' => true,
          ),
      ),
  
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Visible Elements', 'workscout' ),
        'param_name' => 'visible',
        'description' => esc_html__( 'How many elements are visible at once for each screen size (desktop, netbook, tablet, mobile phone).', 'workscout' ),
        'value' => array(
          esc_html__( '1,1,1,1', 'workscout' ) => '1,1,1,1',
          esc_html__( '2,1,1,1', 'workscout' ) => '2,1,1,1',
          esc_html__( '2,2,1,1', 'workscout' ) => '2,2,1,1',
          esc_html__( '3,2,1,1', 'workscout' ) => '3,2,1,1',
          esc_html__( '3,3,1,1', 'workscout' ) => '3,3,2,1',
          esc_html__( '4,3,2,2', 'workscout' ) => '4,3,2,2',
          ),
        'save_always' => true,
      ), 
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Auto play', 'workscout' ),
        'param_name' => 'autoplay',
        'value' => array(
          esc_html__( 'Off', 'workscout' ) => 'off',
          esc_html__( 'On', 'workscout' ) => 'on'
          ),
      ),    
      array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Delay', 'workscout' ),
        'param_name' => 'delay',
        'description' => esc_html__( 'Autoplay delay value', 'workscout' ),
        'value' => 5000
      ), 
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Featured', 'workscout' ),
        'param_name' => 'featured',
        'value' => array(
          esc_html__( 'Show all', 'workscout' ) => 'false',
          esc_html__( 'Show only featured', 'workscout' ) => 'true',
          ),
        'save_always' => true,
      ),
    ),
  ));
}
add_filter( 'vc_autocomplete_spotlight_resumes_categories_callback',
  'vc_include_resume_categories_search', 10, 1 ); // Get suggestion(find). Must return an array

 add_filter( 'vc_autocomplete_spotlight_resumes_categories_render',
  'vc_include_resume_categories_render', 10, 1 ); // Render exact product. Must return an array (label,value)

add_filter( 'vc_autocomplete_spotlight_resumes_resume_ids_callback',
  'vc_include_resume_resume_ids_search', 10, 1 ); // Get suggestion(find). Must return an array

 add_filter( 'vc_autocomplete_spotlight_resumes_resume_ids_render',
  'vc_include_resume_resume_ids_render', 10, 1 ); // Render exact product. Must return an array (label,value)


/*
 * [testimonials_wide] 
 *
 */
add_action( 'init', 'ws_testimonials_wide_integrateWithVC' );
function ws_testimonials_wide_integrateWithVC() {
  vc_map( array(
    "name" => esc_html__("Testimonials (wide version)","workscout"),
    "base" => "testimonials_wide",
    'icon' => 'workscout_icon',
    'description' => esc_html__( 'Shows clients testimonials - add only for full-width rows', 'workscout' ),
    "category" => esc_html__('WorkScout',"workscout"),
    "params" => array(
      array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Total items', 'workscout' ),
          'param_name' => 'per_page',
          'value' => 4, // default value
          'description' => esc_html__( 'Set max limit for items in grid or enter -1 to display all (limited to 1000).', 'workscout' ),
      ),
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Order by', 'workscout' ),
        'param_name' => 'orderby',
        'value' => array(

          esc_html__( 'Date', 'workscout' ) => 'date',
          esc_html__( 'ID', 'workscout' ) => 'ID',
          esc_html__( 'Author', 'workscout' ) => 'author',
          esc_html__( 'Title', 'workscout' ) => 'title',
          esc_html__( 'Modified', 'workscout' ) => 'modified',
          esc_html__( 'Random', 'workscout' ) => 'rand',
          ),
        ),
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Order', 'workscout' ),
        'param_name' => 'order',
        'value' => array(
          esc_html__( 'Descending', 'workscout' ) => 'DESC',
          esc_html__( 'Ascending', 'workscout' ) => 'ASC'
          ),
      ),
      array(
        'type' => 'autocomplete',
        'heading' => esc_html__( 'Exclude Testomionials', 'workscout' ),
        'param_name' => 'exclude_posts',
        'settings' => array(
            'multiple' => true,
            'sortable' => true,
          ),
      ),       
      array(
        'type' => 'autocomplete',
        'heading' => esc_html__( 'Include Testomionials', 'workscout' ),
        'param_name' => 'include_posts',
        'settings' => array(
            'multiple' => true,
            'sortable' => true,
          ),
      ),        
      array(
        'type' => 'attach_image',
        'heading' => esc_html__( 'Background Image for Testomionials section', 'workscout' ),
        'param_name' => 'background',
        'value' => '',
        'description' => esc_html__( 'Select image from media library.', 'workscout' )
        ),
      array(
        'type' => 'from_vs_indicatior',
        'heading' => esc_html__( 'From Visual Composer', 'workscout' ),
        'param_name' => 'from_vs',
        'value' => 'yes',
        'save_always' => true,
      )
    ),
  ));
}

add_filter( 'vc_autocomplete_testimonials_wide_include_posts_callback',
  'vc_include_testimonials_search', 10, 1 ); // Get suggestion(find). Must return an array

 add_filter( 'vc_autocomplete_testimonials_wide_include_posts_render',
  'vc_include_testimonials_render', 10, 1 ); // Render exact product. Must return an array (label,value)

add_filter( 'vc_autocomplete_testimonials_wide_exclude_posts_callback',
  'vc_include_testimonials_search', 10, 1 ); // Get suggestion(find). Must return an array

 add_filter( 'vc_autocomplete_testimonials_wide_exclude_posts_render',
  'vc_include_testimonials_render', 10, 1 ); // Render exact product. Must return an array (label,value)



/*
 * [actionbox] 
 *
 */
add_action( 'init', 'ws_actionbox_integrateWithVC' );
function ws_actionbox_integrateWithVC() {
  vc_map( array(
    "name" => esc_html__("Action Box","workscout"),
    "base" => "actionbox",
    'icon' => 'workscout_icon',
    'description' => esc_html__( 'Shows call-to-action box', 'workscout' ),
    "category" => esc_html__('WorkScout',"workscout"),
    "params" => array(
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Wide version (use only on full-width page in full row', 'workscout' ),
        'param_name' => 'wide',
        'description' => esc_html__( 'Setting this to wide on page with sidebar or not in the maximum wide container will cause layout break.', 'workscout' ),
        'value' => array(
          esc_html__( 'Standard', 'workscout' ) => 'false',
          esc_html__( 'Wide', 'workscout' ) => 'true',
          ),
        'save_always' => true,
      ),
      array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Title', 'workscout' ),
        'param_name' => 'title',
        'value' => 'Start Building Your Own Job Board Now ', // default value
        'description' => '',
      ),      
      array(
        'type' => 'textfield',
        'heading' => esc_html__( 'URL', 'workscout' ),
        'param_name' => 'url',
        'description' => esc_html__( 'Where button will link.', 'workscout' )
      ),
      array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Button text', 'workscout' ),
        'param_name' => 'buttontext',
        'description' => esc_html__( 'Button text - leave empty to hide button.', 'workscout' )
      ),
      array(
        'type' => 'from_vs_indicatior',
        'heading' => esc_html__( 'From Visual Composer', 'workscout' ),
        'param_name' => 'from_vs',
        'value' => 'yes',
        'save_always' => true,
      )

    ),
  ));
}


/*
 * [centered_headline] 
 *
 */
add_action( 'init', 'ws_centered_headline_integrateWithVC' );
function ws_centered_headline_integrateWithVC() {
  vc_map( array(
    "name" => esc_html__("Action Box Centered","workscout"),
    "base" => "centered_headline",
    'icon' => 'workscout_icon',
    'description' => esc_html__( 'Shows centered version of call-to-action box', 'workscout' ),
    "category" => esc_html__('WorkScout',"workscout"),
    "params" => array(
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Wide version (use only on full-width page in full row', 'workscout' ),
        'param_name' => 'wide',
        'description' => esc_html__( 'Setting this to wide on page with sidebar or not in the maximum wide container will cause layout break.', 'workscout' ),
        'value' => array(
          esc_html__( 'Standard', 'workscout' ) => 'false',
          esc_html__( 'Wide', 'workscout' ) => 'true',
          ),
        'save_always' => true,
      ),
      array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Title', 'workscout' ),
        'param_name' => 'title',
        'value' => 'Start Building Your Own Job Board Now ', // default value
        'description' => '',
      ),      
      array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Subtitle', 'workscout' ),
        'param_name' => 'subtitle',
        'description' => ''
      ),
      array(
        'type' => 'textfield',
        'heading' => esc_html__( 'URL', 'workscout' ),
        'param_name' => 'url',
        'description' => esc_html__( 'Where it will link.', 'workscout' )
      ),
      array(
        'type' => 'from_vs_indicatior',
        'heading' => esc_html__( 'From Visual Composer', 'workscout' ),
        'param_name' => 'from_vs',
        'value' => 'yes',
        'save_always' => true,
      )

    ),
  ));
}



add_action( 'init', 'clients_carousel_integrateWithVC' );
function clients_carousel_integrateWithVC() {

  vc_map( array(
    "name" => esc_html__("Client logos carousel", 'workscout'),
    "base" => "vc_clients_carousel",
    'icon' => 'workscout_icon',
    'description' => esc_html__( 'Carousel with logos', 'workscout' ),
    "category" => esc_html__('WorkScout', 'workscout'),
    "params" => array(
     array(
      'type' => 'attach_images',
      'heading' => esc_html__( 'Clients logos', 'workscout' ),
      'param_name' => 'logos',
      'value' => '',
      'description' => esc_html__( 'Select images from media library.', 'workscout' )
      ),
     array(
      'type' => 'from_vs_indicatior',
      'heading' => esc_html__( 'From Visual Composer', 'workscout' ),
      'param_name' => 'from_vs',
      'value' => 'yes',
      'save_always' => true,
      ),
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Auto play', 'workscout' ),
        'param_name' => 'autoplay',
        'value' => array(
          esc_html__( 'Off', 'workscout' ) => 'off',
          esc_html__( 'On', 'workscout' ) => 'on'
          ),
      ),    
      array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Delay', 'workscout' ),
        'param_name' => 'delay',
        'description' => esc_html__( 'Autoplay delay value', 'workscout' ),
        'value' => 5000
      ), 
     ),
    ));
}


/*
 * Recent blog posts for Visual Composer
 *
 */

add_action( 'init', 'workscout_recent_blog_integrateWithVC' );
function workscout_recent_blog_integrateWithVC() {
  vc_map( array(
    "name" => esc_html__("Recent blog posts","workscout"),
    "base" => "latest_from_blog",
    'icon' => 'workscout_icon',
    'description' => esc_html__( 'Recent posts list', 'workscout' ),
    "category" => esc_html__('WorkScout',"workscout"),
    /*  'admin_enqueue_js' => array(get_template_directory_uri().'/vc_extend/bartag.js'),
    'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extend/bartag.css'),*/
    "params" => array(
      array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Total items', 'workscout' ),
          'param_name' => 'limit',
          'value' => 3, // default value
          'save_always' => true,
          'description' => esc_html__( 'Set max limit for items in grid or enter -1 to display all (limited to 1000).', 'workscout' ),
      ),
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'In how many columns will be post displayed', 'workscout' ),
        'param_name' => 'columns',
        'save_always' => true,
        'value' => array('2','3','4'),
        'save_always' => true,
        ),
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Masonry mode', 'workscout' ),
        'param_name' => 'masonry',
        'save_always' => true,
        'value' => array(
          esc_html__( 'Disable', 'workscout' ) => 'no',
          esc_html__( 'Enable', 'workscout' ) => 'yes'
          ),
      ),
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Order by', 'workscout' ),
        'param_name' => 'orderby',
         'save_always' => true,
        'value' => array(
          esc_html__( 'Date', 'workscout' ) => 'date',
          esc_html__( 'ID', 'workscout' ) => 'ID',
          esc_html__( 'Author', 'workscout' ) => 'author',
          esc_html__( 'Title', 'workscout' ) => 'title',
          esc_html__( 'Modified', 'workscout' ) => 'modified',
          esc_html__( 'Random', 'workscout' ) => 'rand',
          esc_html__( 'Comment count', 'workscout' ) => 'comment_count',
          esc_html__( 'Menu order', 'workscout' ) => 'menu_order'
          ),
        ),
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Order', 'workscout' ),
        'param_name' => 'order',
         'save_always' => true,
        'value' => array(
          esc_html__( 'Descending', 'workscout' ) => 'DESC',
          esc_html__( 'Ascending', 'workscout' ) => 'ASC'
          ),
        ),
      array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Number of words from content to show below thumbnail', 'workscout' ),
        'param_name' => 'limit_words',
        'description' => esc_html__( 'Type just a number', 'workscout' ),
        'value' => 10,
        'save_always' => true,

      ),
      array(
        'type' => 'autocomplete',
        'heading' => esc_html__( 'Exclude posts, leave empty to not exclude anything', 'workscout' ),
        'param_name' => 'exclude_posts',
        'settings' => array(
          'post_type' => 'post',
          ),
        ),
      array(
        'type' => 'autocomplete',
        'heading' => esc_html__( 'Show only this categories', 'workscout' ),
        'param_name' => 'categories',
        'taxonomy' => 'category',
        ),
      array(
        'type' => 'autocomplete',
        'heading' => esc_html__( 'Show only this tags', 'workscout' ),
        'param_name' => 'tags',
        'taxonomy' => 'post_tag',
        ),
      array(
        'type' => 'from_vs_indicatior',
        'heading' => esc_html__( 'From Visual Composer', 'workscout' ),
        'param_name' => 'from_vs',
        'value' => 'yes',
        'save_always' => true,
        )
      ),
  ));
}


add_filter( 'vc_autocomplete_latest_from_blog_exclude_posts_callback',
  'vc_exclude_field_search', 10, 1 ); // Get suggestion(find). Must return an array
add_filter( 'vc_autocomplete_latest_from_blog_exclude_posts_render',
  'vc_exclude_field_render', 10, 1 ); // Render exact product. Must return an array (label,value)

add_filter( 'vc_autocomplete_latest_from_blog_categories_callback',
  'ws_categories_search', 10, 1 ); // Get suggestion(find). Must return an array
add_filter( 'vc_autocomplete_latest_from_blog_categories_render',
  'ws_categories_render', 10, 1 ); // Render exact product. Must return an array (label,value)

add_filter( 'vc_autocomplete_latest_from_blog_tags_callback',
  'ws_tags_search', 10, 1 ); // Get suggestion(find). Must return an array
add_filter( 'vc_autocomplete_latest_from_blog_tags_render',
  'ws_tags_render', 10, 1 ); // Render exact product. Must return an array (label,value)


add_action( 'init', 'ws_box_job_categories_full_integrateWithVC' );
function ws_box_job_categories_full_integrateWithVC() {
  $box_jobs_categories = array('None' => ' ');

  $job_listing_categories = get_terms( 'job_listing_category', 'orderby=count&hide_empty=0' );
  if ( is_array( $job_listing_categories ) && ! empty( $job_listing_categories ) ) {
    foreach ( $job_listing_categories as $job_listing_category ) {
        $box_jobs_categories[ $job_listing_category->name ] =  esc_attr($job_listing_category->term_id) ;
    }
  }
  vc_map( array(
    "name" => esc_html__("Job categories list","workscout"),
    "base" => "jobs_categories",
    'icon' => 'workscout_icon',
    'description' => esc_html__( 'Dispays list of job categories - use only on full-width page', 'workscout' ),
    "category" => esc_html__('WorkScout',"workscout"),
    "params" => array(
      /*    
    
        'type' => 'parent',  
       */
      array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Title', 'workscout' ),
        'param_name' => 'title',
        'description' => esc_html__( 'Enter text which will be used as title', 'workscout' )
      ),
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Wide version (use only on full-width page in full row', 'workscout' ),
        'param_name' => 'full_width',
        'description' => esc_html__( 'Setting this to wide on page with sidebar or not in the maximum wide container will cause layout break.', 'workscout' ),
        'value' => array(
          esc_html__( 'Standard', 'workscout' ) => 'false',
          esc_html__( 'Wide', 'workscout' ) => 'yes',
          ),
      ),
      array(
        "type" => "dropdown",
        "class" => "",
        "heading" => esc_html__("Hide empty", 'workscout'),
        "param_name" => "hide_empty",
        "value" => array(
         'Hide' => '1',
         'Show' => '0',
          ),
        'save_always' => true,
        "description" => "Hides categories that doesn't have any jobs"
      ),      
      array(
        "type" => "dropdown",
        "class" => "",
        "heading" => esc_html__("Type ", 'workscout'),
        "param_name" => "type",
        "value" => array(
         'none' => '',
            'Group by parent' => 'group_by_parents' ,
            'Show all categories' => 'all',
            'Show only parent categories' => 'only_parents',
            'Show just child categories from selectd parent' => 'parent' ,
          ),
        "description" => ""
      ),
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Parent id', 'workscout' ),
        'param_name' => 'parent_id',
        'value' => $box_jobs_categories,
        'dependency' => array(
          'element' => 'type',
          'value' => array( 'parent' ),
        ),
      ),
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Order by', 'workscout' ),
        'param_name' => 'orderby',
        'value' => array(
          esc_html__( 'Name', 'workscout' ) => 'naem',
          esc_html__( 'ID', 'workscout' ) => 'ID',
          esc_html__( 'Count', 'workscout' ) => 'count',
          esc_html__( 'Slug', 'workscout' ) => 'slug',
          esc_html__( 'None', 'workscout' ) => 'none',
          ),
        ),

      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Order', 'workscout' ),
        'param_name' => 'order',
        'value' => array(
          esc_html__( 'Descending', 'workscout' ) => 'DESC',
          esc_html__( 'Ascending', 'workscout' ) => 'ASC'
          ),
      ),
       array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Total items', 'workscout' ),
        'param_name' => 'number',
        'value' => 10, // default value
        'description' => esc_html__( 'Set max limit for items  (limited to 1000).', 'workscout' ),
      ),
      array(
        'type' => 'from_vs_indicatior',
        'heading' => esc_html__( 'From Visual Composer', 'workscout' ),
        'param_name' => 'from_vs',
        'value' => 'yes',
        'save_always' => true,
        )
    )
  ));
}


add_action( 'init', 'ws_box_resume_categories_full_integrateWithVC' );
function ws_box_resume_categories_full_integrateWithVC() {
  $box_resumes_categories = array('None' => ' ');

  $resume_categories = get_terms( 'resume_category', 'orderby=count&hide_empty=0' );
  if ( is_array( $resume_categories ) && ! empty( $resume_categories ) ) {
    foreach ( $resume_categories as $resume_category ) {
        $box_resumes_categories[ $resume_category->name ] =  esc_attr($resume_category ->term_id) ;
    }
  }
  vc_map( array(
    "name" => esc_html__("Resumes categories list","workscout"),
    "base" => "resume_categories",
    'icon' => 'workscout_icon',
    'description' => esc_html__( 'Dispays list of resume categories - use only on full-width page', 'workscout' ),
    "category" => esc_html__('WorkScout',"workscout"),
    "params" => array(
      /*    
    
        'type' => 'parent',  
       */
      array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Title', 'workscout' ),
        'param_name' => 'title',
        'description' => esc_html__( 'Enter text which will be used as title', 'workscout' )
      ),
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Wide version (use only on full-width page in full row', 'workscout' ),
        'param_name' => 'full_width',
        'description' => esc_html__( 'Setting this to wide on page with sidebar or not in the maximum wide container will cause layout break.', 'workscout' ),
        'value' => array(
          esc_html__( 'Standard', 'workscout' ) => 'false',
          esc_html__( 'Wide', 'workscout' ) => 'yes',
          ),
      ),
      array(
        "type" => "dropdown",
        "class" => "",
        "heading" => esc_html__("Hide empty", 'workscout'),
        "param_name" => "hide_empty",
        "value" => array(
         'Hide' => '1',
         'Show' => '0',
          ),
        'save_always' => true,
        "description" => "Hides categories that doesn't have any resumes"
      ),      
      array(
        "type" => "dropdown",
        "class" => "",
        "heading" => esc_html__("Type ", 'workscout'),
        "param_name" => "type",
        "value" => array(
         'none' => '',
         'Group by parent' => 'group_by_parents' ,
         'Show all categories' => 'all',
          'Show just child categories from selected parent' => 'parent' ,
          ),
        "description" => ""
      ),
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Parent id', 'workscout' ),
        'param_name' => 'parent_id',
        'value' => $box_resumes_categories,
        'dependency' => array(
          'element' => 'type',
          'value' => array( 'parent' ),
        ),
      ),
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Order by', 'workscout' ),
        'param_name' => 'orderby',
        'value' => array(
          esc_html__( 'Name', 'workscout' ) => 'naem',
          esc_html__( 'ID', 'workscout' ) => 'ID',
          esc_html__( 'Count', 'workscout' ) => 'count',
          esc_html__( 'Slug', 'workscout' ) => 'slug',
          esc_html__( 'None', 'workscout' ) => 'none',
          ),
        ),

      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Order', 'workscout' ),
        'param_name' => 'order',
        'value' => array(
          esc_html__( 'Descending', 'workscout' ) => 'DESC',
          esc_html__( 'Ascending', 'workscout' ) => 'ASC'
          ),
      ),
       array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Total items', 'workscout' ),
        'param_name' => 'number',
        'value' => 10, // default value
        'description' => esc_html__( 'Set max limit for items  (limited to 1000).', 'workscout' ),
      ),
      array(
        'type' => 'from_vs_indicatior',
        'heading' => esc_html__( 'From Visual Composer', 'workscout' ),
        'param_name' => 'from_vs',
        'value' => 'yes',
        'save_always' => true,
        )
    )
  ));
}



/*
 * Notification Box Visual Composer
 *
 */

add_action( 'init', 'workscout_box_integrateWithVC' );
function workscout_box_integrateWithVC() {

 vc_map( array(
  "name" => esc_html__("Notification box", 'workscout'),
  "base" => "box",
  'icon' => 'workscout_icon',
  "category" => esc_html__('WorkScout', 'workscout'),
  "params" => array(
    array(
      'type' => 'textarea_html',
      'heading' => esc_html__( 'Content', 'workscout' ),
      'param_name' => 'content',
      'description' => esc_html__( 'Enter message content.', 'workscout' )
      ),
    array(
      "type" => "dropdown",
      "class" => "",
      "heading" => esc_html__("Box type", 'workscout'),
      "param_name" => "type",
      'save_always' => true,
      "value" => array(
        'Error' => 'error',
        'Success' => 'success',
        'Warning' => 'warning',
        'Notice' => 'notice',
        ),
      "description" => ""
    )

    ),
/*    'custom_markup' => 'Type: %content% co to kurwa jest',
    'js_view' => 'VcWorkScoutMessageView'*/
));
}


/*
 * [actionbox] 
 *
 */
add_action( 'init', 'ws_workscout_info_banner_integrateWithVC' );
function ws_workscout_info_banner_integrateWithVC() {
  $target_arr = array(
    esc_html__( 'Same window', 'workscout' ) => '_self',
    esc_html__( 'New window', 'workscout' ) => '_blank'
  );
  vc_map( array(
    "name" => esc_html__("Info Banner","workscout"),
    "base" => "infobanner",
    'icon' => 'workscout_icon',
    'description' => esc_html__( 'Shows call-to-action box', 'workscout' ),
    "category" => esc_html__('WorkScout',"workscout"),
    "params" => array(

      array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Title', 'workscout' ),
        'param_name' => 'title',
        'value' => 'Start Building Your Own Job Board Now ', // default value
        'description' => '',
      ),     
      array(
      'type' => 'textarea_html',
      'heading' => esc_html__( 'Content', 'workscout' ),
      'param_name' => 'content',
      'description' => esc_html__( 'Put here simple UL list', 'workscout' )
      ), 
      array(
        'type' => 'textfield',
        'heading' => esc_html__( 'URL', 'workscout' ),
        'param_name' => 'url',
        'description' => esc_html__( 'Where button will link.', 'workscout' )
      ),
      array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Button text', 'workscout' ),
        'param_name' => 'buttontext',
        'description' => esc_html__( 'Button text - leave empty to hide button.', 'workscout' )
      ),
      array(
        "type" => "dropdown",
        "class" => "",
        "heading" => esc_html__("Link target", 'workscout'),
        "param_name" => "type",
        "value" => $target_arr,
        "description" => ""
      ),
      array(
        'type' => 'from_vs_indicatior',
        'heading' => esc_html__( 'From Visual Composer', 'workscout' ),
        'param_name' => 'from_vs',
        'value' => 'yes',
        'save_always' => true,
      )

    ),
  ));
}

/*
 * [actionbox] 
 *
 */

add_action( 'init', 'ws_workscout_search_jobs_integrateWithVC' );
function ws_workscout_search_jobs_integrateWithVC() {

  vc_map( array(
    "name" => esc_html__("Search Jobs Banner","workscout"),
    "base" => "jobs_searchbox",
    'icon' => 'workscout_icon',
    'description' => esc_html__( 'Shows search box like on template-home.php', 'workscout' ),
    "category" => esc_html__('WorkScout',"workscout"),
    "params" => array(

    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Wide version (use only on full-width page in full row', 'workscout' ),
        'param_name' => 'full_width',
        'description' => esc_html__( 'Setting this to wide on page with sidebar or not in the maximum wide container will cause layout break.', 'workscout' ),
        'value' => array(
          esc_html__( 'Standard', 'workscout' ) => 'false',
          esc_html__( 'Wide', 'workscout' ) => 'yes',
          ),
      ),
     array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Show jobs counter', 'workscout' ),
        'param_name' => 'show_jobs',
        'description' => esc_html__( 'Show or hide jobs counter', 'workscout' ),
        'value' => array(
          esc_html__( 'Hide', 'workscout' ) => 'no',
          esc_html__( 'Show', 'workscout' ) => 'yes',
          ),
      ),
 
      array(
        'type' => 'from_vs_indicatior',
        'heading' => esc_html__( 'From Visual Composer', 'workscout' ),
        'param_name' => 'from_vs',
        'value' => 'yes',
        'save_always' => true,
      )

    ),
  ));
}


add_action( 'init', 'ws_workscout_map_integrateWithVC' );
function ws_workscout_map_integrateWithVC() {

  vc_map( array(
    "name" => esc_html__("Jobs/Resumes Map","workscout"),
    "base" => "workscout-map",
    'icon' => 'workscout_icon',
    'description' => esc_html__( 'Shows map will all jobs or resumes', 'workscout' ),
    "category" => esc_html__('WorkScout',"workscout"),
    "params" => array(

    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Content source', 'workscout' ),
        'param_name' => 'type',
        'description' => esc_html__( 'Choose maps or resumes (if applicable)', 'workscout' ),
        'value' => array(
          esc_html__( 'Job listings', 'workscout' ) => 'job_listing',
          esc_html__( 'Resumes', 'workscout' ) => 'resume',
          ),
      ),

      array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Map height (in px) ', 'workscout' ),
        'value' => '450',
        'param_name' => 'buttontext',
        'description' => esc_html__( 'Put just a number.', 'workscout' )
      ),
 
      array(
        'type' => 'from_vs_indicatior',
        'heading' => esc_html__( 'From Visual Composer', 'workscout' ),
        'param_name' => 'from_vs',
        'value' => 'yes',
        'save_always' => true,
      )

    ),
  ));
}


/*
 * Counter for Visual Composer
 *
 */

add_action( 'init', 'workscout_counterbox_integrateWithVC' );
function workscout_counterbox_integrateWithVC() {
  vc_map( array(
    "name" => esc_html__("Counters wraper", "workscout"),
    "base" => "counters",
    "as_parent" => array('only' => 'counter'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "category" => esc_html__('WorkScout', 'workscout'),
    'icon' => 'workscout_icon',
    "show_settings_on_create" => false,
    "params" => array(
        // add params same as with any other content element
      array(
        "type" => "textfield",
        "heading" => esc_html__("Extra class name", "workscout"),
        "param_name" => "el_class",
        "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "workscout")
        ),
      array(
        'type' => 'from_vs_indicatior',
        'heading' => esc_html__( 'From Visual Composer', 'workscout' ),
        'param_name' => 'from_vs',
        'value' => 'yes',
        'save_always' => true,
        )
      ),
    "js_view" => 'VcColumnView'
    ));
  vc_map( array(
    "name" => esc_html__("Count up box", 'workscout'),
    "base" => "counter",
    'icon' => 'workscout_icon',
    'description' => esc_html__( 'Box with animated number\'s counting', 'workscout' ),
    "category" => esc_html__('WorkScout', 'workscout'),
    "params" => array(
      array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Title', 'workscout' ),
        'param_name' => 'title',
        'description' => esc_html__( 'Enter text which will be used as title.', 'workscout' )
        ),
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Get automatic value of', 'workscout' ),
        'param_name' => 'type',
        'description' => esc_html__( 'Ignore the next "number" attribute if this is set to something else then "custom"', 'workscout' ),
        'value' => array(
           '' => 'custom',
          esc_html__('Jobs','workscout') => 'jobs',
          esc_html__('Resumes','workscout') => 'resumes',
          esc_html__('Posts','workscout') => 'posts',
          esc_html__('Members','workscout') => 'members',
          esc_html__('Candidates','workscout') => 'candidates',
          esc_html__('Employers','workscout') => 'employers',
          ),
        'save_always' => false,
      ),
      array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Value', 'workscout' ),
        'param_name' => 'number',
        'description' => esc_html__( 'Only number (for example 2,147).', 'workscout' )
        ),      

      array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Scale', 'workscout' ),
        'param_name' => 'scale',
        'description' => esc_html__( 'Optional. For example %, degrees, k, etc.', 'workscout' )
        ),
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Width of the box', 'workscout' ),
        'param_name' => 'width',
        'description' => esc_html__( 'Applicable if the element is a child of "counters" element', 'workscout' ),
        'value' => array(
          esc_html__('One-third','workscout') => 'one-third',
          esc_html__('Two','workscout') => 'two',
          esc_html__('Three','workscout') => 'three',
          esc_html__('Four','workscout') => 'four',
          ),
        'save_always' => true,
      ),
      array(
        'type' => 'from_vs_indicatior',
        'heading' => esc_html__( 'From Visual Composer', 'workscout' ),
        'param_name' => 'from_vs',
        'value' => 'yes',
        'save_always' => true,
        )
      ),
));
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_Counters extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Counter extends WPBakeryShortCode {
    }
}


/*
 * WooCommerce Products list for Visual Composer
 *
 */

add_action( 'init', 'workscout_pricing_table_integrateWithVC' );
function workscout_pricing_table_integrateWithVC() {
  vc_map( array(
    "name" => esc_html__("Pricing table", 'workscout'),
    "base" => "pricing_table",
    'icon' => 'workscout_icon',
    'description' => esc_html__( 'Pricing table', 'workscout' ),
    "category" => esc_html__('WorkScout', 'workscout'),
    "params" => array(
    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Type of table', 'workscout' ),
        'param_name' => 'type',
        'value' => array(
          esc_html__('Standard','workscout') => 'color-1',
          esc_html__('Featured','workscout') => 'color-2',
          ),
        ),
    array(
      'type' => 'colorpicker',
      'heading' => esc_html__( 'Custom color', 'workscout' ),
      'param_name' => 'color',
      'description' => esc_html__( 'Select custom background color for table.', 'workscout' ),
      //'dependency' => array( 'element' => 'bgcolor', 'value' => array( 'custom' ) )
    ),
    array(
      'type' => 'textfield',
      'heading' => esc_html__( 'Title', 'workscout' ),
      'param_name' => 'title',
      'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'workscout' ),
      'save_always' => true,
      ),
    array(
      'type' => 'textfield',
      'heading' => esc_html__( 'Currency', 'workscout' ),
      'param_name' => 'currency',
      'value' => '$',
      'save_always' => true,
      'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'workscout' )
      ),
    array(
      'type' => 'textfield',
      'heading' => esc_html__( 'Price', 'workscout' ),
      'param_name' => 'price',
      'value' => '30',
      'save_always' => true,
      ),
    array(
      'type' => 'textfield',
      'heading' => esc_html__( 'Per', 'workscout' ),
      'param_name' => 'per',
      'value' => 'per month',
      'save_always' => true,
      ),
      array(
      'type' => 'textarea_html',
      'heading' => esc_html__( 'Content', 'workscout' ),
      'param_name' => 'content',
      'description' => esc_html__( 'Put here simple UL list', 'workscout' )
      ),
    array(
      'type' => 'textfield',
      'heading' => esc_html__( 'Button URL', 'workscout' ),
      'param_name' => 'buttonlink',
      'value' => ''
      ),
    array(
      'type' => 'textfield',
      'heading' => esc_html__( 'Button text', 'workscout' ),
      'param_name' => 'buttontext',
      'value' => ''
      ),
      array(
        'type' => 'from_vs_indicatior',
        'heading' => esc_html__( 'From Visual Composer', 'workscout' ),
        'param_name' => 'from_vs',
        'value' => 'yes',
        'save_always' => true,
        )
      ),
));
}


/*helpers*/

 $job_listing_categories = get_terms( 'job_listing_category', 'orderby=count&hide_empty=0' );
  if ( is_array( $job_listing_categories ) && ! empty( $job_listing_categories ) ) {
    foreach ( $job_listing_categories as $job_listing_category ) {
        $box_jobs_categories[ $job_listing_category->name ] =  esc_attr($job_listing_category->term_id) ;
    }
  }


/**
 * @param $search_string
 *
 * @return array
 */
function vc_include_job_categories_search( $search_string ) {

  $data = array();

  $terms = get_terms( 'job_listing_category',  array(
    'hide_empty' => false,
    'search' => $search_string
  ) );
  if ( is_array( $terms ) && ! empty( $terms ) ) {
    foreach ( $terms as $term ) {
      $data[] = array(
        'value' => $term->term_id,
        'label' => $term->name,
      );
    }
  }

  return $data;
}

/**
 * @param $value
 *
 * @return array|bool
 */
function vc_include_job_categories_render( $value ) {
  $term = get_term( $value['value'],'job_listing_category' );

  return is_null( $term ) ? false : array(
    'label' => $term->name,
    'value' => $term->term_id,
  );
}




/**
 * @param $search_string
 *
 * @return array
 */
function vc_include_resume_categories_search( $search_string ) {

  $data = array();

  $terms = get_terms( 'resume_category',  array(
    'hide_empty' => false,
    'search' => $search_string
  ) );
  if ( is_array( $terms ) && ! empty( $terms ) ) {
    foreach ( $terms as $term ) {
      $data[] = array(
        'value' => $term->term_id,
        'label' => $term->name,
      );
    }
  }

  return $data;
}

/**
 * @param $value
 *
 * @return array|bool
 */
function vc_include_resume_categories_render( $value ) {
  $term = get_term( $value['value'],'resume_category' );

  return is_null( $term ) ? false : array(
    'label' => $term->name,
    'value' => $term->term_id,
  );
}




/**
 * @param $search_string
 *
 * @return array
 */
function ws_categories_search( $search_string ) {

  $data = array();

  $terms = get_terms( 'category',  array(
    'hide_empty' => false,
    'search' => $search_string
  ) );
  if ( is_array( $terms ) && ! empty( $terms ) ) {
    foreach ( $terms as $term ) {
      $data[] = array(
        'value' => $term->term_id,
        'label' => $term->name,
      );
    }
  }

  return $data;
}

/**
 * @param $value
 *
 * @return array|bool
 */
function ws_categories_render( $value ) {
  $term = get_term( $value['value'],'category' );

  return is_null( $term ) ? false : array(
    'label' => $term->name,
    'value' => $term->term_id,
  );
}

/**
 * @param $search_string
 *
 * @return array
 */
function ws_tags_search( $search_string ) {

  $data = array();

  $terms = get_terms( 'post_tag',  array(
    'hide_empty' => false,
    'search' => $search_string
  ) );
  if ( is_array( $terms ) && ! empty( $terms ) ) {
    foreach ( $terms as $term ) {
      $data[] = array(
        'value' => $term->term_id,
        'label' => $term->name,
      );
    }
  }

  return $data;
}

/**
 * @param $value
 *
 * @return array|bool
 */
function ws_tags_render( $value ) {
  $term = get_term( $value['value'],'post_tag' );

  return is_null( $term ) ? false : array(
    'label' => $term->name,
    'value' => $term->term_id,
  );
}





/**
 * @param $search_string
 *
 * @return array
 */
function vc_include_job_types_search( $search_string ) {

  $data = array();

  $terms = get_terms( 'job_listing_type',  array(
    'hide_empty' => false,
    'search' => $search_string
  ) );
  if ( is_array( $terms ) && ! empty( $terms ) ) {
    foreach ( $terms as $term ) {
      $data[] = array(
        'value' => $term->slug,
        'label' => $term->name,
      );
    }
  }

  return $data;
}

/**
 * @param $value
 *
 * @return array|bool
 */
function vc_include_job_types_render( $value ) {
  $term = get_term( $value['value'],'job_listing_type' );

  return is_null( $term ) ? false : array(
    'label' => $term->name,
    'value' => $term->slug,
  );
}





/**
 * @param $search_string
 *
 * @return array
 */
function vc_include_testimonials_search( $search_string ) {
  $query = $search_string;
  $data = array();
  $args = array( 's' => $query, 'post_type' => 'testimonial' );
  $args['vc_search_by_title_only'] = true;
  $args['numberposts'] = - 1;
  if ( strlen( $args['s'] ) === 0 ) {
    unset( $args['s'] );
  }
  add_filter( 'posts_search', 'vc_search_by_title_only', 500, 2 );
  $posts = get_posts( $args );
  if ( is_array( $posts ) && ! empty( $posts ) ) {
    foreach ( $posts as $post ) {
      $data[] = array(
        'value' => $post->ID,
        'label' => $post->post_title,
        'group' => $post->post_type,
      );
    }
  }

  return $data;
}

/**
 * @param $value
 *
 * @return array|bool
 */
function vc_include_testimonials_render( $value ) {
  $post = get_post( $value['value'] );

  return is_null( $post ) ? false : array(
    'label' => $post->post_title,
    'value' => $post->ID,
    'group' => $post->post_type
  );
}


/**
 * @param $search_string
 *
 * @return array
 */
function vc_include_job_job_ids_search( $search_string ) {
  $query = $search_string;
  $data = array();
  $args = array( 's' => $query, 'post_type' => 'job_listing' );
  $args['vc_search_by_title_only'] = true;
  $args['numberposts'] = - 1;
  if ( strlen( $args['s'] ) === 0 ) {
    unset( $args['s'] );
  }
  add_filter( 'posts_search', 'vc_search_by_title_only', 500, 2 );
  $posts = get_posts( $args );
  if ( is_array( $posts ) && ! empty( $posts ) ) {
    foreach ( $posts as $post ) {
      $data[] = array(
        'value' => $post->ID,
        'label' => $post->post_title,
        'group' => $post->post_type,
      );
    }
  }

  return $data;
}


/**
 * @param $search_string
 *
 * @return array
 */
function vc_include_resume_resume_ids_search( $search_string ) {
  $query = $search_string;
  $data = array();
  $args = array( 's' => $query, 'post_type' => 'resume' );
  $args['vc_search_by_title_only'] = true;
  $args['numberposts'] = - 1;
  if ( strlen( $args['s'] ) === 0 ) {
    unset( $args['s'] );
  }
  add_filter( 'posts_search', 'vc_search_by_title_only', 500, 2 );
  $posts = get_posts( $args );
  if ( is_array( $posts ) && ! empty( $posts ) ) {
    foreach ( $posts as $post ) {
      $data[] = array(
        'value' => $post->ID,
        'label' => $post->post_title,
        'group' => $post->post_type,
      );
    }
  }

  return $data;
}

/**
 * @param $value
 *
 * @return array|bool
 */
function vc_include_job_job_ids_render( $value ) {
  $post = get_post( $value['value'] );

  return is_null( $post ) ? false : array(
    'label' => $post->post_title,
    'value' => $post->ID,
    'group' => $post->post_type
  );
}

/**
 * @param $value
 *
 * @return array|bool
 */
function vc_include_resume_resume_ids_render( $value ) {
  $post = get_post( $value['value'] );

  return is_null( $post ) ? false : array(
    'label' => $post->post_title,
    'value' => $post->ID,
    'group' => $post->post_type
  );
}




function from_vs_indicatior_settings_field($settings, $value) {
  //$dependency = vc_generate_dependencies_attributes($settings);
  return '<div class="from_vs_indicatior_block" >'
  .'<input type="hidden" name="from_vs" class="wpb_vc_param_value wpb-checkboxes '.$settings['param_name'].' '.$settings['type'].'_field" value="yes"  /></div>';
}

vc_add_shortcode_param('from_vs_indicatior', 'from_vs_indicatior_settings_field');




function vc_iconpicker_type_iconsmind( $icons ){

  $iconsmind_icons = array(
array( 'ln ln-icon-A-Z' => 'A-Z' ),array( 'ln ln-icon-Aa' => 'Aa' ),array( 'ln ln-icon-Add-Bag' => 'Add-Bag' ),array( 'ln ln-icon-Add-Basket' => 'Add-Basket' ),array( 'ln ln-icon-Add-Cart' => 'Add-Cart' ),array( 'ln ln-icon-Add-File' => 'Add-File' ),array( 'ln ln-icon-Add-SpaceAfterParagraph' => 'Add-SpaceAfterParagraph' ),array( 'ln ln-icon-Add-SpaceBeforeParagraph' => 'Add-SpaceBeforeParagraph' ),array( 'ln ln-icon-Add-User' => 'Add-User' ),array( 'ln ln-icon-Add-UserStar' => 'Add-UserStar' ),array( 'ln ln-icon-Add-Window' => 'Add-Window' ),array( 'ln ln-icon-Add' => 'Add' ),array( 'ln ln-icon-Address-Book' => 'Address-Book' ),array( 'ln ln-icon-Address-Book2' => 'Address-Book2' ),array( 'ln ln-icon-Administrator' => 'Administrator' ),array( 'ln ln-icon-Aerobics-2' => 'Aerobics-2' ),array( 'ln ln-icon-Aerobics-3' => 'Aerobics-3' ),array( 'ln ln-icon-Aerobics' => 'Aerobics' ),array( 'ln ln-icon-Affiliate' => 'Affiliate' ),array( 'ln ln-icon-Aim' => 'Aim' ),array( 'ln ln-icon-Air-Balloon' => 'Air-Balloon' ),array( 'ln ln-icon-Airbrush' => 'Airbrush' ),array( 'ln ln-icon-Airship' => 'Airship' ),array( 'ln ln-icon-Alarm-Clock' => 'Alarm-Clock' ),array( 'ln ln-icon-Alarm-Clock2' => 'Alarm-Clock2' ),array( 'ln ln-icon-Alarm' => 'Alarm' ),array( 'ln ln-icon-Alien-2' => 'Alien-2' ),array( 'ln ln-icon-Alien' => 'Alien' ),array( 'ln ln-icon-Aligator' => 'Aligator' ),array( 'ln ln-icon-Align-Center' => 'Align-Center' ),array( 'ln ln-icon-Align-JustifyAll' => 'Align-JustifyAll' ),array( 'ln ln-icon-Align-JustifyCenter' => 'Align-JustifyCenter' ),array( 'ln ln-icon-Align-JustifyLeft' => 'Align-JustifyLeft' ),array( 'ln ln-icon-Align-JustifyRight' => 'Align-JustifyRight' ),array( 'ln ln-icon-Align-Left' => 'Align-Left' ),array( 'ln ln-icon-Align-Right' => 'Align-Right' ),array( 'ln ln-icon-Alpha' => 'Alpha' ),array( 'ln ln-icon-Ambulance' => 'Ambulance' ),array( 'ln ln-icon-AMX' => 'AMX' ),array( 'ln ln-icon-Anchor-2' => 'Anchor-2' ),array( 'ln ln-icon-Anchor' => 'Anchor' ),array( 'ln ln-icon-Android-Store' => 'Android-Store' ),array( 'ln ln-icon-Android' => 'Android' ),array( 'ln ln-icon-Angel-Smiley' => 'Angel-Smiley' ),array( 'ln ln-icon-Angel' => 'Angel' ),array( 'ln ln-icon-Angry' => 'Angry' ),array( 'ln ln-icon-Apple-Bite' => 'Apple-Bite' ),array( 'ln ln-icon-Apple-Store' => 'Apple-Store' ),array( 'ln ln-icon-Apple' => 'Apple' ),array( 'ln ln-icon-Approved-Window' => 'Approved-Window' ),array( 'ln ln-icon-Aquarius-2' => 'Aquarius-2' ),array( 'ln ln-icon-Aquarius' => 'Aquarius' ),array( 'ln ln-icon-Archery-2' => 'Archery-2' ),array( 'ln ln-icon-Archery' => 'Archery' ),array( 'ln ln-icon-Argentina' => 'Argentina' ),array( 'ln ln-icon-Aries-2' => 'Aries-2' ),array( 'ln ln-icon-Aries' => 'Aries' ),array( 'ln ln-icon-Army-Key' => 'Army-Key' ),array( 'ln ln-icon-Arrow-Around' => 'Arrow-Around' ),array( 'ln ln-icon-Arrow-Back3' => 'Arrow-Back3' ),array( 'ln ln-icon-Arrow-Back' => 'Arrow-Back' ),array( 'ln ln-icon-Arrow-Back2' => 'Arrow-Back2' ),array( 'ln ln-icon-Arrow-Barrier' => 'Arrow-Barrier' ),array( 'ln ln-icon-Arrow-Circle' => 'Arrow-Circle' ),array( 'ln ln-icon-Arrow-Cross' => 'Arrow-Cross' ),array( 'ln ln-icon-Arrow-Down' => 'Arrow-Down' ),array( 'ln ln-icon-Arrow-Down2' => 'Arrow-Down2' ),array( 'ln ln-icon-Arrow-Down3' => 'Arrow-Down3' ),array( 'ln ln-icon-Arrow-DowninCircle' => 'Arrow-DowninCircle' ),array( 'ln ln-icon-Arrow-Fork' => 'Arrow-Fork' ),array( 'ln ln-icon-Arrow-Forward' => 'Arrow-Forward' ),array( 'ln ln-icon-Arrow-Forward2' => 'Arrow-Forward2' ),array( 'ln ln-icon-Arrow-From' => 'Arrow-From' ),array( 'ln ln-icon-Arrow-Inside' => 'Arrow-Inside' ),array( 'ln ln-icon-Arrow-Inside45' => 'Arrow-Inside45' ),array( 'ln ln-icon-Arrow-InsideGap' => 'Arrow-InsideGap' ),array( 'ln ln-icon-Arrow-InsideGap45' => 'Arrow-InsideGap45' ),array( 'ln ln-icon-Arrow-Into' => 'Arrow-Into' ),array( 'ln ln-icon-Arrow-Join' => 'Arrow-Join' ),array( 'ln ln-icon-Arrow-Junction' => 'Arrow-Junction' ),array( 'ln ln-icon-Arrow-Left' => 'Arrow-Left' ),array( 'ln ln-icon-Arrow-Left2' => 'Arrow-Left2' ),array( 'ln ln-icon-Arrow-LeftinCircle' => 'Arrow-LeftinCircle' ),array( 'ln ln-icon-Arrow-Loop' => 'Arrow-Loop' ),array( 'ln ln-icon-Arrow-Merge' => 'Arrow-Merge' ),array( 'ln ln-icon-Arrow-Mix' => 'Arrow-Mix' ),array( 'ln ln-icon-Arrow-Next' => 'Arrow-Next' ),array( 'ln ln-icon-Arrow-OutLeft' => 'Arrow-OutLeft' ),array( 'ln ln-icon-Arrow-OutRight' => 'Arrow-OutRight' ),array( 'ln ln-icon-Arrow-Outside' => 'Arrow-Outside' ),array( 'ln ln-icon-Arrow-Outside45' => 'Arrow-Outside45' ),array( 'ln ln-icon-Arrow-OutsideGap' => 'Arrow-OutsideGap' ),array( 'ln ln-icon-Arrow-OutsideGap45' => 'Arrow-OutsideGap45' ),array( 'ln ln-icon-Arrow-Over' => 'Arrow-Over' ),array( 'ln ln-icon-Arrow-Refresh' => 'Arrow-Refresh' ),array( 'ln ln-icon-Arrow-Refresh2' => 'Arrow-Refresh2' ),array( 'ln ln-icon-Arrow-Right' => 'Arrow-Right' ),array( 'ln ln-icon-Arrow-Right2' => 'Arrow-Right2' ),array( 'ln ln-icon-Arrow-RightinCircle' => 'Arrow-RightinCircle' ),array( 'ln ln-icon-Arrow-Shuffle' => 'Arrow-Shuffle' ),array( 'ln ln-icon-Arrow-Squiggly' => 'Arrow-Squiggly' ),array( 'ln ln-icon-Arrow-Through' => 'Arrow-Through' ),array( 'ln ln-icon-Arrow-To' => 'Arrow-To' ),array( 'ln ln-icon-Arrow-TurnLeft' => 'Arrow-TurnLeft' ),array( 'ln ln-icon-Arrow-TurnRight' => 'Arrow-TurnRight' ),array( 'ln ln-icon-Arrow-Up' => 'Arrow-Up' ),array( 'ln ln-icon-Arrow-Up2' => 'Arrow-Up2' ),array( 'ln ln-icon-Arrow-Up3' => 'Arrow-Up3' ),array( 'ln ln-icon-Arrow-UpinCircle' => 'Arrow-UpinCircle' ),array( 'ln ln-icon-Arrow-XLeft' => 'Arrow-XLeft' ),array( 'ln ln-icon-Arrow-XRight' => 'Arrow-XRight' ),array( 'ln ln-icon-Ask' => 'Ask' ),array( 'ln ln-icon-Assistant' => 'Assistant' ),array( 'ln ln-icon-Astronaut' => 'Astronaut' ),array( 'ln ln-icon-At-Sign' => 'At-Sign' ),array( 'ln ln-icon-ATM' => 'ATM' ),array( 'ln ln-icon-Atom' => 'Atom' ),array( 'ln ln-icon-Audio' => 'Audio' ),array( 'ln ln-icon-Auto-Flash' => 'Auto-Flash' ),array( 'ln ln-icon-Autumn' => 'Autumn' ),array( 'ln ln-icon-Baby-Clothes' => 'Baby-Clothes' ),array( 'ln ln-icon-Baby-Clothes2' => 'Baby-Clothes2' ),array( 'ln ln-icon-Baby-Cry' => 'Baby-Cry' ),array( 'ln ln-icon-Baby' => 'Baby' ),array( 'ln ln-icon-Back2' => 'Back2' ),array( 'ln ln-icon-Back-Media' => 'Back-Media' ),array( 'ln ln-icon-Back-Music' => 'Back-Music' ),array( 'ln ln-icon-Back' => 'Back' ),array( 'ln ln-icon-Background' => 'Background' ),array( 'ln ln-icon-Bacteria' => 'Bacteria' ),array( 'ln ln-icon-Bag-Coins' => 'Bag-Coins' ),array( 'ln ln-icon-Bag-Items' => 'Bag-Items' ),array( 'ln ln-icon-Bag-Quantity' => 'Bag-Quantity' ),array( 'ln ln-icon-Bag' => 'Bag' ),array( 'ln ln-icon-Bakelite' => 'Bakelite' ),array( 'ln ln-icon-Ballet-Shoes' => 'Ballet-Shoes' ),array( 'ln ln-icon-Balloon' => 'Balloon' ),array( 'ln ln-icon-Banana' => 'Banana' ),array( 'ln ln-icon-Band-Aid' => 'Band-Aid' ),array( 'ln ln-icon-Bank' => 'Bank' ),array( 'ln ln-icon-Bar-Chart' => 'Bar-Chart' ),array( 'ln ln-icon-Bar-Chart2' => 'Bar-Chart2' ),array( 'ln ln-icon-Bar-Chart3' => 'Bar-Chart3' ),array( 'ln ln-icon-Bar-Chart4' => 'Bar-Chart4' ),array( 'ln ln-icon-Bar-Chart5' => 'Bar-Chart5' ),array( 'ln ln-icon-Bar-Code' => 'Bar-Code' ),array( 'ln ln-icon-Barricade-2' => 'Barricade-2' ),array( 'ln ln-icon-Barricade' => 'Barricade' ),array( 'ln ln-icon-Baseball' => 'Baseball' ),array( 'ln ln-icon-Basket-Ball' => 'Basket-Ball' ),array( 'ln ln-icon-Basket-Coins' => 'Basket-Coins' ),array( 'ln ln-icon-Basket-Items' => 'Basket-Items' ),array( 'ln ln-icon-Basket-Quantity' => 'Basket-Quantity' ),array( 'ln ln-icon-Bat-2' => 'Bat-2' ),array( 'ln ln-icon-Bat' => 'Bat' ),array( 'ln ln-icon-Bathrobe' => 'Bathrobe' ),array( 'ln ln-icon-Batman-Mask' => 'Batman-Mask' ),array( 'ln ln-icon-Battery-0' => 'Battery-0' ),array( 'ln ln-icon-Battery-25' => 'Battery-25' ),array( 'ln ln-icon-Battery-50' => 'Battery-50' ),array( 'ln ln-icon-Battery-75' => 'Battery-75' ),array( 'ln ln-icon-Battery-100' => 'Battery-100' ),array( 'ln ln-icon-Battery-Charge' => 'Battery-Charge' ),array( 'ln ln-icon-Bear' => 'Bear' ),array( 'ln ln-icon-Beard-2' => 'Beard-2' ),array( 'ln ln-icon-Beard-3' => 'Beard-3' ),array( 'ln ln-icon-Beard' => 'Beard' ),array( 'ln ln-icon-Bebo' => 'Bebo' ),array( 'ln ln-icon-Bee' => 'Bee' ),array( 'ln ln-icon-Beer-Glass' => 'Beer-Glass' ),array( 'ln ln-icon-Beer' => 'Beer' ),array( 'ln ln-icon-Bell-2' => 'Bell-2' ),array( 'ln ln-icon-Bell' => 'Bell' ),array( 'ln ln-icon-Belt-2' => 'Belt-2' ),array( 'ln ln-icon-Belt-3' => 'Belt-3' ),array( 'ln ln-icon-Belt' => 'Belt' ),array( 'ln ln-icon-Berlin-Tower' => 'Berlin-Tower' ),array( 'ln ln-icon-Beta' => 'Beta' ),array( 'ln ln-icon-Betvibes' => 'Betvibes' ),array( 'ln ln-icon-Bicycle-2' => 'Bicycle-2' ),array( 'ln ln-icon-Bicycle-3' => 'Bicycle-3' ),array( 'ln ln-icon-Bicycle' => 'Bicycle' ),array( 'ln ln-icon-Big-Bang' => 'Big-Bang' ),array( 'ln ln-icon-Big-Data' => 'Big-Data' ),array( 'ln ln-icon-Bike-Helmet' => 'Bike-Helmet' ),array( 'ln ln-icon-Bikini' => 'Bikini' ),array( 'ln ln-icon-Bilk-Bottle2' => 'Bilk-Bottle2' ),array( 'ln ln-icon-Billing' => 'Billing' ),array( 'ln ln-icon-Bing' => 'Bing' ),array( 'ln ln-icon-Binocular' => 'Binocular' ),array( 'ln ln-icon-Bio-Hazard' => 'Bio-Hazard' ),array( 'ln ln-icon-Biotech' => 'Biotech' ),array( 'ln ln-icon-Bird-DeliveringLetter' => 'Bird-DeliveringLetter' ),array( 'ln ln-icon-Bird' => 'Bird' ),array( 'ln ln-icon-Birthday-Cake' => 'Birthday-Cake' ),array( 'ln ln-icon-Bisexual' => 'Bisexual' ),array( 'ln ln-icon-Bishop' => 'Bishop' ),array( 'ln ln-icon-Bitcoin' => 'Bitcoin' ),array( 'ln ln-icon-Black-Cat' => 'Black-Cat' ),array( 'ln ln-icon-Blackboard' => 'Blackboard' ),array( 'ln ln-icon-Blinklist' => 'Blinklist' ),array( 'ln ln-icon-Block-Cloud' => 'Block-Cloud' ),array( 'ln ln-icon-Block-Window' => 'Block-Window' ),array( 'ln ln-icon-Blogger' => 'Blogger' ),array( 'ln ln-icon-Blood' => 'Blood' ),array( 'ln ln-icon-Blouse' => 'Blouse' ),array( 'ln ln-icon-Blueprint' => 'Blueprint' ),array( 'ln ln-icon-Board' => 'Board' ),array( 'ln ln-icon-Bodybuilding' => 'Bodybuilding' ),array( 'ln ln-icon-Bold-Text' => 'Bold-Text' ),array( 'ln ln-icon-Bone' => 'Bone' ),array( 'ln ln-icon-Bones' => 'Bones' ),array( 'ln ln-icon-Book' => 'Book' ),array( 'ln ln-icon-Bookmark' => 'Bookmark' ),array( 'ln ln-icon-Books-2' => 'Books-2' ),array( 'ln ln-icon-Books' => 'Books' ),array( 'ln ln-icon-Boom' => 'Boom' ),array( 'ln ln-icon-Boot-2' => 'Boot-2' ),array( 'ln ln-icon-Boot' => 'Boot' ),array( 'ln ln-icon-Bottom-ToTop' => 'Bottom-ToTop' ),array( 'ln ln-icon-Bow-2' => 'Bow-2' ),array( 'ln ln-icon-Bow-3' => 'Bow-3' ),array( 'ln ln-icon-Bow-4' => 'Bow-4' ),array( 'ln ln-icon-Bow-5' => 'Bow-5' ),array( 'ln ln-icon-Bow-6' => 'Bow-6' ),array( 'ln ln-icon-Bow' => 'Bow' ),array( 'ln ln-icon-Bowling-2' => 'Bowling-2' ),array( 'ln ln-icon-Bowling' => 'Bowling' ),array( 'ln ln-icon-Box2' => 'Box2' ),array( 'ln ln-icon-Box-Close' => 'Box-Close' ),array( 'ln ln-icon-Box-Full' => 'Box-Full' ),array( 'ln ln-icon-Box-Open' => 'Box-Open' ),array( 'ln ln-icon-Box-withFolders' => 'Box-withFolders' ),array( 'ln ln-icon-Box' => 'Box' ),array( 'ln ln-icon-Boy' => 'Boy' ),array( 'ln ln-icon-Bra' => 'Bra' ),array( 'ln ln-icon-Brain-2' => 'Brain-2' ),array( 'ln ln-icon-Brain-3' => 'Brain-3' ),array( 'ln ln-icon-Brain' => 'Brain' ),array( 'ln ln-icon-Brazil' => 'Brazil' ),array( 'ln ln-icon-Bread-2' => 'Bread-2' ),array( 'ln ln-icon-Bread' => 'Bread' ),array( 'ln ln-icon-Bridge' => 'Bridge' ),array( 'ln ln-icon-Brightkite' => 'Brightkite' ),array( 'ln ln-icon-Broke-Link2' => 'Broke-Link2' ),array( 'ln ln-icon-Broken-Link' => 'Broken-Link' ),array( 'ln ln-icon-Broom' => 'Broom' ),array( 'ln ln-icon-Brush' => 'Brush' ),array( 'ln ln-icon-Bucket' => 'Bucket' ),array( 'ln ln-icon-Bug' => 'Bug' ),array( 'ln ln-icon-Building' => 'Building' ),array( 'ln ln-icon-Bulleted-List' => 'Bulleted-List' ),array( 'ln ln-icon-Bus-2' => 'Bus-2' ),array( 'ln ln-icon-Bus' => 'Bus' ),array( 'ln ln-icon-Business-Man' => 'Business-Man' ),array( 'ln ln-icon-Business-ManWoman' => 'Business-ManWoman' ),array( 'ln ln-icon-Business-Mens' => 'Business-Mens' ),array( 'ln ln-icon-Business-Woman' => 'Business-Woman' ),array( 'ln ln-icon-Butterfly' => 'Butterfly' ),array( 'ln ln-icon-Button' => 'Button' ),array( 'ln ln-icon-Cable-Car' => 'Cable-Car' ),array( 'ln ln-icon-Cake' => 'Cake' ),array( 'ln ln-icon-Calculator-2' => 'Calculator-2' ),array( 'ln ln-icon-Calculator-3' => 'Calculator-3' ),array( 'ln ln-icon-Calculator' => 'Calculator' ),array( 'ln ln-icon-Calendar-2' => 'Calendar-2' ),array( 'ln ln-icon-Calendar-3' => 'Calendar-3' ),array( 'ln ln-icon-Calendar-4' => 'Calendar-4' ),array( 'ln ln-icon-Calendar-Clock' => 'Calendar-Clock' ),array( 'ln ln-icon-Calendar' => 'Calendar' ),array( 'ln ln-icon-Camel' => 'Camel' ),array( 'ln ln-icon-Camera-2' => 'Camera-2' ),array( 'ln ln-icon-Camera-3' => 'Camera-3' ),array( 'ln ln-icon-Camera-4' => 'Camera-4' ),array( 'ln ln-icon-Camera-5' => 'Camera-5' ),array( 'ln ln-icon-Camera-Back' => 'Camera-Back' ),array( 'ln ln-icon-Camera' => 'Camera' ),array( 'ln ln-icon-Can-2' => 'Can-2' ),array( 'ln ln-icon-Can' => 'Can' ),array( 'ln ln-icon-Canada' => 'Canada' ),array( 'ln ln-icon-Cancer-2' => 'Cancer-2' ),array( 'ln ln-icon-Cancer-3' => 'Cancer-3' ),array( 'ln ln-icon-Cancer' => 'Cancer' ),array( 'ln ln-icon-Candle' => 'Candle' ),array( 'ln ln-icon-Candy-Cane' => 'Candy-Cane' ),array( 'ln ln-icon-Candy' => 'Candy' ),array( 'ln ln-icon-Cannon' => 'Cannon' ),array( 'ln ln-icon-Cap-2' => 'Cap-2' ),array( 'ln ln-icon-Cap-3' => 'Cap-3' ),array( 'ln ln-icon-Cap-Smiley' => 'Cap-Smiley' ),array( 'ln ln-icon-Cap' => 'Cap' ),array( 'ln ln-icon-Capricorn-2' => 'Capricorn-2' ),array( 'ln ln-icon-Capricorn' => 'Capricorn' ),array( 'ln ln-icon-Car-2' => 'Car-2' ),array( 'ln ln-icon-Car-3' => 'Car-3' ),array( 'ln ln-icon-Car-Coins' => 'Car-Coins' ),array( 'ln ln-icon-Car-Items' => 'Car-Items' ),array( 'ln ln-icon-Car-Wheel' => 'Car-Wheel' ),array( 'ln ln-icon-Car' => 'Car' ),array( 'ln ln-icon-Cardigan' => 'Cardigan' ),array( 'ln ln-icon-Cardiovascular' => 'Cardiovascular' ),array( 'ln ln-icon-Cart-Quantity' => 'Cart-Quantity' ),array( 'ln ln-icon-Casette-Tape' => 'Casette-Tape' ),array( 'ln ln-icon-Cash-Register' => 'Cash-Register' ),array( 'ln ln-icon-Cash-register2' => 'Cash-register2' ),array( 'ln ln-icon-Castle' => 'Castle' ),array( 'ln ln-icon-Cat' => 'Cat' ),array( 'ln ln-icon-Cathedral' => 'Cathedral' ),array( 'ln ln-icon-Cauldron' => 'Cauldron' ),array( 'ln ln-icon-CD-2' => 'CD-2' ),array( 'ln ln-icon-CD-Cover' => 'CD-Cover' ),array( 'ln ln-icon-CD' => 'CD' ),array( 'ln ln-icon-Cello' => 'Cello' ),array( 'ln ln-icon-Celsius' => 'Celsius' ),array( 'ln ln-icon-Chacked-Flag' => 'Chacked-Flag' ),array( 'ln ln-icon-Chair' => 'Chair' ),array( 'ln ln-icon-Charger' => 'Charger' ),array( 'ln ln-icon-Check-2' => 'Check-2' ),array( 'ln ln-icon-Check' => 'Check' ),array( 'ln ln-icon-Checked-User' => 'Checked-User' ),array( 'ln ln-icon-Checkmate' => 'Checkmate' ),array( 'ln ln-icon-Checkout-Bag' => 'Checkout-Bag' ),array( 'ln ln-icon-Checkout-Basket' => 'Checkout-Basket' ),array( 'ln ln-icon-Checkout' => 'Checkout' ),array( 'ln ln-icon-Cheese' => 'Cheese' ),array( 'ln ln-icon-Cheetah' => 'Cheetah' ),array( 'ln ln-icon-Chef-Hat' => 'Chef-Hat' ),array( 'ln ln-icon-Chef-Hat2' => 'Chef-Hat2' ),array( 'ln ln-icon-Chef' => 'Chef' ),array( 'ln ln-icon-Chemical-2' => 'Chemical-2' ),array( 'ln ln-icon-Chemical-3' => 'Chemical-3' ),array( 'ln ln-icon-Chemical-4' => 'Chemical-4' ),array( 'ln ln-icon-Chemical-5' => 'Chemical-5' ),array( 'ln ln-icon-Chemical' => 'Chemical' ),array( 'ln ln-icon-Chess-Board' => 'Chess-Board' ),array( 'ln ln-icon-Chess' => 'Chess' ),array( 'ln ln-icon-Chicken' => 'Chicken' ),array( 'ln ln-icon-Chile' => 'Chile' ),array( 'ln ln-icon-Chimney' => 'Chimney' ),array( 'ln ln-icon-China' => 'China' ),array( 'ln ln-icon-Chinese-Temple' => 'Chinese-Temple' ),array( 'ln ln-icon-Chip' => 'Chip' ),array( 'ln ln-icon-Chopsticks-2' => 'Chopsticks-2' ),array( 'ln ln-icon-Chopsticks' => 'Chopsticks' ),array( 'ln ln-icon-Christmas-Ball' => 'Christmas-Ball' ),array( 'ln ln-icon-Christmas-Bell' => 'Christmas-Bell' ),array( 'ln ln-icon-Christmas-Candle' => 'Christmas-Candle' ),array( 'ln ln-icon-Christmas-Hat' => 'Christmas-Hat' ),array( 'ln ln-icon-Christmas-Sleigh' => 'Christmas-Sleigh' ),array( 'ln ln-icon-Christmas-Snowman' => 'Christmas-Snowman' ),array( 'ln ln-icon-Christmas-Sock' => 'Christmas-Sock' ),array( 'ln ln-icon-Christmas-Tree' => 'Christmas-Tree' ),array( 'ln ln-icon-Christmas' => 'Christmas' ),array( 'ln ln-icon-Chrome' => 'Chrome' ),array( 'ln ln-icon-Chrysler-Building' => 'Chrysler-Building' ),array( 'ln ln-icon-Cinema' => 'Cinema' ),array( 'ln ln-icon-Circular-Point' => 'Circular-Point' ),array( 'ln ln-icon-City-Hall' => 'City-Hall' ),array( 'ln ln-icon-Clamp' => 'Clamp' ),array( 'ln ln-icon-Clapperboard-Close' => 'Clapperboard-Close' ),array( 'ln ln-icon-Clapperboard-Open' => 'Clapperboard-Open' ),array( 'ln ln-icon-Claps' => 'Claps' ),array( 'ln ln-icon-Clef' => 'Clef' ),array( 'ln ln-icon-Clinic' => 'Clinic' ),array( 'ln ln-icon-Clock-2' => 'Clock-2' ),array( 'ln ln-icon-Clock-3' => 'Clock-3' ),array( 'ln ln-icon-Clock-4' => 'Clock-4' ),array( 'ln ln-icon-Clock-Back' => 'Clock-Back' ),array( 'ln ln-icon-Clock-Forward' => 'Clock-Forward' ),array( 'ln ln-icon-Clock' => 'Clock' ),array( 'ln ln-icon-Close-Window' => 'Close-Window' ),array( 'ln ln-icon-Close' => 'Close' ),array( 'ln ln-icon-Clothing-Store' => 'Clothing-Store' ),array( 'ln ln-icon-Cloud--' => 'Cloud--' ),array( 'ln ln-icon-Cloud-' => 'Cloud-' ),array( 'ln ln-icon-Cloud-Camera' => 'Cloud-Camera' ),array( 'ln ln-icon-Cloud-Computer' => 'Cloud-Computer' ),array( 'ln ln-icon-Cloud-Email' => 'Cloud-Email' ),array( 'ln ln-icon-Cloud-Hail' => 'Cloud-Hail' ),array( 'ln ln-icon-Cloud-Laptop' => 'Cloud-Laptop' ),array( 'ln ln-icon-Cloud-Lock' => 'Cloud-Lock' ),array( 'ln ln-icon-Cloud-Moon' => 'Cloud-Moon' ),array( 'ln ln-icon-Cloud-Music' => 'Cloud-Music' ),array( 'ln ln-icon-Cloud-Picture' => 'Cloud-Picture' ),array( 'ln ln-icon-Cloud-Rain' => 'Cloud-Rain' ),array( 'ln ln-icon-Cloud-Remove' => 'Cloud-Remove' ),array( 'ln ln-icon-Cloud-Secure' => 'Cloud-Secure' ),array( 'ln ln-icon-Cloud-Settings' => 'Cloud-Settings' ),array( 'ln ln-icon-Cloud-Smartphone' => 'Cloud-Smartphone' ),array( 'ln ln-icon-Cloud-Snow' => 'Cloud-Snow' ),array( 'ln ln-icon-Cloud-Sun' => 'Cloud-Sun' ),array( 'ln ln-icon-Cloud-Tablet' => 'Cloud-Tablet' ),array( 'ln ln-icon-Cloud-Video' => 'Cloud-Video' ),array( 'ln ln-icon-Cloud-Weather' => 'Cloud-Weather' ),array( 'ln ln-icon-Cloud' => 'Cloud' ),array( 'ln ln-icon-Clouds-Weather' => 'Clouds-Weather' ),array( 'ln ln-icon-Clouds' => 'Clouds' ),array( 'ln ln-icon-Clown' => 'Clown' ),array( 'ln ln-icon-CMYK' => 'CMYK' ),array( 'ln ln-icon-Coat' => 'Coat' ),array( 'ln ln-icon-Cocktail' => 'Cocktail' ),array( 'ln ln-icon-Coconut' => 'Coconut' ),array( 'ln ln-icon-Code-Window' => 'Code-Window' ),array( 'ln ln-icon-Coding' => 'Coding' ),array( 'ln ln-icon-Coffee-2' => 'Coffee-2' ),array( 'ln ln-icon-Coffee-Bean' => 'Coffee-Bean' ),array( 'ln ln-icon-Coffee-Machine' => 'Coffee-Machine' ),array( 'ln ln-icon-Coffee-toGo' => 'Coffee-toGo' ),array( 'ln ln-icon-Coffee' => 'Coffee' ),array( 'ln ln-icon-Coffin' => 'Coffin' ),array( 'ln ln-icon-Coin' => 'Coin' ),array( 'ln ln-icon-Coins-2' => 'Coins-2' ),array( 'ln ln-icon-Coins-3' => 'Coins-3' ),array( 'ln ln-icon-Coins' => 'Coins' ),array( 'ln ln-icon-Colombia' => 'Colombia' ),array( 'ln ln-icon-Colosseum' => 'Colosseum' ),array( 'ln ln-icon-Column-2' => 'Column-2' ),array( 'ln ln-icon-Column-3' => 'Column-3' ),array( 'ln ln-icon-Column' => 'Column' ),array( 'ln ln-icon-Comb-2' => 'Comb-2' ),array( 'ln ln-icon-Comb' => 'Comb' ),array( 'ln ln-icon-Communication-Tower' => 'Communication-Tower' ),array( 'ln ln-icon-Communication-Tower2' => 'Communication-Tower2' ),array( 'ln ln-icon-Compass-2' => 'Compass-2' ),array( 'ln ln-icon-Compass-3' => 'Compass-3' ),array( 'ln ln-icon-Compass-4' => 'Compass-4' ),array( 'ln ln-icon-Compass-Rose' => 'Compass-Rose' ),array( 'ln ln-icon-Compass' => 'Compass' ),array( 'ln ln-icon-Computer-2' => 'Computer-2' ),array( 'ln ln-icon-Computer-3' => 'Computer-3' ),array( 'ln ln-icon-Computer-Secure' => 'Computer-Secure' ),array( 'ln ln-icon-Computer' => 'Computer' ),array( 'ln ln-icon-Conference' => 'Conference' ),array( 'ln ln-icon-Confused' => 'Confused' ),array( 'ln ln-icon-Conservation' => 'Conservation' ),array( 'ln ln-icon-Consulting' => 'Consulting' ),array( 'ln ln-icon-Contrast' => 'Contrast' ),array( 'ln ln-icon-Control-2' => 'Control-2' ),array( 'ln ln-icon-Control' => 'Control' ),array( 'ln ln-icon-Cookie-Man' => 'Cookie-Man' ),array( 'ln ln-icon-Cookies' => 'Cookies' ),array( 'ln ln-icon-Cool-Guy' => 'Cool-Guy' ),array( 'ln ln-icon-Cool' => 'Cool' ),array( 'ln ln-icon-Copyright' => 'Copyright' ),array( 'ln ln-icon-Costume' => 'Costume' ),array( 'ln ln-icon-Couple-Sign' => 'Couple-Sign' ),array( 'ln ln-icon-Cow' => 'Cow' ),array( 'ln ln-icon-CPU' => 'CPU' ),array( 'ln ln-icon-Crane' => 'Crane' ),array( 'ln ln-icon-Cranium' => 'Cranium' ),array( 'ln ln-icon-Credit-Card' => 'Credit-Card' ),array( 'ln ln-icon-Credit-Card2' => 'Credit-Card2' ),array( 'ln ln-icon-Credit-Card3' => 'Credit-Card3' ),array( 'ln ln-icon-Cricket' => 'Cricket' ),array( 'ln ln-icon-Criminal' => 'Criminal' ),array( 'ln ln-icon-Croissant' => 'Croissant' ),array( 'ln ln-icon-Crop-2' => 'Crop-2' ),array( 'ln ln-icon-Crop-3' => 'Crop-3' ),array( 'ln ln-icon-Crown-2' => 'Crown-2' ),array( 'ln ln-icon-Crown' => 'Crown' ),array( 'ln ln-icon-Crying' => 'Crying' ),array( 'ln ln-icon-Cube-Molecule' => 'Cube-Molecule' ),array( 'ln ln-icon-Cube-Molecule2' => 'Cube-Molecule2' ),array( 'ln ln-icon-Cupcake' => 'Cupcake' ),array( 'ln ln-icon-Cursor-Click' => 'Cursor-Click' ),array( 'ln ln-icon-Cursor-Click2' => 'Cursor-Click2' ),array( 'ln ln-icon-Cursor-Move' => 'Cursor-Move' ),array( 'ln ln-icon-Cursor-Move2' => 'Cursor-Move2' ),array( 'ln ln-icon-Cursor-Select' => 'Cursor-Select' ),array( 'ln ln-icon-Cursor' => 'Cursor' ),array( 'ln ln-icon-D-Eyeglasses' => 'D-Eyeglasses' ),array( 'ln ln-icon-D-Eyeglasses2' => 'D-Eyeglasses2' ),array( 'ln ln-icon-Dam' => 'Dam' ),array( 'ln ln-icon-Danemark' => 'Danemark' ),array( 'ln ln-icon-Danger-2' => 'Danger-2' ),array( 'ln ln-icon-Danger' => 'Danger' ),array( 'ln ln-icon-Dashboard' => 'Dashboard' ),array( 'ln ln-icon-Data-Backup' => 'Data-Backup' ),array( 'ln ln-icon-Data-Block' => 'Data-Block' ),array( 'ln ln-icon-Data-Center' => 'Data-Center' ),array( 'ln ln-icon-Data-Clock' => 'Data-Clock' ),array( 'ln ln-icon-Data-Cloud' => 'Data-Cloud' ),array( 'ln ln-icon-Data-Compress' => 'Data-Compress' ),array( 'ln ln-icon-Data-Copy' => 'Data-Copy' ),array( 'ln ln-icon-Data-Download' => 'Data-Download' ),array( 'ln ln-icon-Data-Financial' => 'Data-Financial' ),array( 'ln ln-icon-Data-Key' => 'Data-Key' ),array( 'ln ln-icon-Data-Lock' => 'Data-Lock' ),array( 'ln ln-icon-Data-Network' => 'Data-Network' ),array( 'ln ln-icon-Data-Password' => 'Data-Password' ),array( 'ln ln-icon-Data-Power' => 'Data-Power' ),array( 'ln ln-icon-Data-Refresh' => 'Data-Refresh' ),array( 'ln ln-icon-Data-Save' => 'Data-Save' ),array( 'ln ln-icon-Data-Search' => 'Data-Search' ),array( 'ln ln-icon-Data-Security' => 'Data-Security' ),array( 'ln ln-icon-Data-Settings' => 'Data-Settings' ),array( 'ln ln-icon-Data-Sharing' => 'Data-Sharing' ),array( 'ln ln-icon-Data-Shield' => 'Data-Shield' ),array( 'ln ln-icon-Data-Signal' => 'Data-Signal' ),array( 'ln ln-icon-Data-Storage' => 'Data-Storage' ),array( 'ln ln-icon-Data-Stream' => 'Data-Stream' ),array( 'ln ln-icon-Data-Transfer' => 'Data-Transfer' ),array( 'ln ln-icon-Data-Unlock' => 'Data-Unlock' ),array( 'ln ln-icon-Data-Upload' => 'Data-Upload' ),array( 'ln ln-icon-Data-Yes' => 'Data-Yes' ),array( 'ln ln-icon-Data' => 'Data' ),array( 'ln ln-icon-David-Star' => 'David-Star' ),array( 'ln ln-icon-Daylight' => 'Daylight' ),array( 'ln ln-icon-Death' => 'Death' ),array( 'ln ln-icon-Debian' => 'Debian' ),array( 'ln ln-icon-Dec' => 'Dec' ),array( 'ln ln-icon-Decrase-Inedit' => 'Decrase-Inedit' ),array( 'ln ln-icon-Deer-2' => 'Deer-2' ),array( 'ln ln-icon-Deer' => 'Deer' ),array( 'ln ln-icon-Delete-File' => 'Delete-File' ),array( 'ln ln-icon-Delete-Window' => 'Delete-Window' ),array( 'ln ln-icon-Delicious' => 'Delicious' ),array( 'ln ln-icon-Depression' => 'Depression' ),array( 'ln ln-icon-Deviantart' => 'Deviantart' ),array( 'ln ln-icon-Device-SyncwithCloud' => 'Device-SyncwithCloud' ),array( 'ln ln-icon-Diamond' => 'Diamond' ),array( 'ln ln-icon-Dice-2' => 'Dice-2' ),array( 'ln ln-icon-Dice' => 'Dice' ),array( 'ln ln-icon-Digg' => 'Digg' ),array( 'ln ln-icon-Digital-Drawing' => 'Digital-Drawing' ),array( 'ln ln-icon-Diigo' => 'Diigo' ),array( 'ln ln-icon-Dinosaur' => 'Dinosaur' ),array( 'ln ln-icon-Diploma-2' => 'Diploma-2' ),array( 'ln ln-icon-Diploma' => 'Diploma' ),array( 'ln ln-icon-Direction-East' => 'Direction-East' ),array( 'ln ln-icon-Direction-North' => 'Direction-North' ),array( 'ln ln-icon-Direction-South' => 'Direction-South' ),array( 'ln ln-icon-Direction-West' => 'Direction-West' ),array( 'ln ln-icon-Director' => 'Director' ),array( 'ln ln-icon-Disk' => 'Disk' ),array( 'ln ln-icon-Dj' => 'Dj' ),array( 'ln ln-icon-DNA-2' => 'DNA-2' ),array( 'ln ln-icon-DNA-Helix' => 'DNA-Helix' ),array( 'ln ln-icon-DNA' => 'DNA' ),array( 'ln ln-icon-Doctor' => 'Doctor' ),array( 'ln ln-icon-Dog' => 'Dog' ),array( 'ln ln-icon-Dollar-Sign' => 'Dollar-Sign' ),array( 'ln ln-icon-Dollar-Sign2' => 'Dollar-Sign2' ),array( 'ln ln-icon-Dollar' => 'Dollar' ),array( 'ln ln-icon-Dolphin' => 'Dolphin' ),array( 'ln ln-icon-Domino' => 'Domino' ),array( 'ln ln-icon-Door-Hanger' => 'Door-Hanger' ),array( 'ln ln-icon-Door' => 'Door' ),array( 'ln ln-icon-Doplr' => 'Doplr' ),array( 'ln ln-icon-Double-Circle' => 'Double-Circle' ),array( 'ln ln-icon-Double-Tap' => 'Double-Tap' ),array( 'ln ln-icon-Doughnut' => 'Doughnut' ),array( 'ln ln-icon-Dove' => 'Dove' ),array( 'ln ln-icon-Down-2' => 'Down-2' ),array( 'ln ln-icon-Down-3' => 'Down-3' ),array( 'ln ln-icon-Down-4' => 'Down-4' ),array( 'ln ln-icon-Down' => 'Down' ),array( 'ln ln-icon-Download-2' => 'Download-2' ),array( 'ln ln-icon-Download-fromCloud' => 'Download-fromCloud' ),array( 'ln ln-icon-Download-Window' => 'Download-Window' ),array( 'ln ln-icon-Download' => 'Download' ),array( 'ln ln-icon-Downward' => 'Downward' ),array( 'ln ln-icon-Drag-Down' => 'Drag-Down' ),array( 'ln ln-icon-Drag-Left' => 'Drag-Left' ),array( 'ln ln-icon-Drag-Right' => 'Drag-Right' ),array( 'ln ln-icon-Drag-Up' => 'Drag-Up' ),array( 'ln ln-icon-Drag' => 'Drag' ),array( 'ln ln-icon-Dress' => 'Dress' ),array( 'ln ln-icon-Drill-2' => 'Drill-2' ),array( 'ln ln-icon-Drill' => 'Drill' ),array( 'ln ln-icon-Drop' => 'Drop' ),array( 'ln ln-icon-Dropbox' => 'Dropbox' ),array( 'ln ln-icon-Drum' => 'Drum' ),array( 'ln ln-icon-Dry' => 'Dry' ),array( 'ln ln-icon-Duck' => 'Duck' ),array( 'ln ln-icon-Dumbbell' => 'Dumbbell' ),array( 'ln ln-icon-Duplicate-Layer' => 'Duplicate-Layer' ),array( 'ln ln-icon-Duplicate-Window' => 'Duplicate-Window' ),array( 'ln ln-icon-DVD' => 'DVD' ),array( 'ln ln-icon-Eagle' => 'Eagle' ),array( 'ln ln-icon-Ear' => 'Ear' ),array( 'ln ln-icon-Earphones-2' => 'Earphones-2' ),array( 'ln ln-icon-Earphones' => 'Earphones' ),array( 'ln ln-icon-Eci-Icon' => 'Eci-Icon' ),array( 'ln ln-icon-Edit-Map' => 'Edit-Map' ),array( 'ln ln-icon-Edit' => 'Edit' ),array( 'ln ln-icon-Eggs' => 'Eggs' ),array( 'ln ln-icon-Egypt' => 'Egypt' ),array( 'ln ln-icon-Eifel-Tower' => 'Eifel-Tower' ),array( 'ln ln-icon-eject-2' => 'eject-2' ),array( 'ln ln-icon-Eject' => 'Eject' ),array( 'ln ln-icon-El-Castillo' => 'El-Castillo' ),array( 'ln ln-icon-Elbow' => 'Elbow' ),array( 'ln ln-icon-Electric-Guitar' => 'Electric-Guitar' ),array( 'ln ln-icon-Electricity' => 'Electricity' ),array( 'ln ln-icon-Elephant' => 'Elephant' ),array( 'ln ln-icon-Email' => 'Email' ),array( 'ln ln-icon-Embassy' => 'Embassy' ),array( 'ln ln-icon-Empire-StateBuilding' => 'Empire-StateBuilding' ),array( 'ln ln-icon-Empty-Box' => 'Empty-Box' ),array( 'ln ln-icon-End2' => 'End2' ),array( 'ln ln-icon-End-2' => 'End-2' ),array( 'ln ln-icon-End' => 'End' ),array( 'ln ln-icon-Endways' => 'Endways' ),array( 'ln ln-icon-Engineering' => 'Engineering' ),array( 'ln ln-icon-Envelope-2' => 'Envelope-2' ),array( 'ln ln-icon-Envelope' => 'Envelope' ),array( 'ln ln-icon-Environmental-2' => 'Environmental-2' ),array( 'ln ln-icon-Environmental-3' => 'Environmental-3' ),array( 'ln ln-icon-Environmental' => 'Environmental' ),array( 'ln ln-icon-Equalizer' => 'Equalizer' ),array( 'ln ln-icon-Eraser-2' => 'Eraser-2' ),array( 'ln ln-icon-Eraser-3' => 'Eraser-3' ),array( 'ln ln-icon-Eraser' => 'Eraser' ),array( 'ln ln-icon-Error-404Window' => 'Error-404Window' ),array( 'ln ln-icon-Euro-Sign' => 'Euro-Sign' ),array( 'ln ln-icon-Euro-Sign2' => 'Euro-Sign2' ),array( 'ln ln-icon-Euro' => 'Euro' ),array( 'ln ln-icon-Evernote' => 'Evernote' ),array( 'ln ln-icon-Evil' => 'Evil' ),array( 'ln ln-icon-Explode' => 'Explode' ),array( 'ln ln-icon-Eye-2' => 'Eye-2' ),array( 'ln ln-icon-Eye-Blind' => 'Eye-Blind' ),array( 'ln ln-icon-Eye-Invisible' => 'Eye-Invisible' ),array( 'ln ln-icon-Eye-Scan' => 'Eye-Scan' ),array( 'ln ln-icon-Eye-Visible' => 'Eye-Visible' ),array( 'ln ln-icon-Eye' => 'Eye' ),array( 'ln ln-icon-Eyebrow-2' => 'Eyebrow-2' ),array( 'ln ln-icon-Eyebrow-3' => 'Eyebrow-3' ),array( 'ln ln-icon-Eyebrow' => 'Eyebrow' ),array( 'ln ln-icon-Eyeglasses-Smiley' => 'Eyeglasses-Smiley' ),array( 'ln ln-icon-Eyeglasses-Smiley2' => 'Eyeglasses-Smiley2' ),array( 'ln ln-icon-Face-Style' => 'Face-Style' ),array( 'ln ln-icon-Face-Style2' => 'Face-Style2' ),array( 'ln ln-icon-Face-Style3' => 'Face-Style3' ),array( 'ln ln-icon-Face-Style4' => 'Face-Style4' ),array( 'ln ln-icon-Face-Style5' => 'Face-Style5' ),array( 'ln ln-icon-Face-Style6' => 'Face-Style6' ),array( 'ln ln-icon-Facebook-2' => 'Facebook-2' ),array( 'ln ln-icon-Facebook' => 'Facebook' ),array( 'ln ln-icon-Factory-2' => 'Factory-2' ),array( 'ln ln-icon-Factory' => 'Factory' ),array( 'ln ln-icon-Fahrenheit' => 'Fahrenheit' ),array( 'ln ln-icon-Family-Sign' => 'Family-Sign' ),array( 'ln ln-icon-Fan' => 'Fan' ),array( 'ln ln-icon-Farmer' => 'Farmer' ),array( 'ln ln-icon-Fashion' => 'Fashion' ),array( 'ln ln-icon-Favorite-Window' => 'Favorite-Window' ),array( 'ln ln-icon-Fax' => 'Fax' ),array( 'ln ln-icon-Feather' => 'Feather' ),array( 'ln ln-icon-Feedburner' => 'Feedburner' ),array( 'ln ln-icon-Female-2' => 'Female-2' ),array( 'ln ln-icon-Female-Sign' => 'Female-Sign' ),array( 'ln ln-icon-Female' => 'Female' ),array( 'ln ln-icon-File-Block' => 'File-Block' ),array( 'ln ln-icon-File-Bookmark' => 'File-Bookmark' ),array( 'ln ln-icon-File-Chart' => 'File-Chart' ),array( 'ln ln-icon-File-Clipboard' => 'File-Clipboard' ),array( 'ln ln-icon-File-ClipboardFileText' => 'File-ClipboardFileText' ),array( 'ln ln-icon-File-ClipboardTextImage' => 'File-ClipboardTextImage' ),array( 'ln ln-icon-File-Cloud' => 'File-Cloud' ),array( 'ln ln-icon-File-Copy' => 'File-Copy' ),array( 'ln ln-icon-File-Copy2' => 'File-Copy2' ),array( 'ln ln-icon-File-CSV' => 'File-CSV' ),array( 'ln ln-icon-File-Download' => 'File-Download' ),array( 'ln ln-icon-File-Edit' => 'File-Edit' ),array( 'ln ln-icon-File-Excel' => 'File-Excel' ),array( 'ln ln-icon-File-Favorite' => 'File-Favorite' ),array( 'ln ln-icon-File-Fire' => 'File-Fire' ),array( 'ln ln-icon-File-Graph' => 'File-Graph' ),array( 'ln ln-icon-File-Hide' => 'File-Hide' ),array( 'ln ln-icon-File-Horizontal' => 'File-Horizontal' ),array( 'ln ln-icon-File-HorizontalText' => 'File-HorizontalText' ),array( 'ln ln-icon-File-HTML' => 'File-HTML' ),array( 'ln ln-icon-File-JPG' => 'File-JPG' ),array( 'ln ln-icon-File-Link' => 'File-Link' ),array( 'ln ln-icon-File-Loading' => 'File-Loading' ),array( 'ln ln-icon-File-Lock' => 'File-Lock' ),array( 'ln ln-icon-File-Love' => 'File-Love' ),array( 'ln ln-icon-File-Music' => 'File-Music' ),array( 'ln ln-icon-File-Network' => 'File-Network' ),array( 'ln ln-icon-File-Pictures' => 'File-Pictures' ),array( 'ln ln-icon-File-Pie' => 'File-Pie' ),array( 'ln ln-icon-File-Presentation' => 'File-Presentation' ),array( 'ln ln-icon-File-Refresh' => 'File-Refresh' ),array( 'ln ln-icon-File-Search' => 'File-Search' ),array( 'ln ln-icon-File-Settings' => 'File-Settings' ),array( 'ln ln-icon-File-Share' => 'File-Share' ),array( 'ln ln-icon-File-TextImage' => 'File-TextImage' ),array( 'ln ln-icon-File-Trash' => 'File-Trash' ),array( 'ln ln-icon-File-TXT' => 'File-TXT' ),array( 'ln ln-icon-File-Upload' => 'File-Upload' ),array( 'ln ln-icon-File-Video' => 'File-Video' ),array( 'ln ln-icon-File-Word' => 'File-Word' ),array( 'ln ln-icon-File-Zip' => 'File-Zip' ),array( 'ln ln-icon-File' => 'File' ),array( 'ln ln-icon-Files' => 'Files' ),array( 'ln ln-icon-Film-Board' => 'Film-Board' ),array( 'ln ln-icon-Film-Cartridge' => 'Film-Cartridge' ),array( 'ln ln-icon-Film-Strip' => 'Film-Strip' ),array( 'ln ln-icon-Film-Video' => 'Film-Video' ),array( 'ln ln-icon-Film' => 'Film' ),array( 'ln ln-icon-Filter-2' => 'Filter-2' ),array( 'ln ln-icon-Filter' => 'Filter' ),array( 'ln ln-icon-Financial' => 'Financial' ),array( 'ln ln-icon-Find-User' => 'Find-User' ),array( 'ln ln-icon-Finger-DragFourSides' => 'Finger-DragFourSides' ),array( 'ln ln-icon-Finger-DragTwoSides' => 'Finger-DragTwoSides' ),array( 'ln ln-icon-Finger-Print' => 'Finger-Print' ),array( 'ln ln-icon-Finger' => 'Finger' ),array( 'ln ln-icon-Fingerprint-2' => 'Fingerprint-2' ),array( 'ln ln-icon-Fingerprint' => 'Fingerprint' ),array( 'ln ln-icon-Fire-Flame' => 'Fire-Flame' ),array( 'ln ln-icon-Fire-Flame2' => 'Fire-Flame2' ),array( 'ln ln-icon-Fire-Hydrant' => 'Fire-Hydrant' ),array( 'ln ln-icon-Fire-Staion' => 'Fire-Staion' ),array( 'ln ln-icon-Firefox' => 'Firefox' ),array( 'ln ln-icon-Firewall' => 'Firewall' ),array( 'ln ln-icon-First-Aid' => 'First-Aid' ),array( 'ln ln-icon-First' => 'First' ),array( 'ln ln-icon-Fish-Food' => 'Fish-Food' ),array( 'ln ln-icon-Fish' => 'Fish' ),array( 'ln ln-icon-Fit-To' => 'Fit-To' ),array( 'ln ln-icon-Fit-To2' => 'Fit-To2' ),array( 'ln ln-icon-Five-Fingers' => 'Five-Fingers' ),array( 'ln ln-icon-Five-FingersDrag' => 'Five-FingersDrag' ),array( 'ln ln-icon-Five-FingersDrag2' => 'Five-FingersDrag2' ),array( 'ln ln-icon-Five-FingersTouch' => 'Five-FingersTouch' ),array( 'ln ln-icon-Flag-2' => 'Flag-2' ),array( 'ln ln-icon-Flag-3' => 'Flag-3' ),array( 'ln ln-icon-Flag-4' => 'Flag-4' ),array( 'ln ln-icon-Flag-5' => 'Flag-5' ),array( 'ln ln-icon-Flag-6' => 'Flag-6' ),array( 'ln ln-icon-Flag' => 'Flag' ),array( 'ln ln-icon-Flamingo' => 'Flamingo' ),array( 'ln ln-icon-Flash-2' => 'Flash-2' ),array( 'ln ln-icon-Flash-Video' => 'Flash-Video' ),array( 'ln ln-icon-Flash' => 'Flash' ),array( 'ln ln-icon-Flashlight' => 'Flashlight' ),array( 'ln ln-icon-Flask-2' => 'Flask-2' ),array( 'ln ln-icon-Flask' => 'Flask' ),array( 'ln ln-icon-Flick' => 'Flick' ),array( 'ln ln-icon-Flickr' => 'Flickr' ),array( 'ln ln-icon-Flowerpot' => 'Flowerpot' ),array( 'ln ln-icon-Fluorescent' => 'Fluorescent' ),array( 'ln ln-icon-Fog-Day' => 'Fog-Day' ),array( 'ln ln-icon-Fog-Night' => 'Fog-Night' ),array( 'ln ln-icon-Folder-Add' => 'Folder-Add' ),array( 'ln ln-icon-Folder-Archive' => 'Folder-Archive' ),array( 'ln ln-icon-Folder-Binder' => 'Folder-Binder' ),array( 'ln ln-icon-Folder-Binder2' => 'Folder-Binder2' ),array( 'ln ln-icon-Folder-Block' => 'Folder-Block' ),array( 'ln ln-icon-Folder-Bookmark' => 'Folder-Bookmark' ),array( 'ln ln-icon-Folder-Close' => 'Folder-Close' ),array( 'ln ln-icon-Folder-Cloud' => 'Folder-Cloud' ),array( 'ln ln-icon-Folder-Delete' => 'Folder-Delete' ),array( 'ln ln-icon-Folder-Download' => 'Folder-Download' ),array( 'ln ln-icon-Folder-Edit' => 'Folder-Edit' ),array( 'ln ln-icon-Folder-Favorite' => 'Folder-Favorite' ),array( 'ln ln-icon-Folder-Fire' => 'Folder-Fire' ),array( 'ln ln-icon-Folder-Hide' => 'Folder-Hide' ),array( 'ln ln-icon-Folder-Link' => 'Folder-Link' ),array( 'ln ln-icon-Folder-Loading' => 'Folder-Loading' ),array( 'ln ln-icon-Folder-Lock' => 'Folder-Lock' ),array( 'ln ln-icon-Folder-Love' => 'Folder-Love' ),array( 'ln ln-icon-Folder-Music' => 'Folder-Music' ),array( 'ln ln-icon-Folder-Network' => 'Folder-Network' ),array( 'ln ln-icon-Folder-Open' => 'Folder-Open' ),array( 'ln ln-icon-Folder-Open2' => 'Folder-Open2' ),array( 'ln ln-icon-Folder-Organizing' => 'Folder-Organizing' ),array( 'ln ln-icon-Folder-Pictures' => 'Folder-Pictures' ),array( 'ln ln-icon-Folder-Refresh' => 'Folder-Refresh' ),array( 'ln ln-icon-Folder-Remove-' => 'Folder-Remove-' ),array( 'ln ln-icon-Folder-Search' => 'Folder-Search' ),array( 'ln ln-icon-Folder-Settings' => 'Folder-Settings' ),array( 'ln ln-icon-Folder-Share' => 'Folder-Share' ),array( 'ln ln-icon-Folder-Trash' => 'Folder-Trash' ),array( 'ln ln-icon-Folder-Upload' => 'Folder-Upload' ),array( 'ln ln-icon-Folder-Video' => 'Folder-Video' ),array( 'ln ln-icon-Folder-WithDocument' => 'Folder-WithDocument' ),array( 'ln ln-icon-Folder-Zip' => 'Folder-Zip' ),array( 'ln ln-icon-Folder' => 'Folder' ),array( 'ln ln-icon-Folders' => 'Folders' ),array( 'ln ln-icon-Font-Color' => 'Font-Color' ),array( 'ln ln-icon-Font-Name' => 'Font-Name' ),array( 'ln ln-icon-Font-Size' => 'Font-Size' ),array( 'ln ln-icon-Font-Style' => 'Font-Style' ),array( 'ln ln-icon-Font-StyleSubscript' => 'Font-StyleSubscript' ),array( 'ln ln-icon-Font-StyleSuperscript' => 'Font-StyleSuperscript' ),array( 'ln ln-icon-Font-Window' => 'Font-Window' ),array( 'ln ln-icon-Foot-2' => 'Foot-2' ),array( 'ln ln-icon-Foot' => 'Foot' ),array( 'ln ln-icon-Football-2' => 'Football-2' ),array( 'ln ln-icon-Football' => 'Football' ),array( 'ln ln-icon-Footprint-2' => 'Footprint-2' ),array( 'ln ln-icon-Footprint-3' => 'Footprint-3' ),array( 'ln ln-icon-Footprint' => 'Footprint' ),array( 'ln ln-icon-Forest' => 'Forest' ),array( 'ln ln-icon-Fork' => 'Fork' ),array( 'ln ln-icon-Formspring' => 'Formspring' ),array( 'ln ln-icon-Formula' => 'Formula' ),array( 'ln ln-icon-Forsquare' => 'Forsquare' ),array( 'ln ln-icon-Forward' => 'Forward' ),array( 'ln ln-icon-Fountain-Pen' => 'Fountain-Pen' ),array( 'ln ln-icon-Four-Fingers' => 'Four-Fingers' ),array( 'ln ln-icon-Four-FingersDrag' => 'Four-FingersDrag' ),array( 'ln ln-icon-Four-FingersDrag2' => 'Four-FingersDrag2' ),array( 'ln ln-icon-Four-FingersTouch' => 'Four-FingersTouch' ),array( 'ln ln-icon-Fox' => 'Fox' ),array( 'ln ln-icon-Frankenstein' => 'Frankenstein' ),array( 'ln ln-icon-French-Fries' => 'French-Fries' ),array( 'ln ln-icon-Friendfeed' => 'Friendfeed' ),array( 'ln ln-icon-Friendster' => 'Friendster' ),array( 'ln ln-icon-Frog' => 'Frog' ),array( 'ln ln-icon-Fruits' => 'Fruits' ),array( 'ln ln-icon-Fuel' => 'Fuel' ),array( 'ln ln-icon-Full-Bag' => 'Full-Bag' ),array( 'ln ln-icon-Full-Basket' => 'Full-Basket' ),array( 'ln ln-icon-Full-Cart' => 'Full-Cart' ),array( 'ln ln-icon-Full-Moon' => 'Full-Moon' ),array( 'ln ln-icon-Full-Screen' => 'Full-Screen' ),array( 'ln ln-icon-Full-Screen2' => 'Full-Screen2' ),array( 'ln ln-icon-Full-View' => 'Full-View' ),array( 'ln ln-icon-Full-View2' => 'Full-View2' ),array( 'ln ln-icon-Full-ViewWindow' => 'Full-ViewWindow' ),array( 'ln ln-icon-Function' => 'Function' ),array( 'ln ln-icon-Funky' => 'Funky' ),array( 'ln ln-icon-Funny-Bicycle' => 'Funny-Bicycle' ),array( 'ln ln-icon-Furl' => 'Furl' ),array( 'ln ln-icon-Gamepad-2' => 'Gamepad-2' ),array( 'ln ln-icon-Gamepad' => 'Gamepad' ),array( 'ln ln-icon-Gas-Pump' => 'Gas-Pump' ),array( 'ln ln-icon-Gaugage-2' => 'Gaugage-2' ),array( 'ln ln-icon-Gaugage' => 'Gaugage' ),array( 'ln ln-icon-Gay' => 'Gay' ),array( 'ln ln-icon-Gear-2' => 'Gear-2' ),array( 'ln ln-icon-Gear' => 'Gear' ),array( 'ln ln-icon-Gears-2' => 'Gears-2' ),array( 'ln ln-icon-Gears' => 'Gears' ),array( 'ln ln-icon-Geek-2' => 'Geek-2' ),array( 'ln ln-icon-Geek' => 'Geek' ),array( 'ln ln-icon-Gemini-2' => 'Gemini-2' ),array( 'ln ln-icon-Gemini' => 'Gemini' ),array( 'ln ln-icon-Genius' => 'Genius' ),array( 'ln ln-icon-Gentleman' => 'Gentleman' ),array( 'ln ln-icon-Geo--' => 'Geo--' ),array( 'ln ln-icon-Geo-' => 'Geo-' ),array( 'ln ln-icon-Geo-Close' => 'Geo-Close' ),array( 'ln ln-icon-Geo-Love' => 'Geo-Love' ),array( 'ln ln-icon-Geo-Number' => 'Geo-Number' ),array( 'ln ln-icon-Geo-Star' => 'Geo-Star' ),array( 'ln ln-icon-Geo' => 'Geo' ),array( 'ln ln-icon-Geo2--' => 'Geo2--' ),array( 'ln ln-icon-Geo2-' => 'Geo2-' ),array( 'ln ln-icon-Geo2-Close' => 'Geo2-Close' ),array( 'ln ln-icon-Geo2-Love' => 'Geo2-Love' ),array( 'ln ln-icon-Geo2-Number' => 'Geo2-Number' ),array( 'ln ln-icon-Geo2-Star' => 'Geo2-Star' ),array( 'ln ln-icon-Geo2' => 'Geo2' ),array( 'ln ln-icon-Geo3--' => 'Geo3--' ),array( 'ln ln-icon-Geo3-' => 'Geo3-' ),array( 'ln ln-icon-Geo3-Close' => 'Geo3-Close' ),array( 'ln ln-icon-Geo3-Love' => 'Geo3-Love' ),array( 'ln ln-icon-Geo3-Number' => 'Geo3-Number' ),array( 'ln ln-icon-Geo3-Star' => 'Geo3-Star' ),array( 'ln ln-icon-Geo3' => 'Geo3' ),array( 'ln ln-icon-Gey' => 'Gey' ),array( 'ln ln-icon-Gift-Box' => 'Gift-Box' ),array( 'ln ln-icon-Giraffe' => 'Giraffe' ),array( 'ln ln-icon-Girl' => 'Girl' ),array( 'ln ln-icon-Glass-Water' => 'Glass-Water' ),array( 'ln ln-icon-Glasses-2' => 'Glasses-2' ),array( 'ln ln-icon-Glasses-3' => 'Glasses-3' ),array( 'ln ln-icon-Glasses' => 'Glasses' ),array( 'ln ln-icon-Global-Position' => 'Global-Position' ),array( 'ln ln-icon-Globe-2' => 'Globe-2' ),array( 'ln ln-icon-Globe' => 'Globe' ),array( 'ln ln-icon-Gloves' => 'Gloves' ),array( 'ln ln-icon-Go-Bottom' => 'Go-Bottom' ),array( 'ln ln-icon-Go-Top' => 'Go-Top' ),array( 'ln ln-icon-Goggles' => 'Goggles' ),array( 'ln ln-icon-Golf-2' => 'Golf-2' ),array( 'ln ln-icon-Golf' => 'Golf' ),array( 'ln ln-icon-Google-Buzz' => 'Google-Buzz' ),array( 'ln ln-icon-Google-Drive' => 'Google-Drive' ),array( 'ln ln-icon-Google-Play' => 'Google-Play' ),array( 'ln ln-icon-Google-Plus' => 'Google-Plus' ),array( 'ln ln-icon-Google' => 'Google' ),array( 'ln ln-icon-Gopro' => 'Gopro' ),array( 'ln ln-icon-Gorilla' => 'Gorilla' ),array( 'ln ln-icon-Gowalla' => 'Gowalla' ),array( 'ln ln-icon-Grave' => 'Grave' ),array( 'ln ln-icon-Graveyard' => 'Graveyard' ),array( 'ln ln-icon-Greece' => 'Greece' ),array( 'ln ln-icon-Green-Energy' => 'Green-Energy' ),array( 'ln ln-icon-Green-House' => 'Green-House' ),array( 'ln ln-icon-Guitar' => 'Guitar' ),array( 'ln ln-icon-Gun-2' => 'Gun-2' ),array( 'ln ln-icon-Gun-3' => 'Gun-3' ),array( 'ln ln-icon-Gun' => 'Gun' ),array( 'ln ln-icon-Gymnastics' => 'Gymnastics' ),array( 'ln ln-icon-Hair-2' => 'Hair-2' ),array( 'ln ln-icon-Hair-3' => 'Hair-3' ),array( 'ln ln-icon-Hair-4' => 'Hair-4' ),array( 'ln ln-icon-Hair' => 'Hair' ),array( 'ln ln-icon-Half-Moon' => 'Half-Moon' ),array( 'ln ln-icon-Halloween-HalfMoon' => 'Halloween-HalfMoon' ),array( 'ln ln-icon-Halloween-Moon' => 'Halloween-Moon' ),array( 'ln ln-icon-Hamburger' => 'Hamburger' ),array( 'ln ln-icon-Hammer' => 'Hammer' ),array( 'ln ln-icon-Hand-Touch' => 'Hand-Touch' ),array( 'ln ln-icon-Hand-Touch2' => 'Hand-Touch2' ),array( 'ln ln-icon-Hand-TouchSmartphone' => 'Hand-TouchSmartphone' ),array( 'ln ln-icon-Hand' => 'Hand' ),array( 'ln ln-icon-Hands' => 'Hands' ),array( 'ln ln-icon-Handshake' => 'Handshake' ),array( 'ln ln-icon-Hanger' => 'Hanger' ),array( 'ln ln-icon-Happy' => 'Happy' ),array( 'ln ln-icon-Hat-2' => 'Hat-2' ),array( 'ln ln-icon-Hat' => 'Hat' ),array( 'ln ln-icon-Haunted-House' => 'Haunted-House' ),array( 'ln ln-icon-HD-Video' => 'HD-Video' ),array( 'ln ln-icon-HD' => 'HD' ),array( 'ln ln-icon-HDD' => 'HDD' ),array( 'ln ln-icon-Headphone' => 'Headphone' ),array( 'ln ln-icon-Headphones' => 'Headphones' ),array( 'ln ln-icon-Headset' => 'Headset' ),array( 'ln ln-icon-Heart-2' => 'Heart-2' ),array( 'ln ln-icon-Heart' => 'Heart' ),array( 'ln ln-icon-Heels-2' => 'Heels-2' ),array( 'ln ln-icon-Heels' => 'Heels' ),array( 'ln ln-icon-Height-Window' => 'Height-Window' ),array( 'ln ln-icon-Helicopter-2' => 'Helicopter-2' ),array( 'ln ln-icon-Helicopter' => 'Helicopter' ),array( 'ln ln-icon-Helix-2' => 'Helix-2' ),array( 'ln ln-icon-Hello' => 'Hello' ),array( 'ln ln-icon-Helmet-2' => 'Helmet-2' ),array( 'ln ln-icon-Helmet-3' => 'Helmet-3' ),array( 'ln ln-icon-Helmet' => 'Helmet' ),array( 'ln ln-icon-Hipo' => 'Hipo' ),array( 'ln ln-icon-Hipster-Glasses' => 'Hipster-Glasses' ),array( 'ln ln-icon-Hipster-Glasses2' => 'Hipster-Glasses2' ),array( 'ln ln-icon-Hipster-Glasses3' => 'Hipster-Glasses3' ),array( 'ln ln-icon-Hipster-Headphones' => 'Hipster-Headphones' ),array( 'ln ln-icon-Hipster-Men' => 'Hipster-Men' ),array( 'ln ln-icon-Hipster-Men2' => 'Hipster-Men2' ),array( 'ln ln-icon-Hipster-Men3' => 'Hipster-Men3' ),array( 'ln ln-icon-Hipster-Sunglasses' => 'Hipster-Sunglasses' ),array( 'ln ln-icon-Hipster-Sunglasses2' => 'Hipster-Sunglasses2' ),array( 'ln ln-icon-Hipster-Sunglasses3' => 'Hipster-Sunglasses3' ),array( 'ln ln-icon-Hokey' => 'Hokey' ),array( 'ln ln-icon-Holly' => 'Holly' ),array( 'ln ln-icon-Home-2' => 'Home-2' ),array( 'ln ln-icon-Home-3' => 'Home-3' ),array( 'ln ln-icon-Home-4' => 'Home-4' ),array( 'ln ln-icon-Home-5' => 'Home-5' ),array( 'ln ln-icon-Home-Window' => 'Home-Window' ),array( 'ln ln-icon-Home' => 'Home' ),array( 'ln ln-icon-Homosexual' => 'Homosexual' ),array( 'ln ln-icon-Honey' => 'Honey' ),array( 'ln ln-icon-Hong-Kong' => 'Hong-Kong' ),array( 'ln ln-icon-Hoodie' => 'Hoodie' ),array( 'ln ln-icon-Horror' => 'Horror' ),array( 'ln ln-icon-Horse' => 'Horse' ),array( 'ln ln-icon-Hospital-2' => 'Hospital-2' ),array( 'ln ln-icon-Hospital' => 'Hospital' ),array( 'ln ln-icon-Host' => 'Host' ),array( 'ln ln-icon-Hot-Dog' => 'Hot-Dog' ),array( 'ln ln-icon-Hotel' => 'Hotel' ),array( 'ln ln-icon-Hour' => 'Hour' ),array( 'ln ln-icon-Hub' => 'Hub' ),array( 'ln ln-icon-Humor' => 'Humor' ),array( 'ln ln-icon-Hurt' => 'Hurt' ),array( 'ln ln-icon-Ice-Cream' => 'Ice-Cream' ),array( 'ln ln-icon-ICQ' => 'ICQ' ),array( 'ln ln-icon-ID-2' => 'ID-2' ),array( 'ln ln-icon-ID-3' => 'ID-3' ),array( 'ln ln-icon-ID-Card' => 'ID-Card' ),array( 'ln ln-icon-Idea-2' => 'Idea-2' ),array( 'ln ln-icon-Idea-3' => 'Idea-3' ),array( 'ln ln-icon-Idea-4' => 'Idea-4' ),array( 'ln ln-icon-Idea-5' => 'Idea-5' ),array( 'ln ln-icon-Idea' => 'Idea' ),array( 'ln ln-icon-Identification-Badge' => 'Identification-Badge' ),array( 'ln ln-icon-ImDB' => 'ImDB' ),array( 'ln ln-icon-Inbox-Empty' => 'Inbox-Empty' ),array( 'ln ln-icon-Inbox-Forward' => 'Inbox-Forward' ),array( 'ln ln-icon-Inbox-Full' => 'Inbox-Full' ),array( 'ln ln-icon-Inbox-Into' => 'Inbox-Into' ),array( 'ln ln-icon-Inbox-Out' => 'Inbox-Out' ),array( 'ln ln-icon-Inbox-Reply' => 'Inbox-Reply' ),array( 'ln ln-icon-Inbox' => 'Inbox' ),array( 'ln ln-icon-Increase-Inedit' => 'Increase-Inedit' ),array( 'ln ln-icon-Indent-FirstLine' => 'Indent-FirstLine' ),array( 'ln ln-icon-Indent-LeftMargin' => 'Indent-LeftMargin' ),array( 'ln ln-icon-Indent-RightMargin' => 'Indent-RightMargin' ),array( 'ln ln-icon-India' => 'India' ),array( 'ln ln-icon-Info-Window' => 'Info-Window' ),array( 'ln ln-icon-Information' => 'Information' ),array( 'ln ln-icon-Inifity' => 'Inifity' ),array( 'ln ln-icon-Instagram' => 'Instagram' ),array( 'ln ln-icon-Internet-2' => 'Internet-2' ),array( 'ln ln-icon-Internet-Explorer' => 'Internet-Explorer' ),array( 'ln ln-icon-Internet-Smiley' => 'Internet-Smiley' ),array( 'ln ln-icon-Internet' => 'Internet' ),array( 'ln ln-icon-iOS-Apple' => 'iOS-Apple' ),array( 'ln ln-icon-Israel' => 'Israel' ),array( 'ln ln-icon-Italic-Text' => 'Italic-Text' ),array( 'ln ln-icon-Jacket-2' => 'Jacket-2' ),array( 'ln ln-icon-Jacket' => 'Jacket' ),array( 'ln ln-icon-Jamaica' => 'Jamaica' ),array( 'ln ln-icon-Japan' => 'Japan' ),array( 'ln ln-icon-Japanese-Gate' => 'Japanese-Gate' ),array( 'ln ln-icon-Jeans' => 'Jeans' ),array( 'ln ln-icon-Jeep-2' => 'Jeep-2' ),array( 'ln ln-icon-Jeep' => 'Jeep' ),array( 'ln ln-icon-Jet' => 'Jet' ),array( 'ln ln-icon-Joystick' => 'Joystick' ),array( 'ln ln-icon-Juice' => 'Juice' ),array( 'ln ln-icon-Jump-Rope' => 'Jump-Rope' ),array( 'ln ln-icon-Kangoroo' => 'Kangoroo' ),array( 'ln ln-icon-Kenya' => 'Kenya' ),array( 'ln ln-icon-Key-2' => 'Key-2' ),array( 'ln ln-icon-Key-3' => 'Key-3' ),array( 'ln ln-icon-Key-Lock' => 'Key-Lock' ),array( 'ln ln-icon-Key' => 'Key' ),array( 'ln ln-icon-Keyboard' => 'Keyboard' ),array( 'ln ln-icon-Keyboard3' => 'Keyboard3' ),array( 'ln ln-icon-Keypad' => 'Keypad' ),array( 'ln ln-icon-King-2' => 'King-2' ),array( 'ln ln-icon-King' => 'King' ),array( 'ln ln-icon-Kiss' => 'Kiss' ),array( 'ln ln-icon-Knee' => 'Knee' ),array( 'ln ln-icon-Knife-2' => 'Knife-2' ),array( 'ln ln-icon-Knife' => 'Knife' ),array( 'ln ln-icon-Knight' => 'Knight' ),array( 'ln ln-icon-Koala' => 'Koala' ),array( 'ln ln-icon-Korea' => 'Korea' ),array( 'ln ln-icon-Lamp' => 'Lamp' ),array( 'ln ln-icon-Landscape-2' => 'Landscape-2' ),array( 'ln ln-icon-Landscape' => 'Landscape' ),array( 'ln ln-icon-Lantern' => 'Lantern' ),array( 'ln ln-icon-Laptop-2' => 'Laptop-2' ),array( 'ln ln-icon-Laptop-3' => 'Laptop-3' ),array( 'ln ln-icon-Laptop-Phone' => 'Laptop-Phone' ),array( 'ln ln-icon-Laptop-Secure' => 'Laptop-Secure' ),array( 'ln ln-icon-Laptop-Tablet' => 'Laptop-Tablet' ),array( 'ln ln-icon-Laptop' => 'Laptop' ),array( 'ln ln-icon-Laser' => 'Laser' ),array( 'ln ln-icon-Last-FM' => 'Last-FM' ),array( 'ln ln-icon-Last' => 'Last' ),array( 'ln ln-icon-Laughing' => 'Laughing' ),array( 'ln ln-icon-Layer-1635' => 'Layer-1635' ),array( 'ln ln-icon-Layer-1646' => 'Layer-1646' ),array( 'ln ln-icon-Layer-Backward' => 'Layer-Backward' ),array( 'ln ln-icon-Layer-Forward' => 'Layer-Forward' ),array( 'ln ln-icon-Leafs-2' => 'Leafs-2' ),array( 'ln ln-icon-Leafs' => 'Leafs' ),array( 'ln ln-icon-Leaning-Tower' => 'Leaning-Tower' ),array( 'ln ln-icon-Left--Right' => 'Left--Right' ),array( 'ln ln-icon-Left--Right3' => 'Left--Right3' ),array( 'ln ln-icon-Left-2' => 'Left-2' ),array( 'ln ln-icon-Left-3' => 'Left-3' ),array( 'ln ln-icon-Left-4' => 'Left-4' ),array( 'ln ln-icon-Left-ToRight' => 'Left-ToRight' ),array( 'ln ln-icon-Left' => 'Left' ),array( 'ln ln-icon-Leg-2' => 'Leg-2' ),array( 'ln ln-icon-Leg' => 'Leg' ),array( 'ln ln-icon-Lego' => 'Lego' ),array( 'ln ln-icon-Lemon' => 'Lemon' ),array( 'ln ln-icon-Len-2' => 'Len-2' ),array( 'ln ln-icon-Len-3' => 'Len-3' ),array( 'ln ln-icon-Len' => 'Len' ),array( 'ln ln-icon-Leo-2' => 'Leo-2' ),array( 'ln ln-icon-Leo' => 'Leo' ),array( 'ln ln-icon-Leopard' => 'Leopard' ),array( 'ln ln-icon-Lesbian' => 'Lesbian' ),array( 'ln ln-icon-Lesbians' => 'Lesbians' ),array( 'ln ln-icon-Letter-Close' => 'Letter-Close' ),array( 'ln ln-icon-Letter-Open' => 'Letter-Open' ),array( 'ln ln-icon-Letter-Sent' => 'Letter-Sent' ),array( 'ln ln-icon-Libra-2' => 'Libra-2' ),array( 'ln ln-icon-Libra' => 'Libra' ),array( 'ln ln-icon-Library-2' => 'Library-2' ),array( 'ln ln-icon-Library' => 'Library' ),array( 'ln ln-icon-Life-Jacket' => 'Life-Jacket' ),array( 'ln ln-icon-Life-Safer' => 'Life-Safer' ),array( 'ln ln-icon-Light-Bulb' => 'Light-Bulb' ),array( 'ln ln-icon-Light-Bulb2' => 'Light-Bulb2' ),array( 'ln ln-icon-Light-BulbLeaf' => 'Light-BulbLeaf' ),array( 'ln ln-icon-Lighthouse' => 'Lighthouse' ),array( 'ln ln-icon-Like-2' => 'Like-2' ),array( 'ln ln-icon-Like' => 'Like' ),array( 'ln ln-icon-Line-Chart' => 'Line-Chart' ),array( 'ln ln-icon-Line-Chart2' => 'Line-Chart2' ),array( 'ln ln-icon-Line-Chart3' => 'Line-Chart3' ),array( 'ln ln-icon-Line-Chart4' => 'Line-Chart4' ),array( 'ln ln-icon-Line-Spacing' => 'Line-Spacing' ),array( 'ln ln-icon-Line-SpacingText' => 'Line-SpacingText' ),array( 'ln ln-icon-Link-2' => 'Link-2' ),array( 'ln ln-icon-Link' => 'Link' ),array( 'ln ln-icon-Linkedin-2' => 'Linkedin-2' ),array( 'ln ln-icon-Linkedin' => 'Linkedin' ),array( 'ln ln-icon-Linux' => 'Linux' ),array( 'ln ln-icon-Lion' => 'Lion' ),array( 'ln ln-icon-Livejournal' => 'Livejournal' ),array( 'ln ln-icon-Loading-2' => 'Loading-2' ),array( 'ln ln-icon-Loading-3' => 'Loading-3' ),array( 'ln ln-icon-Loading-Window' => 'Loading-Window' ),array( 'ln ln-icon-Loading' => 'Loading' ),array( 'ln ln-icon-Location-2' => 'Location-2' ),array( 'ln ln-icon-Location' => 'Location' ),array( 'ln ln-icon-Lock-2' => 'Lock-2' ),array( 'ln ln-icon-Lock-3' => 'Lock-3' ),array( 'ln ln-icon-Lock-User' => 'Lock-User' ),array( 'ln ln-icon-Lock-Window' => 'Lock-Window' ),array( 'ln ln-icon-Lock' => 'Lock' ),array( 'ln ln-icon-Lollipop-2' => 'Lollipop-2' ),array( 'ln ln-icon-Lollipop-3' => 'Lollipop-3' ),array( 'ln ln-icon-Lollipop' => 'Lollipop' ),array( 'ln ln-icon-Loop' => 'Loop' ),array( 'ln ln-icon-Loud' => 'Loud' ),array( 'ln ln-icon-Loudspeaker' => 'Loudspeaker' ),array( 'ln ln-icon-Love-2' => 'Love-2' ),array( 'ln ln-icon-Love-User' => 'Love-User' ),array( 'ln ln-icon-Love-Window' => 'Love-Window' ),array( 'ln ln-icon-Love' => 'Love' ),array( 'ln ln-icon-Lowercase-Text' => 'Lowercase-Text' ),array( 'ln ln-icon-Luggafe-Front' => 'Luggafe-Front' ),array( 'ln ln-icon-Luggage-2' => 'Luggage-2' ),array( 'ln ln-icon-Macro' => 'Macro' ),array( 'ln ln-icon-Magic-Wand' => 'Magic-Wand' ),array( 'ln ln-icon-Magnet' => 'Magnet' ),array( 'ln ln-icon-Magnifi-Glass-' => 'Magnifi-Glass-' ),array( 'ln ln-icon-Magnifi-Glass' => 'Magnifi-Glass' ),array( 'ln ln-icon-Magnifi-Glass2' => 'Magnifi-Glass2' ),array( 'ln ln-icon-Mail-2' => 'Mail-2' ),array( 'ln ln-icon-Mail-3' => 'Mail-3' ),array( 'ln ln-icon-Mail-Add' => 'Mail-Add' ),array( 'ln ln-icon-Mail-Attachement' => 'Mail-Attachement' ),array( 'ln ln-icon-Mail-Block' => 'Mail-Block' ),array( 'ln ln-icon-Mail-Delete' => 'Mail-Delete' ),array( 'ln ln-icon-Mail-Favorite' => 'Mail-Favorite' ),array( 'ln ln-icon-Mail-Forward' => 'Mail-Forward' ),array( 'ln ln-icon-Mail-Gallery' => 'Mail-Gallery' ),array( 'ln ln-icon-Mail-Inbox' => 'Mail-Inbox' ),array( 'ln ln-icon-Mail-Link' => 'Mail-Link' ),array( 'ln ln-icon-Mail-Lock' => 'Mail-Lock' ),array( 'ln ln-icon-Mail-Love' => 'Mail-Love' ),array( 'ln ln-icon-Mail-Money' => 'Mail-Money' ),array( 'ln ln-icon-Mail-Open' => 'Mail-Open' ),array( 'ln ln-icon-Mail-Outbox' => 'Mail-Outbox' ),array( 'ln ln-icon-Mail-Password' => 'Mail-Password' ),array( 'ln ln-icon-Mail-Photo' => 'Mail-Photo' ),array( 'ln ln-icon-Mail-Read' => 'Mail-Read' ),array( 'ln ln-icon-Mail-Removex' => 'Mail-Removex' ),array( 'ln ln-icon-Mail-Reply' => 'Mail-Reply' ),array( 'ln ln-icon-Mail-ReplyAll' => 'Mail-ReplyAll' ),array( 'ln ln-icon-Mail-Search' => 'Mail-Search' ),array( 'ln ln-icon-Mail-Send' => 'Mail-Send' ),array( 'ln ln-icon-Mail-Settings' => 'Mail-Settings' ),array( 'ln ln-icon-Mail-Unread' => 'Mail-Unread' ),array( 'ln ln-icon-Mail-Video' => 'Mail-Video' ),array( 'ln ln-icon-Mail-withAtSign' => 'Mail-withAtSign' ),array( 'ln ln-icon-Mail-WithCursors' => 'Mail-WithCursors' ),array( 'ln ln-icon-Mail' => 'Mail' ),array( 'ln ln-icon-Mailbox-Empty' => 'Mailbox-Empty' ),array( 'ln ln-icon-Mailbox-Full' => 'Mailbox-Full' ),array( 'ln ln-icon-Male-2' => 'Male-2' ),array( 'ln ln-icon-Male-Sign' => 'Male-Sign' ),array( 'ln ln-icon-Male' => 'Male' ),array( 'ln ln-icon-MaleFemale' => 'MaleFemale' ),array( 'ln ln-icon-Man-Sign' => 'Man-Sign' ),array( 'ln ln-icon-Management' => 'Management' ),array( 'ln ln-icon-Mans-Underwear' => 'Mans-Underwear' ),array( 'ln ln-icon-Mans-Underwear2' => 'Mans-Underwear2' ),array( 'ln ln-icon-Map-Marker' => 'Map-Marker' ),array( 'ln ln-icon-Map-Marker2' => 'Map-Marker2' ),array( 'ln ln-icon-Map-Marker3' => 'Map-Marker3' ),array( 'ln ln-icon-Map' => 'Map' ),array( 'ln ln-icon-Map2' => 'Map2' ),array( 'ln ln-icon-Marker-2' => 'Marker-2' ),array( 'ln ln-icon-Marker-3' => 'Marker-3' ),array( 'ln ln-icon-Marker' => 'Marker' ),array( 'ln ln-icon-Martini-Glass' => 'Martini-Glass' ),array( 'ln ln-icon-Mask' => 'Mask' ),array( 'ln ln-icon-Master-Card' => 'Master-Card' ),array( 'ln ln-icon-Maximize-Window' => 'Maximize-Window' ),array( 'ln ln-icon-Maximize' => 'Maximize' ),array( 'ln ln-icon-Medal-2' => 'Medal-2' ),array( 'ln ln-icon-Medal-3' => 'Medal-3' ),array( 'ln ln-icon-Medal' => 'Medal' ),array( 'ln ln-icon-Medical-Sign' => 'Medical-Sign' ),array( 'ln ln-icon-Medicine-2' => 'Medicine-2' ),array( 'ln ln-icon-Medicine-3' => 'Medicine-3' ),array( 'ln ln-icon-Medicine' => 'Medicine' ),array( 'ln ln-icon-Megaphone' => 'Megaphone' ),array( 'ln ln-icon-Memory-Card' => 'Memory-Card' ),array( 'ln ln-icon-Memory-Card2' => 'Memory-Card2' ),array( 'ln ln-icon-Memory-Card3' => 'Memory-Card3' ),array( 'ln ln-icon-Men' => 'Men' ),array( 'ln ln-icon-Menorah' => 'Menorah' ),array( 'ln ln-icon-Mens' => 'Mens' ),array( 'ln ln-icon-Metacafe' => 'Metacafe' ),array( 'ln ln-icon-Mexico' => 'Mexico' ),array( 'ln ln-icon-Mic' => 'Mic' ),array( 'ln ln-icon-Microphone-2' => 'Microphone-2' ),array( 'ln ln-icon-Microphone-3' => 'Microphone-3' ),array( 'ln ln-icon-Microphone-4' => 'Microphone-4' ),array( 'ln ln-icon-Microphone-5' => 'Microphone-5' ),array( 'ln ln-icon-Microphone-6' => 'Microphone-6' ),array( 'ln ln-icon-Microphone-7' => 'Microphone-7' ),array( 'ln ln-icon-Microphone' => 'Microphone' ),array( 'ln ln-icon-Microscope' => 'Microscope' ),array( 'ln ln-icon-Milk-Bottle' => 'Milk-Bottle' ),array( 'ln ln-icon-Mine' => 'Mine' ),array( 'ln ln-icon-Minimize-Maximize-Close-Window' => 'Minimize-Maximize-Close-Window' ),array( 'ln ln-icon-Minimize-Window' => 'Minimize-Window' ),array( 'ln ln-icon-Minimize' => 'Minimize' ),array( 'ln ln-icon-Mirror' => 'Mirror' ),array( 'ln ln-icon-Mixer' => 'Mixer' ),array( 'ln ln-icon-Mixx' => 'Mixx' ),array( 'ln ln-icon-Money-2' => 'Money-2' ),array( 'ln ln-icon-Money-Bag' => 'Money-Bag' ),array( 'ln ln-icon-Money-Smiley' => 'Money-Smiley' ),array( 'ln ln-icon-Money' => 'Money' ),array( 'ln ln-icon-Monitor-2' => 'Monitor-2' ),array( 'ln ln-icon-Monitor-3' => 'Monitor-3' ),array( 'ln ln-icon-Monitor-4' => 'Monitor-4' ),array( 'ln ln-icon-Monitor-5' => 'Monitor-5' ),array( 'ln ln-icon-Monitor-Analytics' => 'Monitor-Analytics' ),array( 'ln ln-icon-Monitor-Laptop' => 'Monitor-Laptop' ),array( 'ln ln-icon-Monitor-phone' => 'Monitor-phone' ),array( 'ln ln-icon-Monitor-Tablet' => 'Monitor-Tablet' ),array( 'ln ln-icon-Monitor-Vertical' => 'Monitor-Vertical' ),array( 'ln ln-icon-Monitor' => 'Monitor' ),array( 'ln ln-icon-Monitoring' => 'Monitoring' ),array( 'ln ln-icon-Monkey' => 'Monkey' ),array( 'ln ln-icon-Monster' => 'Monster' ),array( 'ln ln-icon-Morocco' => 'Morocco' ),array( 'ln ln-icon-Motorcycle' => 'Motorcycle' ),array( 'ln ln-icon-Mouse-2' => 'Mouse-2' ),array( 'ln ln-icon-Mouse-3' => 'Mouse-3' ),array( 'ln ln-icon-Mouse-4' => 'Mouse-4' ),array( 'ln ln-icon-Mouse-Pointer' => 'Mouse-Pointer' ),array( 'ln ln-icon-Mouse' => 'Mouse' ),array( 'ln ln-icon-Moustache-Smiley' => 'Moustache-Smiley' ),array( 'ln ln-icon-Movie-Ticket' => 'Movie-Ticket' ),array( 'ln ln-icon-Movie' => 'Movie' ),array( 'ln ln-icon-Mp3-File' => 'Mp3-File' ),array( 'ln ln-icon-Museum' => 'Museum' ),array( 'ln ln-icon-Mushroom' => 'Mushroom' ),array( 'ln ln-icon-Music-Note' => 'Music-Note' ),array( 'ln ln-icon-Music-Note2' => 'Music-Note2' ),array( 'ln ln-icon-Music-Note3' => 'Music-Note3' ),array( 'ln ln-icon-Music-Note4' => 'Music-Note4' ),array( 'ln ln-icon-Music-Player' => 'Music-Player' ),array( 'ln ln-icon-Mustache-2' => 'Mustache-2' ),array( 'ln ln-icon-Mustache-3' => 'Mustache-3' ),array( 'ln ln-icon-Mustache-4' => 'Mustache-4' ),array( 'ln ln-icon-Mustache-5' => 'Mustache-5' ),array( 'ln ln-icon-Mustache-6' => 'Mustache-6' ),array( 'ln ln-icon-Mustache-7' => 'Mustache-7' ),array( 'ln ln-icon-Mustache-8' => 'Mustache-8' ),array( 'ln ln-icon-Mustache' => 'Mustache' ),array( 'ln ln-icon-Mute' => 'Mute' ),array( 'ln ln-icon-Myspace' => 'Myspace' ),array( 'ln ln-icon-Navigat-Start' => 'Navigat-Start' ),array( 'ln ln-icon-Navigate-End' => 'Navigate-End' ),array( 'ln ln-icon-Navigation-LeftWindow' => 'Navigation-LeftWindow' ),array( 'ln ln-icon-Navigation-RightWindow' => 'Navigation-RightWindow' ),array( 'ln ln-icon-Nepal' => 'Nepal' ),array( 'ln ln-icon-Netscape' => 'Netscape' ),array( 'ln ln-icon-Network-Window' => 'Network-Window' ),array( 'ln ln-icon-Network' => 'Network' ),array( 'ln ln-icon-Neutron' => 'Neutron' ),array( 'ln ln-icon-New-Mail' => 'New-Mail' ),array( 'ln ln-icon-New-Tab' => 'New-Tab' ),array( 'ln ln-icon-Newspaper-2' => 'Newspaper-2' ),array( 'ln ln-icon-Newspaper' => 'Newspaper' ),array( 'ln ln-icon-Newsvine' => 'Newsvine' ),array( 'ln ln-icon-Next2' => 'Next2' ),array( 'ln ln-icon-Next-3' => 'Next-3' ),array( 'ln ln-icon-Next-Music' => 'Next-Music' ),array( 'ln ln-icon-Next' => 'Next' ),array( 'ln ln-icon-No-Battery' => 'No-Battery' ),array( 'ln ln-icon-No-Drop' => 'No-Drop' ),array( 'ln ln-icon-No-Flash' => 'No-Flash' ),array( 'ln ln-icon-No-Smoking' => 'No-Smoking' ),array( 'ln ln-icon-Noose' => 'Noose' ),array( 'ln ln-icon-Normal-Text' => 'Normal-Text' ),array( 'ln ln-icon-Note' => 'Note' ),array( 'ln ln-icon-Notepad-2' => 'Notepad-2' ),array( 'ln ln-icon-Notepad' => 'Notepad' ),array( 'ln ln-icon-Nuclear' => 'Nuclear' ),array( 'ln ln-icon-Numbering-List' => 'Numbering-List' ),array( 'ln ln-icon-Nurse' => 'Nurse' ),array( 'ln ln-icon-Office-Lamp' => 'Office-Lamp' ),array( 'ln ln-icon-Office' => 'Office' ),array( 'ln ln-icon-Oil' => 'Oil' ),array( 'ln ln-icon-Old-Camera' => 'Old-Camera' ),array( 'ln ln-icon-Old-Cassette' => 'Old-Cassette' ),array( 'ln ln-icon-Old-Clock' => 'Old-Clock' ),array( 'ln ln-icon-Old-Radio' => 'Old-Radio' ),array( 'ln ln-icon-Old-Sticky' => 'Old-Sticky' ),array( 'ln ln-icon-Old-Sticky2' => 'Old-Sticky2' ),array( 'ln ln-icon-Old-Telephone' => 'Old-Telephone' ),array( 'ln ln-icon-Old-TV' => 'Old-TV' ),array( 'ln ln-icon-On-Air' => 'On-Air' ),array( 'ln ln-icon-On-Off-2' => 'On-Off-2' ),array( 'ln ln-icon-On-Off-3' => 'On-Off-3' ),array( 'ln ln-icon-On-off' => 'On-off' ),array( 'ln ln-icon-One-Finger' => 'One-Finger' ),array( 'ln ln-icon-One-FingerTouch' => 'One-FingerTouch' ),array( 'ln ln-icon-One-Window' => 'One-Window' ),array( 'ln ln-icon-Open-Banana' => 'Open-Banana' ),array( 'ln ln-icon-Open-Book' => 'Open-Book' ),array( 'ln ln-icon-Opera-House' => 'Opera-House' ),array( 'ln ln-icon-Opera' => 'Opera' ),array( 'ln ln-icon-Optimization' => 'Optimization' ),array( 'ln ln-icon-Orientation-2' => 'Orientation-2' ),array( 'ln ln-icon-Orientation-3' => 'Orientation-3' ),array( 'ln ln-icon-Orientation' => 'Orientation' ),array( 'ln ln-icon-Orkut' => 'Orkut' ),array( 'ln ln-icon-Ornament' => 'Ornament' ),array( 'ln ln-icon-Over-Time' => 'Over-Time' ),array( 'ln ln-icon-Over-Time2' => 'Over-Time2' ),array( 'ln ln-icon-Owl' => 'Owl' ),array( 'ln ln-icon-Pac-Man' => 'Pac-Man' ),array( 'ln ln-icon-Paint-Brush' => 'Paint-Brush' ),array( 'ln ln-icon-Paint-Bucket' => 'Paint-Bucket' ),array( 'ln ln-icon-Paintbrush' => 'Paintbrush' ),array( 'ln ln-icon-Palette' => 'Palette' ),array( 'ln ln-icon-Palm-Tree' => 'Palm-Tree' ),array( 'ln ln-icon-Panda' => 'Panda' ),array( 'ln ln-icon-Panorama' => 'Panorama' ),array( 'ln ln-icon-Pantheon' => 'Pantheon' ),array( 'ln ln-icon-Pantone' => 'Pantone' ),array( 'ln ln-icon-Pants' => 'Pants' ),array( 'ln ln-icon-Paper-Plane' => 'Paper-Plane' ),array( 'ln ln-icon-Paper' => 'Paper' ),array( 'ln ln-icon-Parasailing' => 'Parasailing' ),array( 'ln ln-icon-Parrot' => 'Parrot' ),array( 'ln ln-icon-Password-2shopping' => 'Password-2shopping' ),array( 'ln ln-icon-Password-Field' => 'Password-Field' ),array( 'ln ln-icon-Password-shopping' => 'Password-shopping' ),array( 'ln ln-icon-Password' => 'Password' ),array( 'ln ln-icon-pause-2' => 'pause-2' ),array( 'ln ln-icon-Pause' => 'Pause' ),array( 'ln ln-icon-Paw' => 'Paw' ),array( 'ln ln-icon-Pawn' => 'Pawn' ),array( 'ln ln-icon-Paypal' => 'Paypal' ),array( 'ln ln-icon-Pen-2' => 'Pen-2' ),array( 'ln ln-icon-Pen-3' => 'Pen-3' ),array( 'ln ln-icon-Pen-4' => 'Pen-4' ),array( 'ln ln-icon-Pen-5' => 'Pen-5' ),array( 'ln ln-icon-Pen-6' => 'Pen-6' ),array( 'ln ln-icon-Pen' => 'Pen' ),array( 'ln ln-icon-Pencil-Ruler' => 'Pencil-Ruler' ),array( 'ln ln-icon-Pencil' => 'Pencil' ),array( 'ln ln-icon-Penguin' => 'Penguin' ),array( 'ln ln-icon-Pentagon' => 'Pentagon' ),array( 'ln ln-icon-People-onCloud' => 'People-onCloud' ),array( 'ln ln-icon-Pepper-withFire' => 'Pepper-withFire' ),array( 'ln ln-icon-Pepper' => 'Pepper' ),array( 'ln ln-icon-Petrol' => 'Petrol' ),array( 'ln ln-icon-Petronas-Tower' => 'Petronas-Tower' ),array( 'ln ln-icon-Philipines' => 'Philipines' ),array( 'ln ln-icon-Phone-2' => 'Phone-2' ),array( 'ln ln-icon-Phone-3' => 'Phone-3' ),array( 'ln ln-icon-Phone-3G' => 'Phone-3G' ),array( 'ln ln-icon-Phone-4G' => 'Phone-4G' ),array( 'ln ln-icon-Phone-Simcard' => 'Phone-Simcard' ),array( 'ln ln-icon-Phone-SMS' => 'Phone-SMS' ),array( 'ln ln-icon-Phone-Wifi' => 'Phone-Wifi' ),array( 'ln ln-icon-Phone' => 'Phone' ),array( 'ln ln-icon-Photo-2' => 'Photo-2' ),array( 'ln ln-icon-Photo-3' => 'Photo-3' ),array( 'ln ln-icon-Photo-Album' => 'Photo-Album' ),array( 'ln ln-icon-Photo-Album2' => 'Photo-Album2' ),array( 'ln ln-icon-Photo-Album3' => 'Photo-Album3' ),array( 'ln ln-icon-Photo' => 'Photo' ),array( 'ln ln-icon-Photos' => 'Photos' ),array( 'ln ln-icon-Physics' => 'Physics' ),array( 'ln ln-icon-Pi' => 'Pi' ),array( 'ln ln-icon-Piano' => 'Piano' ),array( 'ln ln-icon-Picasa' => 'Picasa' ),array( 'ln ln-icon-Pie-Chart' => 'Pie-Chart' ),array( 'ln ln-icon-Pie-Chart2' => 'Pie-Chart2' ),array( 'ln ln-icon-Pie-Chart3' => 'Pie-Chart3' ),array( 'ln ln-icon-Pilates-2' => 'Pilates-2' ),array( 'ln ln-icon-Pilates-3' => 'Pilates-3' ),array( 'ln ln-icon-Pilates' => 'Pilates' ),array( 'ln ln-icon-Pilot' => 'Pilot' ),array( 'ln ln-icon-Pinch' => 'Pinch' ),array( 'ln ln-icon-Ping-Pong' => 'Ping-Pong' ),array( 'ln ln-icon-Pinterest' => 'Pinterest' ),array( 'ln ln-icon-Pipe' => 'Pipe' ),array( 'ln ln-icon-Pipette' => 'Pipette' ),array( 'ln ln-icon-Piramids' => 'Piramids' ),array( 'ln ln-icon-Pisces-2' => 'Pisces-2' ),array( 'ln ln-icon-Pisces' => 'Pisces' ),array( 'ln ln-icon-Pizza-Slice' => 'Pizza-Slice' ),array( 'ln ln-icon-Pizza' => 'Pizza' ),array( 'ln ln-icon-Plane-2' => 'Plane-2' ),array( 'ln ln-icon-Plane' => 'Plane' ),array( 'ln ln-icon-Plant' => 'Plant' ),array( 'ln ln-icon-Plasmid' => 'Plasmid' ),array( 'ln ln-icon-Plaster' => 'Plaster' ),array( 'ln ln-icon-Plastic-CupPhone' => 'Plastic-CupPhone' ),array( 'ln ln-icon-Plastic-CupPhone2' => 'Plastic-CupPhone2' ),array( 'ln ln-icon-Plate' => 'Plate' ),array( 'ln ln-icon-Plates' => 'Plates' ),array( 'ln ln-icon-Plaxo' => 'Plaxo' ),array( 'ln ln-icon-Play-Music' => 'Play-Music' ),array( 'ln ln-icon-Plug-In' => 'Plug-In' ),array( 'ln ln-icon-Plug-In2' => 'Plug-In2' ),array( 'ln ln-icon-Plurk' => 'Plurk' ),array( 'ln ln-icon-Pointer' => 'Pointer' ),array( 'ln ln-icon-Poland' => 'Poland' ),array( 'ln ln-icon-Police-Man' => 'Police-Man' ),array( 'ln ln-icon-Police-Station' => 'Police-Station' ),array( 'ln ln-icon-Police-Woman' => 'Police-Woman' ),array( 'ln ln-icon-Police' => 'Police' ),array( 'ln ln-icon-Polo-Shirt' => 'Polo-Shirt' ),array( 'ln ln-icon-Portrait' => 'Portrait' ),array( 'ln ln-icon-Portugal' => 'Portugal' ),array( 'ln ln-icon-Post-Mail' => 'Post-Mail' ),array( 'ln ln-icon-Post-Mail2' => 'Post-Mail2' ),array( 'ln ln-icon-Post-Office' => 'Post-Office' ),array( 'ln ln-icon-Post-Sign' => 'Post-Sign' ),array( 'ln ln-icon-Post-Sign2ways' => 'Post-Sign2ways' ),array( 'ln ln-icon-Posterous' => 'Posterous' ),array( 'ln ln-icon-Pound-Sign' => 'Pound-Sign' ),array( 'ln ln-icon-Pound-Sign2' => 'Pound-Sign2' ),array( 'ln ln-icon-Pound' => 'Pound' ),array( 'ln ln-icon-Power-2' => 'Power-2' ),array( 'ln ln-icon-Power-3' => 'Power-3' ),array( 'ln ln-icon-Power-Cable' => 'Power-Cable' ),array( 'ln ln-icon-Power-Station' => 'Power-Station' ),array( 'ln ln-icon-Power' => 'Power' ),array( 'ln ln-icon-Prater' => 'Prater' ),array( 'ln ln-icon-Present' => 'Present' ),array( 'ln ln-icon-Presents' => 'Presents' ),array( 'ln ln-icon-Press' => 'Press' ),array( 'ln ln-icon-Preview' => 'Preview' ),array( 'ln ln-icon-Previous' => 'Previous' ),array( 'ln ln-icon-Pricing' => 'Pricing' ),array( 'ln ln-icon-Printer' => 'Printer' ),array( 'ln ln-icon-Professor' => 'Professor' ),array( 'ln ln-icon-Profile' => 'Profile' ),array( 'ln ln-icon-Project' => 'Project' ),array( 'ln ln-icon-Projector-2' => 'Projector-2' ),array( 'ln ln-icon-Projector' => 'Projector' ),array( 'ln ln-icon-Pulse' => 'Pulse' ),array( 'ln ln-icon-Pumpkin' => 'Pumpkin' ),array( 'ln ln-icon-Punk' => 'Punk' ),array( 'ln ln-icon-Punker' => 'Punker' ),array( 'ln ln-icon-Puzzle' => 'Puzzle' ),array( 'ln ln-icon-QIK' => 'QIK' ),array( 'ln ln-icon-QR-Code' => 'QR-Code' ),array( 'ln ln-icon-Queen-2' => 'Queen-2' ),array( 'ln ln-icon-Queen' => 'Queen' ),array( 'ln ln-icon-Quill-2' => 'Quill-2' ),array( 'ln ln-icon-Quill-3' => 'Quill-3' ),array( 'ln ln-icon-Quill' => 'Quill' ),array( 'ln ln-icon-Quotes-2' => 'Quotes-2' ),array( 'ln ln-icon-Quotes' => 'Quotes' ),array( 'ln ln-icon-Radio' => 'Radio' ),array( 'ln ln-icon-Radioactive' => 'Radioactive' ),array( 'ln ln-icon-Rafting' => 'Rafting' ),array( 'ln ln-icon-Rain-Drop' => 'Rain-Drop' ),array( 'ln ln-icon-Rainbow-2' => 'Rainbow-2' ),array( 'ln ln-icon-Rainbow' => 'Rainbow' ),array( 'ln ln-icon-Ram' => 'Ram' ),array( 'ln ln-icon-Razzor-Blade' => 'Razzor-Blade' ),array( 'ln ln-icon-Receipt-2' => 'Receipt-2' ),array( 'ln ln-icon-Receipt-3' => 'Receipt-3' ),array( 'ln ln-icon-Receipt-4' => 'Receipt-4' ),array( 'ln ln-icon-Receipt' => 'Receipt' ),array( 'ln ln-icon-Record2' => 'Record2' ),array( 'ln ln-icon-Record-3' => 'Record-3' ),array( 'ln ln-icon-Record-Music' => 'Record-Music' ),array( 'ln ln-icon-Record' => 'Record' ),array( 'ln ln-icon-Recycling-2' => 'Recycling-2' ),array( 'ln ln-icon-Recycling' => 'Recycling' ),array( 'ln ln-icon-Reddit' => 'Reddit' ),array( 'ln ln-icon-Redhat' => 'Redhat' ),array( 'ln ln-icon-Redirect' => 'Redirect' ),array( 'ln ln-icon-Redo' => 'Redo' ),array( 'ln ln-icon-Reel' => 'Reel' ),array( 'ln ln-icon-Refinery' => 'Refinery' ),array( 'ln ln-icon-Refresh-Window' => 'Refresh-Window' ),array( 'ln ln-icon-Refresh' => 'Refresh' ),array( 'ln ln-icon-Reload-2' => 'Reload-2' ),array( 'ln ln-icon-Reload-3' => 'Reload-3' ),array( 'ln ln-icon-Reload' => 'Reload' ),array( 'ln ln-icon-Remote-Controll' => 'Remote-Controll' ),array( 'ln ln-icon-Remote-Controll2' => 'Remote-Controll2' ),array( 'ln ln-icon-Remove-Bag' => 'Remove-Bag' ),array( 'ln ln-icon-Remove-Basket' => 'Remove-Basket' ),array( 'ln ln-icon-Remove-Cart' => 'Remove-Cart' ),array( 'ln ln-icon-Remove-File' => 'Remove-File' ),array( 'ln ln-icon-Remove-User' => 'Remove-User' ),array( 'ln ln-icon-Remove-Window' => 'Remove-Window' ),array( 'ln ln-icon-Remove' => 'Remove' ),array( 'ln ln-icon-Rename' => 'Rename' ),array( 'ln ln-icon-Repair' => 'Repair' ),array( 'ln ln-icon-Repeat-2' => 'Repeat-2' ),array( 'ln ln-icon-Repeat-3' => 'Repeat-3' ),array( 'ln ln-icon-Repeat-4' => 'Repeat-4' ),array( 'ln ln-icon-Repeat-5' => 'Repeat-5' ),array( 'ln ln-icon-Repeat-6' => 'Repeat-6' ),array( 'ln ln-icon-Repeat-7' => 'Repeat-7' ),array( 'ln ln-icon-Repeat' => 'Repeat' ),array( 'ln ln-icon-Reset' => 'Reset' ),array( 'ln ln-icon-Resize' => 'Resize' ),array( 'ln ln-icon-Restore-Window' => 'Restore-Window' ),array( 'ln ln-icon-Retouching' => 'Retouching' ),array( 'ln ln-icon-Retro-Camera' => 'Retro-Camera' ),array( 'ln ln-icon-Retro' => 'Retro' ),array( 'ln ln-icon-Retweet' => 'Retweet' ),array( 'ln ln-icon-Reverbnation' => 'Reverbnation' ),array( 'ln ln-icon-Rewind' => 'Rewind' ),array( 'ln ln-icon-RGB' => 'RGB' ),array( 'ln ln-icon-Ribbon-2' => 'Ribbon-2' ),array( 'ln ln-icon-Ribbon-3' => 'Ribbon-3' ),array( 'ln ln-icon-Ribbon' => 'Ribbon' ),array( 'ln ln-icon-Right-2' => 'Right-2' ),array( 'ln ln-icon-Right-3' => 'Right-3' ),array( 'ln ln-icon-Right-4' => 'Right-4' ),array( 'ln ln-icon-Right-ToLeft' => 'Right-ToLeft' ),array( 'ln ln-icon-Right' => 'Right' ),array( 'ln ln-icon-Road-2' => 'Road-2' ),array( 'ln ln-icon-Road-3' => 'Road-3' ),array( 'ln ln-icon-Road' => 'Road' ),array( 'ln ln-icon-Robot-2' => 'Robot-2' ),array( 'ln ln-icon-Robot' => 'Robot' ),array( 'ln ln-icon-Rock-andRoll' => 'Rock-andRoll' ),array( 'ln ln-icon-Rocket' => 'Rocket' ),array( 'ln ln-icon-Roller' => 'Roller' ),array( 'ln ln-icon-Roof' => 'Roof' ),array( 'ln ln-icon-Rook' => 'Rook' ),array( 'ln ln-icon-Rotate-Gesture' => 'Rotate-Gesture' ),array( 'ln ln-icon-Rotate-Gesture2' => 'Rotate-Gesture2' ),array( 'ln ln-icon-Rotate-Gesture3' => 'Rotate-Gesture3' ),array( 'ln ln-icon-Rotation-390' => 'Rotation-390' ),array( 'ln ln-icon-Rotation' => 'Rotation' ),array( 'ln ln-icon-Router-2' => 'Router-2' ),array( 'ln ln-icon-Router' => 'Router' ),array( 'ln ln-icon-RSS' => 'RSS' ),array( 'ln ln-icon-Ruler-2' => 'Ruler-2' ),array( 'ln ln-icon-Ruler' => 'Ruler' ),array( 'ln ln-icon-Running-Shoes' => 'Running-Shoes' ),array( 'ln ln-icon-Running' => 'Running' ),array( 'ln ln-icon-Safari' => 'Safari' ),array( 'ln ln-icon-Safe-Box' => 'Safe-Box' ),array( 'ln ln-icon-Safe-Box2' => 'Safe-Box2' ),array( 'ln ln-icon-Safety-PinClose' => 'Safety-PinClose' ),array( 'ln ln-icon-Safety-PinOpen' => 'Safety-PinOpen' ),array( 'ln ln-icon-Sagittarus-2' => 'Sagittarus-2' ),array( 'ln ln-icon-Sagittarus' => 'Sagittarus' ),array( 'ln ln-icon-Sailing-Ship' => 'Sailing-Ship' ),array( 'ln ln-icon-Sand-watch' => 'Sand-watch' ),array( 'ln ln-icon-Sand-watch2' => 'Sand-watch2' ),array( 'ln ln-icon-Santa-Claus' => 'Santa-Claus' ),array( 'ln ln-icon-Santa-Claus2' => 'Santa-Claus2' ),array( 'ln ln-icon-Santa-onSled' => 'Santa-onSled' ),array( 'ln ln-icon-Satelite-2' => 'Satelite-2' ),array( 'ln ln-icon-Satelite' => 'Satelite' ),array( 'ln ln-icon-Save-Window' => 'Save-Window' ),array( 'ln ln-icon-Save' => 'Save' ),array( 'ln ln-icon-Saw' => 'Saw' ),array( 'ln ln-icon-Saxophone' => 'Saxophone' ),array( 'ln ln-icon-Scale' => 'Scale' ),array( 'ln ln-icon-Scarf' => 'Scarf' ),array( 'ln ln-icon-Scissor' => 'Scissor' ),array( 'ln ln-icon-Scooter-Front' => 'Scooter-Front' ),array( 'ln ln-icon-Scooter' => 'Scooter' ),array( 'ln ln-icon-Scorpio-2' => 'Scorpio-2' ),array( 'ln ln-icon-Scorpio' => 'Scorpio' ),array( 'ln ln-icon-Scotland' => 'Scotland' ),array( 'ln ln-icon-Screwdriver' => 'Screwdriver' ),array( 'ln ln-icon-Scroll-Fast' => 'Scroll-Fast' ),array( 'ln ln-icon-Scroll' => 'Scroll' ),array( 'ln ln-icon-Scroller-2' => 'Scroller-2' ),array( 'ln ln-icon-Scroller' => 'Scroller' ),array( 'ln ln-icon-Sea-Dog' => 'Sea-Dog' ),array( 'ln ln-icon-Search-onCloud' => 'Search-onCloud' ),array( 'ln ln-icon-Search-People' => 'Search-People' ),array( 'ln ln-icon-secound' => 'secound' ),array( 'ln ln-icon-secound2' => 'secound2' ),array( 'ln ln-icon-Security-Block' => 'Security-Block' ),array( 'ln ln-icon-Security-Bug' => 'Security-Bug' ),array( 'ln ln-icon-Security-Camera' => 'Security-Camera' ),array( 'ln ln-icon-Security-Check' => 'Security-Check' ),array( 'ln ln-icon-Security-Settings' => 'Security-Settings' ),array( 'ln ln-icon-Security-Smiley' => 'Security-Smiley' ),array( 'ln ln-icon-Securiy-Remove' => 'Securiy-Remove' ),array( 'ln ln-icon-Seed' => 'Seed' ),array( 'ln ln-icon-Selfie' => 'Selfie' ),array( 'ln ln-icon-Serbia' => 'Serbia' ),array( 'ln ln-icon-Server-2' => 'Server-2' ),array( 'ln ln-icon-Server' => 'Server' ),array( 'ln ln-icon-Servers' => 'Servers' ),array( 'ln ln-icon-Settings-Window' => 'Settings-Window' ),array( 'ln ln-icon-Sewing-Machine' => 'Sewing-Machine' ),array( 'ln ln-icon-Sexual' => 'Sexual' ),array( 'ln ln-icon-Share-onCloud' => 'Share-onCloud' ),array( 'ln ln-icon-Share-Window' => 'Share-Window' ),array( 'ln ln-icon-Share' => 'Share' ),array( 'ln ln-icon-Sharethis' => 'Sharethis' ),array( 'ln ln-icon-Shark' => 'Shark' ),array( 'ln ln-icon-Sheep' => 'Sheep' ),array( 'ln ln-icon-Sheriff-Badge' => 'Sheriff-Badge' ),array( 'ln ln-icon-Shield' => 'Shield' ),array( 'ln ln-icon-Ship-2' => 'Ship-2' ),array( 'ln ln-icon-Ship' => 'Ship' ),array( 'ln ln-icon-Shirt' => 'Shirt' ),array( 'ln ln-icon-Shoes-2' => 'Shoes-2' ),array( 'ln ln-icon-Shoes-3' => 'Shoes-3' ),array( 'ln ln-icon-Shoes' => 'Shoes' ),array( 'ln ln-icon-Shop-2' => 'Shop-2' ),array( 'ln ln-icon-Shop-3' => 'Shop-3' ),array( 'ln ln-icon-Shop-4' => 'Shop-4' ),array( 'ln ln-icon-Shop' => 'Shop' ),array( 'ln ln-icon-Shopping-Bag' => 'Shopping-Bag' ),array( 'ln ln-icon-Shopping-Basket' => 'Shopping-Basket' ),array( 'ln ln-icon-Shopping-Cart' => 'Shopping-Cart' ),array( 'ln ln-icon-Short-Pants' => 'Short-Pants' ),array( 'ln ln-icon-Shoutwire' => 'Shoutwire' ),array( 'ln ln-icon-Shovel' => 'Shovel' ),array( 'ln ln-icon-Shuffle-2' => 'Shuffle-2' ),array( 'ln ln-icon-Shuffle-3' => 'Shuffle-3' ),array( 'ln ln-icon-Shuffle-4' => 'Shuffle-4' ),array( 'ln ln-icon-Shuffle' => 'Shuffle' ),array( 'ln ln-icon-Shutter' => 'Shutter' ),array( 'ln ln-icon-Sidebar-Window' => 'Sidebar-Window' ),array( 'ln ln-icon-Signal' => 'Signal' ),array( 'ln ln-icon-Singapore' => 'Singapore' ),array( 'ln ln-icon-Skate-Shoes' => 'Skate-Shoes' ),array( 'ln ln-icon-Skateboard-2' => 'Skateboard-2' ),array( 'ln ln-icon-Skateboard' => 'Skateboard' ),array( 'ln ln-icon-Skeleton' => 'Skeleton' ),array( 'ln ln-icon-Ski' => 'Ski' ),array( 'ln ln-icon-Skirt' => 'Skirt' ),array( 'ln ln-icon-Skrill' => 'Skrill' ),array( 'ln ln-icon-Skull' => 'Skull' ),array( 'ln ln-icon-Skydiving' => 'Skydiving' ),array( 'ln ln-icon-Skype' => 'Skype' ),array( 'ln ln-icon-Sled-withGifts' => 'Sled-withGifts' ),array( 'ln ln-icon-Sled' => 'Sled' ),array( 'ln ln-icon-Sleeping' => 'Sleeping' ),array( 'ln ln-icon-Sleet' => 'Sleet' ),array( 'ln ln-icon-Slippers' => 'Slippers' ),array( 'ln ln-icon-Smart' => 'Smart' ),array( 'ln ln-icon-Smartphone-2' => 'Smartphone-2' ),array( 'ln ln-icon-Smartphone-3' => 'Smartphone-3' ),array( 'ln ln-icon-Smartphone-4' => 'Smartphone-4' ),array( 'ln ln-icon-Smartphone-Secure' => 'Smartphone-Secure' ),array( 'ln ln-icon-Smartphone' => 'Smartphone' ),array( 'ln ln-icon-Smile' => 'Smile' ),array( 'ln ln-icon-Smoking-Area' => 'Smoking-Area' ),array( 'ln ln-icon-Smoking-Pipe' => 'Smoking-Pipe' ),array( 'ln ln-icon-Snake' => 'Snake' ),array( 'ln ln-icon-Snorkel' => 'Snorkel' ),array( 'ln ln-icon-Snow-2' => 'Snow-2' ),array( 'ln ln-icon-Snow-Dome' => 'Snow-Dome' ),array( 'ln ln-icon-Snow-Storm' => 'Snow-Storm' ),array( 'ln ln-icon-Snow' => 'Snow' ),array( 'ln ln-icon-Snowflake-2' => 'Snowflake-2' ),array( 'ln ln-icon-Snowflake-3' => 'Snowflake-3' ),array( 'ln ln-icon-Snowflake-4' => 'Snowflake-4' ),array( 'ln ln-icon-Snowflake' => 'Snowflake' ),array( 'ln ln-icon-Snowman' => 'Snowman' ),array( 'ln ln-icon-Soccer-Ball' => 'Soccer-Ball' ),array( 'ln ln-icon-Soccer-Shoes' => 'Soccer-Shoes' ),array( 'ln ln-icon-Socks' => 'Socks' ),array( 'ln ln-icon-Solar' => 'Solar' ),array( 'ln ln-icon-Sound-Wave' => 'Sound-Wave' ),array( 'ln ln-icon-Sound' => 'Sound' ),array( 'ln ln-icon-Soundcloud' => 'Soundcloud' ),array( 'ln ln-icon-Soup' => 'Soup' ),array( 'ln ln-icon-South-Africa' => 'South-Africa' ),array( 'ln ln-icon-Space-Needle' => 'Space-Needle' ),array( 'ln ln-icon-Spain' => 'Spain' ),array( 'ln ln-icon-Spam-Mail' => 'Spam-Mail' ),array( 'ln ln-icon-Speach-Bubble' => 'Speach-Bubble' ),array( 'ln ln-icon-Speach-Bubble2' => 'Speach-Bubble2' ),array( 'ln ln-icon-Speach-Bubble3' => 'Speach-Bubble3' ),array( 'ln ln-icon-Speach-Bubble4' => 'Speach-Bubble4' ),array( 'ln ln-icon-Speach-Bubble5' => 'Speach-Bubble5' ),array( 'ln ln-icon-Speach-Bubble6' => 'Speach-Bubble6' ),array( 'ln ln-icon-Speach-Bubble7' => 'Speach-Bubble7' ),array( 'ln ln-icon-Speach-Bubble8' => 'Speach-Bubble8' ),array( 'ln ln-icon-Speach-Bubble9' => 'Speach-Bubble9' ),array( 'ln ln-icon-Speach-Bubble10' => 'Speach-Bubble10' ),array( 'ln ln-icon-Speach-Bubble11' => 'Speach-Bubble11' ),array( 'ln ln-icon-Speach-Bubble12' => 'Speach-Bubble12' ),array( 'ln ln-icon-Speach-Bubble13' => 'Speach-Bubble13' ),array( 'ln ln-icon-Speach-BubbleAsking' => 'Speach-BubbleAsking' ),array( 'ln ln-icon-Speach-BubbleComic' => 'Speach-BubbleComic' ),array( 'ln ln-icon-Speach-BubbleComic2' => 'Speach-BubbleComic2' ),array( 'ln ln-icon-Speach-BubbleComic3' => 'Speach-BubbleComic3' ),array( 'ln ln-icon-Speach-BubbleComic4' => 'Speach-BubbleComic4' ),array( 'ln ln-icon-Speach-BubbleDialog' => 'Speach-BubbleDialog' ),array( 'ln ln-icon-Speach-Bubbles' => 'Speach-Bubbles' ),array( 'ln ln-icon-Speak-2' => 'Speak-2' ),array( 'ln ln-icon-Speak' => 'Speak' ),array( 'ln ln-icon-Speaker-2' => 'Speaker-2' ),array( 'ln ln-icon-Speaker' => 'Speaker' ),array( 'ln ln-icon-Spell-Check' => 'Spell-Check' ),array( 'ln ln-icon-Spell-CheckABC' => 'Spell-CheckABC' ),array( 'ln ln-icon-Spermium' => 'Spermium' ),array( 'ln ln-icon-Spider' => 'Spider' ),array( 'ln ln-icon-Spiderweb' => 'Spiderweb' ),array( 'ln ln-icon-Split-FourSquareWindow' => 'Split-FourSquareWindow' ),array( 'ln ln-icon-Split-Horizontal' => 'Split-Horizontal' ),array( 'ln ln-icon-Split-Horizontal2Window' => 'Split-Horizontal2Window' ),array( 'ln ln-icon-Split-Vertical' => 'Split-Vertical' ),array( 'ln ln-icon-Split-Vertical2' => 'Split-Vertical2' ),array( 'ln ln-icon-Split-Window' => 'Split-Window' ),array( 'ln ln-icon-Spoder' => 'Spoder' ),array( 'ln ln-icon-Spoon' => 'Spoon' ),array( 'ln ln-icon-Sport-Mode' => 'Sport-Mode' ),array( 'ln ln-icon-Sports-Clothings1' => 'Sports-Clothings1' ),array( 'ln ln-icon-Sports-Clothings2' => 'Sports-Clothings2' ),array( 'ln ln-icon-Sports-Shirt' => 'Sports-Shirt' ),array( 'ln ln-icon-Spot' => 'Spot' ),array( 'ln ln-icon-Spray' => 'Spray' ),array( 'ln ln-icon-Spread' => 'Spread' ),array( 'ln ln-icon-Spring' => 'Spring' ),array( 'ln ln-icon-Spurl' => 'Spurl' ),array( 'ln ln-icon-Spy' => 'Spy' ),array( 'ln ln-icon-Squirrel' => 'Squirrel' ),array( 'ln ln-icon-SSL' => 'SSL' ),array( 'ln ln-icon-St-BasilsCathedral' => 'St-BasilsCathedral' ),array( 'ln ln-icon-St-PaulsCathedral' => 'St-PaulsCathedral' ),array( 'ln ln-icon-Stamp-2' => 'Stamp-2' ),array( 'ln ln-icon-Stamp' => 'Stamp' ),array( 'ln ln-icon-Stapler' => 'Stapler' ),array( 'ln ln-icon-Star-Track' => 'Star-Track' ),array( 'ln ln-icon-Star' => 'Star' ),array( 'ln ln-icon-Starfish' => 'Starfish' ),array( 'ln ln-icon-Start2' => 'Start2' ),array( 'ln ln-icon-Start-3' => 'Start-3' ),array( 'ln ln-icon-Start-ways' => 'Start-ways' ),array( 'ln ln-icon-Start' => 'Start' ),array( 'ln ln-icon-Statistic' => 'Statistic' ),array( 'ln ln-icon-Stethoscope' => 'Stethoscope' ),array( 'ln ln-icon-stop--2' => 'stop--2' ),array( 'ln ln-icon-Stop-Music' => 'Stop-Music' ),array( 'ln ln-icon-Stop' => 'Stop' ),array( 'ln ln-icon-Stopwatch-2' => 'Stopwatch-2' ),array( 'ln ln-icon-Stopwatch' => 'Stopwatch' ),array( 'ln ln-icon-Storm' => 'Storm' ),array( 'ln ln-icon-Street-View' => 'Street-View' ),array( 'ln ln-icon-Street-View2' => 'Street-View2' ),array( 'ln ln-icon-Strikethrough-Text' => 'Strikethrough-Text' ),array( 'ln ln-icon-Stroller' => 'Stroller' ),array( 'ln ln-icon-Structure' => 'Structure' ),array( 'ln ln-icon-Student-Female' => 'Student-Female' ),array( 'ln ln-icon-Student-Hat' => 'Student-Hat' ),array( 'ln ln-icon-Student-Hat2' => 'Student-Hat2' ),array( 'ln ln-icon-Student-Male' => 'Student-Male' ),array( 'ln ln-icon-Student-MaleFemale' => 'Student-MaleFemale' ),array( 'ln ln-icon-Students' => 'Students' ),array( 'ln ln-icon-Studio-Flash' => 'Studio-Flash' ),array( 'ln ln-icon-Studio-Lightbox' => 'Studio-Lightbox' ),array( 'ln ln-icon-Stumbleupon' => 'Stumbleupon' ),array( 'ln ln-icon-Suit' => 'Suit' ),array( 'ln ln-icon-Suitcase' => 'Suitcase' ),array( 'ln ln-icon-Sum-2' => 'Sum-2' ),array( 'ln ln-icon-Sum' => 'Sum' ),array( 'ln ln-icon-Summer' => 'Summer' ),array( 'ln ln-icon-Sun-CloudyRain' => 'Sun-CloudyRain' ),array( 'ln ln-icon-Sun' => 'Sun' ),array( 'ln ln-icon-Sunglasses-2' => 'Sunglasses-2' ),array( 'ln ln-icon-Sunglasses-3' => 'Sunglasses-3' ),array( 'ln ln-icon-Sunglasses-Smiley' => 'Sunglasses-Smiley' ),array( 'ln ln-icon-Sunglasses-Smiley2' => 'Sunglasses-Smiley2' ),array( 'ln ln-icon-Sunglasses-W' => 'Sunglasses-W' ),array( 'ln ln-icon-Sunglasses-W2' => 'Sunglasses-W2' ),array( 'ln ln-icon-Sunglasses-W3' => 'Sunglasses-W3' ),array( 'ln ln-icon-Sunglasses' => 'Sunglasses' ),array( 'ln ln-icon-Sunrise' => 'Sunrise' ),array( 'ln ln-icon-Sunset' => 'Sunset' ),array( 'ln ln-icon-Superman' => 'Superman' ),array( 'ln ln-icon-Support' => 'Support' ),array( 'ln ln-icon-Surprise' => 'Surprise' ),array( 'ln ln-icon-Sushi' => 'Sushi' ),array( 'ln ln-icon-Sweden' => 'Sweden' ),array( 'ln ln-icon-Swimming-Short' => 'Swimming-Short' ),array( 'ln ln-icon-Swimming' => 'Swimming' ),array( 'ln ln-icon-Swimmwear' => 'Swimmwear' ),array( 'ln ln-icon-Switch' => 'Switch' ),array( 'ln ln-icon-Switzerland' => 'Switzerland' ),array( 'ln ln-icon-Sync-Cloud' => 'Sync-Cloud' ),array( 'ln ln-icon-Sync' => 'Sync' ),array( 'ln ln-icon-Synchronize-2' => 'Synchronize-2' ),array( 'ln ln-icon-Synchronize' => 'Synchronize' ),array( 'ln ln-icon-T-Shirt' => 'T-Shirt' ),array( 'ln ln-icon-Tablet-2' => 'Tablet-2' ),array( 'ln ln-icon-Tablet-3' => 'Tablet-3' ),array( 'ln ln-icon-Tablet-Orientation' => 'Tablet-Orientation' ),array( 'ln ln-icon-Tablet-Phone' => 'Tablet-Phone' ),array( 'ln ln-icon-Tablet-Secure' => 'Tablet-Secure' ),array( 'ln ln-icon-Tablet-Vertical' => 'Tablet-Vertical' ),array( 'ln ln-icon-Tablet' => 'Tablet' ),array( 'ln ln-icon-Tactic' => 'Tactic' ),array( 'ln ln-icon-Tag-2' => 'Tag-2' ),array( 'ln ln-icon-Tag-3' => 'Tag-3' ),array( 'ln ln-icon-Tag-4' => 'Tag-4' ),array( 'ln ln-icon-Tag-5' => 'Tag-5' ),array( 'ln ln-icon-Tag' => 'Tag' ),array( 'ln ln-icon-Taj-Mahal' => 'Taj-Mahal' ),array( 'ln ln-icon-Talk-Man' => 'Talk-Man' ),array( 'ln ln-icon-Tap' => 'Tap' ),array( 'ln ln-icon-Target-Market' => 'Target-Market' ),array( 'ln ln-icon-Target' => 'Target' ),array( 'ln ln-icon-Taurus-2' => 'Taurus-2' ),array( 'ln ln-icon-Taurus' => 'Taurus' ),array( 'ln ln-icon-Taxi-2' => 'Taxi-2' ),array( 'ln ln-icon-Taxi-Sign' => 'Taxi-Sign' ),array( 'ln ln-icon-Taxi' => 'Taxi' ),array( 'ln ln-icon-Teacher' => 'Teacher' ),array( 'ln ln-icon-Teapot' => 'Teapot' ),array( 'ln ln-icon-Technorati' => 'Technorati' ),array( 'ln ln-icon-Teddy-Bear' => 'Teddy-Bear' ),array( 'ln ln-icon-Tee-Mug' => 'Tee-Mug' ),array( 'ln ln-icon-Telephone-2' => 'Telephone-2' ),array( 'ln ln-icon-Telephone' => 'Telephone' ),array( 'ln ln-icon-Telescope' => 'Telescope' ),array( 'ln ln-icon-Temperature-2' => 'Temperature-2' ),array( 'ln ln-icon-Temperature-3' => 'Temperature-3' ),array( 'ln ln-icon-Temperature' => 'Temperature' ),array( 'ln ln-icon-Temple' => 'Temple' ),array( 'ln ln-icon-Tennis-Ball' => 'Tennis-Ball' ),array( 'ln ln-icon-Tennis' => 'Tennis' ),array( 'ln ln-icon-Tent' => 'Tent' ),array( 'ln ln-icon-Test-Tube' => 'Test-Tube' ),array( 'ln ln-icon-Test-Tube2' => 'Test-Tube2' ),array( 'ln ln-icon-Testimonal' => 'Testimonal' ),array( 'ln ln-icon-Text-Box' => 'Text-Box' ),array( 'ln ln-icon-Text-Effect' => 'Text-Effect' ),array( 'ln ln-icon-Text-HighlightColor' => 'Text-HighlightColor' ),array( 'ln ln-icon-Text-Paragraph' => 'Text-Paragraph' ),array( 'ln ln-icon-Thailand' => 'Thailand' ),array( 'ln ln-icon-The-WhiteHouse' => 'The-WhiteHouse' ),array( 'ln ln-icon-This-SideUp' => 'This-SideUp' ),array( 'ln ln-icon-Thread' => 'Thread' ),array( 'ln ln-icon-Three-ArrowFork' => 'Three-ArrowFork' ),array( 'ln ln-icon-Three-Fingers' => 'Three-Fingers' ),array( 'ln ln-icon-Three-FingersDrag' => 'Three-FingersDrag' ),array( 'ln ln-icon-Three-FingersDrag2' => 'Three-FingersDrag2' ),array( 'ln ln-icon-Three-FingersTouch' => 'Three-FingersTouch' ),array( 'ln ln-icon-Thumb' => 'Thumb' ),array( 'ln ln-icon-Thumbs-DownSmiley' => 'Thumbs-DownSmiley' ),array( 'ln ln-icon-Thumbs-UpSmiley' => 'Thumbs-UpSmiley' ),array( 'ln ln-icon-Thunder' => 'Thunder' ),array( 'ln ln-icon-Thunderstorm' => 'Thunderstorm' ),array( 'ln ln-icon-Ticket' => 'Ticket' ),array( 'ln ln-icon-Tie-2' => 'Tie-2' ),array( 'ln ln-icon-Tie-3' => 'Tie-3' ),array( 'ln ln-icon-Tie-4' => 'Tie-4' ),array( 'ln ln-icon-Tie' => 'Tie' ),array( 'ln ln-icon-Tiger' => 'Tiger' ),array( 'ln ln-icon-Time-Backup' => 'Time-Backup' ),array( 'ln ln-icon-Time-Bomb' => 'Time-Bomb' ),array( 'ln ln-icon-Time-Clock' => 'Time-Clock' ),array( 'ln ln-icon-Time-Fire' => 'Time-Fire' ),array( 'ln ln-icon-Time-Machine' => 'Time-Machine' ),array( 'ln ln-icon-Time-Window' => 'Time-Window' ),array( 'ln ln-icon-Timer-2' => 'Timer-2' ),array( 'ln ln-icon-Timer' => 'Timer' ),array( 'ln ln-icon-To-Bottom' => 'To-Bottom' ),array( 'ln ln-icon-To-Bottom2' => 'To-Bottom2' ),array( 'ln ln-icon-To-Left' => 'To-Left' ),array( 'ln ln-icon-To-Right' => 'To-Right' ),array( 'ln ln-icon-To-Top' => 'To-Top' ),array( 'ln ln-icon-To-Top2' => 'To-Top2' ),array( 'ln ln-icon-Token-' => 'Token-' ),array( 'ln ln-icon-Tomato' => 'Tomato' ),array( 'ln ln-icon-Tongue' => 'Tongue' ),array( 'ln ln-icon-Tooth-2' => 'Tooth-2' ),array( 'ln ln-icon-Tooth' => 'Tooth' ),array( 'ln ln-icon-Top-ToBottom' => 'Top-ToBottom' ),array( 'ln ln-icon-Touch-Window' => 'Touch-Window' ),array( 'ln ln-icon-Tourch' => 'Tourch' ),array( 'ln ln-icon-Tower-2' => 'Tower-2' ),array( 'ln ln-icon-Tower-Bridge' => 'Tower-Bridge' ),array( 'ln ln-icon-Tower' => 'Tower' ),array( 'ln ln-icon-Trace' => 'Trace' ),array( 'ln ln-icon-Tractor' => 'Tractor' ),array( 'ln ln-icon-traffic-Light' => 'traffic-Light' ),array( 'ln ln-icon-Traffic-Light2' => 'Traffic-Light2' ),array( 'ln ln-icon-Train-2' => 'Train-2' ),array( 'ln ln-icon-Train' => 'Train' ),array( 'ln ln-icon-Tram' => 'Tram' ),array( 'ln ln-icon-Transform-2' => 'Transform-2' ),array( 'ln ln-icon-Transform-3' => 'Transform-3' ),array( 'ln ln-icon-Transform-4' => 'Transform-4' ),array( 'ln ln-icon-Transform' => 'Transform' ),array( 'ln ln-icon-Trash-withMen' => 'Trash-withMen' ),array( 'ln ln-icon-Tree-2' => 'Tree-2' ),array( 'ln ln-icon-Tree-3' => 'Tree-3' ),array( 'ln ln-icon-Tree-4' => 'Tree-4' ),array( 'ln ln-icon-Tree-5' => 'Tree-5' ),array( 'ln ln-icon-Tree' => 'Tree' ),array( 'ln ln-icon-Trekking' => 'Trekking' ),array( 'ln ln-icon-Triangle-ArrowDown' => 'Triangle-ArrowDown' ),array( 'ln ln-icon-Triangle-ArrowLeft' => 'Triangle-ArrowLeft' ),array( 'ln ln-icon-Triangle-ArrowRight' => 'Triangle-ArrowRight' ),array( 'ln ln-icon-Triangle-ArrowUp' => 'Triangle-ArrowUp' ),array( 'ln ln-icon-Tripod-2' => 'Tripod-2' ),array( 'ln ln-icon-Tripod-andVideo' => 'Tripod-andVideo' ),array( 'ln ln-icon-Tripod-withCamera' => 'Tripod-withCamera' ),array( 'ln ln-icon-Tripod-withGopro' => 'Tripod-withGopro' ),array( 'ln ln-icon-Trophy-2' => 'Trophy-2' ),array( 'ln ln-icon-Trophy' => 'Trophy' ),array( 'ln ln-icon-Truck' => 'Truck' ),array( 'ln ln-icon-Trumpet' => 'Trumpet' ),array( 'ln ln-icon-Tumblr' => 'Tumblr' ),array( 'ln ln-icon-Turkey' => 'Turkey' ),array( 'ln ln-icon-Turn-Down' => 'Turn-Down' ),array( 'ln ln-icon-Turn-Down2' => 'Turn-Down2' ),array( 'ln ln-icon-Turn-DownFromLeft' => 'Turn-DownFromLeft' ),array( 'ln ln-icon-Turn-DownFromRight' => 'Turn-DownFromRight' ),array( 'ln ln-icon-Turn-Left' => 'Turn-Left' ),array( 'ln ln-icon-Turn-Left3' => 'Turn-Left3' ),array( 'ln ln-icon-Turn-Right' => 'Turn-Right' ),array( 'ln ln-icon-Turn-Right3' => 'Turn-Right3' ),array( 'ln ln-icon-Turn-Up' => 'Turn-Up' ),array( 'ln ln-icon-Turn-Up2' => 'Turn-Up2' ),array( 'ln ln-icon-Turtle' => 'Turtle' ),array( 'ln ln-icon-Tuxedo' => 'Tuxedo' ),array( 'ln ln-icon-TV' => 'TV' ),array( 'ln ln-icon-Twister' => 'Twister' ),array( 'ln ln-icon-Twitter-2' => 'Twitter-2' ),array( 'ln ln-icon-Twitter' => 'Twitter' ),array( 'ln ln-icon-Two-Fingers' => 'Two-Fingers' ),array( 'ln ln-icon-Two-FingersDrag' => 'Two-FingersDrag' ),array( 'ln ln-icon-Two-FingersDrag2' => 'Two-FingersDrag2' ),array( 'ln ln-icon-Two-FingersScroll' => 'Two-FingersScroll' ),array( 'ln ln-icon-Two-FingersTouch' => 'Two-FingersTouch' ),array( 'ln ln-icon-Two-Windows' => 'Two-Windows' ),array( 'ln ln-icon-Type-Pass' => 'Type-Pass' ),array( 'ln ln-icon-Ukraine' => 'Ukraine' ),array( 'ln ln-icon-Umbrela' => 'Umbrela' ),array( 'ln ln-icon-Umbrella-2' => 'Umbrella-2' ),array( 'ln ln-icon-Umbrella-3' => 'Umbrella-3' ),array( 'ln ln-icon-Under-LineText' => 'Under-LineText' ),array( 'ln ln-icon-Undo' => 'Undo' ),array( 'ln ln-icon-United-Kingdom' => 'United-Kingdom' ),array( 'ln ln-icon-United-States' => 'United-States' ),array( 'ln ln-icon-University-2' => 'University-2' ),array( 'ln ln-icon-University' => 'University' ),array( 'ln ln-icon-Unlike-2' => 'Unlike-2' ),array( 'ln ln-icon-Unlike' => 'Unlike' ),array( 'ln ln-icon-Unlock-2' => 'Unlock-2' ),array( 'ln ln-icon-Unlock-3' => 'Unlock-3' ),array( 'ln ln-icon-Unlock' => 'Unlock' ),array( 'ln ln-icon-Up--Down' => 'Up--Down' ),array( 'ln ln-icon-Up--Down3' => 'Up--Down3' ),array( 'ln ln-icon-Up-2' => 'Up-2' ),array( 'ln ln-icon-Up-3' => 'Up-3' ),array( 'ln ln-icon-Up-4' => 'Up-4' ),array( 'ln ln-icon-Up' => 'Up' ),array( 'ln ln-icon-Upgrade' => 'Upgrade' ),array( 'ln ln-icon-Upload-2' => 'Upload-2' ),array( 'ln ln-icon-Upload-toCloud' => 'Upload-toCloud' ),array( 'ln ln-icon-Upload-Window' => 'Upload-Window' ),array( 'ln ln-icon-Upload' => 'Upload' ),array( 'ln ln-icon-Uppercase-Text' => 'Uppercase-Text' ),array( 'ln ln-icon-Upward' => 'Upward' ),array( 'ln ln-icon-URL-Window' => 'URL-Window' ),array( 'ln ln-icon-Usb-2' => 'Usb-2' ),array( 'ln ln-icon-Usb-Cable' => 'Usb-Cable' ),array( 'ln ln-icon-Usb' => 'Usb' ),array( 'ln ln-icon-User' => 'User' ),array( 'ln ln-icon-Ustream' => 'Ustream' ),array( 'ln ln-icon-Vase' => 'Vase' ),array( 'ln ln-icon-Vector-2' => 'Vector-2' ),array( 'ln ln-icon-Vector-3' => 'Vector-3' ),array( 'ln ln-icon-Vector-4' => 'Vector-4' ),array( 'ln ln-icon-Vector-5' => 'Vector-5' ),array( 'ln ln-icon-Vector' => 'Vector' ),array( 'ln ln-icon-Venn-Diagram' => 'Venn-Diagram' ),array( 'ln ln-icon-Vest-2' => 'Vest-2' ),array( 'ln ln-icon-Vest' => 'Vest' ),array( 'ln ln-icon-Viddler' => 'Viddler' ),array( 'ln ln-icon-Video-2' => 'Video-2' ),array( 'ln ln-icon-Video-3' => 'Video-3' ),array( 'ln ln-icon-Video-4' => 'Video-4' ),array( 'ln ln-icon-Video-5' => 'Video-5' ),array( 'ln ln-icon-Video-6' => 'Video-6' ),array( 'ln ln-icon-Video-GameController' => 'Video-GameController' ),array( 'ln ln-icon-Video-Len' => 'Video-Len' ),array( 'ln ln-icon-Video-Len2' => 'Video-Len2' ),array( 'ln ln-icon-Video-Photographer' => 'Video-Photographer' ),array( 'ln ln-icon-Video-Tripod' => 'Video-Tripod' ),array( 'ln ln-icon-Video' => 'Video' ),array( 'ln ln-icon-Vietnam' => 'Vietnam' ),array( 'ln ln-icon-View-Height' => 'View-Height' ),array( 'ln ln-icon-View-Width' => 'View-Width' ),array( 'ln ln-icon-Vimeo' => 'Vimeo' ),array( 'ln ln-icon-Virgo-2' => 'Virgo-2' ),array( 'ln ln-icon-Virgo' => 'Virgo' ),array( 'ln ln-icon-Virus-2' => 'Virus-2' ),array( 'ln ln-icon-Virus-3' => 'Virus-3' ),array( 'ln ln-icon-Virus' => 'Virus' ),array( 'ln ln-icon-Visa' => 'Visa' ),array( 'ln ln-icon-Voice' => 'Voice' ),array( 'ln ln-icon-Voicemail' => 'Voicemail' ),array( 'ln ln-icon-Volleyball' => 'Volleyball' ),array( 'ln ln-icon-Volume-Down' => 'Volume-Down' ),array( 'ln ln-icon-Volume-Up' => 'Volume-Up' ),array( 'ln ln-icon-VPN' => 'VPN' ),array( 'ln ln-icon-Wacom-Tablet' => 'Wacom-Tablet' ),array( 'ln ln-icon-Waiter' => 'Waiter' ),array( 'ln ln-icon-Walkie-Talkie' => 'Walkie-Talkie' ),array( 'ln ln-icon-Wallet-2' => 'Wallet-2' ),array( 'ln ln-icon-Wallet-3' => 'Wallet-3' ),array( 'ln ln-icon-Wallet' => 'Wallet' ),array( 'ln ln-icon-Warehouse' => 'Warehouse' ),array( 'ln ln-icon-Warning-Window' => 'Warning-Window' ),array( 'ln ln-icon-Watch-2' => 'Watch-2' ),array( 'ln ln-icon-Watch-3' => 'Watch-3' ),array( 'ln ln-icon-Watch' => 'Watch' ),array( 'ln ln-icon-Wave-2' => 'Wave-2' ),array( 'ln ln-icon-Wave' => 'Wave' ),array( 'ln ln-icon-Webcam' => 'Webcam' ),array( 'ln ln-icon-weight-Lift' => 'weight-Lift' ),array( 'ln ln-icon-Wheelbarrow' => 'Wheelbarrow' ),array( 'ln ln-icon-Wheelchair' => 'Wheelchair' ),array( 'ln ln-icon-Width-Window' => 'Width-Window' ),array( 'ln ln-icon-Wifi-2' => 'Wifi-2' ),array( 'ln ln-icon-Wifi-Keyboard' => 'Wifi-Keyboard' ),array( 'ln ln-icon-Wifi' => 'Wifi' ),array( 'ln ln-icon-Wind-Turbine' => 'Wind-Turbine' ),array( 'ln ln-icon-Windmill' => 'Windmill' ),array( 'ln ln-icon-Window-2' => 'Window-2' ),array( 'ln ln-icon-Window' => 'Window' ),array( 'ln ln-icon-Windows-2' => 'Windows-2' ),array( 'ln ln-icon-Windows-Microsoft' => 'Windows-Microsoft' ),array( 'ln ln-icon-Windows' => 'Windows' ),array( 'ln ln-icon-Windsock' => 'Windsock' ),array( 'ln ln-icon-Windy' => 'Windy' ),array( 'ln ln-icon-Wine-Bottle' => 'Wine-Bottle' ),array( 'ln ln-icon-Wine-Glass' => 'Wine-Glass' ),array( 'ln ln-icon-Wink' => 'Wink' ),array( 'ln ln-icon-Winter-2' => 'Winter-2' ),array( 'ln ln-icon-Winter' => 'Winter' ),array( 'ln ln-icon-Wireless' => 'Wireless' ),array( 'ln ln-icon-Witch-Hat' => 'Witch-Hat' ),array( 'ln ln-icon-Witch' => 'Witch' ),array( 'ln ln-icon-Wizard' => 'Wizard' ),array( 'ln ln-icon-Wolf' => 'Wolf' ),array( 'ln ln-icon-Woman-Sign' => 'Woman-Sign' ),array( 'ln ln-icon-WomanMan' => 'WomanMan' ),array( 'ln ln-icon-Womans-Underwear' => 'Womans-Underwear' ),array( 'ln ln-icon-Womans-Underwear2' => 'Womans-Underwear2' ),array( 'ln ln-icon-Women' => 'Women' ),array( 'ln ln-icon-Wonder-Woman' => 'Wonder-Woman' ),array( 'ln ln-icon-Wordpress' => 'Wordpress' ),array( 'ln ln-icon-Worker-Clothes' => 'Worker-Clothes' ),array( 'ln ln-icon-Worker' => 'Worker' ),array( 'ln ln-icon-Wrap-Text' => 'Wrap-Text' ),array( 'ln ln-icon-Wreath' => 'Wreath' ),array( 'ln ln-icon-Wrench' => 'Wrench' ),array( 'ln ln-icon-X-Box' => 'X-Box' ),array( 'ln ln-icon-X-ray' => 'X-ray' ),array( 'ln ln-icon-Xanga' => 'Xanga' ),array( 'ln ln-icon-Xing' => 'Xing' ),array( 'ln ln-ln ln-icon-Yacht' => 'Yacht' ),array( 'ln ln-icon-Yahoo-Buzz' => 'Yahoo-Buzz' ),array( 'ln ln-icon-Yahoo' => 'Yahoo' ),array( 'ln ln-icon-Yelp' => 'Yelp' ),array( 'ln ln-icon-Yes' => 'Yes' ),array( 'ln ln-icon-Ying-Yang' => 'Ying-Yang' ),array( 'ln ln-icon-Youtube' => 'Youtube' ),array( 'ln ln-icon-Z-A' => 'Z-A' ),array( 'ln ln-icon-Zebra' => 'Zebra' ),array( 'ln ln-icon-Zombie' => 'Zombie' ),array( 'ln ln-icon-Zoom-Gesture' => 'Zoom-Gesture' ),array( 'ln ln-icon-Zootool' => 'Zootool' ),
  );

  return array_merge( $icons, $iconsmind_icons );
}

add_filter( 'vc_iconpicker-type-iconsmind', 'vc_iconpicker_type_iconsmind' );


function workscout_vc_icon_style( $font ){
  switch ( $font ) {
    case 'iconsmind':
       wp_enqueue_style( 'workscout-font-awesome' );
      break;
  }
  return $font;
}
add_action('vc_enqueue_font_icon_element','workscout_vc_icon_style');

add_action( 'vc_base_register_front_css', 'workscout_vc_iconpicker_base_register_css' );
add_action( 'vc_base_register_admin_css', 'workscout_vc_iconpicker_base_register_css' );
function workscout_vc_iconpicker_base_register_css(){
    wp_register_style('workscout-font-awesome',  get_template_directory_uri(). '/css/font-awesome.css' );
}

/**
 * Enqueue Backend and Frontend CSS Styles
 */
add_action( 'vc_backend_editor_enqueue_js_css', 'workscout_vc_iconpicker_editor_jscss' );
add_action( 'vc_frontend_editor_enqueue_js_css', 'workscout_vc_iconpicker_editor_jscss' );
function workscout_vc_iconpicker_editor_jscss(){
    wp_enqueue_style( 'workscout-font-awesome' );
}

?>