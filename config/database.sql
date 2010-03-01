-- **********************************************************
-- *                                                        *
-- * IMPORTANT NOTE                                         *
-- *                                                        *
-- * Do not import this file manually but use the TYPOlight *
-- * install tool to create and maintain database tables!   *
-- *                                                        *
-- **********************************************************

-- 
-- Table `tl_news`
-- 

CREATE TABLE `tl_news` (
  `addGallery` char(1) NOT NULL default '',
  `multiSRC` blob NULL,
  `perRow` smallint(5) unsigned NOT NULL default '0',
  `sortBy` varchar(32) NOT NULL default '',
  `gal_size` varchar(255) NOT NULL default '',
  `gal_imagemargin` varchar(255) NOT NULL default '',
  `gal_fullsize` char(1) NOT NULL default '',
  `gal_headline` varchar(255) NOT NULL default '',
) ENGINE=MyISAM DEFAULT CHARSET=utf8;