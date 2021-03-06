This module reacts to and listens to Drupal 8 events described below. 
### Background:
	Drupal 8 fires events which modules can react to.
	See the background info on: 
	https://api.drupal.org/api/drupal/core!core.api.php/group/events/8.2.x


### About the  module:
Module name: **on_delete_event**.

 It’s suppose to listen to drupal events. It subscribes to the below event:

	*const POST_ROW_DELETE = 'migrate.post_row_delete'*
 
This module takes action when the above named drupal event happens. 

### To test it
- Enable the module
- Create and delete some node/record
- Then our event should be notified   

#### Below is what the directory structure looks like for this d8 module.
```
/on_delete_event → (module name)
 	- on_delete_event.info.yml
 	- on_delete_event.module
 	- on_delete_event.services.yml
 	- README.md
 	- src
 	  - EventSubscriber/
 	  	- OnDeleteReport   ← class that implements the interface...
```

According to Drupal 8 docs on events, we are suppose to do three(3) things:

#### Registering event subscribers

I. Define a service in the module, tagged with 'event_subscriber' (see link to drupal docs). 

II. Define a class for the subscriber service that implements \Symfony\Component\EventDispatcher\EventSubscriberInterface.

III. In the class, the getSubscribedEvents method returns a list of the events this class is subscribed to, and which methods on the class should be called for 
each one. Example: 

**So, lets do those 3 things now in our module(on_delete_event)**.


I.  services  (on_delete_event.services.yml):

       on_delete_event.subscriber:
           class:  'Drupal\on_delete_event\EventSubscriber\OnDeleteEvent'
          tags:
             - { name: 'event_subscriber' }

    ####  Important things to note: 
            next to class(above) naming convention goes like this:
            Drupal\YourModuleName\EventSubscriber\NameOfClass
            which contain your implementation of 
            \Symfony\Component\EventDispatcher\EventSubscriberInterface
            # see the docs at: https://api.drupal.org/api/examples/events_example%21src%21EventSubscriber%21EventsExampleSubscriber.php/class/EventsExampleSubscriber/8.x-1.x


II. Next, define the class that implements
	\Symfony\Component\EventDispatcher\EventSubscriberInterface.

III. Inject the service inside the Controller.
	

* Work in progress/ Still working on this*
