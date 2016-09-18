/*!
 * Eazy Flickity TINYMCE Submit
 * Licensed GPLv3 for open source use
 */
//set var for properties
var eazy_slider_properties = {"sliders":[]};

//This is run once a user clicks the submit button  
    function insert_eazy_flickity_slider_shortcode() {
      //set variables for width, height & #eazy_slider_name_select
      var eazy_slider_width = jQuery("#form_width").val();
      var eazy_slider_width_display = !eazy_slider_width ? "" : " rel=\"" + eazy_slider_width + "\"";
      var eazy_slider_height = jQuery("#form_height").val();
      var eazy_slider_height_display = !eazy_slider_height ? "" : " rel=\"" + eazy_slider_height + "\"";
      var form_shortcode = jQuery("#eazy_slider_name_select").val();

      var eazy_slider_draggable = jQuery("#eazy-slider-draggable").val();
      var eazy_slider_freescroll = jQuery("#eazy-slider-freescroll").val();
      var eazy_slider_wraparound = jQuery("#eazy-slider-wraparound").val();
      var eazy_slider_autoplay = jQuery("#eazy-slider-autoplay").val();
      var eazy_slider_adaptiveheight = jQuery("#eazy-slider-adaptiveheight").val();
      var eazy_slider_prevnextbuttons = jQuery("#eazy-slider-prevnextbuttons").val();
      var eazy_slider_pagedots = jQuery("#eazy-slider-pagedots").val();
      var eazy_slider_imagesloaded = jQuery("#eazy-slider-imagesloaded").val();
      var eazy_slider_cellalign = jQuery("#eazy-slider-cellalign").val();


      // alert if no slider selected
      if (form_shortcode === "") {
        alert("Please select a slider to use");
        return;
      }
        
      // set undefined height & width to 100%
      if (eazy_slider_width === "") {
        eazy_slider_width = '100%';
      }
      if (eazy_slider_height === "") {
        eazy_slider_height = "100%";
      }

      //if #eazy_slider_name_select is selected, add shortcode to editor       
      if (form_shortcode !== "") {
          // add the shortcoe to the editor
          window.send_to_editor("[eazy-flickity-slider eazy_sliderid=\"" + form_shortcode + "\" width=\"" + eazy_slider_width + "\" height=\"" + eazy_slider_height + "\"]");

          // pass option vars to custom field
            eazy_slider_properties = {
                id: form_shortcode,
                width: eazy_slider_width,
                height: eazy_slider_height,
                draggable: eazy_slider_draggable,
                freescroll: eazy_slider_freescroll,
                wraparound: eazy_slider_wraparound,
                autoplay: eazy_slider_autoplay,
                adaptiveheight: eazy_slider_adaptiveheight,
                pagedots: eazy_slider_pagedots,
                prevnextbuttons: eazy_slider_prevnextbuttons,
                imagesloaded: eazy_slider_imagesloaded,
                cellalign: eazy_slider_cellalign,
            };
      }
    }

function passJson() {

var eazyoptions = jQuery('input[value="eazy-slider-options"]');
var newproperties = JSON.stringify(eazy_slider_properties);

  if(eazyoptions.length>0) {
    //get text area with properties saved as custom field
    var newtextarea = eazyoptions.parent().next('td').children('textarea');


    var updatedproperties = newtextarea.text() + newproperties;
    newtextarea.html(updatedproperties);

  }else {
    document.getElementById('enternew').click();
    var metaval = document.getElementById('metavalue');
    var metakey =  document.getElementById('metakeyinput');
    //add slider key to meta field
    metakey.value = "eazy-slider-options";
    metaval.innerHTML += newproperties;
  }


}