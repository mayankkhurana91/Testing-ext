<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'PingReceiveExtention.Testing',
            'Information',
            [
                'Order' => 'list, show, new, create, edit, update, delete, ',
                'Dishes' => 'list, show, new, create, edit, update, delete'
            ],
            // non-cacheable actions
            [
                'Order' => 'create, update, delete, ',
                'Dishes' => 'create, update, delete'
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'PingReceiveExtention.Testing',
            'Management',
            [
                'Order' => 'list, show, new, create, edit, update, delete, ',
                'Dishes' => 'list, show, new, create, edit, update, delete'
            ],
            // non-cacheable actions
            [
                'Order' => 'create, update, delete, ',
                'Dishes' => 'create, update, delete'
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'PingReceiveExtention.Testing',
            'Adminstration',
            [
                'Order' => 'list, show, new, create, edit, update, delete, ',
                'Dishes' => 'list, show, new, create, edit, update, delete'
            ],
            // non-cacheable actions
            [
                'Order' => 'create, update, delete, ',
                'Dishes' => 'create, update, delete'
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    information {
                        iconIdentifier = testing-plugin-information
                        title = LLL:EXT:testing/Resources/Private/Language/locallang_db.xlf:tx_testing_information.name
                        description = LLL:EXT:testing/Resources/Private/Language/locallang_db.xlf:tx_testing_information.description
                        tt_content_defValues {
                            CType = list
                            list_type = testing_information
                        }
                    }
                    management {
                        iconIdentifier = testing-plugin-management
                        title = LLL:EXT:testing/Resources/Private/Language/locallang_db.xlf:tx_testing_management.name
                        description = LLL:EXT:testing/Resources/Private/Language/locallang_db.xlf:tx_testing_management.description
                        tt_content_defValues {
                            CType = list
                            list_type = testing_management
                        }
                    }
                    adminstration {
                        iconIdentifier = testing-plugin-adminstration
                        title = LLL:EXT:testing/Resources/Private/Language/locallang_db.xlf:tx_testing_adminstration.name
                        description = LLL:EXT:testing/Resources/Private/Language/locallang_db.xlf:tx_testing_adminstration.description
                        tt_content_defValues {
                            CType = list
                            list_type = testing_adminstration
                        }
                    }
                }
                show = *
            }
       }'
    );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'testing-plugin-information',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:testing/Resources/Public/Icons/user_plugin_information.svg']
			);
		
			$iconRegistry->registerIcon(
				'testing-plugin-management',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:testing/Resources/Public/Icons/user_plugin_management.svg']
			);
		
			$iconRegistry->registerIcon(
				'testing-plugin-adminstration',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:testing/Resources/Public/Icons/user_plugin_adminstration.svg']
			);
		
    }
);
