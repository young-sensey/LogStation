<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\DeviceLogUpdateRequest;
use App\Http\Requests\DeviceLogViewRequest;
use App\Models\Device;
use App\Models\DeviceLog;
use Illuminate\Http\Response;

class DeviceLogController extends Controller
{
    /**
     * Show device logs by device_id.
     * @param DeviceLogViewRequest $request
     * @return array
     */
    public function view(DeviceLogViewRequest $request): array
    {
        $deviceId = $request->input('device_id');
        return DeviceLog::query()->where('device_id', $deviceId)->get()->toArray();
    }

    /**
     * Add device log.
     * @param DeviceLogUpdateRequest $request
     * @return Response
     */
    public function upload(DeviceLogUpdateRequest $request): Response
    {
        $deviceId = $request->input('device_id');

        /** @var Device $authDevice */
        $authDevice = auth()->user();
        if ($deviceId !== $authDevice->uuid) {
            return response('', 403);
        }

        DeviceLog::query()->create([
            'device_id' => $deviceId,
            'log_date' => $request->input('log_date'),
        ]);

        return response('', 201);
    }
}
