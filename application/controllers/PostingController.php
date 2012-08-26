<?php
/**
 * @Desc : Posting Controller
 * @copyright (c) 2012, Muhamad Rifki <rifki@rifkilabs.net>
 */
class PostingController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }
    
    /**
     * fetchAll data
     */
    public function indexAction()
    {
        $posting = new Application_Model_DbTable_Posting();
        $this->view->posting = $posting->fetchAll();
    }

    public function addAction()
    {
        /** menghubungkan Model dan View **/
        $form_posting = new Application_Form_Posting();
        $form_posting->submit->setLabel('Add');
        $this->view->form_posting = $form_posting;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            
            if ($form_posting->isValid($formData)) {
                $title  = $form_posting->getValue('title');
                $body   = $form_posting->getValue('body');
                
                $posting = new Application_Model_DbTable_Posting();
                $posting->addPosting($title, $body);
                $this->_helper->redirector('index');
            } else {
                $form_posting->populate($formData);
            }
        }
        
        
        $this->view->form_posting = $form_posting;
    }

    public function deleteAction()
    {
        // action body
        
    }
    
    /**
     * view posting
     */
    public function viewAction()
    {
        $posting    = new Application_Model_DbTable_Posting();
        $id         = $this->_getParam('id', 0 ); // jika parameter tdk ada kembalikan sbg NULL
        $this->view->posting = $posting->getPosting($id);
    }

    public function modifyAction()
    {
        $form_posting = new Application_Form_Posting();
        $form_posting->submit->setLabel('Update');
        $this->view->form_posting = $form_posting;
        
        if ($this->getRequest()->isPost()) {
            
            $formData = $this->getRequest()->getPost();
            
            if ($form_posting->isValid($formData)) {
                
                $id     = (int) $form_posting->getValue('id');
                $title  = $form_posting->getValue('title');
                $body   = $form_posting->getValue('body');
                
                $posting = new Application_Model_DbTable_Posting();
                $posting->modifyPosting($id, $title, $body);
                
                $this->_helper->redirector('index');
            } else {
               $form_posting->populate($formData);
            }
        } else {
            
            $id = $this->_getParam('id', 0);
            if ($id > 0) {
                $posting = new Application_Model_DbTable_Posting();
                $form_posting->populate($posting->getPosting($id));
            }
            
        }
    }


}









