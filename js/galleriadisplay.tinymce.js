(function() {
  
  tinymce.create( 'tinymce.plugins.galleriaDisplay', {
    // Init plugin
    init : function(ed, url) {
      // Add command
      ed.addCommand( 'mce_galleriadisplay', function() {
        var gId
        var shortcode

        ed.windowManager.open({
          title: 'Insert Galleria Display shortcode',
          body: [
            {type: 'textbox', name: 'gd-id-input', label: 'Please enter your gallery id:'}
          ],
          onsubmit: function(e) {
            // Insert content when the window form is submitted
            // Split input on / since user might paste the full script tag
            gId = e.data['gd-id-input'].split('/')
            if ( gId.length > 1 ) {
              // Assume user has pasted full script tag
              gId = gId[3]
            } else {
              // Else, it's probably just the ID
              gId = gId[0]
              // Return on empty string
              if ( gId.length < 1 ) return false
            }
            shortcode = '[galleriadisplay id="' + gId + '"/]'
            ed.insertContent( shortcode )
          }
        })

      })

      // Add button
      ed.addButton( 'galleriadisplay', {
        title: 'Insert a Galleria Display shortcode',
        cmd: 'mce_galleriadisplay',
        image: url + '/../i/gd-logo.png'
      })
    },

    // 
    getInfo: function() {
      return {
          longname: 'Galleria Display',
          author: 'Aino',
          authorurl: 'http://aino.com/',
          version : '1.0'
      }
    }
  })

  // Register plugin
  tinymce.PluginManager.add( 'galleriadisplay', tinymce.plugins.galleriaDisplay )

}())