DROP TABLE IF EXISTS `picture_terms`;

CREATE TABLE `picture_terms` (
  uid int(11) unsigned NOT NULL auto_increment,
  pid int(11) DEFAULT '0' NOT NULL,

  tstamp int(11) unsigned DEFAULT '0' NOT NULL,
  crdate int(11) unsigned DEFAULT '0' NOT NULL,
  cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
  deleted smallint unsigned DEFAULT '0' NOT NULL,
  hidden smallint unsigned DEFAULT '0' NOT NULL,
  starttime int(11) unsigned DEFAULT '0' NOT NULL,
  endtime int(11) unsigned DEFAULT '0' NOT NULL,
  sorting int(11) DEFAULT '0' NOT NULL,

  sys_language_uid int(11) DEFAULT '0' NOT NULL,
  l10n_parent int(11) unsigned DEFAULT '0' NOT NULL,
  l10n_diffsource mediumblob NULL,

  name varchar(255) DEFAULT '' NOT NULL,
  template_name varchar(255) DEFAULT '' NOT NULL,
  disclaimer mediumtext DEFAULT NULL,
  creator_name varchar(255) DEFAULT '' NOT NULL,
  creator_link varchar(255) DEFAULT '' NOT NULL,
  vendor_name varchar(255) DEFAULT '' NOT NULL,
  vendor_collection varchar(255) DEFAULT '' NOT NULL,
  vendor_link varchar(255) DEFAULT '' NOT NULL,
  license_name varchar(255) DEFAULT '' NOT NULL,
  license_link varchar(255) DEFAULT '' NOT NULL,
  publisher_name varchar(255) DEFAULT '' NOT NULL,
  socialmedia_usage int(11) DEFAULT '0' NOT NULL,
  credits_on_image int(11) DEFAULT '0' NOT NULL,
  field_picture_name smallint unsigned DEFAULT '0' NOT NULL,
  field_picture_link smallint unsigned DEFAULT '0' NOT NULL,
  field_disclaimer smallint unsigned DEFAULT '0' NOT NULL,
  field_creator_name smallint unsigned DEFAULT '0' NOT NULL,
  field_creator_link smallint unsigned DEFAULT '0' NOT NULL,
  field_vendor_name smallint unsigned DEFAULT '0' NOT NULL,
  field_vendor_collection smallint unsigned DEFAULT '0' NOT NULL,
  field_vendor_link smallint unsigned DEFAULT '0' NOT NULL,
  field_license_name smallint unsigned DEFAULT '0' NOT NULL,
  field_license_link smallint unsigned DEFAULT '0' NOT NULL,
  field_publisher_name smallint unsigned DEFAULT '0' NOT NULL,
  field_additional_info smallint unsigned DEFAULT '0' NOT NULL,
  field_socialmedia_usage smallint unsigned DEFAULT '0' NOT NULL,
  field_credits_on_image smallint unsigned DEFAULT '0' NOT NULL,

  PRIMARY KEY (uid),
  KEY parent (pid),
  KEY language (l10n_parent,sys_language_uid)
);

INSERT INTO `picture_terms` (`uid`, `pid`, `sys_language_uid`, `name`, `template_name`, `disclaimer`, `creator_name`, `creator_link`, `vendor_name`, `vendor_collection`, `vendor_link`, `license_name`, `license_link`, `publisher_name`, `socialmedia_usage`, `credits_on_image`, `field_picture_name`, `field_picture_link`, `field_disclaimer`, `field_creator_name`, `field_creator_link`, `field_vendor_name`, `field_vendor_collection`, `field_vendor_link`, `field_license_name`, `field_license_link`, `field_publisher_name`, `field_additional_info`, `field_socialmedia_usage`, `field_credits_on_image`)
VALUES
  (1, 0, 0, 'Unsplash', 'default', '', '', '', '', '', '', 'Unsplash License', 'https://unsplash.com/license', '', 1, 0, 1, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
  (2, 0, 0, 'Fotolia', 'allrightsreserved', '', '', '', 'Fotolia', '', 'https://www.fotolia.com', '', 'https://stock.adobe.com/license-terms', '', 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
  (3, 0, 0, 'Default', 'default', '', '', '', 'Default', '', '', '', '', '', 0, 0, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 0, 1, 0, 0),
  (4, 0, 0, 'CC-BY-4', 'default', '', '', '', '', '', '', 'CC-BY 4.0', 'https://creativecommons.org/licenses/by/4.0/', '', 1, 0, 3, 2, 3, 2, 1, 1, 1, 1, 0, 0, 0, 3, 0, 0),
  (5, 0, 0, 'CC-BY-SA-4', 'default', '', '', '', '', '', '', 'CC-BY-SA 4.0', 'https://creativecommons.org/licenses/by-sa/4.0/', '', 1, 0, 3, 2, 3, 2, 1, 1, 1, 1, 0, 0, 0, 3, 0, 0),
  (6, 0, 0, 'CC-BY-3', 'default', '', '', '', '', '', '', 'CC-BY 3.0', 'https://creativecommons.org/licenses/by/3.0/', '', 1, 0, 1, 2, 3, 2, 1, 1, 1, 1, 0, 0, 0, 3, 0, 0),
  (7, 0, 0, 'CC-BY-SA-3', 'default', '', '', '', '', '', '', 'CC-BY-SA 3.0', 'https://creativecommons.org/licenses/by-sa/3.0/', '', 1, 0, 1, 2, 3, 2, 1, 1, 1, 1, 0, 0, 0, 3, 0, 0),
  (8, 0, 0, 'CC-BY-2', 'default', '', '', '', '', '', '', 'CC-BY 2.0', 'https://creativecommons.org/licenses/by/2.0/', '', 1, 0, 1, 2, 3, 2, 1, 1, 1, 1, 0, 0, 0, 3, 0, 0),
  (9, 0, 0, 'CC-BY-SA-2', 'default', '', '', '', '', '', '', 'CC-BY-SA 2.0', 'https://creativecommons.org/licenses/by-sa/2.0/', '', 1, 0, 1, 2, 3, 2, 1, 1, 1, 1, 0, 0, 0, 3, 0, 0),
  (10, 0, 0, 'Pixabay', 'default', '', '', '', '', '', '', 'Pixabay License (CC0 1.0)', 'https://pixabay.com/service/terms/#license', '', 1, 0, 1, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
  (11, 0, 0, 'CC0', 'default', '', '', '', '', '', '', 'CC0 1.0', 'https://creativecommons.org/publicdomain/zero/1.0/', '', 1, 0, 1, 1, 0, 1, 1, 1, 1, 1, 0, 0, 0, 1, 0, 0),
  (12, 0, 0, 'Public Domain', 'default', '', '', '', '', '', '', 'Public Domain', '', '', 1, 0, 1, 1, 0, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0),
  (13, 0, 0, 'Adobe Stock', 'allrightsreserved', '', '', '', 'stock.adobe.com', '', 'https://stock.adobe.com/', '', 'https://stock.adobe.com/license-terms', '', 0, 0, 1, 1, 0, 2, 1, 0, 0, 0, 0, 0, 3, 0, 1, 0),
  (14, 0, 0, 'Shutterstock', 'allrightsreserved', '', '', '', 'Shutterstock', '', 'http://shutterstock.com/', '', 'https://www.shutterstock.com/license', '', 0, 0, 1, 1, 0, 2, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0),
  (15, 0, 0, 'Pixelio', 'allrightsreserved', '', '', '', 'PIXELIO', '', 'https://www.pixelio.de/', '', 'https://www.pixelio.de/static/lizenzvertrag_redaktionell_und_kommerziell', '', 0, 0, 1, 1, 0, 2, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0);
