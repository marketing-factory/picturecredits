.. index:: Configuration
.. _picture-terms-configuration:

===========================
Picture Terms Configuration
===========================
This chapter describes how integrators get the templates for the necessary licenses or vendors.

.. _import-terms-database:

Import preconfigured terms
==========================
The extension provides some commonly used vendors and licenses as preconfigured templates (database records).

You can import these records in the Backend module :guilabel:`Picture Credits > Import`.

.. figure:: /Images/BackendModuleImportRecords.png
      :class: with-shadow
      :alt: Backend module "Picture Credits > Import"
      :width: 600px

.. warning::

   Beware: Importing the preconfigured records will delete all existing records of this type!

.. _create-new-terms-record:

Create new terms record
=======================
If an additional terms record is needed, follow these steps:

.. rst-class:: bignums

1. Create a new record on root level for the required license or vendor (1).

   .. figure:: /Images/BackendNewRecord.png
      :class: with-shadow
      :alt: Backend: Creating a new Record for License or vendor

2. Get a fitting name for the template (2) and choose the corresponding partial via dropdown (3).

   .. figure:: /Images/BackendCreateTemplate.png
      :class: with-shadow
      :alt: Backend: Creating a new template with corresponding partial


3. Set the default values for the template (4 and 5).

   .. figure:: /Images/BackendSetDefaultValues.png
      :class: with-shadow
      :alt: Backend: Setting default values

4. Determine, which fields are fillable for editors.

   Choose between:
      * Mandatory for editors (6)
      * Mandatory for editors, if given for image
      * Optional for editors
      * Do not show field to editors (7)

   .. figure:: /Images/BackendConfigurableFields.png
      :class: with-shadow
      :alt: Backend: Configurable fields

5. Save and exit. You are done.
