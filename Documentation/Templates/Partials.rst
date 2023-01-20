.. include:: /Includes.rst.txt
.. index:: Templates; Partials
.. _templates-partials:

=====================
Partials and sections
=====================

Partials
========

By default the extension uses only two different partials to render the picture credits.

Partial "Default"
-----------------
This partials renders every section, where a value is entered.
It works best with all of the CC-licenses or similar.

..  code-block:: html
    :caption: EXT:picturecredits/Resources/Private/Partials/Picturecredits/Terms/Default.html
    :linenos:
    :lineno-start: 3

    <f:render partial="Picturecredits/PartialSections" section="collection" arguments="{_all}"/>
    <f:render partial="Picturecredits/PartialSections" section="pictureLink" arguments="{_all}"/>
    <f:render partial="Picturecredits/PartialSections" section="publisherName" arguments="{_all}"/>
    <f:render partial="Picturecredits/PartialSections" section="creatorLink" arguments="{_all}"/>
    <f:render partial="Picturecredits/PartialSections" section="vendorLink" arguments="{_all}"/>
    <f:render partial="Picturecredits/PartialSections" section="licenseLink" arguments="{_all}"/>
    <f:render partial="Picturecredits/PartialSections" section="disclaimer" arguments="{_all}"/>
    <f:render partial="Picturecredits/PartialSections" section="additionalInfo" arguments="{_all}"/>

Partial "Allrightsreserved"
---------------------------
The second partial matches most of the stock photos.
It renders only part of the sections and inserts the Copyright Sign. The sections :literal:`\ \ collection`
and :literal:`\ \ publisherName` are only required in the rarest cases. So if you do not need them,
delete the lines concerned or better, just create a new partial without them.

..  code-block:: html
    :caption: EXT:picturecredits/Resources/Private/Partials/Picturecredits/Terms/Allrightsreserved.html
    :linenos:
    :lineno-start: 3

    <f:render partial="Picturecredits/PartialSections" section="collection" arguments="{_all}"/>
    <f:render partial="Picturecredits/PartialSections" section="pictureLink" arguments="{_all}"/>
    &copy;
    <f:render partial="Picturecredits/PartialSections" section="publisherName" arguments="{_all}"/>
    <f:render partial="Picturecredits/PartialSections" section="creatorLink" arguments="{_all}"/>
    <f:render partial="Picturecredits/PartialSections" section="vendorLink" arguments="{_all}"/>

Sections
========

Below is the example for the section :literal:`\ \ vendorLink`.

..  code-block:: html
    :caption: EXT:picturecredits/Resources/Private/Partials/Picturecredits/PartialSections.html
    :linenos:
    :lineno-start: 64

    <f:section name="vendorLink">
        <f:variable name="selectSeparator">
           {f:if(condition: '{resolvedTerms.vendorName} == stock.adobe.com || {resolvedTerms.vendorName} == Fotolia.com', then: '-', else: '/')}
        </f:variable>
        <f:variable name="separatorTrue">
           {f:if(condition: '{resolvedTerms.creatorName} || {resolvedTerms.creatorLink}', then: '{selectSeparator}')}
        </f:variable>
        <f:switch expression="{resolvedTerms.vendorLink}">
           <f:case value = "">
              <f:if condition="{resolvedTerms.vendorName}">
                 <f:then>
                    {separatorTrue}{resolvedTerms.vendorName}
                 </f:then>
              </f:if>
           </f:case>
           <f:defaultCase>
              <f:if condition="{resolvedTerms.vendorName}">
                 <f:then>
                    {separatorTrue}<f:link.external uri="{resolvedTerms.vendorLink}">{resolvedTerms.vendorName}</f:link.external>
                 </f:then>
                 <f:else>
                    {separatorTrue}<f:link.external uri="{resolvedTerms.vendorLink}">{resolvedTerms.vendorLink}</f:link.external>
                 </f:else>
              </f:if>
           </f:defaultCase>
        </f:switch>
    </f:section>

First it is checked, which separator will be set. Fotolia
and AdobeStock need a :literal:`\ \ -` instead of a :literal:`\ \ /`. In the following variable it is checked, if
a separator is needed at all.

.. tip::

   If you prefer another separator e.g. a :literal:`\ \ ,`, you can change it in the sections.
   But notice, that the separators are not only set in these variables. They are also hard coded in the
   conditions.

The switch case verifies, which values are set. In the default case :literal:`\ \ vendorName` refers to the
:literal:`\ \ vendorLink`. The other case and conditions are fallbacks, if either :literal:`\ \ vendorName` or
:literal:`\ \ vendorLink` are not set.
