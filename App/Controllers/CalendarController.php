<?php

namespace App\Controllers;

use App\Models\Record;

class CalendarController extends AbstractController
{
    /**
     * @throws \Exception
     */
    public function actionIndex(): void
    {
        $record = new Record();
        $records = $record->findAll();

        if ($records) {
            header('Content-Type: application/json');
            echo json_encode($records);
            //echo $this->render('calendars/index', ['calendars' => $calendars]);

        } else {
            //TODO: Добавить обработку ошибок
            throw new \Exception('Calendars not found');
        }
    }

    /**
     * GET-запросы
     */
    public function actionRecords(array $params): void
    {
        $record = new Record();
        
        //TODO: ЕСЛИ ВЫВОД ВСЕХ ТУТ НУЖЕН------------------------------------------
        /* if (count($params) == 1) {
            $records = $record->findAll();
            
            if ($records) {
                header('Content-Type: application/json');
                echo json_encode($records);
                //echo $this->render('calendars/index', ['calendars' => $calendars]);
    
            } else {
                //TODO: Добавить обработку ошибок
                throw new \Exception('Calendars not found');
            }
            
        } elseif (!empty($params['id'])) {

            $calendars = $record->find($params['id']);

            if ($calendars) {
                header('Content-Type: application/json');
                echo json_encode($calendars);
                //echo $this->render('calendars/index', ['calendars' => $calendars]);

            } else {
            //TODO: Добавить обработку ошибок
                throw new \Exception('Calendars not found');
            }

        } else {
            throw new \Exception('not found');
        } */

        if (!empty($params['id'])) {

            $calendars = $record->find($params['id']);

            if ($calendars) {
                header('Content-Type: application/json');
                echo json_encode($calendars);
                //echo $this->render('calendars/index', ['calendars' => $calendars]);

            } else {
            //TODO: Добавить обработку ошибок
                throw new \Exception('Calendars not found');
            }

        } else {
            throw new \Exception('not found');
        }
    }

    /**
     * POST-запросы
     */
    public function actionAdd(array $params): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($params)) {
                throw new \Exception('Calendars=>POST: not data');
            } else {
                //var_dump($params);
                $record = new Record();
                $record->add($params);

            }
        }
    }
}