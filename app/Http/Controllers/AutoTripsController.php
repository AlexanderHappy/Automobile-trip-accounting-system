<?php

namespace App\Http\Controllers;

use App\Dto\AutoTrips\DtoDataAutoTripAbstractAutoTrips;
use App\Exception\AutoTripsDto\WrongTypePropException;
use App\Exception\Requests\AutoTrips\WrongDataProvidedAutoTripsFoundException;
use App\Services\AutoTrips\AutoTripsService;
use App\Validators\Requests\AutoTripsValidator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

readonly class AutoTripsController extends AbstractController
{
    public function __construct(
        private AutoTripsValidator           $autoTripsValidator,
        private AutoTripsService             $autoTripsService,
    )
    {
    }

    /**
     * @throws \ReflectionException
     * @throws WrongTypePropException
     * @throws WrongDataProvidedAutoTripsFoundException
     */
    final public function store(Request $request): JsonResponse
    {
        $this->autoTripsValidator::validateStore($request);
        $result = $this->autoTripsService
            ->store(
                new DtoDataAutoTripAbstractAutoTrips(
                    $request->input('bulk'),
                    $request->input('consumption'),
                    $request->input('mileage'),
                    $request->input('created_at'),
                )
            )->getCarModelsAndBrand(
                $request->input('car_model_id')
            )->getAutoTripDataId(
                $request->input('created_at')
            )->setAutoTripRecord();

        return response()->json([
            'result' => $result,
            'message' => 'Record is added successfully.',
        ]);
    }

    final public function index(): JsonResponse
    {
        $autoTrips = $this->autoTripsService->index();

        foreach ($autoTrips->getIterator() as $index => $trip) {
            $autoTrips[$index] = $trip->__call("getPropsWithDescriptions");
        }

        return response()->json(
            $autoTrips->jsonSerialize()
        );
    }

    /**
     * @throws WrongDataProvidedAutoTripsFoundException
     */
    final public function read(Request $request): JsonResponse
    {
        $this->autoTripsValidator::validateRead($request);

        return response()->json(
            $this->autoTripsService->read(
                $request->input('id')
            )->__call("getPropsWithDescriptions")
        );
    }

    /**
     * @throws WrongDataProvidedAutoTripsFoundException
     */
    final public function destroy(Request $request): JsonResponse
    {
        $this->autoTripsValidator::validateDelete($request);

        return response()->json(
            $this->autoTripsService->destroy(
                $request->input('id')
            ));
    }

    /*
     * TODO Сделать Update
     * */
}
