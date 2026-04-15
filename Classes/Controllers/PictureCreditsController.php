<?php

declare(strict_types=1);

namespace Mfc\Picturecredits\Controllers;

use Mfc\Picturecredits\Domain\Repository\FileReferenceRepository;
use Mfc\Picturecredits\Utility\PictureTermsResolver;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Frontend\Page\PageInformation;

/**
 * Class PictureCreditsController
 * @package Mfc\Picturecredits\Controllers
 * @author Christian Spoo <christian.spoo@marketing-factory.de>
 */
class PictureCreditsController extends ActionController
{
    public function __construct(private FileReferenceRepository $fileReferenceRepository)
    {
    }

    public function showAction(): ResponseInterface
    {
        /** @var PageInformation $pageInformation */
        $pageInformation = $this->request->getAttribute('frontend.page.information');
        $currentPid = (int)$pageInformation->getId();
        $fileReferences = $this->fileReferenceRepository->getReferencesOnPage($currentPid);

        $this->view->assign('fileReferences', $fileReferences);

        return $this->htmlResponse();
    }
}
