<?php 
include('slot-generator.php');

$generator = new SlotGenerator();
$slots = $generator->Slots();
print_r($slots);

$generator->startTime = 6;
$generator->slotLength = 4;
$slots = $generator->Slots();
print_r($slots);

$slots->removeOverlapping(6,7);
print_r($slots);

print_r($slots->getAsTime());