<?php

namespace Skeleton;

class SkeletonClass {
    public function onEnter($context, &$storage) {
        // called when we enter the traced_method
    }
    
    public function onLeave($context, &$storage) {
        // store data to storage that later on will be displayed in panels
        $storage['panelName'][] = array('value1' => '1', 'value2' => '2');
        $storage['context'][] = $context; // will display the entire context in a new panel 
    }
}

// Create new extension - disabled
$zre = new \ZRayExtension('Skeleton');

$skeletonClass = new SkeletonClass();

// set additional data such as logo
$zre->setMetadata(array(
	'logo' => __DIR__ . DIRECTORY_SEPARATOR . 'logo.png',
));

// start tracing only when 'your_application_initial_method' is called, e.g. 'Mage::run()'
$zre->setEnabledAfter('your_application_initial_method');

// Trace the 'traced_method' function
// zrayExtension::traceFunction($pattern, $onenter, $onleave);
$zre->traceFunction('traced_method', array($skeletonClass, 'onEnter'), array($skeletonClass, 'onLeave'));