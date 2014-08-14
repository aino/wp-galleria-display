WordPress Galleria Display
==========================

Simple WordPress plugin to add [Galleria Display](http://www.galleriadisplay.com) galleries to posts and pages.

##Installing
[Download the zip file](https://github.com/aino/wp-galleria-display/archive/master.zip)

Then, either:

1. Navigate to the 'Add New' in the plugins dashboard.
2. Navigate to the 'Upload' area.
3. Select `wp-galleria-display-master.zip` from your computer.
4. Click 'Install Now'.
5. Activate the plugin in the Plugin dashboard.

or:

1. Unzip to a temporary folder.
2. Upload the `wp-galleria-display` folder to the `/wp-content/plugins/` directory.
3. Activate the plugin through the 'Plugins' menu in WordPress.

##How to use
###1. Get the Gallery code
Log in to [Galleria Display](http://www.galleriadisplay.com) and pick a gallery. Click "Publish" and copy the shortcode in the popup.

![Screenshot: Getting the code](assets/screenshot-1.png?raw=true)

###2. Insert the shortcode
Find the place in your post where you want the gallery to appear. Paste the shortcode. It should look something like this:
```
[galleriadisplay id="GALLERY_ID_HERE" /]
```

###Using the GUI
Make sure your cursor is where you want the gallery to appear. Click the Galleria Display icon in your toolbar. It will open a dialog. Paste the text you copied from Galleria Display and press OK. The necessary shortcode will be generated for you and inserted into your code. Done!

![Screenshot: Finding the button](assets/screenshot-2.png?raw=true)



##Compability
Tested in WordPress 3.2 up to 4.0.

GUI is available in WordPress 3.9 and above.

Shortcodes should work fine anywhere.

##Changelog

###1.0.2
* Tested and working with WordPress 3.2 and up (default themes).
* GUI dialog now accepts shortcodes as well.

###1.0.1
* Tested and working with WordPress 4.0.
* Removed TinyMCE button for < 3.9 users (Shortcodes still work though).

###1.0.0
* First commit. 