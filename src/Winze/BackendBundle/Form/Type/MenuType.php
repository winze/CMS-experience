<?php

namespace Winze\BackendBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 * Description of PanierType
 *
 * @author vincent
 */
class MenuType extends AbstractType {

    public function buildForm(FormBuilder $builder, array $options) {
        $builder
                ->add('name', 'text', array('label' => "Menu"))
                ->add('title', 'text', array('label' => "Titre"))
                ->add('titleEn', 'text', array('label' => "Titre (Anglais)"))
                ->add('alias', 'text', array('label' => "Url"))
        ;
    }

    public function getName() {
        return 'winze_backendbundle_menu_type';
    }

    public function getDefaultOptions(array $options) {
        return array(
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            // a unique key to help generate the secret token
            'intention' => 'task_item',
        );
    }

}
