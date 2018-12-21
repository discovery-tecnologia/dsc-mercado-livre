<?php
/**
 * Class Question
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Question;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;

class QuestionsList
{
    /**
     * @var int
     * @JMS\Type("integer")
     */
    private $total;

    /**
     * @var int
     * @JMS\Type("integer")
     */
    private $limit;

    /**
     * @var ArrayCollection
     * @JMS\Type("ArrayCollection<Dsc\MercadoLivre\Resources\Question\Question>")
     */
    private $questions;

    /**
     * QuestionsList constructor.
     */
    public function __construct()
    {
        $this->questions = new ArrayCollection();
    }

    /**
     * @param int $total
     * @return QuestionsList
     */
    public function setTotal($total)
    {
        $this->total = $total;
        return $this;
    }

    /**
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     * @return QuestionsList
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * @param ArrayCollection $questions
     * @return QuestionsList
     */
    public function setQuestions($questions)
    {
        $this->questions = $questions;
        return $this;
    }
}