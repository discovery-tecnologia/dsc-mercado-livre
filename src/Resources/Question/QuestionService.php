<?php
/**
 * Class QuestionService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Question;

use Dsc\MercadoLivre\Resources\ResourceService;
use Dsc\MercadoLivre\BaseService;

class QuestionService extends BaseService implements ResourceService
{
    /**
     * @param $questionId
     * @return Question
     */
    public function findQuestion($questionId)
    {
        return $this->getResponse(
            $this->get('/questions/' . $questionId),
            Question::class
        );
    }

    /**
     * Perguntas recebidas pelo vendedor
     * @param $sellerId
     * @return QuestionsList
     */
    public function findQuestionsBySeller($sellerId, $limit = 50, $offset = 0, $sort = 'date_desc')
    {
        return $this->getResponse(
            $this->get('/questions/search', [
                'seller_id' => $sellerId,
                'limit'     => $limit,
                'offset'    => $offset,
                'sort'      => $sort
            ]),
            QuestionsList::class
        );
    }

    /**
     * Perguntas recebidas sobre um produto
     * @param $itemId
     * @return QuestionsList
     */
    public function findQuestionsByProduct($itemId, $limit = 50, $offset = 0, $sort = 'date_desc')
    {
        return $this->getResponse(
            $this->get('/questions/search', [
                'item'   => $itemId,
                'limit'  => $limit,
                'offset' => $offset,
                'sort'   => $sort
            ]),
            QuestionsList::class
        );
    }

    /**
     * Perguntas feitas por um usuário sobre um produto
     * @param $itemId
     * @param $customerId
     * @return QuestionsList
     */
    public function findQuestionsByCustomerForProduct($itemId, $customerId, $limit = 50, $offset = 0, $sort = 'date_desc')
    {
        return $this->getResponse(
            $this->get('/questions/search', [
                'item'   => $itemId,
                'from'   => $customerId,
                'limit'  => $limit,
                'offset' => $offset,
                'sort'   => $sort
            ]),
            QuestionsList::class
        );
    }
}