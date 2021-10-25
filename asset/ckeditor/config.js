/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	
	//config.extraPlugins = 'uploadimage,uploadwidget,widget,clipboard,lineutils,dialog,dialogui,notificationaggregator,notification,toolbar,button,filetools';
	   config.filebrowserBrowseUrl = 'http://geenews24.com/dev/asset/ckeditor/kcfinder/browse.php?opener=ckeditor&type=files';
	   config.filebrowserImageBrowseUrl = 'http://geenews24.com/dev/asset/ckeditor/kcfinder/browse.php?opener=ckeditor&type=images';
	   config.filebrowserFlashBrowseUrl = 'http://geenews24.com/dev/asset/ckeditor/kcfinder/browse.php?opener=ckeditor&type=flash';
	   config.filebrowserUploadUrl = 'http://geenews24.com/dev/asset/ckeditor/kcfinder/upload.php?opener=ckeditor&type=files';
	   config.filebrowserImageUploadUrl = 'http://geenews24.com/dev/asset/ckeditor/kcfinder/upload.php?opener=ckeditor&type=images';
	   config.filebrowserFlashUploadUrl = 'http://geenews24.com/dev/asset/ckeditor/kcfinder/upload.php?opener=ckeditor&type=flash';
};
