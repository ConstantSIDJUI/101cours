<?php

namespace PagesBundle\Twig;

class PagesExtension extends \Twig_Extension
{
    public function datediffFilter( \DateTime $date, \DateTime $now = null)
    {
        $now = $now ? $now :new DateTime();
        $diff = $date->diff($now);
 
        return $diff->format('%R%a jours');
    }
}