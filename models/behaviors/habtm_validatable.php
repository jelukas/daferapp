<?php
class HabtmValidatableBehavior extends ModelBehavior {
    
    function setup(&$Model, $settings) {
        if(empty($settings)) {
            $settings = $Model->getAssociated('hasAndBelongsToMany');
        }
        foreach((array)$settings as $key) {
            $fieldName = $key;
            $this->settings[$Model->alias][] = $fieldName;
        }
    }
    
    function beforeSave(&$Model, $options = array()) {
        foreach($this->settings[$Model->alias] as $fieldName) {
            if(isset($Model->data[$Model->alias][$fieldName]) && 
                !isset($Model->data[$fieldName][$fieldName])) {
                $Model->data[$fieldName][$fieldName] = $Model->data[$Model->alias][$fieldName];
                unset($Model->data[$Model->alias][$fieldName]);
            }
        }
        return true;
    }
}
?> 
