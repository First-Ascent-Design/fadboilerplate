# First Ascent Design Theme Boilerplate.
---
## A boilerplate for First Ascent Design

Remember to handle line endings correctly in git.
If you're developing on Windows
`git config --global core.autocrlf true`
If you're developing on Mac/Linux
`git config --global core.autocrlf input`

## Requires 

*  [WP CLI](http://wp-cli.org/)
*  LAMP Stack
*  Python
*  SCSS (Ruby Sass or Node Sass)

## Includes

*  [Mobile_Detect.php](http://mobiledetect.net)
*  [Boostrap 4](http://getbootstrap.com/)
*  [Bourbon.io](http://bourbon.io/)
*  [Slick Slider](https://kenwheeler.github.io/slick/)
*  [TweenMax](https://greensock.com/tweenmax/)
*  [GASP](https://greensock.com/get-started/#loading-gsap)
*  [ScrollMagic](https://scrollmagic.io/)
*  [Jquery Match Height](https://github.com/liabru/jquery-match-height)
*  [Popper.js](https://popper.js.org/)
*  [Respond.js](https://github.com/scottjehl/Respond)

## Recommendations

*  we recommend setting up a local environment using [Vagrant](https://www.vagrantup.com/) and [Scotch Box](https://box.scotch.io/)
*  If you don't want to setup a local environment, we recommend using [CloudNine](https://c9.io)

## Getting Started:

*  Navigate to the new project root directory
*  Pull down WordPress core using wp cli
   `wp core download`
*  Clone the repo into the wp-content/themes/ folder
*  Remove the git folder 
*  Rename the theme folder
*  Edit helpers/renameall.py to handle all the file and filename renames
*  Run helpers/renameall.py 
*  Edit wp-content/themes/mytheme/wp-config-local.php to match the site URL and database credentials
*  Edit helpers/wp_init.sh with your needs and credentials
*  Run helpers/wp_init.sh 

## Theme Folder Structure
**fadboilerplate**
 
*  **/acf-json**
   Stores JSON files for ACF fields. [ACF Local JSON](https://www.advancedcustomfields.com/resources/local-json/)
*  **/bin**
   bundle directory from Underscores.me
*  **/blocks**
   directory for handling Gutenberg blocks
*  **/helpers**
   scripts meant to help get this boilerplate setup
*  **/img**
   Images that are inherent to the theme. Please think if these are necessary here, or better in the WP media area.
   These images are tracked in git.
*  **/inc**
   PHP files to be included in functions.php
*  **/js**
   Theme javascript files
*  **/languages**
   Translations
*  **/lib**
   Area for external libraries added in whole.
*  **/ninja-forms**
   Template files for Ninja Forms 3
*  **/post-types**
   Generated by wp-cli '''wp scaffold post-type'''
   http://wp-cli.org/commands/scaffold/
*  **/scss**
   SCSS files for styles.
   To compile run
   ```$: cd {theme-root}; sass --watch scss:css```
*  **/shortcodes**
   Files for WordPress shortcodes.
*  **/snippets**
   Misc code snippets that could be useful
*  **/svg**
   Area to store and handle SVGs. Contains an svg-handler php file that's added to functions.php
*  **/taxonomies**
   Generated by wp-cli '''wp scaffold taxonomy'''
   http://wp-cli.org/commands/scaffold/

## Typical Plugins
These are typically installed by wp-cli and in wp_init.sh

*  Advanced Custom Fields
*  BackWPUp
*  Duplicate-Post
*  Google Analytics for WordPress Pro
*  JetPack
*  Ninja Forms Pro
*  Regenerate Thumbnails
*  Tiny Compress Images
*  Tinymce Advanced
*  White Label CMS
*  WordFence
*  Monster Analtyics Pro
*  Easysmtp
*  redirection
*  wordpress-importer

## Typical Development Plugins

*  aryo-activity-log
*  bulk-block-converter
*  show-current-template
*  simply-show-hooks

## Must-Use Plugins

*  disable-plugins-in-development.php (In the /helpers directory)

# Practices to follow
## Page-specific templates
Page-specific templates should have

*  a `page-{name}.php` main template file
*  and a `ontent-{name}.php` content file
*  e.g. `page-about.php` and `content-about.php`
*  Reusable sections of the site should be in the `/partials` folders
    *  and named `partial-{name-of-feature-or-section}.php`

## Block Folder Structure
This theme uses Advanced Custom Fields (ACF) to register custom blocks
In the /blocks directory you will find

*  Blocks
    *  `acf-blocks.php` Register blocks, change wrappers around core blocks
    *  `_blocks.php` Main style importer for blocks
    *  Block Subfolders
        *  `example-block.php` main template file for the example block
        *  `_example.scss` main styles file for the example block

## Keep This Readme up to date

*  Update the theme's readme.md with pertinent information as you go.

## Mobile First Styling
We will use Bootstrap 4 mobile-first styling breakpoints

*  Extra small devices (portrait phones, less than 576px)
    *  No media query for `xs` since this is the default in Bootstrap
*  Small devices (landscape phones, 576px and up)
    *  `@media (min-width: 576px) { ... }`
*  Medium devices (tablets, 768px and up)
    *  `@media (min-width: 768px) { ... }`
*  Large devices (desktops, 992px and up)
    *  `@media (min-width: 992px) { ... }`
*  Extra large devices (large desktops, 1200px and up)
    *  `@media (min-width: 1200px) { ... }`

## Theme Options Settings
Typically set up in an ACF Theme options area.

*  company_logo
*  footer_logo
*  phone
*  email
*  facebook_url
*  instagram_url
*  twitter_url
*  linkedin_url
*  form_shortcode
*  menu
Used in header.php, footer.php, etc.

---
# TODO

*  Update and streamline renameall.py
*  Add variables to wp_init.sh 
*  Add ability to install pro plugins hosted by FA to wp_init.sh
*  Look into using transients to store menu results, mentioned in the readme here (https://github.com/wp-bootstrap/wp-bootstrap-navwalker)
*  Build process
*  Include prefixer in build process https://github.com/postcss/autoprefixer
*  Include [Bourbon](https://github.com/thoughtbot/bourbon#installation) if mixins are helpful

# Thoughts for the future

*  Bootstrap Gutenberg Blocks. Not implemented yet. https://github.com/liip/bootstrap-blocks-wordpress-plugin
*  [Blocklab](https://getblocklab.com/) potentially instead of ACF for developing blocks.
*  [UnderStap](https://understrap.com/) integrates Bootstrap into Underscores.me, WooCommerce, and Blocks.


---

### README from Underscores.me
---

Hi. I'm a starter theme called `_s`, or `underscores`, if you like. I'm a theme meant for hacking so don't use me as a Parent Theme. Instead try turning me into the next, most awesome, WordPress theme out there. That's what I'm here for.

My ultra-minimal CSS might make me look like theme tartare but that means less stuff to get in your way when you're designing your awesome theme. Here are some of the other more interesting things you'll find here

*  A modern workflow with a pre-made command-line interface to turn your project into a more pleasant experience.
*  A just right amount of lean, well-commented, modern, HTML5 templates.
*  A custom header implementation in `inc/custom-header.php`. Just add the code snippet found in the comments of `inc/custom-header.php` to your `header.php` template.
*  Custom template tags in `inc/template-tags.php` that keep your templates clean and neat and prevent code duplication.
*  Some small tweaks in `inc/template-functions.php` that can improve your theming experience.
*  A script at `js/navigation.js` that makes your menu a toggled dropdown on small screens (like your phone), ready for CSS artistry. It's enqueued in `functions.php`.
*  2 sample layouts in `sass/layout/` made using CSS Grid for a sidebar on either side of your content. Just uncomment the layout of your choice in `sass/site/_site.scss`.
Note: `.no-sidebar` styles are automatically loaded.
*  Smartly organized starter CSS in `style.css` that will help you to quickly get your design off the ground.
*  Full support for `WooCommerce plugin` integration with hooks in `inc/woocommerce.php`, styling override woocommerce.css with product gallery features (zoom, swipe, lightbox) enabled.
*  Licensed under GPLv2 or later. :) Use it to make something cool.

Installation
---------------

### Requirements

`_s` requires the following dependencies:

*  [Node.js](https://nodejs.org/)
*  [Composer](https://getcomposer.org/)

### Quick Start

Clone or download this repository, change its name to something else (like, say, `megatherium-is-awesome`), and then you'll need to do a six-step find and replace on the name in all the templates.

1. Search for `'_s'` (inside single quotations) to capture the text domain and replace with: `'megatherium-is-awesome'`.
2. Search for `_s_` to capture all the functions names and replace with: `megatherium_is_awesome_`.
3. Search for `Text Domain: _s` in `style.css` and replace with: `Text Domain: megatherium-is-awesome`.
4. Search for <code>&nbsp;_s</code> (with a space before it) to capture DocBlocks and replace with: <code>&nbsp;Megatherium_is_Awesome</code>.
5. Search for `_s-` to capture prefixed handles and replace with: `megatherium-is-awesome-`.
6. Search for `_S_` (in uppercase) to capture constants and replace with: `MEGATHERIUM_IS_AWESOME_`.

Then, update the stylesheet header in `style.css`, the links in `footer.php` with your own information and rename `_s.pot` from `languages` folder to use the theme's slug. Next, update or delete this readme.

### Setup

To start using all the tools that comes with `_s`  you need to install the necessary Node.js and Composer dependencies :

```sh
$ composer install
$ npm install
```

### Available CLI commands

`_s` comes packed with CLI commands tailored for WordPress theme development :

- `composer lint:wpcs` : checks all PHP files against [PHP Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/).
- `Composer lint:php` : checks all PHP files for syntax errors.
- `Composer make-pot` : generates a .pot file in the `language/` directory.
- `npm run compile:css` : compiles SASS files to css.
- `npm run compile:rtl` : generates an RTL stylesheet.
- `npm run lint:scss` : checks all SASS files against [CSS Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/css/).
- `npm run lint:js` : checks all JavaScript files against [JavaScript Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/javascript/).
- `npm run bundle` : generates a .zip archive for distribution, excluding development and system files.

Now you're ready to go! The next step is easy to say, but harder to do: make an awesome WordPress theme. :)

Good luck!
