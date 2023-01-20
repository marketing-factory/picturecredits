.. include:: /Includes.rst.txt
.. highlight:: typoscript
.. index::
   TypoScript; Setup
.. _configuration-typoscript-setup:

Setup
=====

..  code-block:: typoscript
    :caption: EXT:picturecredits/Configuration/TypoScript/setup.typoscript

    plugin.tx_picturecredits {
        view {
            templateRootPaths {
               0 = {$plugin.tx_picturecredits.view.templateRootPath}
            }
            layoutRootPaths {
               0 = {$plugin.tx_picturecredits.view.layoutRootPath}
            }
            partialRootPaths {
               0 = {$plugin.tx_picturecredits.view.partialRootPath}
            }
        }
    }

    lib.picture_credits = USER_INT
    lib.picture_credits {
        userFunc = TYPO3\CMS\Extbase\Core\Bootstrap->run
        extensionName = PictureCredits
        pluginName = PictureCredits
        controllerName = PictureCredit
    }
