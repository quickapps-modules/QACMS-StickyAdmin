<?php
/**
 * StickyAdmin Hooks Helper
 *
 * PHP version 5
 *
 * @category Helper
 * @package  QuickApps
 * @version  1.0
 * @author   Christopher Castro <chris@quickapps.es>
 * @link     http://www.quickapps.es
 */
class StickyAdminHookHelper extends AppHelper {

    public function beforeLayout() {
        if (strpos($this->_View->Layout->themeName(), 'Admin') === false &&
            (
                $this->_View->Layout->is('user.admin') ||
                count(array_intersect((array)Configure::read('Modules.StickyAdmin.settings.roles'), $this->_View->Layout->userRoles()))
            )
        ) {
            $comments = ClassRegistry::init('Comment.Comment')->find('count',
                array(
                    'conditions' => array(
                        'Comment.status' => 0
                    )
                )
            );
            $this->_View->viewVars['Layout']['footer'][] = $this->_View->element('menu', array('comments' => $comments), array('plugin' => 'StickyAdmin'));

            $this->_View->Layout->script('/sticky_admin/js/sticky_nav.js');
            $this->_View->Layout->css('/sticky_admin/css/sticky_nav.css', 'all');

            if (Configure::read('Modules.StickyAdmin.settings.blocks_edit')) {
                $this->_View->Layout->script('
                    $(document).ready(function() {
                        QuickApps.sticky_admin_editable_blocks();
                    });
                ', 'inline');
            }
        }
    }
}