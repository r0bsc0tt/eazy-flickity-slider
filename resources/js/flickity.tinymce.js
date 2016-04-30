/*!
 * Eazy Flickity Slider TinyMCE
 * Licensed GPLv3 for open source use
 */
 
var getEazySliders = function (){
  for (var key in allsliders) {
    if (allsliders.hasOwnProperty(key)) {
      //add("{text:'" + key + "', value:'" + allsliders[key] + "'}");
      console.log("{text:'" + key + "', value:'" + allsliders[key] + "'}");
          tinymce.PluginManager.add('slider', allsliders[key]);
    }
  }
};


tinymce.PluginManager.add('eazy_flickity_tinymce_button', function(editor, url) {
  editor.addButton('eazy_flickity_tinymce_button', {
    title: 'Eazy Flickity Slider',
    icon: 'icon eazy-flickity-slider-icon',
    onclick: function() {
    var val;
    win = editor.windowManager.open({
        title: 'Add Slider',
        body: [{
          type: 'textbox',
          name: 'width',
          label: 'Width'
        }, {
          type: 'textbox',
          name: 'height',
          label: 'Height'
        }, {
          type: 'listbox',
          name: 'slider',
          text: '-select-',
          value: '',
          label: 'Slider',
          values: [{
            allsliders
          }]
        }],
        onsubmit: function(e) {
          editor.insertContent('[eazy-flickity-slider height="' + e.data.height + '" width="' + e.data.width + '" eazy_flickity_slider="' + e.data.slider + '"]');
        }
      });

          var valbox = win.find("#slider")[0];
          function setValuebox(i){
          //feel free to call ajax
          valbox.value(null);
          valbox.menu = null;
          valbox.settings.menu = allsliders[i]["values"][0];
          // you can also set a value from pagelist[i]["values"][0]
          }

    }
  });
});
console.log(allsliders);
console.log("eazy sliders\:");
getEazySliders();