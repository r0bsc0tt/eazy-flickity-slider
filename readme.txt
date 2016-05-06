=== Eazy Flickity Slider ===
Contributors: r0bsc0tt
Tags: slider, flickity
Requires at least: 4.5
Tested up to: 4.5.1
Stable tag: trunk
License: GPLv2 or any later version
License URI: http://www.gnu.org/licenses/gpl-2.0.txt

Eazy Flickity Slider is an easy to use slider that uses Flickity.js by Metafizzy to animate the slider.

== Description ==
Adding slides is as easy as adding a post. Creating a slider works like adding a post to a category. You can then use a shortcode to get the slider to display on your site. There is a shortcode generator that shows up next to the add media button on the edit post & edit page sections of the admin. 
The plugin uses flickity.js by Metafizzy to animate the slider. 

== Installation ==
1. Add plugin 
2. Activate plugin
3. Navigate to Eazy Flickity Slider section of admin
4. Add a new slide, just like adding a post. Use the featured image to add the slide image. 
5. You can group your slides into sliders, like categories on posts.
7. Add your slider using the Flickity Slider button above the editor or use [eazy-flickity-slider  eazy_flickity_slider=\"YOUR-SLIDER-NAME\"]


== Frequently Asked Questions ==
= How do add a slider? =
Click on the \'Add New Slide\' item under the Eazy Flickity Slider section in your admin. You can add the slider image like you would a post; Give it a title, then navigate to the Eazy Flickity Slider box on the right and either add it to an existing slider or click on add new slider and add one. Add the image using the Add Eazy Flickity Slide Image box below the Eazy Flickity Sliders box. 

= How do I set the size of the slider? =
If you are using the Flickity Slider button, it will ask you for a width and height. It is important to set the unit of measure you are using. (i.e. px, em, %, vw etc.)
If you are adding your own shortcode you should pass height & width arguments. [eazy-flickity-slider height=\"100px\" width=\"100px\"]

= How do I set the movement of the slider? =
Unfortunately, there are not currently any controls for the slider built into the plugin. You would need to edit eazy-flickity-slider/resources/js/flickity.shortcode.js. You can change these settings using the settings defined by Metafizzy for the flickity.js libray. 

== Screenshots ==
1. Eazy Flickity Slider main screen.
2. Add a slide. Include title & add slider using Eazy Flickity Sliders box
3. Click add featured image to include slide image using media library.
4. Shows a slide completed. (includes title, slider category & image)
5. Add a slider using the Flickity Slider button next to the Media Library button.
6. Select your slider from the drop down menu and add the size.
7. Shows shortcode added to editor. 
8. Slider appears via WordPress magic. 

== Changelog ==
= 1.0 =
* Initial version of plugin.