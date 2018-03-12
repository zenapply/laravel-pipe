<?php

namespace Zenapply\Pipe\Http;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class WebhookController extends Controller
{

    /**
     * Handle a Pipe webhook call.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handleWebhook(Request $request)
    {
        $payload = json_decode($request->payload, true);

        $method = 'handle'.studly_case(str_replace('.', '_', $payload['event']));

        if (method_exists($this, $method)) {
            return $this->{$method}($payload);
        } else {
            return abort(404);
        }
    }

    /**
     * Handle a Pipe webhook.
     *
     * @param  array  $payload
     * @return Response
     */
    protected function handleVideoRecorded($payload)
    {
        abort(501); // Not Implemented
    }

    /**
     * Handle a Pipe webhook.
     *
     * @param  array  $payload
     * @return Response
     */
    protected function handleVideoTranscoded($payload)
    {
        abort(501); // Not Implemented
    }

    /**
     * Handle a Pipe webhook.
     *
     * @param  array  $payload
     * @return Response
     */
    protected function handleVideoCopiedS3($payload)
    {
        abort(501); // Not Implemented
    }
}