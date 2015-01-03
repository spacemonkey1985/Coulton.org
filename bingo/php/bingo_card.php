<?php
	if (!isset($_SESSION)) {
    	session_start();
	}
	
	function GetItems() {
		// icons from http://www.flaticon.com/
		$items = array(
			array("Broken Collar Bone", "bone.png", 0),
			array("Cath going to Toyota by mistake", "car.png", 0),
			array("Chris Getting Lost in France", "signs.png", 0),
			array("Collecting the Bikes at Christmas", "bike.png", 0),
			array("Cycle Race", "finish.png", 0),
			array("Dad's Spiked Drink", "pint.png", 0),
			array("Eating Large Dairy Milk Bar at Grans", "chocolate.png", 0),
			array("Epic Trip to France", "france.png", 0),
			array("Forgot to Pack Pants", "pants.png", 0),
			array("Funny Smell", "poop.png", 0),
			array("Grandma's Missing Sausages", "sausage.png", 0),
			array("Ivy Saved Simon's Life", "falling.png", 0),
			array("Playing Tricks on Grandma", "grandma.png", 0),
			array("Rhiannon Wanting to Marry Chris", "wedding.png", 0),
			array("Rhiannon's Vest", "vest.png", 0),
			array("Simon Choking on Sweet", "sweet.png", 0),
			array("Smelling Gas at Grandma's", "gasmask.png", 0),
			array("Snoopy's Accident", "dog.png", 0),
			array("Teeth Falling Out", "teeth.png", 0),
			array("Tessa Eating Rhiannon's Chocolate Eggs", "egg.png", 0),
			array("The Mice and Mars Bars", "mouse.png", 0),
			array("The Pencil Story", "pencil.png", 0),
			array("The Wind and the Fences", "fence.png", 0),
			array("Three Legged Cat", "cat.png", 0),
			array("Took the Whole Weekend to Mow", "mower.png", 0)
			);
		
		return $items;
	}
	
	function Bingo($items, $new) {
		
		if($new) {
			shuffle($items);
			$_SESSION['bingoItems'] = $items;
		} else {
			if(isset($_SESSION['bingoItems'])) {
				$items = $_SESSION['bingoItems'];
			} else {
				shuffle($items);
				$_SESSION['bingoItems'] = $items;
			}
		}
		
		$bingo_card = "<table id='bingo_card' class='table'>";
		
		//$bingo_card .= "<thead><tr>";
		//$bingo_card .= "<th colspan='4'></th>";
		//$bingo_card .= "</tr></thead>";
		
		$bingo_card .= "<tbody>";
		$bingo_card .= "<tr>";
		
		// loop through 9 random stories and write out as table cells
		// http://stackoverflow.com/questions/23466625/bootstrap-grid-with-something-like-colspan
		
		for($cell = 0; $cell < 16; $cell++) {
			$rowend = ($cell + 1) % 4;
			$bingo_card .= "<td class='col-md-3'>";
			$bingo_card .= "<div class='bingo-icon' style='background-image: url(\"images/icons/" . $items[$cell][1] . "\");'>";
			if($items[$cell][2] == 0) {
				$bingo_card .= "<div id='cell" . $cell . "' class='bingo-dot'>&nbsp;</div>";
			} else {
				$bingo_card .= "<div id='cell" . $cell . "' class='bingo-dot' style='background-image: url(images/daub.png); background-size: contain; background-repeat: no-repeat;'>&nbsp;</div>";
			}
			$bingo_card .= "</div>";
			$bingo_card .= "</td>";
			if($rowend == 0 && $cell < 15) {
				$bingo_card .= "</tr><tr>";
			}
		}
		
		$bingo_card .= "</tr>";
		$bingo_card .= "</tbody>";
		$bingo_card .= "</table>";
	
		echo $bingo_card;
				
	}
	
	function UpdateItems($id, $checked) {
		
	}
?>