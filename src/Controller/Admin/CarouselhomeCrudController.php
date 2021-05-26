<?php

namespace App\Controller\Admin;

use App\Entity\Carouselhome;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\FileUploadType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CarouselhomeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Carouselhome::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('rank', 'Le n° de Rang')
                ->setTextAlign('center'),
            BooleanField::new('active', 'Slide actif'),
            ImageField::new('imageFilename', 'Slide')
            ->setBasePath('upload/images')
            ->setUploadDir('public/upload/images')
            ->setFormType(FileUploadType::class)
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false)
            ->setTemplatePath('admin/admin_imagecarouselhome.html.twig'),
            TextField::new('titre', 'Le titre dans le carousel')
                ->setTextAlign('center'),
            TextField::new('texte', 'Le texte dans le carousel')
                ->setTextAlign('center'),
        ];
    }
    
}
