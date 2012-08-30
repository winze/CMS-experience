<?php

namespace Winze\BackendBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Winze\PageBuilderBundle\Document\Page;

/**
 * Description of PanierType
 *
 * @author vincent
 */
class PageType extends AbstractType {

    public function buildForm(FormBuilder $builder, array $options) {
        $builder
                ->add('name', 'text', array('label' => "Page"))
                ->add('alias', 'text', array('label' => "Url"))
                ->add('title', 'text', array('label' => "Titre"))
                ->add('metaData', 'textarea', array('label' => "Méta data"))
                ->add('metaDescription', 'textarea', array('label' => "Méta description"))
                ->add('metaKey', 'textarea', array('label' => "Méta Key"))

        ;
    }

    public function getName() {
        return 'winze_backendbundle_page_type';
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
