<?php

namespace App\Jobs;

use App\Mail\OrderNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;


class SendOrderNotificationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $order;
    public $province;
    public $district;
    public $ward;
    public $adminMail;
    public function __construct($order, $province, $district, $ward, $adminMail)
    {
        $this->order = $order;
        $this->province = $province;
        $this->district = $district;
        $this->ward = $ward;
        $this->adminMail = $adminMail;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->adminMail)->send(new OrderNotification($this->order, $this->province, $this->district, $this->ward));
    }
}