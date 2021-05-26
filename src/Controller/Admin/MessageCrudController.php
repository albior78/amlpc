<?php

namespace App\Controller\Admin;

use App\Entity\Message;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MessageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Message::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            DateTimeField::new('datetime', 'Date & heure')
                ->setTextAlign('center'),
            TextField::new('nom', 'Le Nom')
                ->setTextAlign('center'),
            TextField::new('prenom', 'Le Prénom')
                ->setTextAlign('center'),
            EmailField::new('email', 'Email')
                ->setTextAlign('center'),
            TelephoneField::new('tel', 'N° de Téléphone')
                ->setTextAlign('center'),
            TextareaField::new('question', 'Le Message')
                ->setTextAlign('center'),
        ];
    }   
}
