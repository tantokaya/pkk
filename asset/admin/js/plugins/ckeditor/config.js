/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
    config.height="300px";
    config.extraPlugins = 'justify';
    config.extraPlugins = 'image2';
    config.extraPlugins = 'dialog';
    config.extraPlugins = 'widget';
    config.extraPlugins = 'clipboard';
    config.extraPlugins = 'lineutils';
    config.image2_alignClasses = [ 'image-left', 'image-center', 'image-right' ];
    config.image2_captionedClass = 'image-captioned';

};
