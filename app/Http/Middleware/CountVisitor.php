<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Jenssegers\Agent\Facades\Agent;
use App\Models\Room;

class CountVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $ip = hash('sha512', $request->ip());
        $_id = $request->route()->parameter('id');
        $device = Agent::device();
        $is_phone = (Agent::isPhone())?1:0;
        $browser = Agent::browser();
        $platform = Agent::platform();

        if (!empty($_id)) {
            $idData = base64_decode($_id);
            $idArr = explode('--', $idData);

            $_room_id = $idArr[0]; //[1] = Business ID
        }

        $roomSpace = Room::where('id', $_room_id)->firstOrFail();
        $_business_id = $roomSpace->business_id;
        
        //Unique is based on IP/Date/QR page id
        if (Visitor::where('visit_date', today())->where('visit_ip', $ip)->where('visit_page', $_id)->count() < 1)
        {
            Visitor::create([
                'visit_date' => today(),
                'visit_ip' => $ip,
                'visit_page' => $_id,
                'visit_business_id' => $_business_id,
                'visit_device' => $device,
                'visit_ismobile' => $is_phone,
                'visit_browser' => $browser,
                'visit_platform' => $platform
            ]);
        }

        return $next($request);
    }
}
