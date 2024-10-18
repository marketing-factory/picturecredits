/**
 * Toggles a CSS class on fields with RenderType "termsInput",
 * depending on a given value.
 * The class controls display and color of icons (see 'picturecredits.css').
 * @author Sebastian Klein <sebastian.klein@marketing-factory.de>
 */
import DocumentService from "@typo3/core/document-service.js";

class MandatoryEvaluation {
    constructor() {
        DocumentService.ready().then((() => {
            this.evaluateFields();
        }))
    }

    evaluateFields() {
        const tceForms = document.getElementById('EditDocumentController');
        const classes = {
            term: '.t3js-mandatory-term',
            icon: '.t3js-termsinput-icons',
            hasValue: 'has-value'
        };
        const mandatoryFields = tceForms.querySelectorAll(classes.term);

        const checkForValue = (event) => {
            let field = event.target;
            let value = field.value;
            let icon = field.parentElement.parentElement.querySelector(classes.icon);

            if (value) {
                icon.classList.add(classes.hasValue);
            } else {
                icon.classList.remove(classes.hasValue);
            }
        };

        if (mandatoryFields !== null) {
            mandatoryFields.forEach(f => {
                f.addEventListener('input', (e) => {
                    checkForValue(e);
                });
                f.addEventListener('change', (e) => {
                    checkForValue(e);
                });
            });
        }
    }
}

export default new MandatoryEvaluation;
