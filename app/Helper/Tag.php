<?php
namespace App\Helper;

/**
 * summary
 */
class Tag 
{
    /**
     * summary
     */
    public $items = [];
    public function __construct()
    {
        $this->items = session('theloai');
    }

    public function add($theloai){
    	$this->items[$theloai->id] = [
    		'id' => $theloai->id,
    		'Name' => $theloai->Name
    	];
    	session(['theloai' => $this->items]);
    }

    public function delete($id){
    	if(isset($this->items[$id])){
    		unset($this->items[$id]);
    	}
    	session(['theloai' => $this->items]);
    }
}

?>