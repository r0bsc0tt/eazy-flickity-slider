<?php 
function eazy_flickity_slider_admin_tinymce_html(){ ?>
<div id="select_eazy_slider_shortcode" style="display:none;">

  <div class="eazy_slider_shortcode_form_display">
    <h3 id="eazy_slider_shortcode_header"><?php _e("Insert Shortcode"); ?></h3>
    <span>
      <?php _e("Select slider from the drop-down menu to add it to your page or post."); ?>
    </span>
  </div>

  <div id="eazy_slider_shortcode" class="eazy_slider_shortcode_form_display">
    <select name="eazy_slider_name_select" id="eazy_slider_name_select">
                <option value="">-Select-</option>
                <?php $terms = get_terms( 'eazy_flickity_slider' ); 
                  if($terms){
                    foreach ( $terms as $term ) { ?>
                      <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>  
                    <?php }     
                  } //end if ?>
            </select>

    <div class="eazy_slider_shortcode_form">
      <p class="form_instructions">Insert the max width and/or height of your slider images.</p>
      <p class="form_instructions">The slider defaults to 100% max width.</p>
      <p class="form_instructions">Make sure to include the unit of measurment. (px, em, %, vw etc.)</p>
      <label for="form_width" class="eazy-flickity-slider-dimension">width:</label>
      <input type="text" id="form_width" /><br>
      <label for="form_height" class="eazy-flickity-slider-dimension">height:</label>
      <input type="text" id="form_height" /><br>
    </div>

  </div>


  <div class="eazy-flickity-slider-submit-buttons">
    <input type="button" class="button-primary" value="Insert Slider Shortcode" onclick="insert_eazy_flickity_slider_shortcode();" />&nbsp;&nbsp;&nbsp;
    <a class="button" style="color:#bbb;" href="#" onclick="tb_remove(); return false;">
      <?php _e("Cancel"); ?>
    </a>
  </div>
</div>
	
<?}