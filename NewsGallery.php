<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
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
 * @copyright  Andreas Schempp 2009-2012
 * @author     Andreas Schempp <andreas@schempp.ch>
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 */
 

class NewsGallery extends ContentGallery
{

	public function __construct($objTemplate) 
	{
		// Default values (not available in news gallery)
		$this->useHomeDir = false;
		$this->perPage = 0;
		$this->id = $objTemplate->id;
		$this->type = 'news_gallery';
		
		// Apply news gallery settings
		$arrHeadline = deserialize($objTemplate->gal_headline);
		$this->headline = is_array($arrHeadline) ? $arrHeadline['value'] : $arrHeadline;
		$this->hl = is_array($arrHeadline) ? $arrHeadline['unit'] : 'h1';
		$this->multiSRC = $objTemplate->multiSRC;
		$this->sortBy = $objTemplate->sortBy;
		$this->perRow = $objTemplate->perRow;
		$this->imagemargin = $objTemplate->gal_imagemargin;
		$this->size = $objTemplate->gal_size;
		$this->fullsize = $objTemplate->gal_fullsize;
	}
}

