<?php

namespace App\Http\Controllers\AutoTrips;

use App\Exception\Requests\AutoTrips\WrongDataProvidedDeleteAutoTripsFoundException;
use App\Exception\Requests\AutoTrips\WrongDataProvidedReadAutoTripsFoundException;
use App\Services\AutoTrips\AutoTripsService;
use App\Validators\Requests\AutoTripsValidator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

readonly class AutoTripsController extends AbstractController
{
    public function __construct(
        private AutoTripsValidator $autoTripsValidator,
        private AutoTripsService   $serviceAutoTrips
    )
    {
    }

    final public function index(): JsonResponse
    {
        $iterator = $this->serviceAutoTrips->index();

        foreach ($iterator->getIterator() as $index => $trip) {
            $iterator[$index] = $trip->__call("getPropsWithDescriptions");
        }

        return response()->json(
            $iterator->jsonSerialize()
        );
    }

    /**
     * @throws WrongDataProvidedReadAutoTripsFoundException
     */
    final public function read(Request $request): JsonResponse
    {
        $this->autoTripsValidator::validateRead($request);

        return response()->json(
            $this->serviceAutoTrips->read(
                $request->input('id')
            )->__call("getPropsWithDescriptions")
        );
    }

    /**
     * @throws WrongDataProvidedDeleteAutoTripsFoundException
     */
    final public function destroy(Request $request): JsonResponse
    {
        $this->autoTripsValidator::validateDelete($request);

        return response()->json(
            $this->serviceAutoTrips->destroy(
                $request->input('id')
        ));
    }
}
