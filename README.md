![Extension icon](Resources/Public/Icons/Extension.svg)

# Picture credits (TYPO3 Extension)

## Full documentation

You can find a more detailed documentation on [docs.typo3.org](https://docs.typo3.org/p/mfc/picturecredits/main/en-us/) (HTML) and in the `Documentation/` folder (ReST).


## What does this extension do?

*   Allows centralized image rights management in FAL (File Abstraction Layer)
*   Provides automated rendering of picture credits on all pages via frontend plugin, with possible custom Fluid template per picture terms
*   Optimizes the backend form for editors: only necessary fields are provided, default values are possible
*   Ships preconfigured records of commonly used picture terms (Unsplash, Adobe Stock, Creative Commons, …)

This extension offers both central image rights management in the TYPO3 file system and an automated
rendering of picture credits on all pages. It also helps integrators and editors to make the picture credits legally
secure to avoid written warnings.


## Compatibility

TYPO3 11.5.0 - 11.5.99


## Installation

The extension needs to be installed as any other extension of TYPO3 CMS.

Perform the following steps:

1. Load and install the extension.
2. Include the static template *"Picture credits (picturecredits)"* into your TypoScript template.
3. Import commonly used picture terms in Extension Manager (refer to full documentation for details).
