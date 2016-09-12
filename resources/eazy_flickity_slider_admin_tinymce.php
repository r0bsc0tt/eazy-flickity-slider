<?php
if ('is_admin') {

  //create html to display slider
  function eazy_flickity_slider_admin_tinymce_html(){ ?>
  <div id="select_eazy_slider_shortcode" style="display:none;">
    
    <div class="eazy-slider-shortcode-form-display">

      <div id="eazy_slider_shortcode" class="eazy-silder-shortcode-settings">

        <div class="eazy-slider-shortcode-name eazy-shortcode-section">
          <h3 id="eazy-slider-select" class="eazy-section-title"><?php _e("Select Slider", 'ez-flickity-slider' ); ?></h3>
          <p class="form-instructions"><?php _e("Select slider from the drop-down menu to add it to your page or post.", 'ez-flickity-slider' ); ?></p>
          <select name="eazy_slider_name_select" id="eazy_slider_name_select">
            <option value="">-Select-</option>
              <?php $terms = get_terms( 'eazy_sliderid' ); 
                if($terms){
                  foreach ( $terms as $term ) { ?>
                    <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>  
                  <?php }     
              } //end if ?>
          </select>
        </div>
 
        <div class="eazy-slider-shorcode-size eazy-shortcode-section">
          <h3 id="eazy-slider-set-size"  class="eazy-section-title"><?php _e("Set Slider Size", 'ez-flickity-slider' ); ?></h3>
          <p class="form-instructions"><?php _e("Insert the max width and/or height of your slider images. The slider defaults to 100% max width.", 'ez-flickity-slider' ); ?></p>
          <div class="eazy-flickity-slider-dimension">
            <label for="form_width"><?php _e("width:", 'ez-flickity-slider' ); ?></label>
            <input type="text" id="form_width" /><br>
          </div>
          <div class="eazy-flickity-slider-dimension">
            <label for="form_height"><?php _e("height:", 'ez-flickity-slider' ); ?></label>
            <input type="text" id="form_height" /><br>
          </div>
          <p class="form-instructions"><strong><?php _e("Make sure to include the unit of measurment. (px, em, %, vw etc.)", 'ez-flickity-slider' ); ?></strong></p>
        </div>


      </div>

            <div class="eazy-slider-shortcode-options eazy-shortcode-section">
              <h3 id="eazy-slider-set-options"  class="eazy-section-title"><?php _e("Set Slider Options", 'ez-flickity-slider' ); ?></h3>
              <p class="form-instructions"><?php _e("Each page or post can only define the options once.", 'ez-flickity-slider' ); ?></p>
              

              <div class="eazy-flickity-slider-option" id="eazy-slider-option-draggable">
                <p>draggable</p>
                <a href="http://flickity.metafizzy.co/options.html#draggable" target="blank" title="draggable Documentation @ metafizzy"><span class="dashicons dashicons-plus-alt"></span></a>
                <select name="eazy-slider-draggable" id="eazy-slider-draggable"><?php _e("Draggable:", 'ez-flickity-slider' ); ?>
                  <option value="">-Select-</option>
                  <option value="true">True</option>
                  <option value="false">False</option>
                </select>
              </div>

              <div class="eazy-flickity-slider-option" id="eazy-slider-option-freescroll">
                <p>freeScroll</p>
                <a href="http://flickity.metafizzy.co/options.html#freescroll" target="blank" title="freeScroll Documentation @ metafizzy"><span class="dashicons dashicons-plus-alt"></span></a>
                <select name="eazy-slider-freescroll" id="eazy-slider-freescroll"><?php _e("FreeScroll:", 'ez-flickity-slider' ); ?>
                  <option value="">-Select-</option>
                  <option value="true">True</option>
                  <option value="false">False</option>
                </select>
              </div>

              <div class="eazy-flickity-slider-option" id="eazy-slider-option-wraparound">
                <p>wrapAround</p>
                <a href="http://flickity.metafizzy.co/options.html#wraparound" target="blank"  title="wrapAround Documentation @ metafizzy"><span class="dashicons dashicons-plus-alt"></span></a>
                <select name="eazy-slider-wraparound" id="eazy-slider-wraparound"><?php _e("Wraparound:", 'ez-flickity-slider' ); ?>
                  <option value="">-Select-</option>
                  <option value="true">True</option>
                  <option value="false">False</option>
                </select>
              </div>

              <div class="eazy-flickity-slider-option" id="eazy-slider-option-autoplay">
                <p>autoPlay</p>
                <a href="http://flickity.metafizzy.co/options.html#autoplay" target="blank"  title="autoPlay Documentation @ metafizzy"><span class="dashicons dashicons-plus-alt"></span></a>
                <select name="eazy-slider-autoplay" id="eazy-slider-autoplay"><?php _e("Autoplay:", 'ez-flickity-slider' ); ?>
                  <option value="">-Select-</option>
                  <option value="true">True</option>
                  <option value="false">False</option>
                </select>
              </div>


              <div class="eazy-flickity-slider-option" id="eazy-slider-option-adaptiveheight">
                <p>adaptiveHeight</p>
                <a href="http://flickity.metafizzy.co/options.html#adaptiveheight" target="blank"  title="adaptiveHeight Documentation @ metafizzy"><span class="dashicons dashicons-plus-alt"></span></a>
                <select name="eazy-slider-adaptiveheight" id="eazy-slider-adaptiveheight"><?php _e("Adaptive Height:", 'ez-flickity-slider' ); ?>
                  <option value="">-Select-</option>
                  <option value="true">True</option>
                  <option value="false">False</option>
                </select>
              </div>

              <div class="eazy-flickity-slider-option" id="eazy-slider-option-prevnextbuttons">
                <p>prevNextButton</p>
                <a href="http://flickity.metafizzy.co/options.html#prevnextbuttons" target="blank"  title="prevNextButtons Documentation @ metafizzy"><span class="dashicons dashicons-plus-alt"></span></a>
                <select name="eazy-slider-prevnextbuttons" id="eazy-slider-prevnextbuttons"><?php _e("prevnextbuttons:", 'ez-flickity-slider' ); ?>
                  <option value="">-Select-</option>
                  <option value="true">True</option>
                  <option value="false">False</option>
                </select>
              </div>


              <div class="eazy-flickity-slider-option" id="eazy-slider-option-pagedots">
                <p>pageDots</p>
                <a href="http://flickity.metafizzy.co/options.html#pagedots" target="blank"  title="pageDots Documentation @ metafizzy"><span class="dashicons dashicons-plus-alt"></span></a>
                <select name="eazy-slider-pagedots" id="eazy-slider-pagedots"><?php _e("pagedots:", 'ez-flickity-slider' ); ?>
                  <option value="">-Select-</option>
                  <option value="true">True</option>
                  <option value="false">False</option>
                </select>
              </div>    


              <div class="eazy-flickity-slider-option" id="eazy-slider-option-imagesloaded">
                <p>imagesLoaded</p>
                <a href="http://flickity.metafizzy.co/options.html#imagesloaded" target="blank"  title="imagesLoaded Documentation @ metafizzy"><span class="dashicons dashicons-plus-alt"></span></a>
                <select name="eazy-slider-imagesloaded" id="eazy-slider-imagesloaded"><?php _e("imagesloaded:", 'ez-flickity-slider' ); ?>
                  <option value="">-Select-</option>
                  <option value="true">True</option>
                  <option value="false">False</option>
                </select>
              </div>   


              <div class="eazy-flickity-slider-option" id="eazy-slider-option-cellalign">
                <p>cellAlign</p>
                <a href="http://flickity.metafizzy.co/options.html#cellalign" target="blank"  title="cellAlign Documentation @ metafizzy"><span class="dashicons dashicons-plus-alt"></span></a>
                <select name="eazy-slider-cellalign" id="eazy-slider-cellalign"><?php _e("cellalign:", 'ez-flickity-slider' ); ?>
                  <option value="">-Select-</option>
                  <option value="left">Left</option>
                  <option value="center">Center</option>
                  <option value="right">Right</option>
                </select>
              </div>                 



            </div>
   </div>


    <div class="eazy-flickity-slider-submit-buttons">
      <input type="button" class="button-primary" value="Insert Slider Shortcode" onclick="insert_eazy_flickity_slider_shortcode(); passJson();" />&nbsp;&nbsp;&nbsp;
      <a class="button" style="color:#bbb;" href="#" onclick="tb_remove(); return false;">
        <?php _e("Cancel", 'ez-flickity-slider'); ?>
      </a>
    </div>

  </div><?php
  }

}