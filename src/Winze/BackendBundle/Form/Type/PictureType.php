<?php

namespace Winze\BackendBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 * Description of PanierType
 *
 * @author vincent
 */
class PictureType extends AbstractType {

    public function buildForm(FormBuilder $builder, array $options) {
        $builder
                ->add('name', 'text', array(
                    'label' => "Nom",
                    'required' => false,
                        )
                )
                ->add('file', 'file', array(
                    'required' => false,
                        )
                )

        ;
    }

    public function getName() {
        return 'winze_backendbundle_picture_type';
    }

    public function getDefaultOptions(array $options) {
        return array(
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            // a unique key to help generate the secret token
            'intention' => 'task_item',
            'data_class' => 'Winze\PageBuilderBundle\Document\Picture',
        );
    }

}
