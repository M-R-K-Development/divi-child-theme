<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}
/*
*	Load social icons for Youtube and Linked In
*/
if ( ! function_exists( 'et_load_core_options' ) ) {

	function et_load_core_options() {

		global $shortname, $$themename;
		require_once get_template_directory() . esc_attr( "/options_{$shortname}.php" );
		$newOptions = [];
		foreach ($options as $i => $optionArray) {
			$newOptions[] = $optionArray;
			if (isset($optionArray['id']) && $optionArray['id'] == 'divi_show_google_icon') {

				$newOptions[] = array( 
					"name" =>esc_html__( "Show Linked In Icon", $themename ),
                   	"id" => $shortname."_show_linkedin_icon",
                   	"type" => "checkbox2",
                   	"std" => "on",
                   	"desc" =>esc_html__( "Here you can choose to display the LINKED IN Icon. ", $themename ) );

				$newOptions[] = array( 
					"name" =>esc_html__( "Show Youtube Icon", $themename ),
                   	"id" => $shortname."_show_youtube_icon",
                   	"type" => "checkbox2",
                   	"std" => "on",
                   	"desc" =>esc_html__( "Here you can choose to display the Youtube Icon. ", $themename ) );
			}

			if (isset($optionArray['id']) && $optionArray['id'] == 'divi_google_url') {

				$newOptions[] = array( "name" =>esc_html__( "Linked In Profile Url", $themename ),
		                   "id" => $shortname."_linkedin_url",
		                   "std" => "#",
		                   "type" => "text",
		                   "validation_type" => "url",
						   "desc" =>esc_html__( "Enter the URL of your LinkedIn Profile. ", $themename ) );

				$newOptions[] = array( "name" =>esc_html__( "Youtube Url", $themename ),
		                   "id" => $shortname."_youtube_url",
		                   "std" => "#",
		                   "type" => "text",
		                   "validation_type" => "url",
						   "desc" =>esc_html__( "Enter the URL of your Youtube Channel. ", $themename ) );
			}
		}

		$options = $newOptions;
		
	}

}