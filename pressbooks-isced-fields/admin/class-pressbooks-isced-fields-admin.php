<?php


/**
 * The admin-specific functionality of the plugin.
 *
 * @link       Nicole Acuna - Christos Amyrotos
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

    /**
     * This function is responsible for setting up the
     * options page for the plugin
     *
     */
	function options_page_generate(){
        add_options_page(
            'All In One Metadata ISCED Fields',
            'Isced Fields',
            'manage_options',
            'isced_fields_options',
            array($this,'render_isced_options')
        );
    }

    /**
     * This function is responsible for registering the
     * setting for the radio button
     *
     */
    function register_isced_setting(){
        register_setting('isced_options_group', 'isced_settings');
    }

    /**
     * This function is responsible for rendering the
     * options page
     *
     */
    function render_isced_options() { ?>
        <div>
            <h2>Options</h2>
            <form method="post" action="options.php">
                <?php
                settings_fields('isced_options_group');
                $options = get_option('isced_settings');
                ?>
                <p> Choose one of the ISCED fields of education and training or Languages field to show in the educational metabox</p>
                <input type="radio" name="isced_settings[radio1]" value="languages" <?php checked('languages', $options['radio1']); ?> />LANGUAGES<br />
                <input type="radio" name="isced_settings[radio1]" value="broad_fields" <?php checked('broad_fields', $options['radio1']); ?> />BROAD FIELDS<br />
                <input type="radio" name="isced_settings[radio1]" value="narow_fields" <?php checked('narow_fields', $options['radio1']); ?> />NARROW FIELDS<br />
                <input type="radio" name="isced_settings[radio1]" value="detailed_fields" <?php checked('detailed_fields', $options['radio1']); ?> />DETAILED FIELDS<br />
                <?php submit_button(); ?>
            </form>
        </div>
    <?php }

    /*
    * This function is responsible for creating the different 
    * select according to the information received from the  
    * option_checked function.
    */
	public static function get_isced_field(){
		$option = get_option('isced_settings');
		$selectedRadio = $option['radio1'];

		//This switch is used to create a select or another depending 
		//on the parameter that is passed.
		switch ($selectedRadio) {
			// if the  $op_check is lang
			case 'languages':
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
			    
				return array('isced_field' => array(true,'Field of languages','The most important languages.',$a));
				break;

			// if the  $op_check is broad
			case 'broad_fields':
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
				return array('isced_field' => array(true,'Broad ISCED field','Broad field according to ISCED-F 2013.'. '<br><a target="_blank" href="http://alliance4universities.eu/wp-content/uploads/2017/03/ISCED-2013-Fields-of-education.pdf">Click Here for more information</a>',$a));
			   break;

			//// if the  $op_check is narrow
			case 'narow_fields':
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
				return array('isced_field' => array(true,'Narrow ISCED field','Narrow field according to ISCED-F 2013.'. '<br><a target="_blank" href="http://alliance4universities.eu/wp-content/uploads/2017/03/ISCED-2013-Fields-of-education.pdf">Click Here for more information</a>',$na));
				break;

			//// if the  $op_check is detailed
			case 'detailed_fields':
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
			    return array('isced_field' => array(true,'Detailed ISCED field','Detailed field according to ISCED-F 2013.'. '<br><a target="_blank" href="http://alliance4universities.eu/wp-content/uploads/2017/03/ISCED-2013-Fields-of-education.pdf">Click Here for more information</a>',$na));
				break;

				default:
				return null;
		}
	}
}
