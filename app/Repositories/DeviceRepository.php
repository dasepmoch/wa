<?php
/*
Copyright © Magd Almuntaser, OneXGen Technology. All rights reserved.
Project: MPWA Whatsapp Gateway | Multi Device
Licensed under the CC BY-NC-ND 4.0 License.
For details, visit https://creativecommons.org/licenses/by-nc-nd/4.0/.
*/

namespace App\Repositories;

use App\Models\Device;

class DeviceRepository
{

    protected $device;

    public function __construct()
    {
        $this->initQuery();
    }

    public function initQuery($query = null)
    {
        $this->device = $query ?? new Device();
        return $this;
    }

    public function byId($id)
    {
        return $this->initQuery($this->device->whereId($id));
    }

    public function byBody($body)
    {
        return $this->initQuery($this->device->whereBody($body));
    }

    public function single()
    {
        return $this->device->first();
    }

    public function create($data)
    {
        return $this->device->create($data);
    }

    public function incrementMessageSent($id, $value)
    {
        return $this->device->whereId($id)->increment('message_sent', $value);
    }
}
