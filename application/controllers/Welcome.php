<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('./application/libraries/ArrayPage.php');
class Welcome extends CI_Controller {
	public function index()
	{
		$ap = new ArrayPage();
		var_dump($ap->pageRows());
		/*
		$ap->pageIndex(5);
		echo $ap->recordCount();
		*/
        $ap->last();
        var_dump($ap->pageRows());
        echo '<br/><br/>';
        $ap->first();
        var_dump($ap->pageRows());

        echo '<br/><br/>';
        $ap->pageSize(30);
        $ap->first();
        var_dump($ap->pageRows());
        echo '<br/><br/>';
        echo $ap->pageCount();

        echo '<br/><br/>';

        $ap->next();
        var_dump($ap->pageRows());
	}
}
