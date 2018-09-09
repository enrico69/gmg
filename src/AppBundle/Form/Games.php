<?php
/**
 * @author     Eric COURTIAL <e.courtial30@gmail.com>
 */
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

/**
 * Class Games
 * @package AppBundle\Form
 */
class Games extends AbstractType
{
    /**
     * @var array
     */
    protected $options;

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array                                        $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->options = $options;
        $builder
            ->add(
                'name',
                TextType::class,
                [
                    'required' => 'true',
                    'label'    => 'Nom',
                ]
            )
            ->add(
                'platform',
                TextType::class,
                [
                    'required' => 'true',
                    'label'    => 'Support',
                ]
            )
            ->add('to_play_solo', ChoiceType::class, [
                'label' => 'A jouer en solo',
                'choices' => array_flip([0 => 'Non', 1 => 'Oui']),
                'multiple'  => false,
            ])
            ->add('to_play_multi', ChoiceType::class, [
                'label' => 'A jouer en multi',
                'choices' => array_flip([0 => 'Non', 1 => 'Oui']),
                'multiple'  => false,
            ])
            ->add('copy', ChoiceType::class, [
                'label' => 'Pas un jeu original',
                'choices' => array_flip([0 => 'Non', 1 => 'Oui']),
                'multiple'  => false,
            ])
            ->add('many', ChoiceType::class, [
                'label' => 'Plusieurs exemplaires',
                'choices' => array_flip([0 => 'Non', 1 => 'Oui']),
                'multiple'  => false,
            ])
            ->add('top_game', ChoiceType::class, [
                'label' => "Top jeu (toujours valable aujourd'hui)",
                'choices' => array_flip([0 => 'Non', 1 => 'Oui']),
                'multiple'  => false,
            ])
            ->add('usedToPlayItOften', ChoiceType::class, [
                'label' => "J'y ai beaucoup joué",
                'choices' => array_flip([0 => 'Non', 1 => 'Oui']),
                'multiple'  => false,
            ])
            ->add('to_do', ChoiceType::class, [
                'label' => 'A faire',
                'choices' => array_flip([0 => 'Non', 1 => 'Oui']),
                'multiple'  => false,
            ])
            ->add('material', ChoiceType::class, [
                'label' => "N'est pas un jeu (matériel)",
                'choices' => array_flip([0 => 'Non', 1 => 'Oui']),
                'multiple'  => false,
            ])
            ->add('all_of_fame', ChoiceType::class, [
                'label' => 'All of fame?',
                'choices' => array_flip([0 => 'Non', 1 => 'Oui']),
                'multiple'  => false,
            ])
            ->add(
                'all_of_fame_year',
                TextType::class,
                [
                    'required' => false,
                    'label'    => "Le cas échéant, en quelle année? (année ou "
                        . "j'y ai joué pour la première fois, pas l'année de sa sortie officielle",
                ]
            )
            ->add(
                'all_of_fame_position',
                TextType::class,
                [
                    'required' => false,
                    'label'    => 'Et en quelle position?',
                ]
            )
            ->add(
                'comments',
                TextareaType::class,
                [
                    'required' => false,
                    'label'    => 'Commentaires',
                ]
            )
            ->add(
                'submit',
                SubmitType::class,
                [ 'label'    => 'Enregistrer']
            )
        ;
    }

    /**
     * @param \Symfony\Component\OptionsResolver\OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => 'AppBundle\Entity\Games']);
    }
}
