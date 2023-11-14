<?php

namespace App\EventSubscriber;

use App\Entity\Utilisateur;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class PasswordUpdateSuscriberSubscriber implements EventSubscriberInterface
{
   
public function __construct(protected UserPasswordHasherInterface $passwordHasher)
{
    
}
/**
 * @return array<string, string >
 */


public static function getSubscribedEvents(): array
{
return [
    BeforeEntityPersistedEvent::class => 'onBeforeEntityPersistedEvent',
    BeforeEntityUpdatedEvent::class => 'onBeforeEntitypersistedEvent',
];
}

public function onBeforeEntityPersistedEvent(BeforeEntityPersistedEvent $event): void
{
$entity = $event->getEntityInstance();

if (!$entity instanceof Utilisateur) {
return;
}

if (!is_null($entity->getPlainPassword()) && '' !== $entity->getPlainPassword()) {
$entity->setPassword(
    $this->passwordHasher->hashPassword($entity, $entity->getPlainPassword())
);
}
}

}
