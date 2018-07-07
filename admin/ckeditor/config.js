/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
};
CKEDITOR.editorConfig = function(config) {
// ...
   config.filebrowserBrowseUrl = 'http://localhost/trainit_ayud/aplikasi_2/template/plugins/kcfinder/browse.php?opener=ckeditor&type=files';
   config.filebrowserImageBrowseUrl = 'http://localhost/trainit_ayud/aplikasi_2/template/plugins/kcfinder/browse.php?opener=ckeditor&type=images';
   config.filebrowserFlashBrowseUrl = 'http://localhost/trainit_ayud/aplikasi_2/template/plugins/kcfinder/browse.php?opener=ckeditor&type=flash';
   config.filebrowserUploadUrl = 'http://localhost/trainit_ayud/aplikasi_2/template/plugins/kcfinder/upload.php?opener=ckeditor&type=files';
   config.filebrowserImageUploadUrl = 'http://localhost/trainit_ayud/aplikasi_2/template/plugins/kcfinder/upload.php?opener=ckeditor&type=images';
   config.filebrowserFlashUploadUrl = 'http://localhost/trainit_ayud/aplikasi_2/template/plugins/kcfinder/upload.php?opener=ckeditor&type=flash';
   config.enterMode = CKEDITOR.ENTER_BR // pressing the ENTER Key puts the <br/> tag
config.shiftEnterMode = CKEDITOR.ENTER_P; 
// ...
};

// CKEDITOR.editorConfig = function( config ) {
  
// config.enterMode = CKEDITOR.ENTER_BR // pressing the ENTER Key puts the <br/> tag
// config.shiftEnterMode = CKEDITOR.ENTER_P; //pressing the SHIFT + ENTER Keys puts the <p> tag
// };
