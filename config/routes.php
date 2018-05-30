<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {

  $routes->connect('/', ['controller' => 'Pages', 'action' => 'home']);

  $routes->connect('/estagiarios/home', ['controller' => 'Pages', 'action' => 'estagiariosHome']);

  $routes->connect('/design/home', ['controller' => 'Pages', 'action' => 'designHome']);

  $routes->connect('/web/home', ['controller' => 'Pages', 'action' => 'webHome']);

  $routes->connect('/marketingdigital/home', ['controller' => 'Pages', 'action' => 'marketingdigitalHome']);

  $routes->connect('/estagiarios/design', ['controller' => 'Pages', 'action' => 'estagiariosDesign']);

  $routes->connect('/estagiarios/web', ['controller' => 'Pages', 'action' => 'estagiariosWeb']);

  $routes->connect('/estagiarios/marketingdigital', ['controller' => 'Pages', 'action' => 'estagiariosMarketingdigital']);

  $routes->connect('/estagiarios/lastday', ['controller' => 'Pages', 'action' => 'estagiariosLastday']);

  $routes->connect('estagiarios/web/hellodrible', ['controller' => 'Pages', 'action' => 'estagiarioswebHelloDrible']);

  $routes->connect('web/cake-php', ['controller' => 'Pages', 'action' => 'webCakePhp']);

  $routes->connect('web/doc-markdown', ['controller' => 'Pages', 'action' => 'webDocMarkdown']);

  $routes->connect('web/lamp-config', ['controller' => 'Pages', 'action' => 'webLampConfig']);

  $routes->connect('web/encrypt-apache', ['controller' => 'Pages', 'action' => 'webEncryptApache']);

  $routes->connect('web/vhosts-macos', ['controller' => 'Pages', 'action' => 'webVhostsMacos']);

  $routes->connect('web/linux-server-ssh-key', ['controller' => 'Pages', 'action' => 'webLinuxServerSshKey']);

  $routes->connect('web/ubuntu-firewall', ['controller' => 'Pages', 'action' => 'webUbuntuFirewall']);

  $routes->connect('web/vhosts', ['controller' => 'Pages', 'action' => 'webVhosts']);
    /**

     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $routes->connect('/:controller/:action', []);

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks(DashedRoute::class);
});

/**
 * Load all plugin routes. See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
