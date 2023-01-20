.. include:: /Includes.rst.txt
.. index:: Configuration
.. _configuration-special-toggles:

=================================
About special toggles in metadata
=================================
This chapter describes custom functionality that integrators will have to implement themselves.

..  note::
    You should only enable these toggles for editors if you configured a functionality in your project.

.. _toggle-reviewed:

Toggle "Picture credits were reviewed"
======================================
This toggle has no functionality in the frontend. You could use it as part of an internal approval process.

.. _toggle-social-media:

Toggle "Image can be used on social media"
==========================================
This toggle has no functionality by default. You could use it to implement additional checks for your project.
For example: only let TYPO3 render an Open Graph (Facebook) or Twitter image from page properties
if the toggle of the referenced image was enabled.

.. _toggle-credits-on-image:

Toggle "Picture credits must be rendered directly on the image"
===============================================================
This toggle has no functionality by default. You could use it to extend image rendering in your templates.
