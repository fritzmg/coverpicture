<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2010 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Christian Barkowsky 2009-2011
 * @author     Christian Barkowsky <http://www.97media.de>
 * @package    CoverPicture
 * @license    LGPL
 */


/**
 * Load tl_style language file
 */
$this->loadLanguageFile('tl_style');


/**
 * Table tl_module_coverpicture
 */
$GLOBALS['TL_DCA']['tl_module_coverpicture'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'enableVersioning'            => true
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 1,
			'fields'                  => array('title'),
			'flag'                    => 1,
			'panelLayout'             => 'search,limit'
		),
		'label' => array
		(
			'fields'                  => array('title', 'standard'),
			'format'                  => '%s <span style="color:#b3b3b3; padding-left:3px;">[%s]</span>'
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'                => array('resize_image', 'use_as_background'),
		'default'                     => '{title_legend},title;{config_legend},singleSRC,jumpTo;{image_legend},resize_image;{imagemap_legend:hide},imageMap;{background_legend:hide},use_as_background;{extended_config_legend:hide},no_inheritance,standard'
	),

	// Subpalettes
	'subpalettes' => array
	(
		'resize_image' => 'size',
		'use_as_background' => 'bgposition,bgrepeat,bgCssID',
	),

	// Fields
	'fields' => array
	(
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['title'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'search'                  => true,
			'eval'                    => array('mandatory'=>true, 'maxlength'=>128)
		),
		'singleSRC' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['singleSRC'],
			'exclude'                 => true,
			'inputType'               => 'fileTree',
			'eval'                    => array('fieldType'=>'radio', 'files'=>true, 'mandatory'=>true)
		),
		'jumpTo' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['jumpTo'],
			'exclude'                 => true,
			'inputType'               => 'pageTree',
			'eval'                    => array('fieldType'=>'radio', 'helpwizard'=>true),
			'explanation'             => 'jumpTo'
		),
		'resize_image' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['resize_image'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'size' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['size'],
			'exclude'                 => true,
			'inputType'               => 'imageSize',
			'options'                 => array('proportional', 'crop', 'box'),
			'reference'               => &$GLOBALS['TL_LANG']['MSC'],
			'eval'                    => array('rgxp'=>'digit', 'nospace'=>true, 'tl_class'=>'w50')
		),
		'no_inheritance' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['no_inheritance'],
			'exclude'                 => true,
			'inputType'               => 'checkbox'
		),
		'standard' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['standard'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'					  => array('unique' => true)
		),
		'imageMap' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['imageMap'],
			'exclude'                 => true,
			'inputType'               => 'textarea',
			'eval'                    => array('allowHtml'=>true,'decodeEntities'=>true,'tl_class'=>'clr'),
		),
		'use_as_background' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['use_as_background'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'bgposition' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_style']['bgposition'],
			'inputType'               => 'select',
			'options'                 => array('left top', 'left center', 'left bottom', 'center top', 'center center', 'center bottom', 'right top', 'right center', 'right bottom'),
			'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50')
		),
		'bgrepeat' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_style']['bgrepeat'],
			'inputType'               => 'select',
			'options'                 => array('repeat', 'repeat-x', 'repeat-y', 'no-repeat'),
			'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50')
		),
		'bgCssID' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module_coverpicture']['bgCssID'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50')
		)
	)
);

?>