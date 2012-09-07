<?php

namespace Winze\BackendBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Winze\BackendBundle\Form\Type\PictureType;

/**
 * Description of PanierType
 *
 * @author vincent
 */
class DiaporamaPictureType extends AbstractType {

    public function buildForm(FormBuilder $builder, array $options) {
        $builder
                ->add('picture', new PictureType(), array('label'=>'Ajouter image'))

        ;
    }

    public function getName() {
        return 'winze_backendbundle_diaporama_picture_type';
    }

    public function getDefaultOptions(array $options) {
        return array(
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            // a unique key to help generate the secret token
            'intention' => 'task_item',
            'data_class' => 'Winze\PageBuilderBundle\Document\DiaporamaPicture',
        );
    }

}
