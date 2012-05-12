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
        if (!QuickApps::is('theme.admin') &&
            (   $this->_View->Layout->is('user.admin') ||
                count(array_intersect((array)Configure::read('Modules.StickyAdmin.settings.roles'), QuickApps::userRoles()))
            )
        ) {
            $comments = ClassRegistry::init('Comment.Comment')->find('count',
                array(
                    'conditions' => array(
                        'Comment.status' => 0
                    )
                )
            );
            $this->_View->viewVars['Layout']['javascripts']['file'][] = '/sticky_admin/js/sticky_nav.js';
            $this->_View->viewVars['Layout']['stylesheets']['all'][] = '/sticky_admin/css/sticky_nav.css';
            $this->_View->viewVars['Layout']['footer'][] = $this->_View->element('menu', array('comments' => $comments), array('plugin' => 'StickyAdmin'));
        }
    }
}