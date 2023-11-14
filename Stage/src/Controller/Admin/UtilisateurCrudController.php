<?php

namespace App\Controller\Admin;

use App\Entity\Utilisateur;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Validator\Constraints\Date;

class UtilisateurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Utilisateur::class;
    }

    public function configureActions(Actions $actions):Actions
    {

        return $actions
        ->add(Crud::PAGE_INDEX,Action::DETAIL)
        ->add(Crud::PAGE_EDIT, Action::SAVE_AND_ADD_ANOTHER)
        ->update(Crud::PAGE_INDEX,ACTION::NEW,function(Action $action){
            return $action->setIcon('fa fa-user')->addCssClass('btn btn-success');
        })
        ->update(Crud::PAGE_INDEX,Action::EDIT,function(Action $action){
            return $action->setIcon('fa fa-edit')->addCssClass('btn btn-warning');
        })
        ->update(Crud::PAGE_INDEX,Action::DETAIL,function(Action $action){
            return $action->setIcon('fa fa-eye')->addCssClass('btn btn-info');
        })
        ->update(Crud::PAGE_INDEX,Action::DELETE,function(Action $action){
            return $action->setIcon('fa fa-trash')->addCssClass('btn btn-outline-danger');
        })


        ->addBatchAction(Action::new('approve', 'Approve Users')
                ->linkToCrudAction('approveUsers')
                ->addCssClass('btn btn-primary')
                ->setIcon('fa fa-user-check'));
    }

    public function configureFilters(Filters $filters ):Filters

    {
        return $filters
        ->add('address');

    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Gestion des utilisateurs'); 
    }

    public function configureFields(string $pageName): iterable
    {

        return [
            TextField::new('firstname'),
            TextField::new('lastname'),
            DateField::new('birthday'),
            TextField::new('address'),
            TextField::new('telephone'),
            TextField::new('email'),
            DateTimeField::new('createdAt'),
            DateTimeField::new('updatedAt'),

            TextField::new('Plainpassword')->onlyWhenCreating()
            ->setLabel('Password'),
        
        ];
    }
}
