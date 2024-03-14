<?php

/**
 * 
 * @version 0.1 $Id: pageList.php,v 1.2 2005/01/04 10:05:15 phil-asw-cvs Exp $
 * @author Baskaran 
 * @since July 28, 2004
 * @copyright 2004
 * @modified September 13, 2004
 * 
 * Page Display
 */

class pageList {
    var $numOfRows = 10;
    var $totalRecords = 0;
    var $currentPage = 1;
    var $totalPages = 0;
    var $startRecord = 0;
    var $link = "";
	var $v_noofrecords = 0;

    /*
	*  Constructor
	* */
    function pageList($v_totalRecords = 0, $v_numOfRows = 0, $v_currentPage = 1, $v_links = "")
    {
        $this->totalRecords = $v_totalRecords;
        $this->numOfRows = $v_numOfRows;
        $this->currentPage = $v_currentPage;
        $this->link = $v_links;
    } 
    /*
	*  Set Functions 
	* */
    function setTotalRecords($records)
    {
        $this->totalRecords = $records;
    } 

    function setCurrent($page)
    {
        $this->currentPage = $page;
    } 
    function setNumOfRows($rows)
    {
        $this->numOfRows = $rows;
    } 
    function setLink($v_link)
    {
        $this->link = $v_link;
    } 

    /*
	*  Process 
	* */
    function generate()
    {
        $this->totalPages = ceil($this->totalRecords / $this->numOfRows);
        if ($this->currentPage > $this->totalPages) {
            $this->currentPage = $this->totalPages;
        } 
        $this->startRecord = ($this->currentPage -1) * $this->numOfRows;
    } 
    /*
	*   Get Functions
	* */

    function getTotalPage()
    {
        return $this->totalPages;
    } 
    function getStartRecord()
    {
        return $this->startRecord;
    } 
    function getNumOfRecords()
    {
        return $this->numOfRows;
    } 
    function getCurrentPage()
    {
        return $this->currentPage;
    } 
    function getTotalRecords()
    {
        return $this->totalRecords;
    } 
    /*
	*  Display
	* */
    function displayLink($v_link = "", $v_First_Last_Link = true, $v_Next_Perivious_Link = true, $v_Page_Nums = 5, $v_Noofrrows="")
    {
        /*
		*  Calculating the values....
		* */
		$qstr = "";
        if ($v_link) {
            $this->link = $v_link;
        } 
        if ($v_Noofrrows) {
            $this->v_Noofrrows = $v_Noofrrows;
			$qstr = "&noofrecords=$v_Noofrrows";
        } 


        if (!$this->link) {
            $this->link = basename($_SERVER['SCRIPT_NAME']) . "?" . $_SERVER['QUERY_STRING'];
        } 

        $link_arr = explode("?", $this->link);
        $link_query_str = "";
        if ($link_arr[1]) {
            $qarray = explode("&", $link_arr[1]);
            $resStr = "";
            foreach($qarray as $val) {
                if ($val != "") {
                    if (strpos(strtolower($val), strtolower("page=")) === false) {
                        $resStr .= "&" . $val;
                    } 
                } 
            } 
            $link_arr[1] = $resStr;
        } 

        $first = floor($v_Page_Nums / 2);
        $startPageNum = $this->currentPage - $first;
        $endPageNum = $this->currentPage + ($v_Page_Nums - $first-1);

        if ($startPageNum <= 0) {
            $endPageNum = $endPageNum + abs($startPageNum -1);
            $startPageNum = 1;
        } 

        if ($endPageNum > $this->totalPages) {
            $startPageNum = $startPageNum - ($endPageNum - $this->totalPages);

            if ($startPageNum <= 0) {
                $startPageNum = 1;
            } 
            $endPageNum = $this->totalPages;
        } 
        $nextPageNum = $this->currentPage + 1;

        if ($nextPageNum > $this->totalPages) {
            $nextPageNum = 0;
        } 
        $previousPageNum = $this->currentPage - 1;
        if ($previousPageNum < 0) {
            $previousPageNum = 0;
        } 
        /*
		*  Displaying .....
		* */

        if (($v_First_Last_Link) && ($this->currentPage > 1)) {
            echo "<a class='linksmallblue' href='$link_arr[0]?$link_arr[1]&page=1$qstr'></a>";
			//echo "<a style='background-image:url(images/pgnoenable.gif)' class='linksmallblue' href='$link_arr[0]?$link_arr[1]&page=1$qstr'></a>";
        } 
        if ($v_Next_Perivious_Link && $previousPageNum != 0) {
            echo "<a class='linksmallblue' href='$link_arr[0]?$link_arr[1]&page=$previousPageNum$qstr'></a>";
        } 
        for($i = $startPageNum; $i <= $endPageNum; $i++) {
            if ($i == $this->currentPage) {
                echo "<b>$i</b>&nbsp;<font color='blue'><b></b></font>"."|"."&nbsp&nbsp";
            } else {
                echo "<a style='height:200px;' class='linksmallblue' href='$link_arr[0]?$link_arr[1]&page=$i$qstr'>$i</a>&nbsp;<font color='blue'><b></b></font>"."|"."&nbsp&nbsp";
            } 
        } 

        if ($v_Next_Perivious_Link && $nextPageNum != 0) {
            echo "<a class='linksmallblue' href='$link_arr[0]?$link_arr[1]&page=$nextPageNum$qstr'></a>";
        } 
        if ($v_First_Last_Link && $this->totalPages != $this->currentPage) {
            echo "<a class='linksmallblue' href='$link_arr[0]?$link_arr[1]&page=$this->totalPages$qstr'></a>";
        } 
    } 
} 

?>