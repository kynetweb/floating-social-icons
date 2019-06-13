<?php
/**
 * Plugin Name: Floating Social Media
 * Description: This is floating social media follow buttons
 * Version:     2.1
 * Author:      Ankita Rana
  */

//This is for setting link in the plugin activation setting



			class MySettingsPage
			{			
						/**
				 * Holds the values to be used in the fields callbacks
				 */
				private $options;			
				/**
				 * Start up
				 */
				public function __construct()
				{
					add_action( 'admin_menu', array( $this, 'add_plugin_page' ) ); //extra sub menu
					add_action( 'admin_init', array( $this, 'page_init' ) ); /// user accesses the admin area
				}			
				/**
				 * Add options page
				 */
				public function add_plugin_page()
				{
					// This page will be under "Settings menu"
					add_options_page(
						'Settings Admin', //title 
						'floating social', //setting menu name
						'manage_options',  //capability 
						'my-setting-admin',  //page name
						array( $this, 'create_admin_page' ) //callback -- The function to be called to output the content for this page.
						
					);
				}			
				/**
				 * Options page callback
				 */
				public function create_admin_page()
				{
					// Set class property
					$this->options = get_option( 'my_option_name' ); // Retrieves an option value based on an option name.
					?>
        		<div class="wrap">
                  <!--  <h1>Awsome Social Icons</h1>-->
                    <form method="post" action="options.php">
                    <?php
                        // This prints out all hidden setting fields
                        settings_fields( 'my_option_group' ); //Output action, and option_page fields for a settings page
                        do_settings_sections( 'my-setting-admin' ); //Prints out all settings sections added to a particular settings page.
                        submit_button(); //Echos a submit button only used in backend not frontend
                    ?>
                    </form>
               </div>
        <?php
    }
    /**
     * Register and add settings
     */
    public function page_init()
    {        //Register a setting and its data
        register_setting(
            'my_option_group', // Option group
            'my_option_name', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            'Awsome Social Icons Settings', // Title
            array( $this, 'print_section_info' ), // Callback
            'my-setting-admin' // Page
        );  

		//floating addd new setting field
		add_settings_field(
            'facebook', 
            'Facebook', 
            array( $this, 'facebook_callback' ), 
            'my-setting-admin', 
            'setting_section_id'
        ); 
		add_settings_field(
            'linkedin', 
            'Linkedin', 
            array( $this, 'linkedin_callback' ), 
            'my-setting-admin', 
            'setting_section_id'
        ); 
		add_settings_field(
            'pinterest', 
            'Pinterest', 
            array( $this, 'pinterest_callback' ), 
            'my-setting-admin', 
            'setting_section_id'
        ); 
		/*add_settings_field(
            'instagram', 
            'Instagram', 
            array( $this, 'instagram_callback' ), 
            'my-setting-admin', 
            'setting_section_id'
        );   
		*/
		add_settings_field(
            'twitter', 
            'Twitter', 
            array( $this, 'twitter_callback' ), 
            'my-setting-admin', 
            'setting_section_id'
        );  
		add_settings_field(
            'youtube', 
            'You tube', 
            array( $this, 'youtube_callback' ), 
            'my-setting-admin', 
            'setting_section_id'
        ); add_settings_field(
            'stumbleupon', 
            'Stumble', 
            array( $this, 'stumbleupon_callback' ), 
            'my-setting-admin', 
            'setting_section_id'
        );/* add_settings_field(
            'tumblr', 
            'Tumblr', 
            array( $this, 'tumblr_callback' ), 
            'my-setting-admin', 
            'setting_section_id'
        ); 
		*/
		
/*		add_settings_field(
            'rss', 
            'Rss', 
            array( $this, 'rss_callback' ), 
            'my-setting-admin', 
            'setting_section_id'
        ); add_settings_field(
            'flickr', 
            'Flickr', 
            array( $this, 'flickr_callback' ), 
            'my-setting-admin', 
            'setting_section_id'
        ); add_settings_field(
            'google_plus', 
            'Google Plus', 
            array( $this, 'google_plus_callback' ), 
            'my-setting-admin', 
            'setting_section_id'
        ); add_settings_field(
            'vine', 
            'Vine', 
            array( $this, 'vine_callback' ), 
            'my-setting-admin', 
            'setting_section_id'
        ); */
		
	//checkbox	
		//add_settings_field('plugin_chk2', 'A Checkbox', 'setting_chk2_fn', 'my-setting-admin', 'setting_section_id');
		  
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
       /* $new_input = array();
        if( isset( $input['id_number'] ) )
            $new_input['id_number'] = absint( $input['id_number'] );
		      if( isset( $input['title'] ) )
            $new_input['title'] = sanitize_text_field( $input['title'] );*/
//floating_value
        if( isset( $input['facebook'] ) )
            $new_input['facebook'] = sanitize_text_field( $input['facebook'] );
		
        if( isset( $input['linkedin'] ) )
            $new_input['linkedin'] = sanitize_text_field( $input['linkedin'] );
        if( isset( $input['pinterest'] ) )
            $new_input['pinterest'] = sanitize_text_field( $input['pinterest'] );
        if( isset( $input['instagram'] ) )
            $new_input['instagram'] = sanitize_text_field( $input['instagram'] );
			
			 if( isset( $input['twitter'] ) )
            $new_input['twitter'] = sanitize_text_field( $input['twitter'] ); 
			if( isset( $input['youtube'] ) )
            $new_input['youtube'] = sanitize_text_field( $input['youtube'] );
			 if( isset( $input['stumbleupon'] ) )
            $new_input['stumbleupon'] = sanitize_text_field( $input['stumbleupon'] ); 
			if( isset( $input['tumblr'] ) )
            $new_input['tumblr'] = sanitize_text_field( $input['tumblr'] );
			
			
			if( isset( $input['rss'] ) )
            $new_input['rss'] = sanitize_text_field( $input['rss'] );
			if( isset( $input['flickr'] ) )
            $new_input['flickr'] = sanitize_text_field( $input['flickr'] );
			if( isset( $input['google_plus'] ) )
            $new_input['google_plus'] = sanitize_text_field( $input['google_plus'] );
			if( isset( $input['vine'] ) )
            $new_input['vine'] = sanitize_text_field( $input['vine'] );
	 return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {
        print 'Enter the URL(s) for your social profiles below.If yout leave a profile URL field Blank, it will not be used.';
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function id_number_callback()
    {
        printf(
            '<input type="text" id="id_number" name="my_option_name[id_number]" value="%s" />',
            isset( $this->options['id_number'] ) ? esc_attr( $this->options['id_number']) : ''
        );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function title_callback()
    {
        printf(
            '<input type="text" id="title" name="my_option_name[title]" value="%s" />',
            isset( $this->options['title'] ) ? esc_attr( $this->options['title']) : ''
        );
    }
	
	//floating value 
	public function facebook_callback()
    {
        printf(
            '<input type="text" id="facebook" name="my_option_name[facebook]" value="%s" />',
            isset( $this->options['facebook'] ) ? esc_attr( $this->options['facebook']) : ''
        );
    }
	
	public function linkedin_callback()
    {
        printf(
            '<input type="text" id="linkedin" name="my_option_name[linkedin]" value="%s" />',
            isset( $this->options['linkedin'] ) ? esc_attr( $this->options['linkedin']) : ''
        );
    }
	
	public function pinterest_callback()
    {
        printf(
            '<input type="text" id="pinterest" name="my_option_name[pinterest]" value="%s" />',
            isset( $this->options['pinterest'] ) ? esc_attr( $this->options['pinterest']) : ''
        );
    }
	
	public function instagram_callback()
    {
        printf(
            '<input type="text" id="instagram" name="my_option_name[instagram]" value="%s" />',
            isset( $this->options['instagram'] ) ? esc_attr( $this->options['instagram']) : ''
        );
    }	
	
	public function twitter_callback()
    {
        printf(
            '<input type="text" id="twitter" name="my_option_name[twitter]" value="%s" />',
            isset( $this->options['twitter'] ) ? esc_attr( $this->options['twitter']) : ''
        );
    }
	public function youtube_callback()
    {
        printf(
            '<input type="text" id="youtube" name="my_option_name[youtube]" value="%s" />',
            isset( $this->options['youtube'] ) ? esc_attr( $this->options['youtube']) : ''
        );
    }
	public function stumbleupon_callback()
    {
        printf(
            '<input type="text" id="stumbleupon" name="my_option_name[stumbleupon]" value="%s" />',
            isset( $this->options['stumbleupon'] ) ? esc_attr( $this->options['stumbleupon']) : ''
        );
    }
	public function tumblr_callback()
    {
        printf(
            '<input type="text" id="tumblr" name="my_option_name[tumblr]" value="%s" />',
            isset( $this->options['tumblr'] ) ? esc_attr( $this->options['tumblr']) : ''
        );
    }
	
	
	public function rss_callback()
    {
        printf(
            '<input type="text" id="rss" name="my_option_name[rss]" value="%s" />',
            isset( $this->options['rss'] ) ? esc_attr( $this->options['rss']) : ''
        );
    }
	public function flickr_callback()
    {
        printf(
            '<input type="text" id="flickr" name="my_option_name[flickr]" value="%s" />',
            isset( $this->options['flickr'] ) ? esc_attr( $this->options['flickr']) : ''
        );
    }
	public function google_plus_callback()
    {
        printf(
            '<input type="text" id="google_plus" name="my_option_name[google_plus]" value="%s" />',
            isset( $this->options['google_plus'] ) ? esc_attr( $this->options['google_plus']) : ''
        );
    }
	public function vine_callback()
    {
        printf(
            '<input type="text" id="vine" name="my_option_name[vine]" value="%s" />',
            isset( $this->options['vine'] ) ? esc_attr( $this->options['vine']) : ''
        );
    }
	
	
		
}
//checkbox
/*function setting_chk2_fn() {
	$options = get_option('plugin_options');
	if($options['chkbox2']) { $checked = ' checked="checked" '; }
	echo "<input ".$checked." id='plugin_chk2' name='plugin_options[chkbox2]' type='checkbox' />";
}
function add_defaults_fn() {
	$tmp = get_option('plugin_options');
    if(($tmp['chkbox1']=='on')||(!is_array($tmp))) {
		$arr = array("dropdown1"=>"Orange", "text_area" => "Space to put a lot of information here!", "text_string" => "Some sample text", "pass_string" => "123456", "chkbox1" => "", "chkbox2" => "on", "option_set1" => "Triangle");
		update_option('plugin_options', $arr);
	}
}*/

	// Add Shortcode
	function custom_shortcode() {
			echo "<div class='option'>";
		//echo "<h1>class</h1>";
		//echo "<img src='http://localhost/wordpress/wp-content/uploads/2019/06/new4-5.jpg'>";
		//echo "<ul class='icon-list'>";
		$options = get_option('my_option_name');
		
		$favebook__value = $options['facebook'];
		$linkedin_value = $options['linkedin'];
		$pintrest_value = $options['pinterest'];
		$twitter_value = $options['twitter'];
		$youtube_value = $options['youtube'];
		$stumble_value = $options['stumbleupon'];
		$insta_value = $options['instagram'];
		//$insta_value = $options['linkedin'];
	 ?>
		<a href="<?php echo $favebook__value?>"><img src='http://localhost/wordpress/wp-content/plugins/floatingsocial/image/fb.png' id='fb'></a>
		<a href="<?php echo $linkedin_value?>"><img src='http://localhost/wordpress/wp-content/plugins/floatingsocial/image/in.png' id='link'></a>
		<a href="<?php echo $pintrest_value?>"><img src='http://localhost/wordpress/wp-content/plugins/floatingsocial/image/pinit.png' id='pin'></a>
		<a href="<?php echo $twitter_value?>"><img src='http://localhost/wordpress/wp-content/plugins/floatingsocial/image/tw.png' id='twitr'></a>
		<a href="<?php echo $youtube_value?>"><img src='http://localhost/wordpress/wp-content/plugins/floatingsocial/image/youtube.png' id='youtube'></a>
		<a href="<?php echo $stumble_value?>"><img src='http://localhost/wordpress/wp-content/plugins/floatingsocial/image/stumbleupon.png' id='stumbleupon'></a>
		<?php /*?><a href="<?php echo $insta_value?>"><img src='http://localhost/wordpress/wp-content/plugins/floatingsocial/image/.png' id='rss'></a><br>
		<a href="<?php echo $linkedin_value?>"><img src='http://localhost/wordpress/wp-content/plugins/floatingsocial/image/r.png' id='tumblr'></a><br><?php */?>
		<?php
		//echo "</ul>";
		
		/*$options = get_option('my_option_name', 'default text');
		$option = $options['linkedin'];
		echo $option;
		
		$options1 = get_option('my_option_name', 'default text');
		$option1 = $options['facebook'];
		echo $option1;*/
		
		
		echo "</div>";

	}
	add_shortcode( 'floatingsocial', 'custom_shortcode' ); //floatingsocial shotcode

	if( is_admin() )
    $my_settings_page = new MySettingsPage();

	
	/*function hook_css() {
		
		echo "<div class='option'>";
	//echo "<h1>class</h1>";
	//echo "<img src='http://localhost/wordpress/wp-content/uploads/2019/06/new4-5.jpg'>";
	//echo "<ul class='icon-list'>";
	$options = get_option('my_option_name', 'default text');
	
	$favebook__value = $options['facebook'];
	$linkedin_value = $options['linkedin'];
	$pintrest_value = $options['pinterest'];
	$twitter_value = $options['twitter'];
	$youtube_value = $options['youtube'];
	$stumble_value = $options['stumbleupon'];
	$insta_value = $options['instagram'];
	//$insta_value = $options['linkedin'];
	
	
	 ?>
	<a href="<?php echo $favebook__value?>"><img src='http://localhost/wordpress/wp-content/plugins/floatingsocial/image/fb.png' id='fb'></a><br>
	<a href="<?php echo $linkedin_value?>"><img src='http://localhost/wordpress/wp-content/plugins/floatingsocial/image/in.png' id='link'></a><br>
	<a href="<?php echo $pintrest_value?>"><img src='http://localhost/wordpress/wp-content/plugins/floatingsocial/image/pinit.png' id='pin'></a><br>
	<a href="<?php echo $twitter_value?>"><img src='http://localhost/wordpress/wp-content/plugins/floatingsocial/image/tw.png' id='twitr'></a><br>
	<a href="<?php echo $youtube_value?>"><img src='http://localhost/wordpress/wp-content/plugins/floatingsocial/image/youtube.png' id='youtube'></a><br>
	<a href="<?php echo $stumble_value?>"><img src='http://localhost/wordpress/wp-content/plugins/floatingsocial/image/stumbleupon.png' id='stumbleupon'></a><br>
	<a href="<?php echo $insta_value?>"><img src='http://localhost/wordpress/wp-content/plugins/floatingsocial/image/.png' id='rss'></a><br>
	<a href="<?php echo $linkedin_value?>"><img src='http://localhost/wordpress/wp-content/plugins/floatingsocial/image/r.png' id='tumblr'></a><br>
	<?php
	echo "</ul>";
	
	$options = get_option('my_option_name', 'default text');
	$option = $options['linkedin'];
	echo $option;
	
	$options1 = get_option('my_option_name', 'default text');
	$option1 = $options['facebook'];
	echo $option1;*/
	
	
	//echo "</div>";
	
	//}
	//add_action('wp_head', 'hook_css');
	


/*function themeslug_enqueue_script() {
	wp_enqueue_script( 'my-js', 'http://localhost/wordpress/wp-content/plugins/floatingsocial/js/custom.js', false );
}*/

// add css file for admin-dashboard pages
	function load_custom_wp_admin_style() {
			wp_register_style( 'custom_wp_admin_css', 'http://localhost/wordpress/wp-content/plugins/floatingsocial/css/admin-style.css', false, '1.0.0' );
			wp_enqueue_style( 'custom_wp_admin_css' );
	}
	add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

//add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_script' );

	function themeslug_enqueue_style() {
		wp_enqueue_style( 'core', 'http://localhost/wordpress/wp-content/plugins/floatingsocial/css/plugin_style.css', false ); 
	}
	add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_style' );

	//plugin activation hook
	register_activation_hook( __FILE__, array( 'Floating-social', 'plugin_activation' ) );
	//plugin deactivation setting hook
	register_deactivation_hook( __FILE__, array( 'Floating-social', 'plugin_deactivation' ) );

