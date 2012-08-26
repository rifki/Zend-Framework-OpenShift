<?php
/**
 * @Desc : Form Posting
 * @copyright (c) 2012, Muhamad Rifki <rifki@rifkilabs.net>
 */
class Application_Form_Posting extends Zend_Form
{

    public function init()
    {
        // form name
        $this->setName('posting');
        // filter hanya Integer
        $id = new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int');
        
        // text title
        $title = new Zend_Form_Element_Text('title');
        $title->setLabel('Title')
              ->setRequired(true)
              ->addFilter('StripTags')
              ->addFilter('StringTrim');
        
        // textarea body posting
        $body = new Zend_Form_Element_Textarea('body');
        $body->setLabel('Body Text')
             ->setRequired(true)
             ->addFilter('StripTags')
             ->addFilter('StringTrim');
       
       // button submit posting 
       $submit = new Zend_Form_Element_Submit('submit');
       $submit->setLabel('Submit')
              ->setIgnore(true)
              ->setAttrib('id', 'submit');
       
       // add element $id, $title, $body and $submit into form
       $this->addElements(array ($id, $title, $body, $submit));
    }
}
