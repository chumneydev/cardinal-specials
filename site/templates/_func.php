<?php namespace ProcessWire;

/**
 * /site/templates/_func.php
 *
 * Example of shared functions used by template files
 *
 * This file is currently included by _init.php
 *
 * For more information see README.txt
 *
 */


/**
 * Given a group of pages, render a simple <ul> navigation
 *
 * This is here to demonstrate an example of a simple shared function.
 * Usage is completely optional.
 *
 * @param PageArray $items
 * @return string
 *
 */
function renderNav(PageArray $items) {

	// $out is where we store the markup we are creating in this function
	$out = '';

	// cycle through all the items
	foreach($items as $item) {

		// render markup for each navigation item as an <li>
		if($item->id == wire('page')->id) {
			// if current item is the same as the page being viewed, add a "current" class to it
			$out .= "<li class='current'>";
		} else {
			// otherwise just a regular list item
			$out .= "<li>";
		}

		// markup for the link
		$out .= "<a href='$item->url'>$item->title</a> ";

		// if the item has summary text, include that too
		if($item->summary) $out .= "<div class='summary'>$item->summary</div>";

		// close the list item
		$out .= "</li>";
	}

	// if output was generated above, wrap it in a <ul>
	if($out) $out = "<ul class='nav'>$out</ul>\n";

	// return the markup we generated above
	return $out;
}



/**
 * Given a group of pages, render a <ul> navigation tree
 *
 * This is here to demonstrate an example of a more intermediate level
 * shared function and usage is completely optional. This is very similar to
 * the renderNav() function above except that it can output more than one
 * level of navigation (recursively) and can include other fields in the output.
 *
 * @param array|PageArray $items
 * @param int $maxDepth How many levels of navigation below current should it go?
 * @param string $fieldNames Any extra field names to display (separate multiple fields with a space)
 * @param string $class CSS class name for containing <ul>
 * @return string
 *
 */
function renderNavTree($items, $maxDepth = 0, $fieldNames = '', $class = 'nav') {

	// if we were given a single Page rather than a group of them, we'll pretend they
	// gave us a group of them (a group/array of 1)
	if($items instanceof Page) $items = array($items);

	// $out is where we store the markup we are creating in this function
	$out = '';

	// cycle through all the items
	foreach($items as $item) {

		// markup for the list item...
		// if current item is the same as the page being viewed, add a "current" class to it
		$out .= $item->id == wire('page')->id ? "<li class='current'>" : "<li>";

		// markup for the link
		$out .= "<a href='$item->url'>$item->title</a>";

		// if there are extra field names specified, render markup for each one in a <div>
		// having a class name the same as the field name
		if($fieldNames) foreach(explode(' ', $fieldNames) as $fieldName) {
			$value = $item->get($fieldName);
			if($value) $out .= " <div class='$fieldName'>$value</div>";
		}

		// if the item has children and we're allowed to output tree navigation (maxDepth)
		// then call this same function again for the item's children
		if($item->hasChildren() && $maxDepth) {
			if($class == 'nav') $class = 'nav nav-tree';
			$out .= renderNavTree($item->children, $maxDepth-1, $fieldNames, $class);
		}

		// close the list item
		$out .= "</li>";
	}

	// if output was generated above, wrap it in a <ul>
	if($out) $out = "<ul class='$class'>$out</ul>\n";

	// return the markup we generated above
	return $out;
}



//specials count

function countSpecials() {
    $demo = wire("pages")->find("template=management");
    $count = count($demo);
    echo $count;
    $encode = json_encode($count);

}

// create notifications
function getNotifications() {
	$specials = wire('pages')->find("template=specials");

	foreach ($specials as $special) {

		foreach ($special->specials as $individualSpecial) {
			//echo $individualSpecial->title;

			$todaysDate = date("F j, Y H:i");
			$todaysDateMinusTime = date("F j, Y");
			$convertTodaysDate = strtotime($todaysDate);

			$startDate = $individualSpecial->special_start_date;
			$convertStartDate = strtotime($startDate);

			$endDate = $individualSpecial->special_end_date;
			$convertEndDate = strtotime($endDate);

			$fiveAway = $convertEndDate - 432000;

			$output = "";
			if ($convertEndDate > $convertTodaysDate && $convertEndDate > $fiveAway) {
				echo "<p>" . $individualSpecial->parent->parent->parent->title . " " . $individualSpecial->title . "</p>";

				$output .= "
					<div class=\"notification\">
			          <a href=\"#\"><span class=\"fa-stack\">
			              <i class=\"fas fa-circle fa-stack-2x\" data-fa-transform=\"shrink-4\"></i>
			              <i class=\"far fa-minus fa-stack-1x\"></i>
			          </span></a>

			          <h4><i class=\"fas fa-paper-plane\"></i> $todaysDateMinusTime</h4>
			          <p>{$individualSpecial->parent->parent->parent->title}:  {$individualSpecial->title}.</p>
			      </div>";

				  echo $output;

				echo "<p>" . $convertEndDate . "</p>";
				echo "<p>" . $fiveAway . "</p>";
			}
		}

	}







}


function getLabelForValue ($fieldName, $columnName, $searchedValue){
	$field = wire('fields')->get($fieldName);
	if(!$field instanceof Field) return $searchedValue;

	$options = wire('modules')->get('FieldtypeTable')->getColumn($field, $columnName)['options'];
	if(!count($options)) return $searchedValue;

	$label = collect($options)->map(function($option){
		$label = $value = $option;
		if(strpos($option, '=') !== false) list($value, $label) = explode('=', $option, 2);
		$value = ltrim($value, '+');
		return [$value, $label];
	})->filter(function($tupel) use ($searchedValue){
		return $tupel[0] === $searchedValue;
	})->transform(function($tupel){ // basically the same as map
		return $tupel[1];
	})->first();

	return $label ?: $searchedValue; // Not part of options ?!
}



/**
* Generates a list of specials based on the user
* WIP: 11/13/18
*/

/**
 * @param string $specialTemplate
 * @param string $currentUser
 */


function generateClientList() {

    $children = wire('pages')->get("/clients/")->children();
    $children->sort("title"); // Important for grouping to work
    $grouped = $children->groupBy(function($pg) {
		// first argument ($pg) is always the page object we are examining
		$letter = substr($pg->title, 0, 1);
		return array($letter);
	});

	foreach($grouped as $letter => $letterPages) {
		echo "<p class=\"sorting\">$letter</p>";



		foreach($letterPages as $lpg) {
			echo "<div class=\"client\">";
			echo "<p class=\"client-code\">{$lpg->title}</p>";
			echo "<p>{$lpg->client_name}</p>";
			echo "</div>";
	    }

	}
}






function generateSpecialsList($specialTemplate) {
	$specials = wire('pages')->find("template=$specialTemplate");
	$out = '';
	foreach ($specials as $special) {
		$parentTitle = $special->parent->parent->title;
		$specialTitle = $special->title;

	$out =	"<div class=\"item\">
			<h3>{$parentTitle}</h3>
			<a href=\"#\"><span class=\"fa-stack fa-1x\">
			  <i class=\"fas fa-circle fa-stack-2x\"></i>
			  <i class=\"far fa-plus fa-stack-1x\"></i>
		  </span></a>
			<div class=\"item-item\">
			  <h4 >{$specialTitle}</h4>
			  <ul class=\"item-actions\">
				  <li><a href=\"#\"><i class=\"far fa-pause\"></i></a></li>
				  <li><a href=\"#\"><i class=\"far fa-minus-circle\"></i></a></li>
				  <li><a href=\"#\"><i class=\"far fa-edit\"></i></a></li>
				  <li><a href=\"#\"><i class=\"far fa-external-link-square-alt\"></i></a></li>
			  </ul>
			</div>
		</div>";


		echo $out;
	}
}



/**
 * Creates an email alert when specials are about to expire
 * WIP: 11/13/18
 */


function specialsAlert() {
	$specials = wire('pages')->find("template=specials,assigned_to=$user");

	foreach ($specials as $special) {
		$todaysDate = date("F j, Y H:i");
		$convertTodaysDate = strtotime($todaysDate);

		$special->setOutputFormatting(false);
		$special->special_expired_alert = true;
		$special->save();

		$toEmail = $assigned_to[0];

		$options =  array(
			'sendSingle' => true,
			'cc' => $assigned_to[1]
		);

		$numSent = wireMail($toEmail, '', $subject, $textBody, $options);






	}
}



/**
 * Creates New Clients by passing a variable into it.
 * This function can be placed in an ajax request to create the desired client automatically.
 */

/**
 * @param string $parentCode
 * @param string $currentUser
 */

/*function generateClients($parentCode) {
    $p = new Page();
    $p->template = "clients";
    $p->parent = wire('pages')->get('/clients/');
    $p->name = $parentCode;
    $p->title = $parentCode;
    $p->of(false);
    $p->save();

    $p2 = new Page();
    $p2->template = "specials";
    $p2->parent = $p;
    $p2->name = "specials";
    $p2->title = "Specials";
    $p2->of(false);
    $p2->save();

    $p3 = new Page();
    $p3->template = "modals";
    $p3->parent = $p;
    $p3->name = "modals";
    $p3->title = "Modals";
    $p3->of(false);
    $p3->save();

    $p4 = new Page();
    $p4->template = "staff";
    $p4->parent = $p;
    $p4->name = "staff";
    $p4->title = "Staff";
    $p4->of(false);
    $p4->save();

}*/

function generateClients($parentCode) {
  foreach($parentCode as $code => $value) {
    $p = new Page();
    $p->template = "clients";
    $p->parent = wire('pages')->get('/clients/');
    $p->name = $code;
    $p->title = $code;
    $p->client_color = $value;
    $p->of(false);
    $p->save();

    $p2 = new Page();
    $p2->template = "specials";
    $p2->parent = $p;
    $p2->name = "specials";
    $p2->title = "Specials";
    $p2->of(false);
    $p2->save();

    $p3 = new Page();
    $p3->template = "specials";
    $p3->parent = $p2;
    $p3->name = "new-vehicle-specials";
    $p3->title = "New Vehicle Specials";

    $p4 = new Page();
    $p4->template = "modals";
    $p4->parent = $p;
    $p4->name = "modals";
    $p4->title = "Modals";
    $p4->of(false);
    $p4->save();

    /*$p5 = new Page();
    $p5->template = "staff";
    $p5->parent = $p;
    $p5->name = "staff";
    $p5->title = "Staff";
    $p5->of(false);
    $p5->save();*/
  }
}




/**
 * Author: Louis Stephens
 * Description: Creates custom javascript for modals
 * Date Added: 02/18/19
 */

class Faucet {
	



}






/**
 * Author: Louis Stephens
 * Description: Creates custom javascript for modals
 * Date Added: 01/31/19
 */

class person {
	var $name;
	function __construct($persons_name) {
		$this->name = $persons_name;
	}

	function set_name($new_name) {
		$this->name = $new_name;
	}

	function get_name() {
		return $this->name;
	}
}







// August 14th, 2019: Check for Grid Count
function checkGrid($gridCount = '') {
    $out = '';
    if($gridCount < 12) {
        $out .= "<div class='column'></div>";

    }

    elseif($gridCount >= 12) {
        $out .= "<section></section>";

    }
    return $out;
}

