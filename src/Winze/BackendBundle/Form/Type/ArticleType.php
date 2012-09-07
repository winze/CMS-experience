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
class ArticleType extends AbstractType {

    public function buildForm(FormBuilder $builder, array $options) {
        $builder
                ->add('title', 'text', array('label' => "Titre"))
                ->add('titleEn', 'text', array('label' => "Titre(Anglais)"))
                ->add('body', 'textarea', array('label' => "Corp de text"))
                ->add('bodyEn', 'textarea', array('label' => "Corp de text(Anglais)"))
                ->add('picture', new PictureType(), array(
                    'label' => 'Ajouter image',
                    'required' => false,
                        )
                )

        ;
    }

    public function getName() {
        return 'winze_backendbundle_article_type';
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
