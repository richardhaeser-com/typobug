<?php

call_user_func(
    static function (): void {
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Bug',
            'BugIndex.',
            'Bugs everywhere'
        );
    }
);
