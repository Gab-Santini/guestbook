<?php
namespace Guestbook\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $entryForm    = $this->getServiceLocator()->get('guestbook_entry_form');
        return new ViewModel(array(
                'entryForm' => $entryForm
                )
            );
    }
}
