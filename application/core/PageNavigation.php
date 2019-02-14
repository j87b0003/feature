<?php
/**
* 頁面索引介面
* 適用於 php 7.0 以上
**/
declare(strict_types=1);
namespace App\Contracts;

/**
* Interface PageNavigation
*
* @package \App\Contracts
**/
interface PageNavigation
{
    /**
    * 總筆數 getter
    *
    * @return int
    **/
    public function recordCount() : int;
    
    /**
    * 頁索引 getter|setter
    *
    * @param int $value 取得|設定 頁索引
    * @return int|void
    **/
    public function pageIndex(int $value = null) : ?int;
    
    /**
    * 每頁筆數 getter|setter
    *
    * @param int $value 取得|設定 每頁筆數
    * @return int|void
    **/
    public function pageSize(int $value = null) : ?int;

    /**
    * 總頁數 getter
    *
    * @return int
    **/
    public function pageCount() : int;
    
    /**
    * 將頁索引指定到第一頁
    *
    * @return void
    **/
    public function first() : void;

    /**
    * 將頁索引移到上一頁
    *
    * @return void
    **/
    public function prev() : void;
    
    /**
    * 將頁索引移到下一頁
    *
    * @return void
    **/
    public function next() : void;

    /**
    * 將頁索引指定到最後一頁
    *
    * @return void
    **/
    public function last() : void;

    /**
    * 取得指定頁索引的 20 個元素, 如有不足則以實際數量輸出．
    *
    * @return array
    **/
    public function pageRows() : array;
}
