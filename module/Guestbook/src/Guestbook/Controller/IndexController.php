<?php
namespace Guestbook\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {

        $entryForm    = $this->getServiceLocator()->get('guestbook_entry_form');
        $entryService = $this->getServiceLocator()->get('guestbook_entry_service');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $data = $request->getPost()->toArray();
            $entry = $entryService->add($data);

            if ($entry) {
                return $this->redirect()->toRoute('guestbook');
            }
          }

        return new ViewModel(array(
            'entryForm' => $entryForm,
            'entries'   => $entryService->findAll()
        ));
    }
}
