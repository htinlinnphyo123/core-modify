<?php

namespace BasicDashboard\Mobile\Notifications\Services;

use BasicDashboard\Foundations\Domain\Notifications\Repositories\NotificationRepositoryInterface;
use BasicDashboard\Mobile\Common\BaseMobileController;
use BasicDashboard\Mobile\Notifications\Resources\NotificationResource;
use Exception;
use Illuminate\Http\JsonResponse;

/**
 *
 * A NotificationService is the manager of methods.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

class NotificationService extends BaseMobileController
{

    public function __construct(
        private NotificationRepositoryInterface $notificationRepository,
    )
    {
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function index(array $request): JsonResponse
    {
        $data = $this->notificationRepository->getNotificationList($request);
        $data = NotificationResource::collection($data)->response()->getData(true);
        return $this->sendResponse("Index success", $data);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function show(string $id): JsonResponse
    {
        $data = $this->notificationRepository->edit($id);
        $data= new NotificationResource($data);
        $data= $data->response()->getData(true)['data'];
        return $this->sendResponse('Show success',$data);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////
}
