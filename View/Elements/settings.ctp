<?php
	$roles = ClassRegistry::init('Role')->find('list');

	echo $this->Html->useTag('fieldsetstart', __d('sticky_admin', 'Roles'));
        echo $this->Form->input('Module.settings.roles',
            array(
                'type' => 'select',
                'multiple' => 'checkbox',
                'options' => $roles,
                'label' => __d('sticky_admin', 'Show sticky bar to selected user roles'),
                'value' => @array_merge((array)Configure::read('Modules.StickyAdmin.settings.roles'), array(1))
            )
        );

        echo $this->Form->input('Module.settings.blocks_edit',
            array(
                'type' => 'radio',
                'options' => array(0 => __d('sticky_admin', 'No'), 1 => __d('sticky_admin', 'Yes')),
                'legend' => __d('sticky_admin', 'Display edit button on block hover'),
                'separator' => '<br />'
            )
        );

	echo $this->Html->useTag('fieldsetend');
?>