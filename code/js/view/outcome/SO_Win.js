Ext.define('VX.view.outcome.SO_Win', {
	extend: 'Ext.ux.WinForm',
	requires: [
		'VX.view.outcome.SO_List',
		'VX.view.outcome.SOI_List'
	],
	iconCls: 'so16',
	modal: false,
	width: '100%',
	height: '100%',
	loadEduPro: function(rec){
		var me=this, g = me.down('student-outcome-item-list'),
			s1=VX.getS('VX.store.Student_outcome');
		s1.removeFilter('edupro');
		s1.addFilter({
			id: 'edupro',
			property: 'edu_program_id',
			value: rec.get('edu_program_id')
		});
		g.setVersion(0);
		me.setTitle('Chuẩn đầu ra Sinh viên của ['+rec.get('edu_program_name_vn')+']');
		me.show();
	},
	layout: 'border',
	bodyBorder: false,
	items: [{
		region: 'west',
		xtype: 'student-outcome-list',
		width: '30%',
		split: true
	}, {
		region: 'center',
		xtype: 'student-outcome-item-list'
	}]
});
