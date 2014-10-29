<?php

namespace Kruske\KruskeTPVVirtualBBVABundle\Form\Type;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Exception\FormException;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * A field for entering a recaptcha text.
 */
class TPVBBVAType extends AbstractType
{
    protected $url_tpv;
    protected $clave_tpv;
    protected $name_tpv;
    protected $code_tpv;
    protected $terminal_tpv;
    protected $currency_tpv;
    protected $transaction_type_tpv;
    protected $url_merchant_tpv;

    /**
     * Construct.
     *
     * @param ContainerInterface $container An ContainerInterface instance
     */
    public function __construct(ContainerInterface $container)
    {
        $this->url_tpv = $container->getParameter('kruske_tpv_virtual_bbva.url_tpv');
        $this->clave_tpv    = $container->getParameter('kruske_tpv_virtual_bbva.clave_tpv');
        $this->name_tpv   = $container->getParameter('kruske_tpv_virtual_bbva.name_tpv');
        $this->code_tpv = $container->getParameter('kruske_tpv_virtual_bbva.code_tpv');
        $this->terminal_tpv    = $container->getParameter('kruske_tpv_virtual_bbva.terminal_tpv');
        $this->currency_tpv   = $container->getParameter('kruske_tpv_virtual_bbva.currency_tpv');
        $this->transaction_type_tpv    = $container->getParameter('kruske_tpv_virtual_bbva.transaction_type_tpv');
        $this->url_merchant_tpv   = $container->getParameter('kruske_tpv_virtual_bbva.url_merchant_tpv');
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars = array_replace($view->vars, array(
            'ewz_recaptcha_enabled' => $this->enabled,
        ));

        if (!$this->enabled) {
            return;
        }

        if ($this->secure) {
            $server = self::RECAPTCHA_API_SECURE_SERVER;
        } else {
            $server = self::RECAPTCHA_API_SERVER;
        }

        $view->vars = array_replace($view->vars, array(
            'url_challenge' => sprintf('%s/challenge?k=%s', $server, $this->publicKey),
            'url_noscript'  => sprintf('%s/noscript?k=%s', $server, $this->publicKey),
            'public_key'    => $this->publicKey,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'compound'      => false,
            'public_key'    => null,
            'url_challenge' => null,
            'url_noscript'  => null,
            'attr'          => array(
                'options' => array(
                    'theme' => 'clean',
	    	    'lang'  => $this->language,
    	        ),
	    ),
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'form';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'kruske_tpv_virtual_bbva';
    }

    public function showFrom() {
        echo $this->url_tpv;
    }
}
