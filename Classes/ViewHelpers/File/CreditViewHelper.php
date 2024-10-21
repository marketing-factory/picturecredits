<?php

declare(strict_types=1);

namespace Mfc\Picturecredits\ViewHelpers\File;

use Mfc\Picturecredits\Domain\Model\FileReference;
use Mfc\Picturecredits\Domain\Model\PictureTerms;
use Mfc\Picturecredits\Domain\Repository\PictureTermsRepository;
use Mfc\Picturecredits\Utility\PictureTermsResolver;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Renders picture credits for a file reference, based on the "Terms" Fluid partial that is set in the assigned "Picture terms" record.
 *
 * @package Mfc\Picturecredits\ViewHelpers\File
 * @author Christian Spoo <christian.spoo@marketing-factory.de>
 */
class CreditViewHelper extends AbstractViewHelper
{
    protected $escapeOutput = false;

    /**
     * @return void
     */
    public function initializeArguments(): void
    {
        $this->registerArgument('fileReference', FileReference::class, 'Specifies the file reference to create a credit for', true);
    }

    public function render()
    {
        /** @var FileReference $fileReference */
        $fileReference = $this->arguments['fileReference'];
        $file = $fileReference->getOriginalResource();
        if (!$file->hasProperty('terms')) {
            return;
        }

        $terms = $file->getProperty('terms');
        $terms = GeneralUtility::makeInstance(PictureTermsRepository::class)->findByUid($terms);
        if (!$terms instanceof PictureTerms) {
            return '';
        }

        $resolvedTerms = PictureTermsResolver::resolveFromFileAndTerms($fileReference, $terms);

        $partial = 'Picturecredits/Terms/' . ucfirst($terms->getTemplateName());
        $section = null;
        $variables = [
            'file' => $file,
            'terms' => $terms,
            'resolvedTerms' => $resolvedTerms,
        ];
        $optional = false;

        $view = $this->renderingContext->getViewHelperVariableContainer()->getView();
        $content = $view->renderPartial($partial, $section, $variables, $optional);

        return $content;
    }
}
