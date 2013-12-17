<?php

/**
 * Elements
 *
 * Helps to build UI elements for the application
 */
use \Users;

class Elements extends Phalcon\Mvc\User\Component
{

    private $_headerMenu = array(
        'pull-left' => array(
            'index' => array(
                'caption' => 'Naslovna',
                'action' => 'index'
            ),
            'products' => array(
                'caption' => 'Products',
                'action' => 'index'
            ),
            'about' => array(
                'caption' => 'O nama',
                'action' => 'index'
            ),
            'kontakt' => array(
                'caption' => 'Kontakt',
                'action' => 'index'
            ),
        ),
        'pull-right' => array(
            'users' => array(
                'caption' => 'Log In',
                'action' => 'login'
            ),
        )
    );

    private $_tabs = array(
        'Products' => array(
            'controller' => 'products',
            'action' => 'index',
            'any' => false
        ),
        'Companies' => array(
            'controller' => 'companies',
            'action' => 'index',
            'any' => true
        ),
        'Product Types' => array(
            'controller' => 'producttypes',
            'action' => 'index',
            'any' => true
        ),
        'Your Profile' => array(
            'controller' => 'invoices',
            'action' => 'profile',
            'any' => false
        )
    );

    /**
     * Builds header menu with left and right items
     *
     * @return string
     */
    public function getMenu()
    {
        $auth = $this->session->get('auth');
        
        
        /*<?php if (Users::getCurrent() && Users::getCurrent()->hasSelfRole('admin')) : ?>
                <p class="navbar-text pull-right">
                    <a href="/admin" title="Administration">Administration</a>
                </p>
            <?php endif; ?>*/
        if ($auth) {
            $this->_headerMenu['pull-right']['users'] = array(
                'caption' => 'Log Out',
                'action' => 'logout'
            );
            /**
             * Dodano za provjeru korisnika... treba realizirati menije prema user roles
             */
            
           if (Users::getCurrent())
            {
               if(Users::getCurrent()->getRole() != 1){
                     unset($this->_headerMenu['pull-left']['kontakt']);
                }
                else {
                    unset($this->_headerMenu['pull-left']['about'], $this->_headerMenu['pull-left']['products']);
                    $this->getTabs();
                }
            }
        } else {
            unset($this->_headerMenu['pull-left']['products']);
        }

        echo '<div class="nav-collapse">';
        $controllerName = $this->view->getControllerName();
        foreach ($this->_headerMenu as $position => $menu) {
            echo '<ul class="nav ', $position, '">';
            foreach ($menu as $controller => $option) {
                if ($controllerName == $controller) {
                    echo '<li class="active">';
                } else {
                    echo '<li>';
                }
                if (Users::getCurrent())
                {
                if(Users::getCurrent()->getRole() != 1){
                     echo Phalcon\Tag::linkTo($controller.'/'.$option['action'], $option['caption']);
                }
                else{
                    echo Phalcon\Tag::linkTo('admin/'.$controller.'/'.$option['action'], $option['caption']);
                }
            }
            else{
                    echo Phalcon\Tag::linkTo($controller.'/'.$option['action'], $option['caption']);
                }
                echo '</li>';
            }
            echo '</ul>';
        }
        echo '</div>';
    }

    public function getTabs()
    {
        $controllerName = $this->view->getControllerName();
        $actionName = $this->view->getActionName();
        echo '<ul class="nav nav-tabs">';
        foreach ($this->_tabs as $caption => $option) {
            if ($option['controller'] == $controllerName && ($option['action'] == $actionName || $option['any'])) {
                echo '<li class="active">';
            } else {
                echo '<li>';
            }
            /**
             * Prilagođeno za admin.... samo testiranje
             */
            echo Phalcon\Tag::linkTo('admin/'.$option['controller'].'/'.$option['action'], $caption), '<li>';
        }
        echo '</ul>';
    }
}
