<?php

// All the ACF fields
require_once('functions/acf.php');

// Gutenberg posts / flexible content pages
// Reigsters "Featured images"
// Registers "Custom logo"
// Enables SVG uploads
// Removes inline SVG in frontend
// Registers "menus"
// Enqueues styles, scripts and slick
// Registers "reusable blocks"
// Removes "homepage settings" and "additional css" from the customise section
// Changes excerpt length and output
// Custom image sizes
require_once('functions/setup.php');

// Author bio
require_once('functions/author-bio.php');

// Gutenberg customisation -- NOT CURRENTLY USED --
//require_once('functions/gutenberg.php');