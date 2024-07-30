.. index:: Templates; Partials
.. _templates-partials:

=====================
Partials and sections
=====================

Partials
========

By default, the extension uses only two different partials to render the picture credits.

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
It renders only part of the sections and inserts the Copyright Sign. The sections :literal:`collection`
and :literal:`publisherName` are only required in the rarest cases. So if you do not need them,
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

Below is the example for the section :literal:`vendorLink`.

..  code-block:: html
    :caption: EXT:picturecredits/Resources/Private/Partials/Picturecredits/PartialSections.html
    :linenos:
    :lineno-start: 47

    <f:section name="vendorLink">
        <f:variable name="vendorNameOrFallback"><f:spaceless>
            <f:if condition="{resolvedTerms.vendorName}">
                <f:then>{resolvedTerms.vendorName}</f:then>
                <f:else>{resolvedTerms.vendorLink}</f:else>
            </f:if>
        </f:spaceless></f:variable>
        <f:variable name="vendorSeparator">
            {f:if(condition: '{resolvedTerms.vendorName} == stock.adobe.com || {resolvedTerms.vendorName} == Fotolia', then: '-', else: '/')}
        </f:variable>
        <f:variable name="conditionalSeparator">
            {f:if(condition: '{resolvedTerms.creatorName} || {resolvedTerms.creatorLink}', then: '{vendorSeparator}')}
        </f:variable>

        <f:if condition="{resolvedTerms.vendorLink}">
            <f:then>
                {conditionalSeparator}<f:link.external uri="{resolvedTerms.vendorLink}">{vendorNameOrFallback}</f:link.external>
            </f:then>
            <f:else>
                <f:if condition="{resolvedTerms.vendorName}">
                    {conditionalSeparator}{resolvedTerms.vendorName}
                </f:if>
            </f:else>
        </f:if>
    </f:section>

*   The variable `{vendorNameOrFallback}` will contain the vendor name, if given. Otherwise, the vendor link will be
    used as link text.
*   In the variable `{vendorSeparator}`, the correct separator is defined. Fotolia and AdobeStock need
    a :html:`-` instead of a :html:`/`.
*   In the variable `{conditionalSeparator}`, we apply this separator only if it is needed (means: the vendor link must
    be separated from a given creator's name or link).

.. tip::

   If you prefer another separator (e.g. a :html:`,`), you can change it in the sections.
   But notice, that the separators are not only set in these variables. They are also hard coded in the
   conditions.

After these preparations, the final vendor link and/or vendor name will be rendered in the Fluid conditions below.
