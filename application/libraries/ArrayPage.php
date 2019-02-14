<?php
require('../core/PageNavigation.php');

/**
* Interface PageNavigation
*
* @package \App\Contracts
**/
class PageNav implements PageNavigation
{
    const PAGE_SIZE_MAX = 50;
	const PAGE_SIZE_MIN = 1;
	$perPage = 20;
	$indexPage = 0;
	$total = 988;
	
	int $maxPage = (int)($total / $perPage) +1;
	
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
			return $this->indexPage;
		}
	}
    public function pageSize($value = null){
		if(!is_null($value)){
			if($value < PAGE_SIZE_MIN) $this->perPage = PAGE_SIZE_MIN;
			elseif($value > PAGE_SIZE_MAX)$this->perPage = PAGE_SIZE_MAX;
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
		if($this->indexPage <= 1)$this->first;
		else $this->indexPage--;
    }
    public function next(){
		if(($this->indexPage+1) > $this->maxPage)$this->last();
		else $this->indexPage++;
	}
    public function last(){
		$this->indexPage = $this->maxPage;
	}
    public function pageRows(){
		
	}
}
