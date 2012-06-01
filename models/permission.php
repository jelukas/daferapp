<?php
class Permission extends AppModel {
	var $name = 'Permission';
 
var $hasMany = array('User');
 
//Le decimos que se comporte como ACL.
var $actsAs = array('Acl' => array('requester'));
 
/*Creada para su uso con el AclBehavior*/
function parentNode() {
	return null;
}

}
?>
