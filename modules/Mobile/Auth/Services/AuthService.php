<?php

namespace BasicDashboard\Mobile\Auth\Services;

use BasicDashboard\Foundations\Domain\Settings\Repositories\SettingRepositoryInterface;
use BasicDashboard\Foundations\Domain\Users\Repositories\Eloquent\UserRepository;
use BasicDashboard\Foundations\Domain\Users\User;
use BasicDashboard\Mobile\Auth\Resources\AuthResource;
use BasicDashboard\Mobile\Common\BaseMobileController;
use Exception;
use Illuminate\Http\JsonResponse;

/**
 *
 * A AuthService is the manager of methods.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

class AuthService extends BaseMobileController
{
    const REGISTER = "Registration Success";
    const TOKEN_NAME = "buddhistUserToken";
    const REGISTER_PASS = "Registration Pass";
    const VERSION_CHECK = 'Version Check Success';

    public function __construct(
        private UserRepository $userRepository,
        private SettingRepositoryInterface $settingRepository
    ) {
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function registrationSuccess(array $request): JsonResponse
    {
        $emptyValue = null;
        try {
            $this->userRepository->beginTransaction();
            $user = null;
            if ($request['email'] != $emptyValue && $request['name'] != $emptyValue) {
                $user = $this->normalRegister($request);
            }

            if ($request['oauth_id'] != $emptyValue && $request['oauth_provider'] != $emptyValue) {
                $user = $this->oneTapRegister($request);
            }

            $user->update($this->prepareUserUpdate($user->id));
            $token = $user->createToken(self::TOKEN_NAME)->plainTextToken;
            $data = $this->prepareUserPassData($user, $token);
            $this->userRepository->commit();
            return $this->sendResponse(self::REGISTER_PASS, $data);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    // Private Section
    private function normalRegister(array $request): User
    {
        $user = $this->userRepository->findByEmail($request);
        if (!$user) {
            $user = $this->userRepository->insert($request);
        }
        return $user;
    }

    private function oneTapRegister(array $request): User
    {
        $user = $this->userRepository->getUserOneTap($request);
        if (!$user) {
            $user = $this->userRepository->insert($request);
        }
        return $user;
    }

    private function prepareUserUpdate(string $id): array
    {
        return [
            'created_by' => $id,
            'status' => true,
        ];
    }

    private function prepareUserPassData(User $user, string $token): array
    {
        $user = new AuthResource($user);
        $user = $user->response()->getData(true)['data'];
        $grandToken = strpos($token, "|");
        $finalToken = substr($token, $grandToken + 1);
        return [
            'user_info' => $user,
            'token' => $finalToken,
        ];
    }

    public function checkAppVersion()
    {
        try{
            $data = $this->settingRepository->getAppVersions()->toArray();
            return $this->sendResponse(self::VERSION_CHECK,$data);
        }catch(Exception $e){
            return $this->sendError($e->getMessage());
        }
    }

}