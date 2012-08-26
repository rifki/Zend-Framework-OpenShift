<?php
/**
 * @Desc : posting Model, Using DbTable
 * @copyright (c) 2012, Muhamad Rifki <rifki@rifkilabs.net>
 */
class Application_Model_DbTable_Posting extends Zend_Db_Table_Abstract
{

    protected $_name = 'posting';
    
    /**
     * getPosting by id
     * @param type $id
     * @return type
     * @throws Exception
     */
    public function getPosting($id)
    {
        $id     = (int) $id;
        $row    = $this->fetchRow('id = '.$id);
        
        if (! $row) {
            throw new Exception ('tidak ditemukan $id');
        } 
        return $row->toArray();
    }
    /**
     * insert data posting
     * @param type $title
     * @param type $body
     */
    public function addPosting($title, $body)
    {
        $data = array(
            'title'     => $title,
            'body'      => $body,
            'modified'  => date('Y-m-d')
        );
        $this->insert($data);
    }
    /**
     * update posting
     * @param type $id
     * @param type $title
     * @param type $body
     */
    public function modifyPosting($id, $title, $body)
    {
        $data = array(
            'title'     => $title,
            'body'      => $body,
            'modified'  => date('Y-m-d')
        );
        $this->update($data, 'id = '. (int) $id);
    }
    
    public function deletePosting($id)
    {
        $this->delete('id = '. (int) $id);
    }
}

