<?php 
/**
 * Behavior MultipleRecords
 * 
 * Normal $Model->find('all') return an array on the form {n}.$Model.fieldName
 * while we now wants $this->Model->findMulti($ids) to return an array on
 * the form Model.{n}.fieldName
 * 
 * For the findMulti and deleteMulti, it takes inn a list (or an array) on the 
 * form sent from the url http://host/app/controller/edit/3+5+7 and find or 
 * delete the data sets
 * 
 * @name MultipleRecords
 * @license MIT
 * @version 1.1
 * @modified 19. oct. 2008
 * @author Eskil Mjelva Saatvedt
 * @author Ronny V Vindenes
 * @author Alexander Morland
 * @author Carl Erik Fyllingen
 * @abstract  This behaviour let you save, find and delete multiple data sets on 
 * the same form $Model->saveAll($data) expect it to be. And on an url friendly
 * form: http://host/app/controller/edit/3+5+7
 * 
 */
class MultipleRecordsBehavior extends ModelBehavior {
    /**
     * Default options. 
     *
     * @var array
     */
    var $defaultOptions = array('validate' => 'first');
    
    /**
     * Saves all with validation set to validate all before save is done
     *
     * @param Model $Model
     * @param Array $data
     * @param Array $options
     * @return Boolean TRUE if all is saved else FALSE
     */
    function saveMulti(&$Model, $data, $options = array()) {
        if (!isset($options['validate'])) {
            // Set to validate all before save
            $options = am($this->defaultOptions, $options);
        }
        return $Model->saveAll($data[$Model->alias], $options);
    }
    
    /**
     * Find multiple records by taking in an array list of ids. Returning the data
     * on the format of Model.{n}.field, instead of on the form {n}.Model.field 
     *
     * @param mixed $ids An array of ids to get, or a string on the form 
     * $ids = "3 5 22" or a single id the string form is sent in the url as 3+5+22
     * @param array $options
     * @return Array of multiple datasets on the form Model.{n}.field
     */
    function findMulti(&$Model, $ids = null, $options = array()) {
        
        if (is_array($ids) || is_numeric($ids)) {
            // Do nothing, it is already an array or a single id
        } else if (is_string($ids)) {
            $ids = explode(' ', $ids);
        }
        
        $conditions = array($Model->alias . '.id' => $ids);
        if (isset($options['conditions'])) {
            $options['conditions'] = am($options['conditions'], $conditions);
        } else {
            $options['conditions'] = $conditions;
        }
        $data = $Model->find('all', $options);
        $ret[$Model->alias] = Set::extract($data, '{n}.' . $Model->alias);
        return $ret;
    }
    
    /**
     * Takes in a list of arrays and delete all
     *
     * @param Model $Model
     * @param Mixed $ids a list of ids to delete on the form $ids='3 5 7', in the 
     * URL it looks like http://host/app/controller/delete/3+5+7
     * also takes in an array (3,5,7). Can also take in an array of ids
     * @return boolean TRUE if the delete worked, else FALSE
     */
    function deleteMulti(&$Model, $ids) {
        if (is_array($ids) || is_numeric($ids)) {
            // Do nothing, it is already an array or a single id
        } else if (is_string($ids)) {
            $ids = explode(' ', $ids);
        }
        return $Model->deleteAll(array(
                $Model->alias . '.' . $Model->primaryKey => $ids));
    }
}
?> 
