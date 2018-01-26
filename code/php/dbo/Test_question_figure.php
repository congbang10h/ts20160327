<?php
//File này được tạo tự động bằng tool
//Nếu cần chỉnh sửa chỉ sửa bên trong phần EDITABLE ZONE
//Những nội dung bên ngoài phần EDITABLE ZONE sẽ bị thay đổi khi chạy tool
//Không thay đổi 2 nhãn //BEGIN EDITABLE ZONE và //END EDITABLE ZONE
class Test_question_figure extends DBObject{
	protected $_table = 'test_question_figure';
	protected $_title = '';
	protected $_fields = array(
		'test_question_figure_id'   => array(DBO_AUTO, 'test_question_figure_id', NULL),
		'test_question_id'          => array(DBO_NUMB, 'test_question_id', NULL),
		'test_figure_id'            => array(DBO_NUMB, 'test_figure_id', NULL),
		'test_question_figure_desc' => array(DBO_STRI, 'test_question_figure_desc', NULL)
	);
	protected $_keys = array('test_question_figure_id');
	protected $_fkeys = array(//class=array(fkey,pkey)
			'Test_question'    => array('test_question_id', 'test_question_id'),
			'Test_figure_link' => array('test_figure_id', 'test_figure_id')
		);
	protected $_validations = array(
		array('type' => 'length',
			'field' => 'test_question_figure_desc',
			'message' => 'Thông tin [test_question_figure_desc] dài hơn 65535 ký tự',
			'max' => 65535)
	);
//BEGIN EDITABLE ZONE

//END EDITABLE ZONE
}
?>