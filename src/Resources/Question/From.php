<?php
/**
 * Class From
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Question;

use JMS\Serializer\Annotation as JMS;

class From        
{
    /**
     * @var int
     * @JMS\Type("integer")
     */
    private $id;

    /**
     * @var int
     * @JMS\Type("integer")
     */
    private $answeredQuestions;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return From
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getAnsweredQuestions()
    {
        return $this->answeredQuestions;
    }

    /**
     * @param int $answeredQuestions
     * @return From
     */
    public function setAnsweredQuestions($answeredQuestions)
    {
        $this->answeredQuestions = $answeredQuestions;
        return $this;
    }
}