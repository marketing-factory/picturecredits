--
-- Table structure for table 'picture_terms'
--
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

--
-- Table structure for table 'sys_file_metadata'
--
CREATE TABLE `sys_file_metadata` (
  picturecredits_reviewed int(11) DEFAULT '0' NOT NULL,
  terms int(11) unsigned DEFAULT '0' NOT NULL,
  picture_name varchar(255) DEFAULT '' NOT NULL,
  picture_link varchar(255) DEFAULT '' NOT NULL,
  disclaimer mediumtext DEFAULT NULL,
  creator_name varchar(255) DEFAULT '' NOT NULL,
  creator_link varchar(255) DEFAULT '' NOT NULL,
  vendor_name varchar(255) DEFAULT '' NOT NULL,
  vendor_collection varchar(255) DEFAULT '' NOT NULL,
  vendor_link varchar(255) DEFAULT '' NOT NULL,
  license_name varchar(255) DEFAULT '' NOT NULL,
  license_link varchar(255) DEFAULT '' NOT NULL,
  publisher_name varchar(255) DEFAULT '' NOT NULL,
  additional_info varchar(255) DEFAULT '' NOT NULL,
  socialmedia_usage int(11) DEFAULT '0' NOT NULL,
  credits_on_image int(11) DEFAULT '0' NOT NULL,

  note mediumtext DEFAULT NULL,
);
