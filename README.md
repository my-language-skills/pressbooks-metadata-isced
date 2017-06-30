## Pressbooks-metadata-for-languages
 
Contributors: @colomet,  @nicoleacuna

Tags: pressbooks, links

Tested up to: [![WordPress](https://img.shields.io/wordpress/v/akismet.svg)](https://wordpress.org/download/)


Stable tag: [![Current Release](https://img.shields.io/github/release/Books4Languages/pressbooks-metadata-isced.svg)](https://github.com/Books4Languages/pressbooks-metadata-isced/releases/latest/)

License:  [![License](https://img.shields.io/badge/license-GPL--2.0%2B-red.svg)](https://github.com/Books4Languages/pressbooks-metadata-isced/blob/master/license.txt)

License URI: http://www.gnu.org/licenses/gpl-2.0.html

## Description  
With this plugin you can choose in Pb settings the type of select you want to see the book info. You can choose between **LANGUAGES**, **BROAD FIELDS**, **NARROW FIELDS**, **DETAILED FIELDS**. If you choose languages then a select with 30 languages will be displayed, if you choose Broad fields the first column of **ISCED FIELD** will be displayed, if you choose narrow fields the second column of **ISCED FIELD** will be displayed, and finally if you select detailed fields the third column of **ISCED FIELD** will be displayed. We use boilerplate 3.0 version to create this plugin.


This is the link to see **ISCED FIELDS**, [ISCED](http://alliance4universities.eu/wp-content/uploads/2017/03/ISCED-2013-Fields-of-education.pdf).

## Installation 
1. Clone (or copy) this repository to the /wp-content/plugins/ directory.
2. Activate the plugin through the  'Plugins' screen in WordPress.

## Frequently Asked Questions 


## Requirements 
Plugin works with:

- ![PHP](https://img.shields.io/badge/PHP-5.6.X-blue.svg)

- [![Pressbooks](https://img.shields.io/badge/Pressbooks-V%203.9.9-red.svg)](https://github.com/pressbooks/pressbooks/releases/tag/3.9.9)

- This plugin requires having the pressbooks-metadata plugin enabled.


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

	* New select field in Book Info (Only one of them is created)

	 	* **languages**
	 	* **broad**
	 	* **narrow**
	 	* **detailed**

 	* In **Pressbooks_Isced_Fields** class 

 		* New action: **admin_init**, this action call the **options_checkbox**.
 		* New action: **custom_metadata_manager_init_metadata**, this action call the **add_checkboxs**.

	* In **Pressbooks_Isced_Fields_Admin** class 	

		* New function:  **options_checkbox**, this function create and registrate a new section and fields. 
		* New function: **ISCED_callback($args)**, is section callback that creates a checkboxs of new section.
		* New function: **option_checked**. It verifies that radio button has been selected ans returns the value selected.
		* New function: **add_checkboxs**, according to the information received from **option_checked**, it creates a select field with the information that is in the corresponding file. There are 4 files that contain columns of FIELDS ISCED and one more that contains 30 languages.



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

Here's a link to [Dilinger](http://dillinger.io/)

Here's a link to [Markdown's Syntax Documentation](https://daringfireball.net/projects/markdown/syntax)



