<?php

namespace BotMan\BotMan\Interfaces;

use Illuminate\Http\Request;

interface VerifiesService
{
    public function verifyRequest(Request $request);
}
