<?php

class EventsController extends AppController {

    var $name = 'Events';

    function index() {
        $this->Event->recursive = 0;
        $this->set('events', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid event', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('event', $this->Event->read(null, $id));
    }

    function add($tarea_id = null) {
        if (!empty($this->data)) {
            $this->Event->create();
            if ($this->Event->save($this->data)) {
                $this->Session->setFlash(__('The event has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The event could not be saved. Please, try again.', true));
            }
        }
        $eventTypes = $this->Event->EventType->find('list');
        $conditions = array('conditions' => array('Tarea.id' => $tarea_id));
        $tareas = $this->Event->Tarea->find('list', $conditions);
        $this->set(compact('eventTypes', 'tareas'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid event', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Event->save($this->data)) {
                $this->Session->setFlash(__('The event has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The event could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Event->read(null, $id);
        }
        $eventTypes = $this->Event->EventType->find('list');
        $tareas = $this->Event->Tarea->find('list');
        $this->set(compact('eventTypes', 'tareas'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for event', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Event->delete($id)) {
            $this->Session->setFlash(__('Event deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Event was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

    function feed($id=null) {
        $this->layout = "ajax";
        $vars = $this->params['url'];
        $conditions = array('conditions' => array('UNIX_TIMESTAMP(start) >=' => $vars['start'], 'UNIX_TIMESTAMP(start) <=' => $vars['end']));
        $events = $this->Event->find('all', $conditions);
        //$events = $this->Event->find('all');
        foreach ($events as $event) {
            if ($event['Event']['all_day'] == 1) {
                $allday = true;
                $end = $event['Event']['start'];
            } else {
                $allday = false;
                $end = $event['Event']['end'];
            }
            $data[] = array(
                'id' => $event['Event']['id'],
                'title' => $event['Event']['title'],
                'start' => $event['Event']['start'],
                'end' => $end,
                'allDay' => $allday,
                'url' => '/daferapp/events/view/' . $event['Event']['id'],
                'details' => $event['Event']['details'],
                'className' => $event['EventType']['color']
            );
        }
        $this->set("json", json_encode($data));
    }

    function update() {
        $vars = $this->params['url'];
        $this->Event->id = $vars['id'];
        $this->Event->saveField('start', $vars['start']);
        $this->Event->saveField('end', $vars['end']);
        $this->Event->saveField('all_day', $vars['allday']);
    }

    function calendario() {
        /* if (!$id) {
          $this->Session->setFlash(__('Id invalida para la orden', true));
          $this->redirect(array('action' => 'index'));
          } */
        //die(pr($tareas));
    }

}

?>