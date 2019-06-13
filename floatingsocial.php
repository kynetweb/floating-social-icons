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
        );
		
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
      
		//floating_value
        if( isset( $input['facebook'] ) )
            $new_input['facebook'] = sanitize_text_field( $input['facebook'] );		
        if( isset( $input['linkedin'] ) )
            $new_input['linkedin'] = sanitize_text_field( $input['linkedin'] );
        if( isset( $input['pinterest'] ) )
            $new_input['pinterest'] = sanitize_text_field( $input['pinterest'] );
		if( isset( $input['twitter'] ) )
            $new_input['twitter'] = sanitize_text_field( $input['twitter'] ); 
		if( isset( $input['youtube'] ) )
            $new_input['youtube'] = sanitize_text_field( $input['youtube'] );
		 if( isset( $input['stumbleupon'] ) )
            $new_input['stumbleupon'] = sanitize_text_field( $input['stumbleupon'] ); 
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
	
		
}
	// Add Shortcode
	function custom_shortcode() {
		echo "<div class='option'>";		
		$options = get_option('my_option_name');		
		$favebook__value = $options['facebook'];
		$linkedin_value = $options['linkedin'];
		$pintrest_value = $options['pinterest'];
		$twitter_value = $options['twitter'];
		$youtube_value = $options['youtube'];
		$stumble_value = $options['stumbleupon'];
		$insta_value = $options['instagram'];
		
	 ?>
		<a href="<?php echo $favebook__value?>"><img src= '<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'floatingsocial/image/fb.png'; ?>' id='fb'></a>
		<a href="<?php echo $linkedin_value?>"><img src='<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'floatingsocial/image/in.png'; ?>' id='link'></a>
		<a href="<?php echo $pintrest_value?>"><img src='<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'floatingsocial/image/pinit.png'; ?>' id='pin'></a>
		<a href="<?php echo $twitter_value?>"><img src='<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'floatingsocial/image/tw.png'; ?>' id='twitr'></a>
		<a href="<?php echo $youtube_value?>"><img src='<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'floatingsocial/image/youtube.png'; ?>' id='youtube'></a>
		<a href="<?php echo $stumble_value?>"><img src='<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'floatingsocial/image/stumbleupon.png'; ?>' id='stumbleupon'></a>
		<?php
		echo "</div>";

	}
	add_shortcode( 'floatingsocial', 'custom_shortcode' ); //floatingsocial shortcode

	if( is_admin() )
    $my_settings_page = new MySettingsPage();

// add css file for admin-dashboard pages
	function load_custom_wp_admin_style() {
			wp_register_style( 'custom_wp_admin_css',  plugins_url( 'css/admin-style.css', __FILE__ ), false, '1.0.0' );
			wp_enqueue_style( 'custom_wp_admin_css' );
	}
	add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );
	function themeslug_enqueue_style() {
		wp_enqueue_style( 'core', plugins_url( 'css/plugin_style.css', __FILE__ ), false ); 
	}
	add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_style' ); //'wp_enqueue_scripts' is used for enqueuing both scripts and styles.

	//plugin activation hook
	register_activation_hook( __FILE__, array( 'Floating-social', 'plugin_activation' ) );
	//plugin deactivation setting hook
	register_deactivation_hook( __FILE__, array( 'Floating-social', 'plugin_deactivation' ) );

