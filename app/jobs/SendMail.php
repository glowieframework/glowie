<?php

namespace Glowie\Jobs;

use Glowie\Core\Queue\Job;
use Glowie\Core\Tools\Mailer;

/**
 * Send mail job for Glowie application.
 * @category Queue
 * @package glowieframework/glowie
 * @author Glowie
 * @copyright Copyright (c) Glowie
 * @license MIT
 */
class SendMail extends Job
{

    /**
     * Runs the job.
     */
    public function run()
    {
        $mail = new Mailer();
        $mail->addTo($this->data->email);
        $mail->send($this->data->subject, $this->data->message);
    }
}
