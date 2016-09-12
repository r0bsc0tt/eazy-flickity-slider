/*!
 * Eazy Flickity Slider TinyMCE
 * Licensed GPLv3 for open source use
 */

// add sliders to dropdown 
var getEazySliders = function (){
  var allsliders;
  for (var key in allsliders) {
    if (allsliders.hasOwnProperty(key)) {
      console.log("{text:'" + key + "', value:'" + allsliders[key] + "'}");
          tinymce.PluginManager.add('slider', allsliders[key]);
    }
  }
};


( function() {
//add tinyMCE button above content editor
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
          values: [allsliders]
        }, {
          type: 'listbox',
          name: 'draggable',
          text: '-select-',
          value: '',
          label: 'draggable',
          values: [True, False]
        }, {
          type: 'listbox',
          name: 'freescroll',
          text: '-select-',
          value: '',
          label: 'freescroll',
          values: ['True', 'False']
        }, {
          type: 'listbox',
          name: 'wraparound',
          text: '-select-',
          value: '',
          label: 'wraparound',
          values: ['True', 'False']
        }, {
          type: 'listbox',
          name: 'autoplay',
          text: '-select-',
          value: '',
          label: 'autoplay',
          values: ['True', 'False']
        }, {
          type: 'listbox',
          name: 'adaptiveheight',
          text: '-select-',
          value: '',
          label: 'adaptiveheight',
          values: ['True', 'False']
        }, {
          type: 'listbox',
          name: 'prevnextbuttons',
          text: '-select-',
          value: '',
          label: 'prevnextbuttons',
          values: ['True', 'False']
        }, {
          type: 'listbox',
          name: 'pagedots',
          text: '-select-',
          value: '',
          label: 'pagedots',
          values: ['True', 'False']
        }, {
          type: 'listbox',
          name: 'imagesloaded',
          text: '-select-',
          value: '',
          label: 'imagesloaded',
          values: ['True', 'False']
        }, {
          type: 'listbox',
          name: 'cellalign',
          text: '-select-',
          value: '',
          label: 'cellalign',
          values: ['Left', 'Center', 'Right']
        }]

      });
    }
  });
});
});
getEazySliders();