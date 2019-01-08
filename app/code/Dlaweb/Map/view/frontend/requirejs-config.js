/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    deps:[
        /**
         * Charger le fichier js lorsque l'on charge require
         * Autre solution déclarer le js dans default head block 
         * */ 
        'Dlaweb_Map/js/dlaDropdown'
    ],
    map: {
        '*': {
            /* default component : customComponent */
            customDropdown:  'Dlaweb_Map/js/dlaDropdown'
        }
    }
};
