Ext.define('VX.view.home.Footer', {
	extend: 'Ext.Component',
	alias: 'widget.pagefooter',
    height: 32,
    autoEl: {
        tag: 'div',
        html:'<div style="text-align: center">© Copyright 2015 - Testing System, All rights reserved<br/>'
        	+'<img src="rsc/mailaddr.png"></div>'
    }
});