<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * TYPOlight webCMS
 * Copyright (C) 2005 Leo Feyer
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at http://www.gnu.org/licenses/.
 *
 * PHP version 5
 * @copyright  Andreas Schempp 2009
 * @author     Andreas Schempp <andreas@schempp.ch>
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 */


/**
 * Listing
 */
$GLOBALS['TL_DCA']['tl_news']['list']['sorting']['child_record_callback'] = array('tl_news_gallery', 'listNewsArticles');


/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_news']['palettes']['__selector__'][]		= 'addGallery';
$GLOBALS['TL_DCA']['tl_news']['subpalettes']['addGallery']		= 'gal_headline,multiSRC,gal_size,gal_imagemargin,perRow,sortBy,gal_fullsize';
foreach($GLOBALS['TL_DCA']['tl_news']['palettes'] as $k => $v)
{
	$GLOBALS['TL_DCA']['tl_news']['palettes'][$k] = str_replace('addImage;', 'addImage;{gallery_legend:hide},addGallery;', $GLOBALS['TL_DCA']['tl_news']['palettes'][$k]);
}


/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_news']['fields']['addGallery'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_news']['addGallery'],
	'exclude'                 => true,
	'filter'                  => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true)
);

$GLOBALS['TL_DCA']['tl_news']['fields']['gal_headline'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_news']['gal_headline'],
	'exclude'                 => true,
	'inputType'               => 'inputUnit',
	'options'                 => array('h1', 'h2', 'h3', 'h4', 'h5', 'h6'),
	'eval'                    => array('maxlength'=>255),
);

$GLOBALS['TL_DCA']['tl_news']['fields']['multiSRC'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_news']['multiSRC'],
	'exclude'                 => true,
	'inputType'               => 'fileTree',
	'eval'                    => array('fieldType'=>'checkbox', 'files'=>true, 'mandatory'=>true),
);

$GLOBALS['TL_DCA']['tl_news']['fields']['perRow'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_news']['perRow'],
	'default'                 => 4,
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12),
	'eval'                    => array('tl_class'=>'w50'),
);

$GLOBALS['TL_DCA']['tl_news']['fields']['sortBy'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_news']['sortBy'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('name_asc', 'name_desc', 'date_asc', 'date_desc', 'meta'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_news'],
	'eval'                    => array('tl_class'=>'w50'),
);

$GLOBALS['TL_DCA']['tl_news']['fields']['gal_imagemargin'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_news']['gal_imagemargin'],
	'exclude'                 => true,
	'inputType'               => 'trbl',
	'options'                 => array('px', '%', 'em', 'pt', 'pc', 'in', 'cm', 'mm'),
	'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
);

$GLOBALS['TL_DCA']['tl_news']['fields']['gal_size'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_news']['gal_size'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('multiple'=>true, 'size'=>2, 'rgxp'=>'digit', 'nospace'=>true, 'tl_class'=>'w50'),
);

$GLOBALS['TL_DCA']['tl_news']['fields']['gal_fullsize'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_news']['gal_fullsize'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
);



class tl_news_gallery extends Backend
{
	
	public function listNewsArticles($arrRow)
	{
		$key = $arrRow['published'] ? 'published' : 'unpublished';
		$date = $this->parseDate($GLOBALS['TL_CONFIG']['datimFormat'], $arrRow['date']);

		return '
<div class="cte_type ' . $key . '"><strong>' . $arrRow['headline'] . '</strong> - ' . $date . ($arrRow['addGallery'] ? ' <img src="system/modules/newsgallery/html/images.png" alt="" style="position:absolute; margin-left:10px" />' : '') . '</div>
<div class="limit_height' . (!$GLOBALS['TL_CONFIG']['doNotCollapse'] ? ' h64' : '') . ' block">
' . $arrRow['text'] . '
</div>' . "\n";
	}
}

