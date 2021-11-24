/*
Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	
	//Customize height and width :
/*	var $url= 'localhost';
	config.width=800;
	config.heigh=500;
	//Change Skin for CKEditor :
	config.skin='kama'; // There are 3 theme : v2, kama, office2003
	CKEDITOR.config.entities = false;
	config.filebrowserBrowseUrl = $url + 'lib/ckfinder/ckfinder.html';
	config.filebrowserImageBrowseUrl = $url + 'lib/ckfinder/ckfinder.html?type=Images';
	config.filebrowserFlashBrowseUrl = $url + 'lib/ckfinder/ckfinder.html?type=Flash';
	config.filebrowserUploadUrl = $url + 'lib/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl = $url + 'lib/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	config.filebrowserFlashUploadUrl = $url + 'lib/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
*/	
	config.filebrowserBrowseUrl = "public/admin_asset/ckeditor/ckfinder/ckfinder.html";

	config.filebrowserImageBrowseUrl = "public/admin_asset/ckeditor/ckfinder/ckfinder.html?ty­pe=Images";
	
	config.filebrowserFlashBrowseUrl = "public/admin_asset/ckeditor/ckfinder/ckfinder.html?ty­pe=Flash";
	
	config.filebrowserUploadUrl = "public/admin_asset/ckeditor/ckfinder/core/connector/p­hp/connector.php?command=QuickUpload&­;type=Files";
	
	config.filebrowserImageUploadUrl = "public/admin_asset/ckeditor/ckfinder/core/connector/p­hp/connector.php?command=QuickUpload&­;type=Images";
	
	config.filebrowserFlashUploadUrl = "public/admin_asset/ckeditor/ckfinder/core/connector/p­hp/connector.php?command=QuickUpload&­;type=Flash"

	//config.enterMode = CKEDITOR.ENTER_BR; //Loại bỏ thẻ <p> Nội dung văn bản </p>
        config.enterMode = CKEDITOR.ENTER_P;
        config.shiftEnterMode = CKEDITOR.ENTER_P;
		config.language = 'vi';
config.pasteFromWordRemoveFontStyles = true;
config.forcePasteAsPlainText = true;
	config.toolbar_Full=[['Source','-','Save','NewPage','Preview','-','Templates'],
['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
'/',
['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
['BidiLtr', 'BidiRtl' ],
['Link','Unlink','Anchor'],
['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe'],
'/',
['Styles','Format','Font','FontSize'],
['TextColor','BGColor'],
['Maximize', 'ShowBlocks','-','About']
];
};
