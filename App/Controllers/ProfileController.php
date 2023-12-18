<?php

namespace App\Controllers;

use App\Base\Request;
use App\FormRequests\UserEditRequest;
use App\Models\User;
use App\Resources\Users\UserResource;


class ProfileController extends AbstractController
{
    protected string $mainTemplate = 'layouts/example_layout';

    public function actionShow(?User $user, ?Request $request, ?User $users): void
    {
//        TODO: Рефакторинг
        $userId = (int)$request->getParam('id');
        $token = app()->cookie->getCookie('token');
        $currUser = $users->find($token,'access_token');

        if (!$currUser->is_admin && $currUser->id !== $userId) {
            echo $this->render('users/user-view', ['user' => UserResource::transformToShow($user)]);
            return;
        }

        if ($user?->id) {
            echo $this->render('users/edit-user', ['user' => UserResource::transformToShow($user)]);
            return;
        }

        echo $this->render(self::NOT_FOUND_PAGE_NAME);
    }

    public function actionUpdate(?User $user, ?UserEditRequest $request): void
    {

        if (!$request->isPost()) {
            echo 'Данные для сохранения не были получены.';
            return;
        }

        $userId = (int)$request->getParam('id');

        if (!$userId) {
            echo 'Отсутствует идентификатор пользователя.';
            return;
        }

        $data = $request->validated();
        $errors = app()->session->get('errors');

        if (empty($errors)) {
            $data['id'] = $userId;
            $user->update($data);
            header('Location: /profile/show/?id='.$userId);
        } else {
            echo $this->render('users/edit-user', ['user' => UserResource::transformToShow($user),
                'errors' => app()->session->get('errors'),
            ]);
        }
    }


}
