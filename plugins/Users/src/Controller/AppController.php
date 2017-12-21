<?php

namespace Users\Controller;

use App\Controller\AppController as BaseController;

class AppController extends BaseController
{

	public $helpers = [
	    'Form' => [
	        'className' => 'Bootstrap.Form'
	    ],
	    'Html' => [
	        'className' => 'Bootstrap.Html'
	    ],
	    'Modal' => [
	        'className' => 'Bootstrap.Modal'
	    ],
	    'Navbar' => [
	        'className' => 'Bootstrap.Navbar'
	    ],
	    'Paginator' => [
	        'className' => 'Bootstrap.Paginator'
	    ],
	    'Panel' => [
	        'className' => 'Bootstrap.Panel'
	    ]
	];

	public function initialize()
    {
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
            	'plugin' => 'Users',
                'controller' => 'Users',
                'action' => 'login',

            ],
			'loginRedirect' => [
				'plugin' => 'Users',
				'controller' => 'Users',
				'action' => 'index'
			],
			'logoutRedirect' => [
				'plugin' => 'Users',
				'controller' => 'Users',
				'action' => 'login'
			],
             // If unauthorized, return them to page they were just on
            'unauthorizedRedirect' => $this->referer(),
			'authError' => 'You are not authorized to access that location.',
			'flash' => [
				'element' => 'error'
			]
        ]);

        // Allow the display action so our PagesController
        // continues to work. Also enable the read only actions.
        $this->Auth->allow(['display']);
    }
}
