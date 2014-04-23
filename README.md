WordPress Galleria Display
==========================

Simple WordPress plugin to add [Galleria Display](http://www.galleriadisplay.com) galleries to posts and pages.

##Installing
[Download the zip file](https://github.com/aino/wp-galleria-display/archive/master.zip)

Then, either:

1. Unzip to a temporary folder.
2. Upload the `wp-galleria-diplay` folder to the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress

or:

1. Navigate to the 'Add New' in the plugins dashboard
2. Navigate to the 'Upload' area
3. Select `wp-galleria-display.zip` from your computer
4. Click 'Install Now'
5. Activate the plugin in the Plugin dashboard

##How to use
###1. Get the Gallery code
Log in to [Galleria Display](http://www.galleriadisplay.com) and pick a gallery. Click "Publish" and copy the text in the popup.

![Screenshot: Getting the code](assets/screenshot-1.png?raw=true)

###2. Insert the code
Click the Galleria Display icon in your toolbar. It will open a dialog. Simply paste the text you copied from Galleria Display and press OK. The necessary shortcode will be generated for you and inserted into your code. Done!

![Screenshot: Finding the button](assets/screenshot-2.png?raw=true)

###Using shortcodes
If you prefer doing things yourself, simpy copy the id part of your Galleria Display script and put it in a shortcode.
```php
[galleriadisplay id="GALLERY_ID_HERE" /]
```

##Compability
Tested in WordPress 3.9, which uses TinyMCE 4.x. UI will probably not work in earlier versions, due to API changes in TinyMCE. Shortcodes should work fine though.