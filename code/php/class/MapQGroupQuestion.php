<?php
class MapQGroupQuestion extends Question_group{
	public function __construct(){
		parent::__construct();
		$this->_jfields['Qgroup_question_map']	= ['question_id:max=_has_link'];
	}
	public function verifyAuthorize($id=0,$action='read'){
		//Lớp này không giới hạn phân quyền Question ở mức 2
	}
	public function _update($params, $opts=null, $flag=DB_CHK_FULL){
//		throw new AException($params);
		$mapObj = new Qgroup_question_map();
		$row = [
			'question_group_id' => $params->groupid,
			'question_id' => $params->itemid
		];
		if ($mapObj->findOne($row))
			$mapObj->_destroy($row);
		else
			$mapObj->_create($row);
	}
	public function _create($params,$opts=null){
		$mapObj = new Qgroup_question_map();
		foreach($params->itemid as $iid){
			$row = [
				'question_group_id' => $params->groupid,
				'question_id' => $iid
			];
			if (!$mapObj->findOne($row))
				$mapObj->_create($row);
		}
	}
	protected function _buildJoin(){
		parent::_buildJoin();
		$j = 'LEFT JOIN `qgroup_question_map` ON (`qgroup_question_map`.'.
			'`question_group_id`=`question_group`.`question_group_id`';
		foreach($this->_aWhere as $i=>$ws){
			if (preg_match("/inside/",$ws)){
				$j .= ' AND '.str_replace('inside','question_id',$ws);
				$this->_aWhere[$i] = 'qgroup_question_map.question_id IS NOT NULL';
			}elseif (preg_match("/outside/",$ws)){
				$j .= ' AND '.str_replace('outside','question_id',$ws);
				$this->_aWhere[$i] = 'qgroup_question_map.question_id IS NULL';
			}elseif (preg_match("/hasitem/",$ws)){
				$j .= ' AND '.str_replace('hasitem','question_id',$ws);
				unset($this->_aWhere[$i]);
			}
		}
		$this->_aLJoin['qgroup_question_map'] = "$j)";
	}
}