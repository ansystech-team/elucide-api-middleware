<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchParamRequest;
use App\Services\ElucideAPIService;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    /**
     * @var ElucideAPIService
     */
    protected $elucideApi;

    public function __construct(ElucideAPIService $elucideApi)
    {
        $this->elucideApi = $elucideApi;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(SearchParamRequest $request)
    {
        $query = $request->query('q');
        $foundItems = $this->elucideApi->searchInstitution($query);

        if ($foundItems > 0) {
            return response()->json([
                'results' => $foundItems
            ], 200);
        } else {
            $this->elucideApi->createTicket([
                'institution' => $query,
                'date' => Carbon::now()->toISOString()
            ]);

            return response()->json('No data found', 204);
        }
    }
}
