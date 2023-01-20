/**
 * Changes the icon color of fields with RenderType "termsInput",
 * depending on existing value and MetadataFieldType.
 * @author Sebastian Klein <sebastian.klein@marketing-factory.de>
 * @exports TYPO3/CMS/Picturecredits/MandatoryEvaluation
 */
define(
    ['require', 'exports'],
    function (require, exports) {
        'use strict';

        const tceForms = document.getElementById('EditDocumentController');
        const colors = {
            ok: '#79a548',
            mandatory: '#c83c3c',
            mandatoryIfPresent: '#e8a33d'
        };
        const classes = {
            term: '.t3js-mandatory-term',
            icon: '.t3js-form-field-termsinput-icon',
            ifPresent: 't3js-mandatory-term-if-present'
        };
        const mandatoryFields = tceForms.querySelectorAll(classes.term);

        const setColor = (value, icon, isMandatoryIfPresent) => {
            if (value) {
                icon.style.color = colors.ok;
            } else if (isMandatoryIfPresent) {
                icon.style.color = colors.mandatoryIfPresent;
            } else {
                icon.style.color = colors.mandatory;
            }
        };

        if (mandatoryFields !== null) {
            mandatoryFields.forEach(f => {
                f.addEventListener('input', (e) => {
                    let field = e.target;
                    let value = field.value;
                    let icon = field.parentElement.parentElement.querySelector(classes.icon);
                    let isMandatoryIfPresent = field.classList.contains(classes.ifPresent);

                    setColor(value, icon, isMandatoryIfPresent);
                });
            });
        }
    });
