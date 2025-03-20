.. index:: Configuration
.. _extension-configuration:

=======================
Extension Configuration
=======================
Global settings of this extension are provided in :guilabel:`Admin Tools > Settings`.

.. _extension-features:

Features
========

.. confval:: hideDisabledTermsInMetadata
   :name: hideDisabledTermsInMetadata
   :type: boolean
   :default: 0 (false)

   **Do not list disabled picture terms in file metadata records**

   If enabled, only active "Picture terms" records are available to editors in File Metadata.
   This allows to e.g. keep some of the :ref:`imported default picture terms <import-terms-database>` for later use.
