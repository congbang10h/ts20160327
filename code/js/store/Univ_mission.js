//ID: 74f3d0ea05706c1b3658e03ad3abe201
//File này được tạo tự động bằng tool
//Nếu cần chỉnh sửa chỉ sửa bên trong phần ZoneX
//Những nội dung bên ngoài phần ZoneX sẽ bị thay đổi khi chạy tool
//Không thay đổi các nhãn ZoneX, X có thể là C hoặc F
Ext.define('VX.store.Univ_mission', {
	extend: 'Ext.ux.Store',
	model: 'VX.model.Univ_mission',
	autoLoad: false,
	pageSize: 20
//<ZoneC
	,remoteFilter: true
//ZoneC>
});