<?php 

	class item {
		var $name = "na";
		var $description = "na";
		var $cost = 0;
		var $qty = 0;
		var $imagename = "na";
		var $imagepath= "na";


		public function __construct () {
		}

		public function setName ($n) {
			$this->name = $n;
		}
		public function getName (){
			return $this->name;
		}

		public function setDescription ($d) {
			$this->description = $d;
		}
		public function getDescription (){
			return $this->description;
		}

		public function setCost ($c) {
			$this->cost = $c;
		}
		public function getCost (){
			return $this->cost;
		}

		public function setImageName ($in) {
			$this->imagename = $in;
		}
		public function getImageName (){
			return $this->imagename;
		}

		public function setImagePath ($ip) {
			$this->imagepath = $ip;
		}
		public function getImagePath (){
			return $this->imagepath;
		}
		
		public function setQty ($q) {
			$this->qty = $q;
		}
		public function getQty (){
			return $this->qty;
		}

	
	}
?>