Ext.define('VX.view.outcome.OutcomeWin', {
	extend: 'Ext.ux.WinForm',
	requires: [
		'VX.view.outcome.COList',
		'VX.view.outcome.COItemList'
	],
	title: 'Chuẩn đầu ra',
	iconCls: 'outcome16',
	modal: false,
	width: '100%',
	height: '100%',
	loadCourse: function(rec){
		var me=this, g = me.down('course-outcome-item-list'),
			s1=VX.getS('VX.store.Course_outcome');
		s1.removeFilter('course');
		s1.addFilter({
			id: 'course',
			property: 'course_id',
			value: rec.get('course_id')
		});
		g.setVersion(0);
		me.setTitle('Chuẩn đầu ra của môn học ['+rec.get('course_name_vn')+']');
	},
	layout: 'border',
	bodyBorder: false,
	items: [{
		region: 'west',
		xtype: 'course-outcome-list',
		width: '30%',
		split: true
	}, {
		region: 'center',
		xtype: 'course-outcome-item-list'
	}]
});
