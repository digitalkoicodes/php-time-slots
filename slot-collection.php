<?php 
	class SlotCollection { 

		public $slots = []; 

		public function push($slot){
			$this->slots[] = $slot;
		}

		public function get(){
			return $this->slots;
		}

		public function getAsTime(){
			$time_slots = [];
			foreach($this->slots as $index => $number){
				$starttime = str_pad($number[0], 2, "0", STR_PAD_LEFT) . ':00';
				$endtime = str_pad($number[1], 2, "0", STR_PAD_LEFT) . ':00';
				$time_slots[$index] = [date("g:i a", strtotime($starttime)), date("g:i a", strtotime($endtime))];
			}
			return $time_slots;
		}

		public function removeOverlapping($start, $end){
			foreach($this->slots as $key => $slot){
				if($slot[0] <= $start && $slot[1] > $start){
					unset($this->slots[$key]);
					continue;
				}

				if($slot[0] > $start && $slot[0] <= $end){
					unset($this->slots[$key]);
					continue;
				}

				if($slot[1] > $start && $slot[1] <= $end){
					unset($this->slots[$key]);
					continue;
				}

				if($slot[0] <= $start && $slot[1] >= $end){
					unset($this->slots[$key]);
					continue;
				}
			}
		}

	}