<?php

declare(strict_types=1);

namespace Mfc\Picturecredits\ViewHelpers\File;

use Mfc\Picturecredits\Domain\Model\FileReference;
use Mfc\Picturecredits\Domain\Model\PictureTerms;
use Mfc\Picturecredits\Domain\Repository\PictureTermsRepository;
use Mfc\Picturecredits\Utility\PictureTermsResolver;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;

/**
 * Class CreditViewHelper
 * @package Mfc\Picturecredits\ViewHelpers\File
 * @author Christian Spoo <christian.spoo@marketing-factory.de>
 */
class CreditViewHelper extends AbstractViewHelper
{
    protected $escapeOutput = false;

    use CompileWithRenderStatic;

    /**
     * @return void
     */
    public function initializeArguments()
    {
        $this->registerArgument('fileReference', FileReference::class, 'Specifies the file reference to create a credit for', true);
    }

    public static function renderStatic(
        array $arguments,
        \Closure $renderChildrenClosure,
        RenderingContextInterface $renderingContext
    ) {
        /** @var FileReference $fileReference */
        $fileReference = $arguments['fileReference'];
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

        return RenderViewHelper::renderStatic(
            [
                'partial' => 'Picturecredits/Terms/' . ucfirst($terms->getTemplateName()),
                'section' => null,
                'arguments' => [
                    'file' => $file,
                    'terms' => $terms,
                    'resolvedTerms' => $resolvedTerms,
                ],
                'optional' => false,
                'delegate' => null,
                'renderable' => null,
                'contentAs' => '',
            ],
            $renderChildrenClosure,
            $renderingContext
        );
    }
}
