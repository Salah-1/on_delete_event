Readme file (work in progress/ still working on thiss)
## Background:
	Drupal 8 fires events which modules can react to.
	See the background info on: 
	https://api.drupal.org/api/drupal/core!core.api.php/group/events/8.2.x
About our module:
Our module name: on_delete_event
 It’s suppose to listen to drupal events and subscribes to the below event:
	const POST_ROW_DELETE = 'migrate.post_row_delete'
 
Our module takes action when the above named drupal event happens 
Name of the module:  on_delete_event

## This is our file hierarchy
x
y
x

According to Drupal 8 docs on events, we are suppose to do three(3) things:

## Registering event subscribers

I. Define a service in your module, tagged with 'event_subscriber' (see the Services topic for instructions). 

II. Define a class for your subscriber service that implements \Symfony\Component\EventDispatcher\EventSubscriberInterface.

III. In your class, the getSubscribedEvents method returns a list of the events this class is subscribed to, and which methods on the class should be called for 
each one. Example: 

So, lets do those 3 things now in our module(on_delete_event).
Indentation is two spaces (you may get drupal white screen error if not indented properly)
I.  services:
       on_delete_event.subscriber:
           class:  'Drupal\on_delete_event\EventSubscriber\OnDeleteEvent'
          tags:
             - { name: 'event_subscriber' }