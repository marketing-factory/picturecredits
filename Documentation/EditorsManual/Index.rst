.. include:: /Includes.rst.txt

.. _editors-manual:

==============
Editors Manual
==============

.. _editors-benefits:

The benefits of using this extension
====================================

Picture credits have to be rendered according to the license of each individual vendor or license type.

Some examples:

*   Adobe Stock: "Agency Name/Contributor Name – stock.adobe.com"
*   Unsplash: "Photo by `Jeremy Bishop <https://unsplash.com/photos/KFIjzXYg1RM>`__ on `Unsplash <https://unsplash.com/>`__"

By using this TYPO3 extension, you will only need to provide the necessary metadata (name of vendor, link to image, …).
**The extension will take care of the appropriate rendering of your picture credits.**

.. _editors-metadata:

How to complete the metadata of an image
========================================

In the TYPO3 Filelist, open the metadata of an image file. The extension adds a new tab "Picture credits" in the
metadata record, where you can enter the information of the concerning license.
First, choose the matching *Picture terms* (license type or vendor) [1].
Then, complete the necessary fields. There are three types of fields:

*   Mandatory [2, red symbol]
*   Mandatory, if information is given for this image [3, orange symbol]
*   Optional [4, all other fields]

.. figure:: /Images/BackendEditorInputs.png
   :class: with-shadow
   :alt: Backend: Editor inputs

   Entering values for concerning license. List of fields will vary between selected Picture terms.

.. note::

   The metadata record can be saved without completing all "mandatory" fields. You are responsible to check
   that all mandatory fields are filled. The symbol will turn to green if a value is set [5].

.. _editors-output:

Output of the picture credits on a page
=======================================

Your provided data is used to compose the correct picture credits, based on the selected picture terms.
The administrator or integrator of your website will

By default, the picture credits will be rendered as a numbered list.
The output on your website will most likely be different.

.. figure:: /Images/FrontendPictureCredits.png
   :class: with-shadow
   :alt: Frontend: Picture credits

   Picture credits rendered in frontend (example styling)
