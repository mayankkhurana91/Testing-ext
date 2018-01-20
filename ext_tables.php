<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'PingReceiveExtention.Testing',
            'Information',
            'Information'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'PingReceiveExtention.Testing',
            'Management',
            'Management'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'PingReceiveExtention.Testing',
            'Adminstration',
            'Administration'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('testing', 'Configuration/TypoScript', 'PingReceiveExtention');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_testing_domain_model_order', 'EXT:testing/Resources/Private/Language/locallang_csh_tx_testing_domain_model_order.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_testing_domain_model_order');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_testing_domain_model_dishes', 'EXT:testing/Resources/Private/Language/locallang_csh_tx_testing_domain_model_dishes.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_testing_domain_model_dishes');

    }
);
