<?php

namespace Zbxin\Sms\Jobs;

use Exception;
use Toplan\PhpSms\Facades\Sms;
use ZhiEq\Contracts\Job;

class SendTemplateSmsJob extends Job
{
    protected $cellphoneNumber;
    protected $data;
    protected $template;

    /**
     * Create a new job instance.
     *
     * @param $cellphoneNumber
     * @param $data
     * @param array $template
     */
    public function __construct($cellphoneNumber, $data, $template = [])
    {
        $this->cellphoneNumber = $cellphoneNumber;
        $this->data = $data;
        $this->template = $template;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $result = Sms::make()->to($this->cellphoneNumber)
                ->template($this->template)
                ->data($this->data)->send();
            if ($result['success'] == true) {
                app('log')->info('Sms Send Success', $result);
            } else {
                app('log')->warning('Sms Send Failed', $result);
            }
        } catch (Exception $e) {
            app('log')->error('Sms Send Job Run Failed' . $e->getTraceAsString());
        }
    }
}
