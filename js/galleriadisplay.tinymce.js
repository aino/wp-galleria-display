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
            // Split input on / since user might paste the full script tag or a shortcode
            gId = e.data['gd-id-input'].split('/')
            console.log(gId)

            if ( gId instanceof Array ) {
              if ( gId.length == 6 ) {
                // Assume user has pasted full script tag
                gId = gId[3]
              } else if ( gId.length == 2 ) {
                // Assume user has pasted a shortcode
                gId = gId[0]
                var s = gId.indexOf( '"' ) + 1
                var e = gId.indexOf( '"' , s)
                gId = gId.substring( s, e )
              }
            } else {
              // Else, it's probably just the ID
              gId = gId[0]
            }

            // Return on empty string
            if ( gId.length < 1 ) {
              ed.windowManager.alert( 'Please enter a valid Galleria Display id or script tag.' )
              return false
            }
            // Return on non sha1
            if ( !gId.match( /^[0-9a-f]{40}$/ ) ) {
              ed.windowManager.alert( 'Please enter a valid Galleria Display id.' )
              return false
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
          longname: 'WordpPress Galleria Display',
          author: 'Aino',
          authorurl: 'http://aino.com/',
          version : '1.0.2'
      }
    }
  })

  // Register plugin
  tinymce.PluginManager.add( 'galleriadisplay', tinymce.plugins.galleriaDisplay )

}())