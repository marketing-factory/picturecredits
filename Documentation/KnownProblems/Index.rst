
..  _known-problems:

==============
Known problems
==============

Current issues
==============
Find a list of `open issues on GitHub <https://github.com/marketing-factory/picturecredits/issues>`__.

About Multi-domain setups with *different* default languages
============================================================

In general, it is no problem to use this extension in projects with multiple languages or even multiple domains/Sites.

Not only can you translate file metadata records, but you can also translate picture terms records.
This allows you to use localized default values for a license.

It is also possible to maintain file metadata for multiple languages and share these files between Sites.

To explain the given limitation, let's take a look at the following example of multi-domain installation:

+-----------------+-------------------------------------+
| Site            | Languages                           |
+=================+=====================================+
| www.domain.com  | *   English (:yaml:`languageId: 0`) |
|                 | *   German (:yaml:`languageId: 1`)  |
+-----------------+-------------------------------------+
| www.example.org | *   English (:yaml:`languageId: 0`) |
|                 | *   French (:yaml:`languageId: 2`)  |
+-----------------+-------------------------------------+

**No issues in this scenario.** TYPO3 always sets :php:`sys_language_uid` `0` for the default metadata record.
This is *English* in both of our example Sites.
Localized file metadata records will use the :php:`sys_language_uid` found in the Site Configurations:
`1` for *German*, and `2` for *French*.

**The following installation might have a problem:**

+-----------------+-------------------------------------+
| Site            | Languages                           |
+=================+=====================================+
| www.domain.com  | *   English (:yaml:`languageId: 0`) |
|                 | *   German (:yaml:`languageId: 1`)  |
+-----------------+-------------------------------------+
| www.example.org | *   German (:yaml:`languageId: 0`)  |
|                 | *   French (:yaml:`languageId: 2`)  |
+-----------------+-------------------------------------+

Here, the default language can either be *English* or *German*, depending on the Site!
But the TYPO3 Filelist cannot know on which Site the image file might be used. Could be one, or both.
Remember: the **default** metadata record always has :php:`sys_language_uid` `0`.

It is of no help to localize the metadata to *German*. The :php:`sys_language_uid` will be `1` in this scenario
and only be used in Sites that have :yaml:`languageId: 1` configured.

As a workaround, you could use separate directories and File Mounts for every Site.
Depending on your use case, this might lead to uploading files and completing metadata multiple times.
