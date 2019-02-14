<?php
class ArrayPage
{
    const PAGE_SIZE_MAX = 50;
	const PAGE_SIZE_MIN = 1;
	private $perPage = 20;
	private $indexPage = 0;
	private $total = 988;
	
	private $maxPage;
	
	function __construct(){
		$this->maxPage = (int)($this->total / $this->perPage) +1;
	}
    public function recordCount(){
		return $this->total;
	}
    public function pageIndex($value = null){
		if(!is_null($value)){
			$maxPage = (int)($this->total / $this->perPage)+1;
			if($value > $maxPage)$this->indexPage = $maxPage;
			elseif($value < 0)$this->indexPage = 0;
			else{
				$this->indexPage = $value;
			}
			return $this->perPage;
		}
	}
    public function pageSize($value = null){
		if(!is_null($value)){
			if($value < self::PAGE_SIZE_MIN) $this->perPage = self::PAGE_SIZE_MIN;
			elseif($value > self::PAGE_SIZE_MAX)$this->perPage = self::PAGE_SIZE_MAX;
			else{
				$this->perPage = $value;
			}
            return $this->perPage;
		}
	}
    public function pageCount(){
		return (int)($this->total / $this->perPage)+1;
	}
    public function first(){
		$this->indexPage = 0;
	}
    public function prev(){
		if($this->indexPage <= 1)$this->first();
		else $this->indexPage--;
    }
    public function next(){
		if(($this->indexPage+1) > $this->maxPage)$this->last();
		else $this->indexPage++;
	}
    public function last(){
		$this->indexPage = $this->maxPage-1;
	}
    public function pageRows(){
		$data = array();
		for($i = $this->indexPage*$this->perPage;$i < $this->indexPage * $this->perPage + $this->perPage; $i++){
		    if($i < $this->total)array_push($data, $i);
		}
		return $data;
	}
}
