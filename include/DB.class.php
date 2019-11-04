<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/10/28
 * Time: 9:31
 */
  //数据库类
  class DB{
      public $conn;//连接数据库的变量
      public $fix;//定义前缀
      public function __construct($h, $u, $p, $d, $f){
          //连接数据库
          $conn = mysqli_connect($h, $u, $p);
          if (!$conn) {
              die('网站维护中');
          }
          $this->conn = $conn;
          mysqli_select_db($conn, $d);
          mysqli_set_charset($conn, 'utf8');
          $this->fix = $f;

      }

      //获取多行记录
      private function get_all($sql){
          $res = mysqli_query($this->conn, $sql);
          $data = array();
          if ($res && mysqli_num_rows($res) > 0) {
              while ($arr = mysqli_fetch_assoc($res)) {
                  $data[] = $arr;
              }
          }
          return $data;
      }

      //普通查询所有数据
      public function select_all($tablename, $field = '*', $condition = '1'){
          $sql = "SELECT {$field} FROM {$this->fix}{$tablename} WHERE {$condition}";
//          echo $sql;die;
          return $this->get_all($sql);
      }

      //连表查询所有数据
      public function join_all($tablename1, $tablename2, $on, $field = '*', $condition = '1'){
          $sql = "SELECT {$field} FROM {$this->fix}{$tablename1} AS a LEFT JOIN {$this->fix}{$tablename2} AS b ON a.{$on} = b.{$on} WHERE {$condition}";
//          echo $sql;die;
          return $this->get_all($sql);
      }
      //三连表查询所有数据
      public function join_all_more($tablename1, $tablename2, $tablename3, $on, $on2,$field = '*', $condition = '1'){
          $sql = "SELECT {$field} FROM {$this->fix}{$tablename1} AS a LEFT JOIN {$this->fix}{$tablename2} AS b ON a.{$on} = b.{$on} LEFT JOIN {$this->fix}{$tablename3} AS c ON b.{$on2} = c.{$on2} WHERE {$condition}";
//          echo $sql;die;
          return $this->get_all($sql);
      }
      //普通查询单条数据
      public function get_one($sql){
          $res = mysqli_query($this->conn, $sql);
          $data = array();
          if ($res && mysqli_num_rows($res) > 0) {
              $data = mysqli_fetch_assoc($res);
          }
          return $data;
      }

      //普通查询单条数据
      public function select_one($tablename, $field = '*', $condition = '1'){
          $sql = "SELECT {$field} FROM {$this->fix}{$tablename} WHERE {$condition}";
//          echo $sql;die;
          return $this->get_one($sql);
      }

      //查询数据总数
      public function select_count($tablename, $condition = '1'){
          $sql = "SELECT COUNT(*) AS c FROM {$this->fix}{$tablename} AS a WHERE {$condition}";
//          echo $sql;die;
          $count = $this->get_one($sql);
          return $count['c'];
      }

     //连表查询数据总数
      public function select_count_more($tablename1,$tablename2,$on,$condition = '1'){
          $sql = "SELECT COUNT(*) AS c FROM {$this->fix}{$tablename1} AS a  LEFT JOIN {$this->fix}{$tablename2} AS b ON a.{$on} = b.{$on} WHERE {$condition}";
//          echo $sql;die;
          $count = $this->get_one($sql);
          return $count['c'];
      }
      //三连表查询数据总数
      public function select_count_morer($tablename1,$tablename2,$tablename3,$on,$on1,$condition = '1'){
          $sql = "SELECT COUNT(*) AS c FROM {$this->fix}{$tablename1} AS a  LEFT JOIN {$this->fix}{$tablename2} AS b ON a.{$on} = b.{$on} LEFT JOIN {$this->fix}{$tablename3} AS c ON b.{$on1} = c.{$on1} WHERE {$condition}";
//          echo $sql;die;
          $count = $this->get_one($sql);
          return $count['c'];
      }
      //执行的方法
      private function query($sql){
          $res = mysqli_query($this->conn, $sql);
          return $res;
      }

      //添加
      function add($tablename, $data){
          $sql = "INSERT INTO `{$this->fix}$tablename` ";
          $sql .= "(`" . implode('`,`', array_keys($data)) . "`) VALUES";
          $sql .= "('" . implode("','", $data) . "')";
//	echo $sql;die;
          return $this->query($sql);
      }
    //编辑
    function edit($tablename, $data , $conditions) {
		$sql = "UPDATE `{$this->fix}$tablename` SET ";
		foreach($data as $k=>$v) {
			$sql .= "`$k`= '$v',";
		}
		$sql = rtrim($sql,',');
		$sql .=' WHERE ' . $conditions;
	//	 echo $sql;die;
		return $this->query($sql);
	}
	//删除
	function del($tablename,$conditions) {
		$sql = "DELETE FROM `{$this->fix}$tablename`  WHERE $conditions";
//		echo $sql;die;
		return $this->query($sql);

	}
  }