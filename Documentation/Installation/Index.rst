
.. _installation:

============
Installation
============

Install the extension with Extension Manager or Composer. Admin rights are required.

Composer Mode
=============

If your TYPO3 installation uses Composer, install the latest version of Picture Credits through:

..  code-block:: shell

    composer require mfc/picturecredits

Installing the extension prior to TYPO3 11.4
--------------------------------------------
Before TYPO3 11.4 you have to activate extension installed via Composer by using the Extension Manager:

* Navigate to :guilabel:`Admin Tools > Extensions > Installed Extensions`
* Search for :literal:`picturecredits`
* Activate the extension by clicking on the :guilabel:`Activate button` in the :guilabel:`A/D` column

Extension Manager
=================

For a TYPO3 installation working without Composer install the extension via Extension Manager:

* Navigate to :guilabel:`Admin Tools > Extensions > Installed Extensions`
* Click on :guilabel:`Update now`
* Click :guilabel:`import and install` on the side of the extension entry

activate it:

* Navigate to :guilabel:`Admin Tools > Extensions > Installed Extensions`
* Search for :literal:`picturecredits`
* Activate the extension by clicking on the :guilabel:`Activate button` in the :guilabel:`A/D` column

.. tip::

   For more details have a look at :doc:`t3start:Extensions/Management` or
   :ref:`t3start:install-extension-with-composer`.

Next: Importing picture terms
=============================
You will need to configure templates for the picture vendors and licenses used in your project.

To get you started, the extension already provides a set of commonly used picture terms.
We recommend that you :ref:`import these into your database <import-terms-database>`.
