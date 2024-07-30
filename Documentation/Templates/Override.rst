.. index:: Templates; Override
.. _templates-override:

Overriding templates
====================

EXT:picturecredits is using Fluid as template engine.

This documentation won't bring you all information about Fluid but only the
most important things you need for using it. You can get
more information in the section :ref:`Fluid templates of the Sitepackage tutorial
<t3sitepackage:fluid-templates>`. A complete reference of Fluid ViewHelpers
provided by TYPO3 can be found in the  :doc:`ViewHelper Reference <t3viewhelper:Index>`


.. index:: Templates; TypoScript

Change the templates using TypoScript constants
-----------------------------------------------

As any Extbase based extension, you can find the templates in the directory
:file:`Resources/Private/`.

If you want to change a template, copy the desired files to the directory
where you store your custom templates.

We suggest that you use a sitepackage extension. Learn how to
:doc:`Create a sitepackage extension <t3sitepackage:Index>`.

..  code-block:: typoscript

    plugin.tx_picturecredits {
        view {
           templateRootPath = EXT:picturecredits/Resources/Private/Templates/
           partialRootPath = EXT:picturecredits/Resources/Private/Partials/
           layoutRootPath = EXT:picturecredits/Resources/Private/Layouts/
        }
    }
