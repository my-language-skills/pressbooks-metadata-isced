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
	/*
	*
	*This function create a new section and new field in pressbooks 
	*metadata options page.
	*
	* @since 0.1
	*/
	public function options_checkbox(){

	$first=true;
    $count=0;
    //create a new section
    add_settings_section(  
    'ISCED_FIELD', // Section ID 
    'ISCED FIELD', // Section Title
    array( $this, 'ISCED_callback'), // Callback
    'pressbooks-metadata_options_page' // What Page?  
    );

    // Next, we will introduce the fields
    add_settings_field( 
    'options_isced',// ID used to identify the field throughout the theme
    'OPTIONS', // The label to the left of the option interface element
     array( // The array of arguments to pass to the callback. 
        $this,'options_isced_callback'
    ),   // The name of the function responsible for rendering the option interface
    'pressbooks-metadata_options_page',// The page on which this option will be displayed
    'ISCED_FIELD'     // The name of the section to which this field belongs
   
     );

    //register the setting field
    register_setting( 'pressbooks-metadata_options_page', 'options_isced' );

    }

    /*
    * This function is the one that is in charge of painting
    * in pressboks-metadata_options_page the radio buttons (code html).
    * It receives as argument the array that is created when we created 
    * the setting field
    *
    */
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

	/*
	* This function is the section Callback
	* It is responsible for demonstrating a brief explanation of the 
	* settings fields.
	* @since 0.1
	*/
	function ISCED_callback() { // Section Callback
    echo '<p> ISCED fields of education and training </p>';  
	}


	/**
	* This function is responsible for collecting information 
	* in the database. It verifies that radio button 
	* (languages, broad, narrow, detailed) has been selected.
	* According to this information it returns one value or another.
	*
	*/
	public function option_checked() {
		global $wpdb;
		//access to database in table that prefix is options.
		$table_op = $wpdb->prefix .'options';
		//Take the value of options_isced field.
		$op_res = $wpdb->get_results("SELECT option_value FROM $table_op WHERE  option_name='options_isced' ");		
		//for for option_isced
        foreach($op_res as $option_name) {
        	//take tha value of options_isced
		    $op_res=$option_name->option_value;
		    // if the value is lang returns lang
		    if($op_res=='lang')
		     	$res= 'lang';
		    //if the value is broad returns broad
		    else if($op_res=='broad')
		    	$res='broad';
		    //if the value is narrow returns narrow
		    else if($op_res=='narrow')
		    	$res='narrow';
		    //if the value is detailed returns detailed
		    else if($op_res=='detailed')
		    	$res='detailed';
		}
		
		return $res;
    }

    /*
    * This function is responsible for creating the different 
    * select according to the information received from the  
    * option_checked function.
    *
    *
    */
	
	public function add_checkboxs(){
		//call the option_checked function
		$op_check=$this->option_checked();
		
		//This switch is used to create a select or another depending 
		//on the parameter that is passed.
		switch ($op_check) {
			// if the  $op_check is lang
			case 'lang':
				//create array
				$a=array();
				//open the langu.txt file
				$archivo = file( plugin_dir_url( __FILE__ ) . 'langu.txt' ); 
				//count the lineas of file
			    $lineas = count( $archivo ); 
			    //for for lineas of file
			    for( $i = 0; $i < $lineas; $i++ ) {
			    	//We are left with the first column
			    	$indi = strstr($archivo[$i], ' ', true);
			    	//We are left with the second column	
			    	$lan=  strstr($archivo[$i], ' ');
			    	//remove the space
			    	$opti=trim($indi);	 
			    	//save the value in asociative array  	
			        $a[$opti]=$lan; 
			    }
			    
				// we create a new select field in creative-work group in Book Info,the values of this select field is the array.
				x_add_metadata_field('pb_isced_field_metadata','metadata', array(
				'group' 		=>	'creative-work',
				'field_type' 	=>	'select',
				'values' 		=>	$a,
				'label' 		=> 	'ISCED field of languages',
				'description' 	=> 	'Broad field of languages according to ISCED-F 2013.'. '<br><a target="_blank" href="http://alliance4universities.eu/wp-content/uploads/2017/03/ISCED-2013-Fields-of-education.pdf">Click Here for more information</a>'
		) );
			
			
				break;
			// if the  $op_check is broad
			case 'broad':
				//create array
				$a=array();
				//open the broad.txt file
				$archivo = file( plugin_dir_url( __FILE__ ) . 'broad.txt' ); 
				//count the lineas of file
			    $lineas = count( $archivo ); 
			     //for for lineas of file
			    for( $i = 0; $i < $lineas; $i++ ) {//remove the space
			    	//remove the space
			    	$opti=trim($archivo[$i]);
			    	//save the value in asociative array  				    	
			        $a[$opti]=$archivo[$i]; 
			    }
			    // we create a new select field in creative-work group in Book Info,the values of this select field is the array.
				x_add_metadata_field('pb_isced_field_broad','metadata', array(
				'group' 		=>	'creative-work',
				'field_type' 	=>	'select',
				'values' 		=>	$a,
				'label' 		=> 	'Broad ISCED field ',
				'description' 	=> 	'Broad field  according to ISCED-F 2013.'. '<br><a target="_blank" href="http://alliance4universities.eu/wp-content/uploads/2017/03/ISCED-2013-Fields-of-education.pdf">Click Here for more information</a>'
		) );


				
				break;
			//// if the  $op_check is narrow
			case 'narrow':
				//create array
				$na=array();
				//open the narrow.txt file
				$archivo = file( plugin_dir_url( __FILE__ ) . 'narrow.txt' ); 
				//count the lineas of file
			    $lineas = count( $archivo ); 
			     //for for lineas of file
			    for( $i = 0; $i < $lineas; $i++ ) {
			    	//remove the space
			    	$opti=trim($archivo[$i]);	
			    	//save the value in asociative array  	
			        $na[$opti]=$archivo[$i]; 
			    }
			    // we create a new select field in creative-work group in Book Info,the values of this select field is the array.
				x_add_metadata_field('pb_isced_field_narrow','metadata', array(
				'group' 		=>	'creative-work',
				'field_type' 	=>	'select',
				'values' 		=>	$na,
				'label' 		=> 	'Narrow ISCED field ',
				'description' 	=> 	'Narrow field  according to ISCED-F 2013.'. '<br><a target="_blank" href="http://alliance4universities.eu/wp-content/uploads/2017/03/ISCED-2013-Fields-of-education.pdf">Click Here for more information</a>'
		) );
				break;
			//// if the  $op_check is detailed
			case 'detailed':
				//create array
				$na=array();
				//open the detailed.txt file
				$archivo = file( plugin_dir_url( __FILE__ ) . 'detailed.txt' );
				//count the lineas of file 
			    $lineas = count( $archivo );
			     //for for lineas of file 
			    for( $i = 0; $i < $lineas; $i++ ) {
			    	//remove the space
			    	$opti=trim($archivo[$i]);	
			    	//save the value in asociative array  			    
			        $na[$opti]=$archivo[$i]; 
			    }
			    // we create a new select field in creative-work group in Book Info,the values of this select field is the array.
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
