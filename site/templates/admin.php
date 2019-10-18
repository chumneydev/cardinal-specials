<?php namespace ProcessWire;

/**
 * Admin template just loads the admin application controller, 
 * and admin is just an application built on top of ProcessWire. 
 *
 * This demonstrates how you can use ProcessWire as a front-end 
 * to another application. 
 *
 * Feel free to hook admin-specific functionality from this file, 
 * but remember to leave the require() statement below at the end.
 * 
 */

require($config->paths->adminTemplates . 'controller.php'); 



wire()->addHookBefore('InputfieldPageTable::render', function ($event) {
    $pp = wire('pages')->get(wire('input')->get->id);
    $ptf = $event->object;

    //remove pages from pagetable field if they were externally trashed
    foreach ($pp->{$ptf->name} as $item) {
        if ($item->is(Page::statusTrash)) $pp->{$ptf->name}->remove($item);
    }

    //add pages to pagetable field if they were created externally
    foreach ($pp->children as $child) {
        if (!$ptf->has($child->id)) {
            $pp->{$ptf->name}->add($child);
            $pp->of(false);
            $pp->save($ptf->name);
        }
    }
});