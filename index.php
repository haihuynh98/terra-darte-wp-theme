<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Peugeot_Vung_Tau
 */

get_header();
?>

<?php
//
// build banner section
get_template_part( 'elements/home/banner-image');

get_template_part( 'elements/home/about-us');
get_template_part( 'elements/home/our-services');
get_template_part( 'elements/home/quote');
get_template_part( 'elements/home/our-partner');
get_template_part( 'elements/home/our-projects');

?>

<?php
get_footer();
