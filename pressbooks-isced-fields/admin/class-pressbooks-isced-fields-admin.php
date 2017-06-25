<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       Nicole
 * @since      1.0.0
 *
 * @package    Pressbooks_Isced_Fields
 * @subpackage Pressbooks_Isced_Fields/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Pressbooks_Isced_Fields
 * @subpackage Pressbooks_Isced_Fields/admin
 * @author     Nicole <nicoleacuna95@gmail.com>
 */
class Pressbooks_Isced_Fields_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Pressbooks_Isced_Fields_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Pressbooks_Isced_Fields_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/pressbooks-isced-fields-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Pressbooks_Isced_Fields_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Pressbooks_Isced_Fields_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/pressbooks-isced-fields-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function options_checkbox(){

	$first=true;
    $count=0;
    //create a new section
    add_settings_section(  
    'ISCED_FIELD', // Section ID 
    'ISCED FIELD', // Section Title
    array( $this, 'ISCED_callback'), // Callback
    'pressbooks-metadata_options_page' // What Page?  This makes the section show up on the General Settings Page __( 'PB Metadata', 'pressbooks-metadata' )
    );

      // Next, we will introduce the fields for toggling the visibility of content elements.
    add_settings_field( 
    'options_isced',                      // ID used to identify the field throughout the theme
    'OPTIONS',                           // The label to the left of the option interface element
     array(                              // The array of arguments to pass to the callback. In this case, just a description.
        $this,'options_isced_callback'
    ),   // The name of the function responsible for rendering the option interface
    'pressbooks-metadata_options_page',                          // The page on which this option will be displayed
    'ISCED_FIELD'     // The name of the section to which this field belongs
   
     );


    register_setting( 'pressbooks-metadata_options_page', 'options_isced' );

    }


    function options_isced_callback($args) {
     ?>
  
    <input type="radio"  name="options_isced"  value="lang" <?php checked(lang, get_option('options_isced'), true); ?> checked />  LANGUAGES  
    </br>
    </br>
    <input type="radio"  name="options_isced"  value="broad" <?php checked(broad, get_option('options_isced'), true); ?>  /> BROAD FIELDS
    </br>
    </br>
    <input type="radio"  name="options_isced"  value="narrow" <?php checked(narrow, get_option('options_isced'), true); ?>  /> NARROW FIELDS
     </br>
    </br>
    <input type="radio"  name="options_isced"  value="detailed" <?php checked(detailed, get_option('options_isced'), true); ?>  /> DETAILED FIELDS
     
 	<?php
	}


	function ISCED_callback() { // Section Callback
    echo '<p> ISCED fields of education and training </p>';  
	}


	/**
	*Print the selects in book info
	*
	*
	*/
	public function option_checked() {
		global $wpdb;
		$table_op = $wpdb->prefix .'options';
		$res=true;
		$op_res = $wpdb->get_results("SELECT option_value FROM $table_op WHERE  option_name='options_isced' ");		

        foreach($op_res as $option_name) {

		    $op_res=$option_name->option_value;
		    if($op_res=='lang')
		     	$res= 'lang';
		    else if($op_res=='broad')
		    	$res='broad';
		    else if($op_res=='narrow')
		    	$res='narrow';
		    else if($op_res=='detailed')
		    	$res='detailed';
		}
		
		return $res;
    }
	
	public function add_checkboxs(){

		//$r=option_checked();
		$op_check=$this->option_checked();
		

		switch ($op_check) {
			case 'lang':
				$a=array();
				$archivo = file( plugin_dir_url( __FILE__ ) . 'langu.txt' ); 
			    $lineas = count( $archivo ); 
			    for( $i = 0; $i < $lineas; $i++ ) {

			    	$indi = strstr($archivo[$i], ' ', true);	
			    	$lan=  strstr($archivo[$i], ' ');
			    	$opti=trim($indi);	  	
			        $a[$opti]=$lan; 
			    }
			    
			
				x_add_metadata_field('pb_isced_field_metadata','metadata', array(
				'group' 		=>	'creative-work',
				'field_type' 	=>	'select',
				'values' 		=>	$a,
				'label' 		=> 	'ISCED field of languages',
				'description' 	=> 	'Broad field of languages according to ISCED-F 2013.'. '<br><a target="_blank" href="http://alliance4universities.eu/wp-content/uploads/2017/03/ISCED-2013-Fields-of-education.pdf">Click Here for more information</a>'
		) );
				/*global $wpdb;
				$table_delete = $wpdb->prefix .'postmeta';
				$op_res = $wpdb->get_results("DELETE  FROM $table_delete WHERE  meta_key='pb_isced_field_metadata' ");	*/

			
				break;
			case 'broad':
				$a=array();
				$archivo = file( plugin_dir_url( __FILE__ ) . 'broad.txt' ); 
			    $lineas = count( $archivo ); 
			    for( $i = 0; $i < $lineas; $i++ ) {
			    	$opti=trim($archivo[$i]);			    	
			        $a[$opti]=$archivo[$i]; 
			    }
				x_add_metadata_field('pb_isced_field_broad','metadata', array(
				'group' 		=>	'creative-work',
				'field_type' 	=>	'select',
				'values' 		=>	$a,
				'label' 		=> 	'Broad ISCED field ',
				'description' 	=> 	'Broad field  according to ISCED-F 2013.'. '<br><a target="_blank" href="http://alliance4universities.eu/wp-content/uploads/2017/03/ISCED-2013-Fields-of-education.pdf">Click Here for more information</a>'
		) );


				
				break;
			case 'narrow':
				$na=array();
				$archivo = file( plugin_dir_url( __FILE__ ) . 'narrow.txt' ); 
			    $lineas = count( $archivo ); 
			    for( $i = 0; $i < $lineas; $i++ ) {
			    	$opti=trim($archivo[$i]);			    	
			        $na[$opti]=$archivo[$i]; 
			    }
				x_add_metadata_field('pb_isced_field_narrow','metadata', array(
				'group' 		=>	'creative-work',
				'field_type' 	=>	'select',
				'values' 		=>	$na,
				'label' 		=> 	'Narrow ISCED field ',
				'description' 	=> 	'Narrow field  according to ISCED-F 2013.'. '<br><a target="_blank" href="http://alliance4universities.eu/wp-content/uploads/2017/03/ISCED-2013-Fields-of-education.pdf">Click Here for more information</a>'
		) );
				break;
			case 'detailed':
				$na=array();
				$archivo = file( plugin_dir_url( __FILE__ ) . 'detailed.txt' ); 
			    $lineas = count( $archivo ); 
			    for( $i = 0; $i < $lineas; $i++ ) {
			    	$opti=trim($archivo[$i]);			    	
			        $na[$opti]=$archivo[$i]; 
			    }
				x_add_metadata_field('pb_isced_field_detailed','metadata', array(
				'group' 		=>	'creative-work',
				'field_type' 	=>	'select',
				'values' 		=>	$na,
				'label' 		=> 	'Detailed ISCED field ',
				'description' 	=> 	'Detailed field  according to ISCED-F 2013.'. '<br><a target="_blank" href="http://alliance4universities.eu/wp-content/uploads/2017/03/ISCED-2013-Fields-of-education.pdf">Click Here for more information</a>'
		) );
				break;
			default:
				# code...
				break;
		}
		

	}
}
