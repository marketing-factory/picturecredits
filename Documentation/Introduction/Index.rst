.. include:: /Includes.rst.txt

.. _introduction:

============
Introduction
============

Get a short overview of how this extension simplifies the processing of picture credits in TYPO3.

.. _intro-what-it-does:

What does it do?
================

*   Allows centralized image rights management in FAL (File Abstraction Layer)
*   Provides automated rendering of picture credits on all pages via frontend plugin, with possible custom Fluid template per picture terms
*   Optimizes the backend form for editors: only necessary fields are provided, default values are possible
*   Ships preconfigured records of commonly used picture terms (Unsplash, Adobe Stock, Creative Commons, …)

This extension offers both central image rights management in the TYPO3 file system and an automated
rendering of picture credits on all pages. It also helps integrators and editors to make the picture credits legally
secure to avoid written warnings.

Before using this extension, you should get an overview of the most used picture licenses on your website or in your project.
With the help of "Picture Credits", integrators are able to set up individual templates for these licenses.

.. _intro-how-does-it-work:

How does it work?
=================

.. rst-class:: bignums

1. Configuring picture terms

   First, the integrator configures templates for each picture terms (like *Unsplash*). They can select which fields
   are visible in file metadata records and if these are mandatory or optional for editors.
   For each field, a default value can be set.

   Examples of configurable fields are: Name and link of vendor or creator, among others.

   Each picture terms *can* use an individual Fluid template, allowing to render picture credits in accordance with
   licensing terms.

   Read more about :ref:`Configuration <configuration>`.

2. Entering data

   In file metadata, editors then can select the appropriate, preconfigured picture terms. After reload, only the
   necessary fields are provided. Default values for a field are shown as a placeholder – if the editor does not
   provide a custom value, the default will be rendered automatically. Mandatory fields are highlighted in the backend.

   Read more about :ref:`Editing <editors-manual>`.

3. Rendering picture credits

   During the rendering process, this extension collects the metadata of all referenced images on the current page.
   The plugin renders the found picture credits according to the term's configured Fluid partial.

   By default, the picture credits are rendered as a numbered list. The integrator can adjust markup and styling
   as needed, including possible thumbnails of each image.

   Read more about :ref:`templates <templates>`.

Screenshot
==========

.. figure:: /Images/FrontendPictureCredits.png
   :class: with-shadow
   :alt: Frontend: Picture credits

   Picture credits rendered in frontend (example styling)
