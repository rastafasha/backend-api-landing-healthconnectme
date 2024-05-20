<?php

namespace App\Jobs;

use App\Models\Workshop;
use Illuminate\Bus\Queueable;
use App\Mail\NewWorkshopRegisterMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Support\Facades\Log;

class WorkshopRegisterJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var Workshop
     */
    // public Payment $payment;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Workshop $workshop)
    {
        $this->workshop = $workshop;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            Mail::to('soporte@tu-managerdigital.com')
                ->send(
                    new NewPaymentRegisterMail(
                    $this->workshop,
                    )
                );
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
        }
    }
}
