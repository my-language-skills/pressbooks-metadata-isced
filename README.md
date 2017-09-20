## Pressbooks-metadata-for-languages
 
Contributors: @colomet,  @nicoleacuna, @MashRoofa

Tags: pressbooks, links

Tested up to: [![WordPress](https://img.shields.io/wordpress/v/akismet.svg)](https://wordpress.org/download/)


Stable tag: [![Current Release](https://img.shields.io/github/release/Books4Languages/pressbooks-metadata-isced.svg)](https://github.com/Books4Languages/pressbooks-metadata-isced/releases/latest/)

License:  [![License](https://img.shields.io/badge/license-GPL--2.0%2B-red.svg)](https://github.com/Books4Languages/pressbooks-metadata-isced/blob/master/license.txt)

License URI: http://www.gnu.org/licenses/gpl-2.0.html

## Description  
This plugin is an add on plugin used to extend the educational vocabulary 'isced-field' property from the All In One Metadata Plugin'. You can choose between **LANGUAGES**, **BROAD FIELDS**, **NARROW FIELDS**, **DETAILED FIELDS**. If you choose languages then a select with 30 languages will be displayed, if you choose Broad fields the first column of **ISCED FIELD** will be displayed, if you choose narrow fields the second column of **ISCED FIELD** will be displayed, and finally if you select detailed fields the third column of **ISCED FIELD** will be displayed. We use boilerplate 3.0 version to create this plugin.


This is the link to see **ISCED FIELDS**, [ISCED](http://alliance4universities.eu/wp-content/uploads/2017/03/ISCED-2013-Fields-of-education.pdf).

## Installation 
1. Clone (or copy) this repository to the /wp-content/plugins/ directory.
2. Activate the plugin through the  'Plugins' screen in WordPress.

## Frequently Asked Questions 


## Requirements 
Plugin works with:

- ![PHP](https://img.shields.io/badge/PHP-5.6.X-blue.svg)

- [![Pressbooks](https://img.shields.io/badge/Pressbooks-V%203.9.9-red.svg)](https://github.com/pressbooks/pressbooks/releases/tag/3.9.9)

- This plugin requires having the [All In One Metadata](https://github.com/Books4Languages/pressbooks-metadata) plugin enabled.


## Disclaimers 
The Pressbooks plugin is supplied "as is" and all use is at your own risk.

## Screenshots 
You can see all of the screenshots of the plugin [here](https://github.com/Books4Languages/pressbooks-metadata-isced/blob/master/pressbooks-isced-fields/screenshots/screenshots.md).
## Roadmap


## Changelogs 

### 0.1
* **ADDITIONS**

	* New section page: **ISCED FIELD** 

	* New radio-buttons in section

	 	* **Languages**
	 	* **Broad Fields**
	 	* **Narrow Fields**
	 	* **Detailed Fields**

	* New select field in Book Info and Site Meta

	 	* **languages**
	 	* **broad**
	 	* **narrow**
	 	* **detailed**

 	* In **Pressbooks_Isced_Fields** class 

 		* New action: **admin_init**, this action call the **register_isced_setting**.
 		* New action: **admin_menu**, this action call the **options_page_generate**.

	* In **Pressbooks_Isced_Fields_Admin** class 	

		* New function:  **options_page_generate**, this function creates the options page. 
		* New function: **register_isced_setting**, Creates and registers the setting for the radio buttons.
		* New function: **render_isced_options**, Renders the radio buttons on the options page.
		* New function: **get_isced_field**, This function outputs an array to the All In One Metadata plugin, this array sets up the isced field.



* **List of files revised**

	* admin/class-pressbooks-isced-fields-admin.php
	* includes/class-pressbooks-isced-fields.php



## Upgrade Notice 

### 0.1
To use the first version of the plugin.


## Credits 
Here's a link to [WordPress Plugin Boilerplate](http://wppb.io/).

Here's a link to [WordPress](https://wordpress.org/)

Here's a llink to [PressBooks](https://pressbooks.org/get-involved/)

Here's a link to [Pandao](https://pandao.github.io/editor.md/en.html)

Here's a link to [Markdown's Syntax Documentation](https://daringfireball.net/projects/markdown/syntax)



