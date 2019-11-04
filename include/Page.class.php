<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/10/28
 * Time: 11:37
 */
 //分页类
 class Page{
    public $current;
    public $count;
    public $limit;
    public $size;
    public $classes = 'black2';
    public function  __construct($c,$cou,$l,$s,$cla){
        $this->current = $c;
        $this->count = $cou;
        $this->limit = $l;
        $this->size = $s;
        $this->classes = $cla;
    }

     function get_url() {
		$str = $_SERVER['PHP_SELF'] . '?';
		foreach ($_GET as $k=>$v) {
			if ($k!='page') {
				$str .= "$k=$v&";
			}
		}
		return $str;
	}

	/**
	 * 分页函数
	 * @param  [Int] $this->current [当前页]
	 * @param  [Int] this->count   [数据总数]
	 * @param  [Int] $this->count   [每页显示的数据数]
	 * @param  [Int] $this->size    [显示的页数]
	 * @param  [String] $this->classes   [分页样式]
	 * @return [String]          [description]
	 */
	function page () {
		$str = '';
		if ($this->count>$this->limit) {
			$pages = ceil($this->count/$this->limit);
			$url = $this->get_url();
			$str .= '<div class="' . $this->classes . '">';

			if ($this->current!=1) {
				$str .= '<a href="' . $url .'page=1">首页</a>';
				$str .= '<a href="' . $url .'page=' . ($this->current-1) . '">上一页</a>';
			}
			 if ($this->current<ceil($this->size/2)) {
			 	$start = 1;
			 	//谁小循环到谁为止
			 	$end = $pages<$this->size?$pages:$this->size;
			 } else if ($this->current>$pages-floor($this->size/2)) {
			 	//2.当前页在中间右侧
			 	$start = $pages-$this->size+1<=0?1:$pages-$this->size+1;
			 	$end=$pages;
			 } else {
			 	//3.当前页在中间位置
			 	$start = $this->current-floor($this->size/2);
			 	$end = $this->current+floor($this->size/2);
			 }
			 //使用for循环将页码循环了出来
			 for ($i=$start;$i<$end;$i++) {
			 	if ($i==$this->current) {
			 		//判断当前页的情况
			 		$str .='<span class="current">'.$i.'</span>';
			 	} else {
			 		$str .= '<a href="' . $url . 'page=' .$i. '">'.$i.'</a>';
			 	}
			 }
			//第三种情况，只有尾页和下一页
			if ($this->current!=$pages) {
				$str .= '<a href="' .$url . 'page=' . ($this->current+1) . '">下一页</a>';
				$str .= '<a href="' .$url . 'page=' . $pages . '">尾 页</a>';
			}
			$str .= '</div>';
		}
		return $str;
	}
 }