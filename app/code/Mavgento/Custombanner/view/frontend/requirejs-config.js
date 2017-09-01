var config = {
	map: {
		'*': {
			'mavgento/note': 'Mavgento_Custombanner/js/jquery/slider/jquery-ads-note',
			'mavgento/impress': 'Mavgento_Custombanner/js/report/impress',
			'mavgento/clickbanner': 'Mavgento_Custombanner/js/report/clickbanner',
		},
	},
	paths: {
		'mavgento/flexslider': 'Mavgento_Custombanner/js/jquery/slider/jquery-flexslider-min',
		'mavgento/evolutionslider': 'Mavgento_Custombanner/js/jquery/slider/jquery-slider-min',
		'mavgento/popup': 'Mavgento_Custombanner/js/jquery.bpopup.min',
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
