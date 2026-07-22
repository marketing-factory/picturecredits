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
                0 = EXT:picturecredits/Resources/Private/Templates/
                1 = {$plugin.tx_picturecredits.view.templateRootPath}
            }
            layoutRootPaths {
                0 = EXT:picturecredits/Resources/Private/Layouts/
                1 = {$plugin.tx_picturecredits.view.layoutRootPath}
            }
            partialRootPaths {
                0 = EXT:picturecredits/Resources/Private/Partials/
                1 = {$plugin.tx_picturecredits.view.partialRootPath}
            }
        }
    }

    lib.picture_credits = EXTBASEPLUGIN
    lib.picture_credits {
        extensionName = Picturecredits
        pluginName = PictureCredits
    }
