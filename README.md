## Pressbooks-metadata-for-languages
 
Contributors: @colomet,  @nicoleacuna

Tags: pressbooks, links

Tested up to: [![WordPress](https://img.shields.io/wordpress/v/akismet.svg)](https://wordpress.org/download/)


Stable tag: [![Current Release](https://img.shields.io/github/release/Books4Languages/pressbooks-metadata.svg)](https://github.com/Books4Languages/pressbooks-metadata/releases/latest/)

License:  [![License](https://img.shields.io/badge/license-GPL--2.0%2B-red.svg)](https://github.com/Books4Languages/pressbooks-metadata/blob/master/license.txt)

License URI: http://www.gnu.org/licenses/gpl-2.0.html

## Description  
With this plugin you can choose in Pb settings the type of select you want to see the book info.You can choose between **LANGUAGES**, **BROAD FIELDS**, **NARROW FIELDS**, **DETAILED FIELDS**. If you choose languages then a select with 30 languages will be displayed, if you choose Broad fields the first column of ISCED FIELD will be displayed, if you choose narrow fields the second column of ISCED FIELD will be displayed, and finally if you select detailed fields the third column of ISCED FIELD will be displayed.

This is the link to see ISCED FIELDS, [ISCED](http://alliance4universities.eu/wp-content/uploads/2017/03/ISCED-2013-Fields-of-education.pdf).

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
You can see all of the screenshots of the plugin [here](https://github.com/Books4Languages/pressbooks-metadata-related_content/blob/master/pressbooks-related-content/screenshots/screenshots.md).
## Roadmap


## Changelogs 

### 0.1
* **ADDITIONS**

	* New option page: **ISCED FIELD** in Pressbooks Metadata Settings
 	* New radio button: **Languages** in Pressbooks Metadata Settings
 	* New radio button: **Broad Fields** in Pressbooks Metadata Settings
 	* New radio button: **Narrow Fields** in Pressbooks Metadata Settings
 	* New radio button: **Detailed Fields** in Pressbooks Metadata Settings
 	* New select: **languages** in Book info.
 	* New select: **broad** in Book info.
 	* New select: **narrow** in Book info.
 	* New select: **detailed** in Book info.

 	* In Pressbooks_Isced_Fields class 

 		* New action: **admin_init**, this action call the options_checkbox function of Pressbooks_Isced_Fields_Admin class.
 		* New action: **custom_metadata_manager_init_metadata**, this action call the add_checkboxs of Pressbooks_Isced_Fields_Admin class.

	* In Pressbooks_Isced_Fields_Admin class 	

		* New function:  **options_checkbox**, this function create and registrate a new section and fields in pressbooks-metadata_options_page.
		* New function: **option_isced_callback($args)**, this function is the one that is in charge of paiting the radio buttons in pressbooks metadata options page.(code HTML). It receives as argument the arrat that is created when we created the setting field. We create 4 radio buttons. One for languages, other for broad fields, other for narrow fields, and other for detailed fields.
		* New function: **ISCED_callback**,  this function is the section callback. It's responsible for demonstrating a brief explanation of the settings fields.
		* New function: **option_checked**, this function is responsible for collecting information in the database.It verifies that radio button (languages, broad, narrow, detailed) has been selected. According to this information it returns one value or another. This function can returns: lang, broad, narrow or detailed.
		* New function: **add_checkboxs**, this function is responsible for creating the different select according to the information received from the **option_checked** function. If it receives 'lang' then it will create a select field with the information that is in the file **langu.txt**. This file contains the 30 most important languages. If it receives 'broad' then it will create a select field with the information that is in the file **broad.txt**. This files contain the first column of ISCED FIELDS. If it receives 'narrow' then it will create a select field with the information that is in the file **narrow.txt**. This files contain the second column of ISCED FIELDS. If it receives 'detailed' then it will create a select field with the information that is in the file **detailed.txt**. This files contain the third column of ISCED FIELDS. 



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



