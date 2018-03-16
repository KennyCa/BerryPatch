<?php
	class cart {
		var $item = "";
		var $description = "na";
		var $price = 0;
		var $qty = 0;
	
	
		public function __construct () {
		}
		
		public function setItem ($i) {
			$this->item = $i;
		}
		public function getItem () {
			return $this->item;
		}
		
		public function setDescription ($d) {
			$this->description = $d;
		}
		public function getDescription (){
			return $this->description;
		}
		
		public function setPrice ($p) {
			$this->price = $p;
		}
		public function getPrice () {
			return $this->item;
		}
		
		public function setQty ($q) {
			$this->qty = $q;
		}
		public function getQty (){
			return $this->qty;
		}
	}
?>