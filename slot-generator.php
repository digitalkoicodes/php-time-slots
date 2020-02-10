<?php 
	include('slot-collection.php');

	class SlotGenerator {

		public $slotLength = 2; 

		public $startTime = 8;

		public $endTime = 17;

		public $slots;

		public function Slots(){
			$this->slots = new SlotCollection();
			for ($i=$this->startTime; $i < ($this->endTime - $this->slotLength); $i+= $this->slotLength) { 
				$slot = [$i, $i + $this->slotLength];
				$this->slots->push($slot);
			}
			return $this->slots;
		}

	}