<?php
namespace Mfc\Picturecredits\EventListener;

use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class AddMandatoryEvaluation
{
    public function __invoke(): void
    {
        /** @var PageRenderer $pageRenderer */
        $pageRenderer = GeneralUtility::makeInstance(PageRenderer::class);
        $pageRenderer->loadJavaScriptModule('@mfc/picturecredits-mandatory-evaluation');
    }
}
