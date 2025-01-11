<?php

namespace BasicDashboard\Web\Notifications\Services;

use Exception;
use Illuminate\View\View;
use Ladumor\OneSignal\OneSignal;
use Illuminate\Http\RedirectResponse;
use BasicDashboard\Web\Common\BaseController;
use BasicDashboard\Web\Notifications\Resources\NotificationResource;
use BasicDashboard\Foundations\Domain\Notifications\Repositories\NotificationRepositoryInterface;

use function Illuminate\Support\defer;

/**
 *
 * A NotificationService is the manager of methods.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

class NotificationService extends BaseController
{
    const VIEW = 'admin.notification';
    const ROUTE = 'notifications';
    const LANG_PATH = "notification.notification";

    public function __construct(
        private NotificationRepositoryInterface $notificationRepository,
    ) {}

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function index(array $request): View
    {
        $notificationList = $this->notificationRepository->getNotificationList($request);
        $notificationList = NotificationResource::collection($notificationList)->response()->getData(true);
        return $this->returnView(self::VIEW . ".index", $notificationList, $request);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function create(): View
    {
        $presignedLink = $this->generatePresignedUrl(1, 'notifications/video');
        return view(self::VIEW . '.create', compact('presignedLink'));
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function store($request): RedirectResponse
    {
        try {
            $this->notificationRepository->beginTransaction();
            $model = $this->notificationRepository->insert($request);
            $path = "notifications" . '/' . $model['id'];
            $notiUploadImagePath = isset($request['uploaded_photo']) ? uploadImageToDigitalOcean($request['uploaded_photo'], $path) : null;
            $model->update([
                'uploaded_photo' => $notiUploadImagePath
            ]);
            $this->notificationRepository->commit();
            return $this->redirectRoute(self::ROUTE . ".index", __(self::LANG_PATH . '_created'));
        } catch (Exception $e) {
            return $this->redirectBackWithError($this->notificationRepository, $e);
        }
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function edit(string $id): View | RedirectResponse
    {
        $presignedLink = $this->generatePresignedUrl(1, 'notifications/video');
        // dd($presignedLink);
        $notification = $this->notificationRepository->edit($id);
        $notification = new NotificationResource($notification);
        $notification = $notification->response()->getData(true)['data'];
        $data = [
            'notification' => $notification,
            'presignedLinked' => $presignedLink
        ];
        return $this->returnView(self::VIEW . ".edit", $data);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function show(string $id): View | RedirectResponse
    {
        $notification = $this->notificationRepository->show($id);
        $notification = new NotificationResource($notification);
        $notification = $notification->response()->getData(true)['data'];
        return $this->returnView(self::VIEW . '.show', $notification);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function update($request, string $id): RedirectResponse
    {
        try {
            $this->notificationRepository->beginTransaction();
            $this->notificationRepository->update($request, $id);
            $model = $this->notificationRepository->show($id);
            $path = "notifications" . '/' . $model['id'];
            //for date
            $sendDate = $request['sending_method'] === 'Schedule' ? $model['sending_date'] : null;

            //for Image
            $notiUploadImagePath = isset($request['uploaded_photo']) ? uploadImageToDigitalOcean($request['uploaded_photo'], $path) : $model['uploaded_photo'];

            $model->update([
                'uploaded_photo' => $notiUploadImagePath,
            ]);
             $this->notificationRepository->commit();
            return $this->redirectRoute(self::ROUTE . ".index", __(self::LANG_PATH . '_updated'));
        } catch (Exception $e) {
            return $this->redirectBackWithError($this->notificationRepository, $e);
        }
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function destroy($request): RedirectResponse
    {
        try {
            $this->notificationRepository->beginTransaction();
            $this->notificationRepository->delete($request['id']);
            $this->notificationRepository->commit();
            return $this->redirectRoute(self::ROUTE . ".index", __(self::LANG_PATH . '_deleted'));
        } catch (Exception $e) {
            return $this->redirectBackWithError($this->notificationRepository, $e);
        }
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function sendNotification(string $id, $request)
    {
        $request->validate([
            'country' => 'required',
        ], [
            'country.required' => "Please Select Country",
        ]);
        $country = $request->input('country');
        $notification = $this->notificationRepository->show($id);
        $notification = new NotificationResource($notification);
        $notification = $notification->response()->getData(true)['data'];

        $imageUrl = $notification['uploaded_photo'];

        $fields = [
            'included_segments' => [$country],
            'chrome_web_image' => $imageUrl, //Chrome web push. Windows and Android only.
            'chrome_web_icon' => $imageUrl, //Chrome web push
            'chrome_big_picture' => $imageUrl, //Chrome Apps
            'chrome_web_badge' => $imageUrl, //Chrome web push. Android only.
            'chrome_icon' => $imageUrl, //Chrome app
            'firefox_icon' => $imageUrl, //Firefox web push            
            'huawei_big_picture' => $imageUrl, //Huawei
            'huawei_small_icon' => $imageUrl, //Huawei
            'huawei_large_icon' => $imageUrl, //Huawei
            'adm_big_picture' => $imageUrl, //Amazon
            'adm_small_icon' => $imageUrl, //Amazon
            'adm_large_icon' => $imageUrl, //Huawei 
            'big_picture' => $imageUrl, //Android           
            'small_icon' => $imageUrl, //Android            
            'large_icon' => $imageUrl, //Android 
            'data' => $notification
        ];
        defer(function() use($fields,$notification){
            OneSignal::sendPush($fields, "**" . $notification['title'] . "**" . "\n" . $notification['body']);
        });
        // return $this->redirectRoute(self::ROUTE . ".index", __(self::LANG_PATH . '_success'));
        return $this->sendAjaxSuccess("Notification was successfully Send!");
    }
}
