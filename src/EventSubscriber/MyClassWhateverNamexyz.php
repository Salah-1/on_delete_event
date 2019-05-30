<?php

/**
 * @file
 * Contains \Drupal\on_delete_event\EventSubscriber\MyClassWhateverNamexyz.
 * I named the file as 'MyClassWhateverNamexyz' to show that this part of the name
 * has no relation to anything as long as it conforms with the naming standard
 * the *.services.yml points to this class and that is what matters
 */

// Declare the namespace for our own event subscriber.
namespace Drupal\on_delete_event\EventSubscriber;

// This is the interface that we are implementing.
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Following is needed as method parameter becuase
* the event listener method receives an instance of it (see ourResponseMethod)
*/
use Drupal\migrate;
//suse Drupal\migrate\Event;
use Drupal\migrate\Event\MigrateRowDeleteEvent;


 
class MyClassWhateverNamexyz implements EventSubscriberInterface {

  /**
   * Code fired on when the subscribed event happens 
   */
  public function ourResponseMethod(MigrateRowDeleteEvent $event) {
    // For now simply set message
    // To do for the future is to log something in watchdog or sent email!
    if ($event) {
     drupal_set_message($this
      ->t('Looks like the on_delete_event subscription worked'), 'status');

      \Drupal::logger('on_delete_event')->notice("Just, fired the on_delete_event event");
  }
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    // For this example I am using KernelEvents constants (see below a full list).
    $events[MigrateEvents::POST_ROW_DELETE] = ['ourResponseMethod'];
    return $events;
  }

} // End class 