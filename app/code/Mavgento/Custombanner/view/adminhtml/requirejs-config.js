var config = {
    map: {
        '*': {
            'mavgento/note': 'Mavgento_Custombanner/js/jquery/slider/jquery-ads-note',
        },
    },
    paths: {
        'mavgento/flexslider': 'Mavgento_Custombanner/js/jquery/slider/jquery-flexslider-min',
        'mavgento/evolutionslider': 'Mavgento_Custombanner/js/jquery/slider/jquery-slider-min',
        'mavgento/zebra-tooltips': 'Mavgento_Custombanner/js/jquery/ui/zebra-tooltips',
    },
    shim: {
        'mavgento/flexslider': {
            deps: ['jquery']
        },
        'mavgento/evolutionslider': {
            deps: ['jquery']
        },
        'mavgento/zebra-tooltips': {
            deps: ['jquery']
        },
    }
};
