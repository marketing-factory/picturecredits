<?php
namespace Mfc\Picturecredits\EventListener;

use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class AddRequireJSMandatoryEvaluation
{
    public function __invoke(): void
    {
        /** @var PageRenderer $pageRenderer */
        $pageRenderer = GeneralUtility::makeInstance(PageRenderer::class);
        $pageRenderer->loadRequireJsModule('TYPO3/CMS/Picturecredits/MandatoryEvaluation');
    }
}
