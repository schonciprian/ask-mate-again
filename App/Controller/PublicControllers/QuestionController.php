<?php


namespace App\Controller\PublicControllers;


use App\Controller\BaseController;
use App\Queries\QuestionQueries;
use BK_Framework\Database\Connection\Connection;

class QuestionController extends BaseController
{
    private int $id;

    /**
     * MainController constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
        parent::__construct();
    }

    public function run()
    {
        $pdo = Connection::getConnection(self::$dbConfig);
        $questionData = QuestionQueries::getQuestionDataById($pdo, $this->id);
        $this->view("questionpage", ["questionData"=>$questionData]);
    }
}