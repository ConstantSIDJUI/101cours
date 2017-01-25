<?php
namespace UserBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Doctrine\Common\Persistence\ObjectManager;

class IdCityToObjectTransformer implements DataTransformerInterface
{
    /**
     * @var ObjectManager
     */
    private $om;

    /**
     * @param ObjectManager $om
     */
    public function __construct(ObjectManager $om){
        $this->om = $om;
    }

    /**
     * Transforms an object (issue) to a string (number).
     *
     * @param  Issue|null $issue
     * @return string
     */
    public function transform($issue){
        if(null === $issue)
            return 0;

        return $issue->getId();
    }

    /**
     * Transforms a string (number) to an object (issue).
     *
     * @param  string $number
     * @return Issue|null
     * @throws TransformationFailedException if object (issue) is not found.
     */
    public function reverseTransform($number){
        if(!$number)
            return null;

        $issue = $this->om
                      ->getRepository('MyAdminBundle:City')
                      ->findOneBy(array('id' => $number));

        if(null === $issue)
            throw new TransformationFailedException(sprintf('La ville avec le numéro "%s" ne peut pas être trouvé!',$number));

        return $issue;
    }
}
